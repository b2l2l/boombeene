<?php

class Payments{

	protected $lang;

    public function __construct() {
        global $lang;
        $this->lang = $lang;
    }

	function AddFunds($Card_Number,$Card_Value){
		$Card_Number = strtoupper($Card_Number) ; 
		Global $user, $logs ; 
		$Current_User = $_SESSION['user'] ;  
		$UnEncrypted_CV = $Card_Value ; 
		$UnEncrypted_CN = $Card_Number ; 
		$Card_Number = md5($Card_Number) ;
		$Card_Value = md5($Card_Value) ; 
		
		$CheckCardStatusQuery = "SELECT * FROM `cards` WHERE `card_number` = '$Card_Number' AND `card_value` = '$Card_Value' AND `used_by` IS NULL AND `date_used` IS NULL ;";
		$DoCheckCardStatusQuery = mysql_query($CheckCardStatusQuery) ; 
		$DoCheckCardStatusQuery_Result=mysql_num_rows($DoCheckCardStatusQuery);
		
		if($DoCheckCardStatusQuery_Result==1){
			Global $now ; 
			$SetCardAsUsedQuery = mysql_query("UPDATE `cards` SET `used_by` = '$Current_User', `date_used` = '$now' WHERE `card_number` = '$Card_Number';") ; 
		
			$New_Credits = $user->GetUserInfo("credits") + $UnEncrypted_CV ; 
			$user->UpdateUserInfo("credits",$New_Credits) ;
			$logs->Log("Added Funds : " . $UnEncrypted_CN . " - " . $UnEncrypted_CV);
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ;
		}else{
			return "<a style='color:red;'>" . $this->lang['Payments_WrongCard'] . "</a>" ;
		}
	
	}

	function EnoughCredits($Amount){
		Global $user;
		$Current_Credits = $user->GetUserInfo("credits") ; 
		return $Current_Credits >= $Amount ; 
	}
	
	
	function PayForOrder($Amount){
		Global $user; 
		$permission = $this->EnoughCredits($Amount) ; 
		if($permission==True){
		$new_credits = $user->GetUserInfo("credits") - $Amount ; 
		$user->UpdateUserInfo("credits",$new_credits) ; 
		return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
		}else{
		return "<a style='color:red;'>" . $this->lang['Payments_NoEnoughCredits'] . "</a>" ;
		}
	}
	
	
	function TransFunds($Amount,$Receiver,$Sender = NULL){
		Global $user, $logs;
		if($Sender==NULL){
		$Sender = $_SESSION['user'] ;  
		}
		
		$permission = $this->EnoughCredits($Amount) ; 
		if($permission==True and ($Sender<>$Receiver)){
			$Sender_New_Credits = $user->GetUserInfo("credits",$Sender) - $Amount ; 
			$Receiver_New_Credits = $user->GetUserInfo("credits",$Receiver) + $Amount ; 
			$user->UpdateUserInfo("credits",$Sender_New_Credits,$Sender) ; 
			$user->UpdateUserInfo("credits",$Receiver_New_Credits,$Receiver) ; 
			$logs->Log("Transfered Funds ($Amount) From : " . $Sender . " TO => " . $Receiver);
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
		}else{
			return "<a style='color:red;'>" . $this->lang['Payments_NoEnoughCredits'] . "</a>" ; 
		}
	}










}





?>
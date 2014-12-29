<?php


class user{
	 
	protected $lang;

    public function __construct() {
        global $lang;
        $this->lang = $lang;
    }

	
	
	function PwdReset($PRUsername,$PREmail){
		Global $functions ; 
		$PwdResetMsg = $this->lang['USER_PwdResetMsg'] ; 
		$PwdResetSuccess = "<center><a style='color:green;'>" . $this->lang['USER_PwdResetSuccess'] . "</a></center>" ; 
		$PwdResetError = "<center><a style='color:red;'>" . $this->lang['USER_PwdResetError'] . "</a></center>" ;
		
		$Stored_Email = $this->GetUserInfo("email",$PRUsername) ; 
		
		if($PREmail==$Stored_Email){
			$NewRandomPassword = $functions->RandomizeString() ; 
			$this->UpdateUserInfo("password",md5($NewRandomPassword),$PRUsername) ; 
			mail($Stored_Email,$this->lang['USER_PwdReset_Subject'],$PwdResetMsg . $NewRandomPassword) ; 
			return $PwdResetSuccess ; 
		} else { 
			return $this->PwdResetError ; 
		}
		
		
	}
	
	function Login($Username,$Password){
		Global $logs ; 
		$Password = md5($Password) ; 
		
		$sql="SELECT * FROM users WHERE username='$Username' and password='$Password'";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);

		if($count==1){
			session_start();
			$_SESSION["user"] = $Username ; 
			$logs->Log("Logged In");
			return True ; 
		} else { 
			return False ; 
		}
		
	}
	
	function Logout(){
		Global $logs;
		session_start();
		$logs->Log("Logged Out");
		$_SESSION["user"] = NULL ; 
		header('Location: ./index.php');
	}
	
	function CheckAuth($redirect = NULL){
		session_start();
		if (isset($_SESSION['user'])) { 
			$continue = "okay" ; 
		} else {
			if($redirect==True){
				exit ('<META HTTP-EQUIV="Refresh" CONTENT="0; url=./auth.php">') ; 
			}
		}
	}
	
	
	function CheckIfRegistered($Username,$Email,$Phone,$Password,$ConfirmPassword){
		
		
		$username_check_sql="SELECT * FROM users WHERE username='$Username' ;";
		$username_check_result=mysql_query($username_check_sql);
		
		$email_check_sql="SELECT * FROM users WHERE email='$Email' ;";
		$email_check_result=mysql_query($email_check_sql);
		
		$phone_check_sql="SELECT * FROM users WHERE phone='$Phone' ;";
		$phone_check_result=mysql_query($phone_check_sql);
		

		$username_check_result_count=mysql_num_rows($username_check_result);
		$email_check_result_count=mysql_num_rows($email_check_result);
		$phone_check_result_count=mysql_num_rows($phone_check_result);

		if($username_check_result_count==1){
			$Errors = $this->lang['USER_CheckIfRegisteredE1'] ; 
		}
		
		if($email_check_result_count==1){
			$Errors = $Errors . $this->lang['USER_CheckIfRegisteredE2'] ; 
		}
		
		if($phone_check_result_count==1){
			$Errors = $Errors . $this->lang['USER_CheckIfRegisteredE3'] ; 
		}
		
		if($Password<>$ConfirmPassword){
			$Errors = $Errors . $this->lang['USER_CheckIfRegisteredE4'] ; 
		}
		
		if($Errors<>Null){
			return $Errors ; 
		}
	
	}
	
	
	function Register($Username,$Email,$FirstName,$LastName,$Password,$ConfirmPassword,$Phone,$Address,$City){
		Global $logs; 
		$CheckBeforeRegister = $this->CheckIfRegistered($Username,$Email,$Phone,$Password,$ConfirmPassword) ; 
		
		if($CheckBeforeRegister==$this->CheckIfRegisteredSuccess){
			$UnEncryptedPassword = $Password ; 
			$Password = md5($Password) ; 
			$register_query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `city`, `credits`) VALUES (NULL, '$Username', '$Email', '$Password', '$FirstName $LastName', '$Phone', '$Address', '$City', '0');";
			$do_register_query = mysql_query($register_query) ; 
			$logs->Log($Username . " Registered.");
			$TestLogin = $this->Login($Username,$UnEncryptedPassword) ; 
			if($TestLogin==True){
			header('Location: ./index.php');
			} else {
			return "Internal_Error #1" ; 
			}
		} else {
			return $CheckBeforeRegister ;
		}
		
		 
		
	}

	function GetUserInfo($field,$user = NULL){
		if($user==NULL){
		$user = $_SESSION['user'] ;  
		}
		
		$user_info_query = "SELECT *  FROM `users` WHERE `username` = '$user' LIMIT 1 ;" ; 
		$do_user_info_query = mysql_query($user_info_query) ; 

		while ($fetch_user_info= mysql_fetch_array($do_user_info_query)) {
					$requested_info = $fetch_user_info[$field] ;
		}
		
		return $requested_info ; 
	}
	
	
	function UpdateUserInfo($field,$new_value,$user = NULL){
		if($user==NULL){
		$user = $_SESSION['user'] ;  
		}
		
		$update_query="UPDATE `users` SET `$field` = '$new_value' WHERE `users`.`username` = '$user' ;";
		$do_update_query=mysql_query($update_query);
		
	}
	
	
	function PrintUserPublicInfo($User = NULL){
		$return = $return . $this->lang['User_PrintUserPublicInfo_FullName'] . " : " . $this->GetUserInfo("full_name") . "<br/>" ; 
		$return = $return . $this->lang['AUTH_USERNAME'] . " : " . $this->GetUserInfo("username") . "<br/>" ; 
		$return = $return . $this->lang['AUTH_EMAIL'] . " : " . $this->GetUserInfo("email") . "<br/>" ; 
		$return = $return . $this->lang['AUTH_PHONE_NUMBER'] . " : " . $this->GetUserInfo("phone") . "<br/>" ; 
		$return = $return . $this->lang['AUTH_ADDRESS'] . " : " . $this->GetUserInfo("address") . "<br/>" ; 
		$return = $return . $this->lang['AUTH_CITY'] . " : " . $this->GetUserInfo("city") . "<br/>" ; 
		$return = $return . $this->lang['User_PrintUserPublicInfo_Credits'] . " : " . $this->GetUserInfo("credits") . "<br/>" ; 
		return $return ; 	
	}

	
	
	
	
	
	
	
}

?>
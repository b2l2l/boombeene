<?php


class Cards{
	
	function GenerateCards($value,$quantity){
		Global $functions,$d_now ; 
		
		for ($i = 1; $i <= $quantity;) {
			$RandomCard = $functions->RandomizeString(16);
			$RandomCard = strtoupper($RandomCard) ; 
			$CheckIfExist = $this->CheckForDuplicate($RandomCard) ; 
			if($CheckIfExist<>True){
				$CardNumber = md5($RandomCard) ;
				$CardValue = md5($value) ; 
				$register_query = mysql_query("INSERT INTO `cards` (`id`, `card_number`, `card_value`, `used_by`, `date_added`, `date_used`) VALUES (NULL, '$CardNumber', '$CardValue', NULL, '$d_now', NULL);");
				$return = $return . "\n" . $RandomCard ; 
				$i++ ; 
			}
		} 
		return $return ; 
	}

	
	function CheckForDuplicate($card_number){
		$card_number = md5($card_number);
		$CheckCardQuery=mysql_query("SELECT * FROM cards WHERE card_number='$card_number' ;");
		
		$CheckCardQueryCount=mysql_num_rows($CheckCardQuery);
			$return = False ;
		if($CheckCardQueryCount==1){
			$return = True ;  
		}
		
		return $return ; 
	}
	
	
	
	
	
}

?>
                                <?php

class functions {

	function SecureInput($input) {
		$input = stripslashes($input); 
		$input = mysql_real_escape_string($input); 
		return $input ; 	
	}
	
	
	function RandomizeString($length = 14) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	function Language($lang = "ku"){
		if($lang=="ku"){
			$_SESSION["lang"] = "ku" ;
		}else{
			$_SESSION["lang"] = "en" ;
                     
		}
	}
	
	function EnglishOnlyCheckAndReturn($text){
		$GetCurrentLanguage = $_SESSION["lang"] ; 
		if($GetCurrentLanguage=="ku"){
			$text = preg_replace("/[^a-zA-Z0-9 ]+/", "", $text);
			return $text ; 
		}else{
			$string = preg_replace ( "/[^\x{0600}-\x{06FF}0-9 -]/u", "", $text );
			// $text2 = preg_replace("/[^a-zA-Z0-9]+/", "", $text);
			//$text = explode($text2, $text);
			//return $text[0] ; 
			return $string ; 
		}
		
		
	}






}


?>
                            
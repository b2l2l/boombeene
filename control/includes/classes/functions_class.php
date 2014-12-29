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
	
	function Language($lang = "en"){
		if($lang=="ku"){
			$_SESSION["lang"] = "ku" ;
		}else{
			$_SESSION["lang"] = "en" ;
		}
	}
	
	function Upload($uploader_name,$ext_text = NULL){
			Global $files_path ; 
			if (!empty($_FILES[$uploader_name]["name"])) {

			$myFile = $_FILES[$uploader_name];
			if ($myFile["error"] !== UPLOAD_ERR_OK) {
				echo "<p>An error occurred.</p><a href='items.php'>Click here to go back to the main page.</a>";
				exit;
			}

			// ensure a safe filename
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

			// don't overwrite an existing file
			$i = rand();
			$parts = pathinfo($name);
			$name = "z-$i.jpg" ; 

			while (file_exists($files_path . $name)) {
				$i++;
				$name = "z-$i.jpg" ; 
			}
			
			// ---------------------------------------------------------------------------------
				
			
			// ---------------------------------------------------------------------------------

			// preserve file from temporary directory
			$success = copy($myFile["tmp_name"], $files_path . $name);
			if (!$success) {
				$name = "" ; 
				echo "<p>Unable to save file.</p><a href='items.php'>Click here to go back to the main page.</a>";
				exit;
			}

			// set proper permissions on the new file
			chmod($files_path . $name, 0777);

			return $name . $ext_text ; 
		} else {
			return NULL ; 
		}
		
	}






}


?>
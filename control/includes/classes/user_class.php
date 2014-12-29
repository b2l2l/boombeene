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
		$Password = md5($Password) ; 
		
		$sql="SELECT * FROM users WHERE username='$Username' and password='$Password'";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);

		if($count==1){
			session_start();
			$_SESSION["user"] = $Username ; 
			return True ; 
		} else { 
			return False ; 
		}
		
	}
	
	function Logout(){
		session_start();
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
		$CheckBeforeRegister = $this->CheckIfRegistered($Username,$Email,$Phone,$Password,$ConfirmPassword) ; 
		
		if($CheckBeforeRegister==$this->CheckIfRegisteredSuccess){
			$UnEncryptedPassword = $Password ; 
			$Password = md5($Password) ; 
			$register_query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `city`, `credits`) VALUES (NULL, '$Username', '$Email', '$Password', '$FirstName $LastName', '$Phone', '$Address', '$City', '0');";
			$do_register_query = mysql_query($register_query) ; 
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
	
	
	function UpdateUserInfo($field,$new_value,$user){
		
		$update_query="UPDATE `users` SET `$field` = '$new_value' WHERE `users`.`id` = '$user' ;";
		$do_update_query=mysql_query($update_query);
		
	}
	
	function RemoveUser($id){
		$remove_query = mysql_query("DELETE FROM `users` WHERE `users`.`id` = $id ;"); 
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

	
	function GetUsers($user = NULL,$email = NULL,$phone = NULL,$city = NULL){
		if($user<>""){
		$user = "AND `username` = '$user'" ; 
		}
		
		if($email<>""){
		$email = "AND `email` = '$email'" ; 
		}
		
		if($phone<>""){
		$phone = "AND `phone` = '$phone'" ; 
		}
		
		if($city<>""){
		$city = "AND `city` = '$city'" ; 
		}
		
		
		
		
		$GetOrdersQuery = "SELECT * FROM `users` WHERE (id <> '-7') $user $email $phone $city ORDER BY `id` DESC LIMIT 0,299 ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 
		
		
	
		$return = '<table class="table table-striped"><thead><tr><th>#ID</th><th>Username</th><th>E-Mail</th><th>Full Name</th><th>Phone</th><th>City</th><th>Credits</th></tr></thead><tbody>' ; 
		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$username = $fetch_info['username'] ; 
					$email =  $fetch_info['email'] ; 
					$full_name =  $fetch_info['full_name'] ; 
					$phone =  $fetch_info['phone'] ; 
					$address =  $fetch_info['address'] ;
					$city =  $fetch_info['city'] ;
					$credits =  $fetch_info['credits'] ;
					 
					$return = $return . '<tr><th>' . $id . '</th>' ; 
					$return = $return . '<th>' . $username . '</th>' ; 
					$return = $return . '<th>' . $email . '</th>' ; 
					$return = $return . '<th>' . $full_name . '</th>' ; 
					$return = $return . '<th>' . $phone . '</th>' ; 
					$return = $return . '<th>' . $city . '</th>' ; 
					$return = $return . '<th>' . $credits . '</th>' ; 
					$return = $return . '<th><a href="./users.php?cmd=edit_user&id=' . $id . '"> <button id="edituserbtn" name="edituserbtn" class="btn btn-primary">Edit</button></a></th></tr></form>' ; 
					
					
					
		}
		
		return $return . '</tbody></table>' ; 
	
	}
	
	
	function EditUserProfile($id){	
		
		
		$GetOrdersQuery = "SELECT * FROM `users` WHERE `id` = $id ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 
		
		
		
		
		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$username = $fetch_info['username'] ; 
					$email =  $fetch_info['email'] ; 
					$full_name =  $fetch_info['full_name'] ; 
					$phone =  $fetch_info['phone'] ; 
					$address =  $fetch_info['address'] ;
					$city =  $fetch_info['city'] ;
					$credits =  $fetch_info['credits'] ;
					
					
					$return = '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">#' . $id . ' - ' . $username . '</h3></div><div class="panel-body">' ; 
					$return = $return . '<form action="process.php" name="EditUser" id="EditUser" method="post"><input type="hidden" name="cmd" id="cmd" value="EditUser" /><input type="hidden" name="id" id="id" value="' . $id . '" />' ; 
					$return = $return . '<div class="col-md-3">' ; 
					$return = $return . 'Username : <input id="username" name="username" placeholder="Username" class="form-control input-md" type="text" value="' . $username . '"/>' ; 
					$return = $return . 'Email : <input id="email" name="email" placeholder="E-Mail" class="form-control input-md" type="text" value="' . $email . '"/>' ; 
					$return = $return . 'New Password (Only if you want to change it) : <input id="password" name="password" placeholder="New Password" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Full Name : <input id="full_name" name="full_name" placeholder="Full Name" class="form-control input-md" type="text" value="' . $full_name . '"/>' ; 
					$return = $return . 'Phone : <input id="phone" name="phone" placeholder="Phone" class="form-control input-md" type="text" value="' . $phone . '"/>' ; 
					$return = $return . 'Address : <input id="address" name="address" placeholder="Address" class="form-control input-md" type="text" value="' . $address . '"/>' ; 
					$return = $return . 'City : <input id="city" name="city" placeholder="City" class="form-control input-md" type="text" value="' . $city . '"/>' ; 
					$return = $return . 'Credits : <input id="credits" name="credits" placeholder="Credits" class="form-control input-md" type="text" value="' . $credits . '"/>' ; 
					$return = $return . '<button type="submit" id="edituserbtn" name="edituserbtn" class="btn btn-primary">Save</button></form></div><div id="EditUserResponse" class="col-md-12"></div><a href="./process.php?cmd=Remove&remove_type=user&id=' . $id . '"> <button id="remove" name="remove" class="btn btn-danger">Remove</button></a></div></div>' ; 
					return $return ; 
					
					
					
		}
		
		
	
	}
	
	
	
	
	
}

?>
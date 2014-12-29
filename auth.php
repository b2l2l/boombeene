<?php
include "./configs/config.php" ; 
?>
<style>
input::-webkit-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
input::-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}
input:-ms-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
input:-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}

textarea::-webkit-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
textarea::-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}
textarea:-ms-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
textarea:-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}

input.other::-webkit-input-placeholder { font-size: 12pt; color: red; }
input.other::-moz-placeholder { font-size: 12pt; color: red; }
input.other:-ms-input-placeholder { font-size: 12pt; color: red; }
input.other:-moz-placeholder { font-size: 12pt; color: red; }
</style>
<?php
include "./theme/header.php" ; 
?>

<?php
$cmd = $_POST['cmd'] . $_GET['cmd'] ; 

if($cmd=="" or $cmd=="Login" or $cmd=="DoLogin"){

if($cmd=="DoLogin"){

$LoginUsername = $functions->SecureInput($_POST['username']) ; 
$LoginPassword = $functions->SecureInput($_POST['password']) ; 

$login = $user->Login($LoginUsername,$LoginPassword) ; 

if($login==True){
 header('Location: ./index.php');
 exit() ; 
} else {
	echo "<center><a style='color:red;'>" . $lang['AUTH_WRONG_USERNAME_PASSWORD'] . "</a></center>" ; 
}
}

?>

<form class="form-horizontal" method="post" action="auth.php">
<input type="hidden" name="cmd" id="cmd" value="DoLogin" />
<fieldset>
<div class="form-group">
  <label class="col-md-4 control-label" for="user"></label>  
  <div class="col-md-5">
  <input id="username" name="username" placeholder="<?php echo $lang['AUTH_USERNAME'] ; ?>" class="form-control input-md" required="" type="text">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="pass"></label>
  <div class="col-md-5">
    <input id="password" name="password" placeholder="<?php echo $lang['AUTH_PASSWORD'] ; ?>" class="form-control input-md" required="" type="password">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <a href="./auth.php?cmd=PwdReset"><button id="forgot" name="forgot" class="btn btn-danger"><?php echo $lang['FORGET_PWD'] ; ?></button></a>

    <button id="login" name="login" type="submit" class="btn btn-success"><?php echo $lang['AUTH_LOGIN'] ; ?> </button>
  </div>
</div>
</fieldset>
</form>


<?php

}elseif($cmd=="Logout"){

$user->Logout() ; 

}elseif($cmd=="PwdReset" or $cmd=="DoPwdReset"){

if($cmd=="DoPwdReset"){
$PwdResetUsername = $functions->SecureInput($_POST['username']) ; 
$PwdResetEmail = $functions->SecureInput($_POST['email']) ; 

$PwdResetResult = $user->PwdReset($PwdResetUsername,$PwdResetEmail) ; 
echo $PwdResetResult ; 
}
?>
<br/>
<div class="form-group">
<br/>
<form method="post" action="auth.php">
<input type="hidden" name="cmd" id="cmd" value="DoPwdReset" />
  <label class="col-md-4 control-label" for="username"></label>  
  <div class="col-md-5">
  <input id="username" name="username" placeholder="<?php echo $lang['AUTH_USERNAME'] ; ?>" class="form-control input-md" required="" type="text">
  </div>
<br/>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-5">
  <input id="email" name="email" placeholder="<?php echo $lang['AUTH_EMAIL'] ; ?>" class="form-control input-md" required="" type="text">
   
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="send"></label>
  <div class="col-md-4">
    <button id="send" type="submit" name="send" class="btn btn-primary"><?php echo $lang['AUTH_SEND_NEW_PASSWORD'] ; ?></button>
  </div>
</form>
</div>

<?php 
}elseif($cmd=="Register" or $cmd=="DoRegister"){

if($cmd=="DoRegister"){
$RegUsername = $functions->SecureInput($_POST['username']) ; 
$RegEmail = $functions->SecureInput($_POST['email']) ; 
$RegFirstName = $functions->SecureInput($_POST['first_name']) ; 
$RegLastName = $functions->SecureInput($_POST['last_name']) ; 
$RegPassword = $functions->SecureInput($_POST['password']) ; 
$RegConfirmPassword = $functions->SecureInput($_POST['confirmpassword']) ; 
$RegPhone = $functions->SecureInput($_POST['phone']) ; 
$RegAddress = $functions->SecureInput($_POST['address']) ; 
$RegCity = $functions->SecureInput($_POST['city']) ; 

$register = $user->Register($RegUsername,$RegEmail,$RegFirstName,$RegLastName,$RegPassword,$RegConfirmPassword,$RegPhone,$RegAddress,$RegCity); 
echo $register ; 
}

?>

<form method="post" action="auth.php" class="form-horizontal">
<input type="hidden" name="cmd" id="cmd" value="DoRegister" />
<div class="form-group">
  <label class="col-md-4 control-label" for="username"></label>  
  <div class="col-md-5">
  <input id="username" name="username" placeholder="<?php echo $lang['AUTH_USERNAME'] ; ?>" class="form-control input-md" required="" type="text"> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-5">
  <input id="email" name="email" placeholder="<?php echo $lang['AUTH_EMAIL'] ; ?>" class="form-control input-md" required="" type="text">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>  
  <div class="col-md-5">
  <input id="password" name="password" placeholder="<?php echo $lang['AUTH_PASSWORD'] ; ?>" class="form-control input-md" required="" type="password">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-5">
  <input id="confirmpassword" name="confirmpassword" placeholder="<?php echo $lang['AUTH_CONFIRM_PASSWORD'] ; ?>" class="form-control input-md" required="" type="password">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fname"></label>  
  <div class="col-md-5">
  <input id="first_name" name="first_name" placeholder="<?php echo $lang['AUTH_FIRST_NAME'] ; ?>" class="form-control input-md" required="" type="text"> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="lname"></label>  
  <div class="col-md-5">
  <input id="last_name" name="last_name" placeholder="<?php echo $lang['AUTH_LAST_NAME'] ; ?>" class="form-control input-md" required="" type="text">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="phone"></label>  
  <div class="col-md-5">
  <input id="phone" name="phone" placeholder="<?php echo $lang['AUTH_PHONE_NUMBER'] ; ?>" class="form-control input-md" required="" type="text">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="address"></label>  
  <div class="col-md-5">
  <input id="address" name="address" placeholder="<?php echo $lang['AUTH_CITY_DES'] ; ?>" class="form-control input-md" required="" type="text">   
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="city"></label>
  <div class="col-md-5">
    <select id="city" name="city" class="form-control">
      <option value="Erbil"><?php echo $lang['AUTH_ERBIL'] ; ?></option>
      <option value="Sulaymaniyah"><?php echo $lang['AUTH_SULAYMANIYAH'] ; ?></option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="terms"></label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="terms-0">
      <input name="terms" id="terms-0" value="yes" type="checkbox" required="">
      <?php echo $lang['AUTH_TERMS'] ; ?>
    </label>
	</div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="signup"></label>
  <div class="col-md-4 text-center">
    <button type="sumbit" id="signup" name="signup" class="btn btn-primary"><?php echo $lang['AUTH_SIGNUP'] ; ?></button>
  </div>
</div>
</form>
<?php
}
?>









<?php
include "./theme/footer.php" ; 
?>
                            
                            
                            
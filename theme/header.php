                                <?php
	$user->CheckAuth(); 
	$current_user = $user->GetUserInfo("full_name") ; 
?>
  <!DOCTYPE html>
<html lang=en dir=ltr>
<html lang=ku dir=ltr>
   <head> 

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $lang['PAGE_TITLE'] ; ?></title> 
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/kreeen.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<script src="./includes/z_scripts/jquery-1.11.1.js"></script>
		<link rel="stylesheet" href="./css/lightbox.css" media="screen"/>
		<script src="./js/modernizr.custom.js"></script>
		<script src="./js/lightbox-2.6.min.js"></script>
		
	   </head> 
	   
		
	   <body>
<!-- navbar starts here           **********************************************************//  -->


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"> Home</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://zz7.co/jvUc1"> <img src="./imges/kreeen.png" width="140" style="margin-bottom:50px;">  </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://zz7.co/jvUc1"><i class="fa fa-home fa-3x"></i></br><font size="4"><?php echo $lang['MENU_HOME'] ; ?> </font> </a>
                    </li>

                    <li><a href="http://zz7.co/pWJzX"> <i class="fa fa-shopping-cart fa-3x"></i> </br><font size="4"><?php echo $lang['MENU_SHOP_CENTRE'] ; ?></font></a>
                    </li>
					 <li><a href="http://zz7.co/NsqmF"><i class="fa fa-envelope-o fa-3x"></i></br> <font size="4"><?php echo $lang['MENU_CONTACT_US'] ; ?></font></a>
                    </li>
 <li><a href="http://zz7.co/rP5Vm"><i class="fa fa-slack fa-3x"></i> </br><font size="4"><?php echo $lang['MENU_TERMS'] ; ?></font></a>
                    </li>

                </ul>
<!-- login and logout buttons ********************************** -->

                <ul class="nav navbar-nav navbar-right">
<?php 
if($current_user<>""){
echo "<li><a href='http://zz7.co/jDf9q'>" . $lang['MENU_WELCOME_MESSAGE'] . $current_user . "</a></li> <li><a href='auth.php?cmd=Logout'>(Logout)</a></li>" ; 
} else {
?>
<li style="margin-top:22px;"><a href="http://zz7.co/AUaKz"><i class="fa fa-user fa-2x"></i> <font size="4"><?php echo $lang['MENU_LOGIN'] ; ?></font></a></li>
<li style="margin-top:22px;"><a href="http://zz7.co/VAP1p"><i class="fa fa-users fa-2x"></i> <font size="4"><?php echo $lang['MENU_REGISTER'] ; ?></font></a></li>
<?php
}
?>
            </ul>
            </div>
            
        </div>
        
    </nav>
<div class="container">
                            
                            
                            </br> </br> 
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
<?php
include "./configs/config.php" ;  
include "./theme/header.php";
?>

 
<div class="container">

        <div class="row">

         
   <form class="form-horizontal" action="process.php" method="post">
   <input type="hidden" name="cmd" id="cmd" value="armin" />
   
<fieldset>

<legend><center><?php echo $lang['Contact_Title'] ?></center></legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="name"></label>  
  <div class="col-md-5">
  <input id="name" name="name" placeholder="<?php echo $lang['Contact_Name'] ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<!--    هذا راح انسى اكيد ف خلي اكتب . هذا كود البليس هولدر مالت الكونتاك فورم --> 
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
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-5">
  <input id="email" name="email" placeholder="<?php echo $lang['Contact_Email'] ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="num"></label>  
  <div class="col-md-5">
  <input id="num" name="num" placeholder="<?php echo $lang['Contact_Num'] ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="msg"></label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="msg" name="msg" placeholder="<?php echo $lang['Contact_Msg'] ?>"></textarea>
  </div>
</div>

<div class="form-group text-center">
  <label class="col-md-4 control-label" for="send"></label>
  <div class="col-md-4">
    <button id="send" type="submit" name="Send" class="btn btn-primary"><?php echo $lang['Contact_Send'] ?></button>
  </div>
</div>

</fieldset>
</form>
<hr/><center/>
<img src="./imges/location.jpg" width="600" height="250" />
<legend>
<br/>

 
<br/><?php echo $lang['Contact_Mobile'] ; ?> : 07503653839 
<br/> info@kreeen.com 
<br/><?php echo $lang['AUTH_ADDRESS'] ; ?> <?php echo $lang['Contact_ad'] ;?></legend>
</center>

        <hr>



        </div>

     

        <hr>






<?php 
include "./theme/footer.php";
?>
                            
                            
                            
                            
                            
                            
                            
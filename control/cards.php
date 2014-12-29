<?php
include "./configs/config.php" ;
$admin->CheckAuth(True) ; 
?>
<?php 
include "./theme/header.php";
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <form class="form-horizontal" action="./process.php" name="GenerateCards" id="GenerateCards" method="post">
			  <input type="hidden" name="cmd" id="cmd" value="GenerateCards" />
<fieldset>

<legend>Add Cards </legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="card_type">Cards Type</label>
  <div class="col-md-5">
    <select id="card_type" name="card_type" class="form-control">
      <option value="25">25$ Cards</option>
      <option value="50">50$ Cards</option>
      <option value="100">100$ Cards</option>
      <option value="200">200$ Cards</option>
      <option value="300">300$ Cards</option>
      <option value="500">500$ Cards</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="quantity">Quantity</label>  
  <div class="col-md-5">
  <input id="quantity" name="quantity" placeholder="Quantity" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="add">Add To database</label>
  <div class="col-md-4">
    <button type="submit" id="addbtn" name="addbtn" class="btn btn-success">Add </button>
  </div>
</div>

</fieldset>
</form>
				<center><div class="col-md-12"><textarea id="GenerateCardsResponse" name="GenerateCardsResponse" rows="10" cols="70"></textarea></div></center>

            </div>
           <?php include "./includes/z_scripts/admin_panel.js" ; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>

                            
                            
                            
                            
                            
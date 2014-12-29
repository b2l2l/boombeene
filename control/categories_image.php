<?php 
include "./configs/config.php" ; 
$admin->CheckAuth(True) ; 
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
			<?php
			$cmd = $_GET['cmd'] . $_POST['cmd'] ; 
			
			if($cmd==""){
			?>
			<div class="col-sm-12" name="OrdersPanel" id="OrdersPanel">
			<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Categories Images Control</h3>
            </div>
            <div class="panel-body">
				<br/>
				
				<form class="form-group" method="post" action="./process.php" id="SetCategoryImage" enctype="multipart/form-data">
					<input type="hidden" name="cmd" id="cmd" value="SetCategoryImage" />
					<div class="col-md-12"> 							
							<h3>Image <a style="color:red;">(Leave empty to remove & unlink)</a> : </h3><input type="file" name="CategoryImage" id="CategoryImage" />  
							<select id="cat_id" name="cat_id" class="form-control" required="">
								<option value="">Category</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
					<button type="submit" id="savebtn" name="savebtn" class="btn btn-success">Save</button>
					<br/>
					<hr/>
					</div>
				</form>
				
				
				
			</div>
			</div>
			</div>
			<?php
			}
			?>
			
			<?php include "./includes/z_scripts/admin_panel.js" ; ?>
			
			
			
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
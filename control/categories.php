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
            <h3 class="panel-title">Categories Control</h3>
            </div>
            <div class="panel-body">
				<br/>

				<form class="form-group" method="post" action="./process.php" id="" >
						
						<div class="col-md-8">
							<select id="cmd" name="cmd" class="form-control">
								<option selected="" value="AddNewCategory" onclick="document.getElementById('old_cat_id').disabled=true; document.getElementById('title').disabled=false;	document.getElementById('new_cat_id').disabled=false;">Add New Category</option>
								<option value="ChangeParentNameCategory" onclick="document.getElementById('old_cat_id').disabled=false; document.getElementById('title').disabled=false;	document.getElementById('new_cat_id').disabled=false;">Change Parent/Name of Category</option>
								<option value="RemoveCategory" onclick="document.getElementById('old_cat_id').disabled=false; document.getElementById('title').disabled=true;	document.getElementById('new_cat_id').disabled=true;">Remove Category</option>
							</select>
							<br/>
							<select id="old_cat_id" name="old_cat_id" class="form-control" disabled="disabled">
								<option selected="" value="">Old Category (Only for Edit/Remove)</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
							<br/>
							<input id="title" name="title" placeholder="New Title" class="form-control input-md" type="text">  
							<br/>
							<select id="new_cat_id" name="new_cat_id" class="form-control">
								<option selected="" value="">New Parent Category</option>
								<option value="Main">MAIN (NOT Child)</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
						</div>

						<div class="col-md-10">
							<br/>
							<button type="submit" id="categoriesgobtn" name="categoriesgobtn" class="btn btn-success">Go</button>
							<br/>
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
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
            <h3 class="panel-title">Last 300 Added Items</h3>
            </div>
            <div class="panel-body">
				<br/>

				<div class="col-md-10">
					<br/>
					<a href="./items.php?cmd=new_item"><button id="newitembtn" name="newitembtn" class="btn btn-success">New Item</button></a>
					<br/>
					<br/>
				</div>

				<form class="form-group" method="post" action="./process.php" id="SearchItems" >
					<input type="hidden" name="cmd" id="cmd" value="SearchItems" />
					
						<div class="col-md-6"> 
							<input id="title" name="title" placeholder="Search By Title" class="form-control input-md" type="text">  
						</div>

						<div class="col-md-6">
							<select id="cat_id" name="cat_id" class="form-control">
								<option selected="" value="">Category</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
						</div>

						<div class="col-md-6">
							<select id="status" name="status" class="form-control">
								<option selected="" value="">Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>

						<div class="col-md-10">
							
							<br/>
							<button type="submit" id="searchitemsbtn" name="searchitemsbtn" class="btn btn-primary">Search</button>
							<br/>
						</div>
				</form>
				<div id="SearchItemsResponse" class="col-md-12"><?php echo $shopcenter->GetItems() ; ?></div>
				
				
			</div>
			</div>
			</div>
			<?php
			}elseif($cmd=="edit_item"){
				$item_id = $functions->SecureInput($_GET['id']) ; 
				echo $shopcenter->EditItem($item_id);
			}elseif($cmd=="new_item"){
				echo $shopcenter->NewItem() ; 			
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
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
            <h3 class="panel-title">Categories Sliders Control</h3>
            </div>
            <div class="panel-body">
				<br/>
				
				<form class="form-group" method="post" action="./process.php" id="NewCatSliderImage" enctype="multipart/form-data">
					<input type="hidden" name="cmd" id="cmd" value="NewCatSliderImage" />
					<div class="col-md-12"> 
							<input type="file" required="" name="ImageFile" id="ImageFile" required="" />  
							<select id="cat_id" name="cat_id" class="form-control" required="">
								<option value="">Category</option>
								<option value="index">Home Page (Index)</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
							<input class="col-md-0" type="text" name="hyperlink" id="hyperlink" placeholder="(OPTIONAL) http://google.com" />
							<br/>
					<button type="submit" id="savenewimagebtn" name="savenewimagebtn" class="btn btn-success">Save New Image</button>
					<br/>
					<hr/>
					</div>
				</form>
				
				<form class="form-group" method="post" action="./categories_slider.php" id="SearchCatSlider" >
					
						<div class="col-md-6"> 
							<input id="id" name="id" placeholder="Search By Image ID" class="form-control input-md" type="text">  
						</div>

						<div class="col-md-6">
							<select id="cat_id" name="cat_id" class="form-control">
								<option selected="" value="">Search By Category</option>
								<?php
									echo $shopcenter->GetCategories() ; 
								?>
							</select>
						</div>

						<div class="col-md-10">
							
							<br/>
							<button type="submit" id="searchimagesbtn" name="searchimagesbtn" class="btn btn-primary">Search</button>
							<br/>
						</div>
				</form>
				<div id="SearchIImagesResponse" class="col-md-12">
				<?php 
				$c_id = $functions->SecureInput($_POST['c_id']) ; 
				$id = $functions->SecureInput($_POST['id']) ;
				echo $shopcenter->GetSliderImages($c_id,$id) ; 
				?>
				</div>
				
				
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
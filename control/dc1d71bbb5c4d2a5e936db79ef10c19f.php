<?php 
include "./configs/config.php" ; 
// include "./includes/extra_auth.php" ; 
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
			
			if($cmd=="" or $cmd=="SearchLogs"){
			?>
			<div class="col-sm-12" name="OrdersPanel" id="OrdersPanel">
			<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Last Logs</h3>
            </div>
            <div class="panel-body">
				<br/>
				
				<form class="form-group" method="post" action="../process.php" id="RequestExcelFile" enctype="multipart/form-data">
					<input type="hidden" name="cmd" id="cmd" value="RequestExcelFile" />
					<div class="col-md-12"> 							
							<input id="date" name="date" placeholder="Date , Example : 2014-07" class="form-control input-md" type="text">
					<button type="submit" id="requestfilebtn" name="requestfilebtn" class="btn btn-success">Request File</button>
					<br/>
					<hr/>
					</div>
				</form>
				
				<form class="form-group" method="post" action="./dc1d71bbb5c4d2a5e936db79ef10c19f.php" id="SearchLogs" >
					<input type="hidden" name="cmd" id="cmd" value="SearchLogs" />
					
						<div class="col-md-6"> 
							<input id="GL_text" name="GL_text" placeholder="Search By Text" class="form-control input-md" type="text">  
						</div>
					  
						<div class="col-md-6"><input id="GL_user" name="GL_user" placeholder="Search By User / Ip" class="form-control input-md" type="text"></div>

						<div class="col-md-6"><input id="GL_date" name="GL_date" placeholder="Search By Date example : 2014-07-26 or 2014-07-26 06:28" class="form-control input-md" type="text"></div>

						<div class="col-md-6"><input id="GL_limit" name="GL_limit" placeholder="Results limit example : 299" class="form-control input-md" type="text"></div>


						<div class="col-md-10">
							<br/>
							<button type="submit" id="searchlogsbtn" name="searchlogsbtn" class="btn btn-primary">Search</button>
							<br/>
						</div>
				</form>
				<div id="SearchOrdersResponse" class="col-md-12">
				<?php 
				$GL_text = $functions->SecureInput($_POST['GL_text']);
				$GL_user = $functions->SecureInput($_POST['GL_user']);
				$GL_date = $functions->SecureInput($_POST['GL_date']);
				$GL_limit = $functions->SecureInput($_POST['GL_limit']);
				if($GL_limit==""){
					$GL_limit = 299 ; 
				}
				
				echo $logs->GetLogs($GL_text,$GL_user,$GL_date,$GL_limit) ; 
				?></div>
				
				
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
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
            <h3 class="panel-title">Last 300 Orders</h3>
            </div>
            <div class="panel-body">
				<br/>
				<form class="form-group" method="post" action="./process.php" id="SearchOrders" >
					<input type="hidden" name="cmd" id="cmd" value="SearchOrders" />
					
						<div class="col-md-6"> 
							<input id="username" name="username" placeholder="Search By Username" class="form-control input-md" type="text">  
						</div>
					  
						<div class="col-md-6"><input id="id" name="id" placeholder="Search By ID" class="form-control input-md" type="text"></div>

						<div class="col-md-6">
							<select id="status" name="status" class="form-control">
								<option value="">Status</option>
								<option value="Delivered.">Delivered.</option>
								<option value="Confirmed - Waiting For Delivery ...">Confirmed - Waiting For Delivery ...</option>
								<option value="Price Posted - Waiting For User Confirmation ...">Price Posted - Waiting For User Confirmation ...</option>
								<option value="Waiting For Price Offer ...">Waiting For Price Offer ...</option>
								<option value="Price Rejected - Order Canceled.">Price Rejected - Order Canceled.</option>
							</select>
						</div>

						<div class="col-md-6">
							<select id="type" name="type" class="form-control">
								<option value="">Dashboard/Shopcenter</option>
								<option value="Dashboard">Dashboard</option>
								<option value="ShopCenter">ShopCenter</option>
							</select>
						</div>

						<div class="col-md-10">
							<div id="CalculatorResponse" class="col-md-12"></div>
							<br/>
							<button type="submit" id="searchordersbtn" name="searchordersbtn" class="btn btn-primary">Search</button>
							<br/>
						</div>
				</form>
				<div id="SearchOrdersResponse" class="col-md-12"><?php echo $orders->GetOrders() ; ?></div>
				
				
			</div>
			</div>
			</div>
			<?php
			}elseif($cmd=="view_order"){
				$order_id = $functions->SecureInput($_GET['id']) ; 
				echo $orders->GetOrderInfo($order_id);
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
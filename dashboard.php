<?php
include "./configs/config.php" ; 
$user->CheckAuth(True) ; 
?>


<?php 
  include "./theme/header.php";
?>

<?php
$cmd = $_GET['cmd'] ;
if($cmd==""){
?>
<div class="col-sm-4" name="UserInfo_AddFunds" id="UserInfo_AddFunds">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Dashboard_AccountInfo'] ; ?></h3>
            </div>
            <div class="panel-body">
              <p> 
			  <?php 
			  echo $user->PrintUserPublicInfo() ; 
			  ?>
			  </p>
            </div>
          </div>
		  <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Dashboard_AddFunds'] ; ?></h3>
            </div>
            <div class="panel-body">
				<br/>
				<form action="./process.php" id="AddFundsForm" class="form-group" method="post">
				<input type="hidden" name="cmd" id="cmd" value="addfunds" />
				<div class="col-md-12"> 
				<input  id="card_number" name="card_number" placeholder="<?php echo $lang['Dashboard_CardNumber'] ; ?>" class="form-control input-md" required="" type="text" />  
				<br/>
				<input  id="card_value" name="card_value" placeholder="<?php echo $lang['Dashboard_CardValue'] ; ?>" class="form-control input-md" required="" type="text" />  
				<br/>
				<button type="submit" id="addfundsbtn" name="addfundsbtn" class="btn btn-sm btn-primary"><?php echo $lang['Dashboard_AddFunds'] ; ?> </button>
				</div>
				</form>
				<!-- the result will be rendered inside this div -->
				<div id="AddFundsResponse" class="col-md-12"></div>
				</div>
          </div>
</div>


<div class="col-sm-4" name="TransFunds" id="TransFunds">
		  <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Dashboard_TransFunds'] ; ?></h3>
            </div>
            <div class="panel-body">
				<br/>
				<form action="./process.php" id="TransFundsForm" class="form-group" method="post">
				<input type="hidden" name="cmd" id="cmd" value="transfunds" />
				<div class="col-md-8"> 
				<input  id="receiver" name="receiver" placeholder="<?php echo $lang['Dashboard_Receiver'] ; ?>" class="form-control input-md" required="" type="text" />  
				<input  id="transfer_amount" name="transfer_amount" placeholder="<?php echo $lang['Dashboard_TransAmount'] ; ?>" class="form-control input-md" required="" type="text" />  
				<br/>
				<button type="submit" id="transfundsbtn" name="transfundsbtn" class="btn btn-sm btn-primary"><?php echo $lang['Dashboard_TransFunds'] ; ?> </button>				
				</div>
				</form>
				<!-- the result will be rendered inside this div -->
				<div id="TransFundsResponse" class="col-md-12"></div>
				</div>
          </div>
</div>
	
	
<div class="col-sm-4" name="CalculatorPanel" id="CalculatorPanel">
		  <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Calculator'] ; ?></h3>
            </div>
            <div class="panel-body">
<form class="form-group" method="post" action="./process.php" id="Calculator" >
<input type="hidden" name="cmd" id="cmd" value="calculate" />
	<div class="col-md-6"> 
		<input id="item_price" name="item_price" placeholder="<?php echo $lang['CALCULATOR_ITEM_PRICE'] ; ?>" class="form-control input-md" required="" type="text">  
	</div>
  
	<div class="col-md-6">
		<input id="quantity" name="quantity" placeholder="<?php echo $lang['CALCULATOR_ITEM_QUANTITY'] ; ?>" class="form-control input-md" required="" type="text">
	</div>

	<div class="col-md-6">
		<input id="item_weight" name="item_weight" placeholder="<?php echo $lang['CALCULATOR_Item_Weight'] ; ?>" class="form-control input-md" required="" type="text">  
	</div>

	<div class="col-md-6">
		<select id="delivery" name="delivery" class="form-control">
			<option value="erbil_branch"><?php echo $lang['CALCULATOR_Branch_delivery_e'] ; ?></option>
			<option value="erbil_home"><?php echo $lang['CALCULATOR_Home_delivery_e'] ; ?></option>

			<option value="suly_branch"><?php echo $lang['CALCULATOR_Branch_delivery_s'] ; ?></option>
			<option value="suly_home"><?php echo $lang['CALCULATOR_Home_delivery_s'] ; ?></option>
		</select>
	</div>

	<div class="col-md-10">
		<div id="CalculatorResponse" class="col-md-12"></div>
		<br/>
		<button type="submit" id="calculatebtn" name="calculatebtn" class="btn btn-primary"><?php echo $lang['CALCULATE'] ; ?> </button>
		<br/>
	</div>
</form>

			</div>
          </div>
</div>

<div class="col-sm-8" name="NewOrderPanel" id="NewOrderPanel">
		  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Dashboard_NewOrder'] ; ?></h3>
            </div>
            <div class="panel-body">
				<form action="./process.php" id="NewOrderForm" class="form-group" method="post">
				<input type="hidden" name="cmd" id="cmd" value="NewOrder" />
				<div class="col-md-3"> 
				<input  id="original_link" name="original_link" placeholder="<?php echo $lang['Dashboard_OriginalLink'] ; ?>" class="form-control input-md" required="" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="item_name" name="item_name" placeholder="<?php echo $lang['Dashboard_ItemName'] ; ?>" class="form-control input-md" required="" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="item_color" name="item_color" placeholder="<?php echo $lang['Dashboard_ItemColor'] ; ?>" class="form-control input-md" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="item_size" name="item_size" placeholder="<?php echo $lang['Dashboard_ItemSize'] ; ?>" class="form-control input-md" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="item_model" name="item_model" placeholder="<?php echo $lang['Dashboard_ItemModelType'] ; ?>" class="form-control input-md" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="item_specs" name="item_specs" placeholder="<?php echo $lang['Dashboard_ItemSpecs'] ; ?>" class="form-control input-md" type="text" />  
				</div>
				<div class="col-md-3"> 
				<input  id="quantity" name="quantity" placeholder="<?php echo $lang['Dashboard_Quantity'] ; ?>" class="form-control input-md" required="" type="text" />  
				</div>
				<div class="col-md-3">
					<select id="delivery" name="delivery" class="form-control">
					<option value="home_erbil" selected=""><?php echo $lang['Dashboard_HomeDelivery_e'] ; ?></option>
						<option value="branch_erbil"><?php echo $lang['Dashboard_BranchDelivery_e'] ; ?></option>

					<option value="home_suly" selected=""><?php echo $lang['Dashboard_HomeDelivery_s'] ; ?></option>
						<option value="branch_suly"><?php echo $lang['Dashboard_BranchDelivery_s'] ; ?></option>
					</select>
				</div>
				<div class="col-md-12"> 
				<br/>
				<input  id="notes" name="notes" placeholder="<?php echo $lang['Dashboard_Notes'] ; ?>" class="form-control input-md" type="text" />  
				<br/>
				<button type="submit" id="neworderbtn" name="neworderbtn" class="btn btn-sm btn-primary"><?php echo $lang['Dashboard_PlaceOrder'] ; ?> </button>
				</div>
				<br/>
				
				
				</form>
				<!-- the result will be rendered inside this div -->
				<div id="NewOrderResponse" class="col-md-12"></div>
			</div>
          </div>
</div>

<div class="col-sm-12" name="OrdersPanel" id="OrdersPanel">
		  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lang['Dashboard_Orders'] ; ?></h3>
            </div>
            <div class="panel-body">
				<br/>
				<?php
					echo $orders->GetOrders() ; 
				?>
			</div>
          </div>
</div>

<?php
}elseif($cmd=="view_order"){
	$order_id = $functions->SecureInput($_GET['id']) ;  
	echo $orders->GetOrderInfo($order_id) ; 


}elseif($cmd=="order_action"){
	$action = $functions->SecureInput($_GET['action']) ; 
	$order_id = $functions->SecureInput($_GET['id']) ; 
	if($orders->OrderAction($action,$order_id)==True){
		header('Location: ./dashboard.php') ; 
	}else{
		echo $lang['Payments_NoEnoughCredits'] ; 
	}

}
?>  

  
<?php 
include "./includes/z_scripts/dashboard.js" ; 
include "./includes/z_scripts/common.js" ;
include "./theme/footer.php";
?>
                            
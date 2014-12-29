<?php

class Orders{
	
	protected $lang;

    public function __construct() {
        global $lang;
        $this->lang = $lang;
    }
	
	function RequestExcelFile($date = NULL){
		Global $admin_files_path ; 	
		

		/** PHPExcel */
		include './includes/excel_classes/PHPExcel.php';

		/** PHPExcel_Writer_Excel2007 */
		include './includes/excel_classes/PHPExcel/Writer/Excel2007.php';

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("Kreeen");
		$objPHPExcel->getProperties()->setLastModifiedBy("Kreeen");
		$objPHPExcel->getProperties()->setTitle("Kreeen Orders");
		$objPHPExcel->getProperties()->setSubject("Kreeen Orders");
		$objPHPExcel->getProperties()->setDescription("Kreeen Orders.");


		// Add some data
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Orders History - ' . $date);
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Auto-Generated File Using Kreeen.com Control Panel');
		
		
				$GetOrdersQuery = "SELECT * FROM `orders` WHERE (`date_placed` LIKE '%$date%') ORDER BY `id` DESC ;" ; 
				
				
				$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 
				$az = 5 ;
				$objPHPExcel->getActiveSheet()->SetCellValue('A' . $az, '#ID');
				$objPHPExcel->getActiveSheet()->SetCellValue('B' . $az, 'Buyer');
				$objPHPExcel->getActiveSheet()->SetCellValue('C' . $az, 'Original Link');
				$objPHPExcel->getActiveSheet()->SetCellValue('D' . $az, 'Name');
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $az, 'Color');
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $az, 'Size');
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $az, 'Model');
				$objPHPExcel->getActiveSheet()->SetCellValue('H' . $az, 'Specefications');
				$objPHPExcel->getActiveSheet()->SetCellValue('I' . $az, 'Quantity');
				$objPHPExcel->getActiveSheet()->SetCellValue('J' . $az, 'Delivery Type');
				$objPHPExcel->getActiveSheet()->SetCellValue('K' . $az, 'Original Price');
				$objPHPExcel->getActiveSheet()->SetCellValue('L' . $az, 'Total Price');
				$objPHPExcel->getActiveSheet()->SetCellValue('M' . $az, 'Notes');
				$objPHPExcel->getActiveSheet()->SetCellValue('N' . $az, 'Date Placed');
				$objPHPExcel->getActiveSheet()->SetCellValue('O' . $az, 'Status');
				$objPHPExcel->getActiveSheet()->SetCellValue('P' . $az, 'Type');
				$az++ ; 
				while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$buyer = $fetch_info['user'] ; 
					$original_link = $fetch_info['original_link'] ; 
					$item_name = $fetch_info['item_name'] ; 
					$item_color = $fetch_info['item_color'] ; 
					$item_size = $fetch_info['item_size'] ; 
					$item_model = $fetch_info['item_model'] ; 
					$item_specs = $fetch_info['item_specs'] ; 
					$quantity = $fetch_info['quantity'] ; 
					$delivery_type = $fetch_info['delivery_type'] ; 
					$original_price =  $fetch_info['original_price'] ; 
					$total_price =  $fetch_info['total_price'] ; 
					$notes =  $fetch_info['notes'] ; 
					$date_placed =  $fetch_info['date_placed'] ; 
					$status =  $fetch_info['status'] ; 
					$type =  $fetch_info['type'] ; 
					
					$objPHPExcel->getActiveSheet()->SetCellValue('A' . $az, $id);
					$objPHPExcel->getActiveSheet()->SetCellValue('B' . $az, $buyer);
					$objPHPExcel->getActiveSheet()->SetCellValue('C' . $az, $original_link);
					$objPHPExcel->getActiveSheet()->SetCellValue('D' . $az, $item_name);
					$objPHPExcel->getActiveSheet()->SetCellValue('E' . $az, $item_color);
					$objPHPExcel->getActiveSheet()->SetCellValue('F' . $az, $item_size);
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $az, $item_model);
					$objPHPExcel->getActiveSheet()->SetCellValue('H' . $az, $item_specs);
					$objPHPExcel->getActiveSheet()->SetCellValue('I' . $az, $quantity);
					$objPHPExcel->getActiveSheet()->SetCellValue('J' . $az, $delivery_type);
					$objPHPExcel->getActiveSheet()->SetCellValue('K' . $az, $original_price);
					$objPHPExcel->getActiveSheet()->SetCellValue('L' . $az, $total_price);
					$objPHPExcel->getActiveSheet()->SetCellValue('M' . $az, $notes);
					$objPHPExcel->getActiveSheet()->SetCellValue('N' . $az, $date_placed);
					$objPHPExcel->getActiveSheet()->SetCellValue('O' . $az, $status);
					$objPHPExcel->getActiveSheet()->SetCellValue('P' . $az, $type);
					$az++ ; 
				}
					
					


		
		
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', '');
		$objPHPExcel->getActiveSheet()->SetCellValue('D2', '');

		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');

				
		// Save Excel 2007 file
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($admin_files_path . "orders-" . $date . ".xlsx");

		header( "refresh:0;url=" . $admin_files_path . "orders-" . $date . ".xlsx");
	}
	
	function PlaceNewOrder($type,$original,$item_name = NULL,$item_color = NULL,$item_size = NULL,$item_model = NULL,$item_specs = NULL,$quantity = NULL,$delivery_type = NULL,$notes = NULL){
		Global $now, $payments, $shopcenter ; 
		
		$buyer = $_SESSION['user'] ;  		
		$date_placed = $now ; 
		
		if($type=="ShopCenter"){
		
			$original_link = $original ; 
			$price = $shopcenter->GetSpecificItemInfo("price",$original) ; 
			$title = $shopcenter->GetSpecificItemInfo("title",$original) ; 
			$delivery_time = $shopcenter->GetSpecificItemInfo("delivery_time",$original) ;  
			$model = $shopcenter->GetSpecificItemInfo("model",$original) ; 
			$color = $shopcenter->GetSpecificItemInfo("color",$original) ; 
			$size = $shopcenter->GetSpecificItemInfo("size",$original) ; 

			$notes = $delivery_time . " - Auto Generated By ZShopCenter." ; 
			$status = $this->lang['Orders_WaitingForDelivery'] ;  
			$type = "ShopCenter" ; 
			$check_credits = $payments->EnoughCredits($price) ; 
			if($check_credits==True){
			$DoPlaceNewOrder = mysql_query("INSERT INTO `orders` (`id`, `user`, `original_link`, `item_name`, `item_color`, `item_size`, `item_model`, `item_specs`, `quantity`, `delivery_type`, `original_price`, `total_price`, `notes`, `date_placed`, `status`, `type`) VALUES (NULL, '$buyer', '$original_link', '$title', '$color', '$size', '$model', '-', '1', '-', '$price', '$price', '$notes', '$date_placed', '$status', '$type');");

			$payments->PayForOrder($price) ; 
			
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
			}else{
			return "<a style='color:red;'>" . $this->lang['Payments_NoEnoughCredits'] . "</a>" ;
			}
			
		}else{
			$original_link = $original ; 
			$status = $this->lang['Orders_WaitingForPrice'] ;  
			$DoPlaceNewOrder = mysql_query("INSERT INTO `orders` (`id`, `user`, `original_link`, `item_name`, `item_color`, `item_size`, `item_model`, `item_specs`, `quantity`, `delivery_type`, `original_price`, `total_price`, `notes`, `date_placed`, `status`, `type`) VALUES (NULL, '$buyer', '$original_link', '$item_name', '$item_color', '$item_size', '$item_model', '$item_specs', '$quantity', '$delivery_type', '', '', '$notes', '$date_placed', '$status', '$type');");
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
		}
	}
	
	
	function GetOrders($user = NULL,$id = NULL,$status = NULL,$type = NULL){
		if($user<>""){
		$buyer = "AND `user` = '$user'" ; 
		}
		
		if($id<>""){
		$id = "AND `id` = '$id'" ; 
		}
		
		if($status<>""){
		$status = "AND `status` = '$status'" ; 
		}
		
		if($type<>""){
		$type = "AND `type` = '$type'" ; 
		}
		
		
		
		
		$GetOrdersQuery = "SELECT * FROM `orders` WHERE (type = 'Dashboard' OR type = 'ShopCenter') $buyer $id $status $type ORDER BY `id` DESC LIMIT 0,299 ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 

		$return = '<table class="table table-striped"><thead><tr><th>#</th><th>Item Name</th><th>Date Placed</th><th>Status</th><th>Type</th><th>-</th></tr></thead><tbody>' ; 
		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$item_name = $fetch_info['item_name'] ; 
					$date_placed =  $fetch_info['date_placed'] ; 
					$status =  $fetch_info['status'] ; 
					$type =  $fetch_info['type'] ; 
					$return = $return . '<tr><th>' . $id . '</th><th>' . $item_name . '</th><th>' . $date_placed . '</th><th>' . $status . '</th><th>' . $type . '</th><th><a href="./orders.php?cmd=view_order&id=' . $id . '">Edit/Details</a></th></tr>' ; 
		}
		
		return $return . '</tbody></table>' ; 
	
	}

	
	
	function GetOrderInfo($order_id){
		Global $user; 

		$buyer = $_SESSION['user'] ; 
		$GetOrdersQuery = "SELECT * FROM `orders` WHERE `id` = '$order_id' ORDER BY `id` DESC LIMIT 1 ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 

		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$buyer = $fetch_info['user'] ; 
					$original_link = $fetch_info['original_link'] ; 
					$item_name = $fetch_info['item_name'] ; 
					$item_color = $fetch_info['item_color'] ; 
					$item_size = $fetch_info['item_size'] ; 
					$item_model = $fetch_info['item_model'] ; 
					$item_specs = $fetch_info['item_specs'] ; 
					$quantity = $fetch_info['quantity'] ; 
					$delivery_type = $fetch_info['delivery_type'] ; 
					$original_price =  $fetch_info['original_price'] ; 
					$total_price =  $fetch_info['total_price'] ; 
					$notes =  $fetch_info['notes'] ; 
					$date_placed =  $fetch_info['date_placed'] ; 
					$status =  $fetch_info['status'] ; 
					$type =  $fetch_info['type'] ; 
					$image = $id . "-" . $item_name . "-" . $total_price . "-" . $date_placed . "-" . $status . "-" . $type ; 
					$return = '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">#' . $id . ' - ' . $item_name . '</h3></div><div class="panel-body"><form action="process.php" name="EditOrder" id="EditOrder" method="post"><input type="hidden" name="cmd" id="cmd" value="EditOrder" /><input type="hidden" name="id" id="id" value="' . $id . '" /><div class="col-md-6">Original Link / ShopCenter ID : <input id="original_link" name="original_link" placeholder="Original Link / ShopCenter ID" class="form-control input-md" type="text" value="' . $original_link . '" />' ; 
					$return = $return . '<br/>Username : <input id="username" name="username" placeholder="Username" class="form-control input-md" type="text" value="' . $buyer . '" />' ;
					$return = $return . '<br/>Item Name : <input id="item_name" name="item_name" placeholder="Item Name" class="form-control input-md" type="text" value="' . $item_name . '" />' ; 
					$return = $return . '<br/>Item Color : <input id="item_color" name="item_color" placeholder="Item Color" class="form-control input-md" type="text" value="' . $item_color . '" />' ; 
					$return = $return . '<br/>Item Size : <input id="item_size" name="item_size" placeholder="Item Size" class="form-control input-md" type="text" value="' . $item_size . '" />' ; 
					$return = $return . '<br/>Item Model/Type : <input id="item_model" name="item_model" placeholder="Item Model/Type" class="form-control input-md" type="text" value="' . $item_model . '" />' ; 
					$return = $return . '<br/>Other Specifications : <input id="item_specs" name="item_specs" placeholder="Other Specifications" class="form-control input-md" type="text" value="' . $item_specs . '" />' ; 
					$return = $return . '<br/>Quantity : <input id="quantity" name="quantity" placeholder="Quantity" class="form-control input-md" type="text" value="' . $quantity . '" />' ; 
					$return = $return . '<br/>Delivery Type : <select id="type" name="type" class="form-control"><option value="' . $delivery_type . '">' . $delivery_type . '</option><option value="Home Delivery">Home Delivery</option><option value="Branch Delivery">Branch Delivery</option></select>' ; 
					$return = $return . '<br/>Original Price : <input id="original_price" name="original_price" placeholder="Original Price" class="form-control input-md" type="text" value="' . $original_price . '" />' ;
					$return = $return . '<br/>Total Price : <input id="total_price" name="total_price" placeholder="Total Price" class="form-control input-md" type="text" value="' . $total_price . '" />' ;
					$return = $return . '<br/>Notes : <input id="notes" name="notes" placeholder="Notes" class="form-control input-md" type="text" value="' . $notes . '" />' ;
					$return = $return . '<br/>Date Placed : <input id="date_placed" name="date_placed" placeholder="Date Placed" class="form-control input-md" type="text" value="' . $date_placed . '" />' ;
					$return = $return . '<br/>Status : <select id="status" name="status" class="form-control"><option selected="" value="' . $status . '">' . $status . '</option><option value="Delivered.">Delivered.</option><option value="Confirmed - Waiting For Delivery ...">Confirmed - Waiting For Delivery ...</option><option value="Price Posted - Waiting For User Confirmation ...">Price Posted - Waiting For User Confirmation ...</option><option value="Waiting For Price Offer ...">Waiting For Price Offer ...</option><option value="Price Rejected - Order Canceled.">Price Rejected - Order Canceled.</option></select>' ;
					$return = $return . '<br/><button type="submit" id="editorderbtn" name="editorderbtn" class="btn btn-primary">Save</button></form><div id="EditOrderResponse" class="col-md-12"></div></div><a href="./process.php?cmd=Remove&remove_type=order&id=' . $id . '"> <button id="remove" name="remove" class="btn btn-danger">Remove</button></a></div></div>' ; 
					
	}
		
		return $return ; 
	
	}


	function UpdateOrderInfo($field,$new_value,$id){
		$update_query="UPDATE `orders` SET `$field` = '$new_value' WHERE `orders`.`id` = '$id' ;";
		$do_update_query=mysql_query($update_query);
		
	}
	
	function RemoveOrder($id){
		$remove_query = mysql_query("DELETE FROM `orders` WHERE `orders`.`id` = $id ;"); 
	}


}

?>
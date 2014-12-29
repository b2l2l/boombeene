<?php

class Orders{
	
	protected $lang;

    public function __construct() {
        global $lang;
        $this->lang = $lang;
    }
	
	function PlaceNewOrder($type,$original,$item_name = NULL,$item_color = NULL,$item_size = NULL,$item_model = NULL,$item_specs = NULL,$quantity = NULL,$delivery_type = NULL,$notes = NULL){
		Global $now, $payments, $shopcenter, $logs ; 
		
		$buyer = $_SESSION['user'] ;  		
		$date_placed = $now ; 
		
		if($type=="ShopCenter"){
			$logs->Log("(ShopCenter) Bought Item : " . $original);
			$new_ordered_count = $shopcenter->GetSpecificItemInfo("ordered",$original) ; 
			$new_ordered_count++ ; 
			$shopcenter->UpdateItemInfo("ordered",$new_ordered_count,$original) ; 
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
			$DoPlaceNewOrder = mysql_query("INSERT INTO `orders` (`id`, `user`, `original_link`, `item_name`, `item_color`, `item_size`, `item_model`, `item_specs`, `quantity`, `delivery_type`, `original_price`, `total_price`, `notes`, `date_placed`, `status`, `type`) VALUES (NULL, '$buyer', '$original_link', '$title', '$color', '$size', '$model', '-', '1', '-', '$price', '$price', '$notes', NOW(), '$status', '$type');");

			$payments->PayForOrder($price) ; 
			
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
			}else{
			return "<a style='color:red;'>" . $this->lang['Payments_NoEnoughCredits'] . "</a>" ;
			}
			
		}else{
			$logs->Log("(Dashboard) Placed Order : " . $original);
			$original_link = $original ; 
			$status = $this->lang['Orders_WaitingForPrice'] ;  
			$DoPlaceNewOrder = mysql_query("INSERT INTO `orders` (`id`, `user`, `original_link`, `item_name`, `item_color`, `item_size`, `item_model`, `item_specs`, `quantity`, `delivery_type`, `original_price`, `total_price`, `notes`, `date_placed`, `status`, `type`) VALUES (NULL, '$buyer', '$original_link', '$item_name', '$item_color', '$item_size', '$item_model', '$item_specs', '$quantity', '$delivery_type', '', '', '$notes', NOW(), '$status', '$type');");
			return "<a style='color:green;'>" . $this->lang['Payments_Success'] . "</a>" ; 
		}
	}
	
	
	function GetOrders(){
		$buyer = $_SESSION['user'] ; 
		$GetOrdersQuery = "SELECT * FROM `orders` WHERE `user` = '$buyer' ORDER BY `id` DESC LIMIT 0,99 ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 

		$return = '<table class="table table-striped"><thead><tr><th>#</th><th>'  . $this->lang['Dashboard_ItemName'] . '</th><th>' . $this->lang['Orders_DatePlaced'] . '</th><th>' . $this->lang['Orders_Status'] . '</th><th>' . $this->lang['Orders_Type'] . '</th><th>-</th></tr></thead><tbody>' ; 
		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
					$item_name = $fetch_info['item_name'] ; 
					$date_placed =  $fetch_info['date_placed'] ; 
					$status =  $fetch_info['status'] ; 
					if($status=="Price Posted - Waiting For User Confirmation ..."){
						$status = $status . '<a href="./dashboard.php?cmd=order_action&action=accept&id=' . $id . '"> <button id="confirmorderbtn" name="confirmorderbtn" class="btn btn-sm btn-primary">Accept</button></a>' . '<a href="./dashboard.php?cmd=order_action&action=reject&id=' . $id . '"> <button id="confirmorderbtn" name="confirmorderbtn" class="btn btn-sm btn-primary">Reject</button></a>' ; 
					}
					$type =  $fetch_info['type'] ; 
					$return = $return . '<tr><th>' . $id . '</th><th>' . $item_name . '</th><th>' . $date_placed . '</th><th>' . $status . '</th><th>' . $type . '</th><th><a href="./dashboard.php?cmd=view_order&id=' . $id . '">' . $this->lang['Orders_Details'] . '</a></th></tr>' ; 
		}
		
		return $return . '</tbody></table>' ; 
	
	}

	
	
	function GetOrderInfo($order_id){
		Global $user; 

		$buyer = $_SESSION['user'] ; 
		$GetOrdersQuery = "SELECT * FROM `orders` WHERE `user` = '$buyer' AND `id` = '$order_id' ORDER BY `id` DESC LIMIT 1 ;" ; 
		$DoGetOrdersQuery = mysql_query($GetOrdersQuery) ; 

		while ($fetch_info= mysql_fetch_array($DoGetOrdersQuery)) {
					$id = $fetch_info['id'] ;
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
					$image = "http://kreeen.com/dashboard.php?" . urlencode("cmd=view_order&id=" . $id) ;  
					$return = '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">' . $this->lang['Invoice_Invoice'] . ' #' . $id . ' - ' . $item_name . '</h3></div><div class="panel-body"><div class="col-md-6">' . $this->lang['Orders_OriginalLink'] . ' : ' . $original_link . '<br/>' . $this->lang['Dashboard_ItemName'] . ' : ' . $item_name . '<br/>' . $this->lang['Dashboard_ItemColor'] . ' : ' . $item_color . '<br/>' . $this->lang['Dashboard_ItemSize'] . ' : ' . $item_size . '<br/>' . $this->lang['Dashboard_ItemModelType'] . ' : ' . $item_model . '<br/>' . $this->lang['Dashboard_ItemSpecs'] . ' : ' . $item_specs . '<br/>' . $this->lang['Dashboard_Quantity'] . ' : ' . $quantity . '<br/>' . $this->lang['Dashboard_Delivery'] . ' : ' . $delivery_type . '<br/>' . $this->lang['Orders_OriginalPrice'] . ' : ' . $original_price . '<br/>' . $this->lang['Orders_TotalPrice'] . ' : ' . $total_price . '<br/>' . $this->lang['Orders_Notes'] . ' : ' . $notes . '<br/>' . $this->lang['Orders_DatePlaced'] . ' : ' . $date_placed . '<br/><a style="color:blue;">' . $this->lang['Orders_Status'] . ' : ' . $status . '</a><br/>' . $this->lang['Orders_Type'] . ' : ' . $type . '</div><div class="col-md-6">' . $user->PrintUserPublicInfo() . '</div><div class="col-md-6"><img src="./includes/phpqrcode/generate.php?text=' . $image . '" /></div></div></div>' ;
					 
		}
		
		return $return ; 
	
	}
	
	
	
	function FetchOrderInfo($field,$id){
		
		$user_info_query = "SELECT *  FROM `orders` WHERE `id` = '$id' LIMIT 1 ;" ; 
		$do_user_info_query = mysql_query($user_info_query) ; 

		while ($fetch_user_info= mysql_fetch_array($do_user_info_query)) {
					$requested_info = $fetch_user_info[$field] ;
		}
		
		return $requested_info ; 
	}
	
	function OrderAction($action,$id){
		Global $payments, $logs;
		$client = $_SESSION['user'] ; 
		if($action=="accept"){
			$order_price = $this->FetchOrderInfo("total_price",$id) ; 
			$permission = $payments->EnoughCredits($order_price) ; 
			if($permission==True){
				$payments->PayForOrder($order_price) ; 
				$update_query="UPDATE `orders` SET `status` = 'Confirmed - Waiting For Delivery ...' WHERE (`orders`.`id` = '$id') AND (`orders`.`user` = '$client' );";
				$do_update_query=mysql_query($update_query);
				$logs->Log("(Accept) Confirmed Order : " . $id);
				return True ;  
			}else{
				return False ; 
			}
		}elseif($action=="reject"){
			$update_query="UPDATE `orders` SET `status` = 'Price Rejected - Order Canceled.' WHERE (`orders`.`id` = '$id') AND (`orders`.`user` = '$client' );";
			$do_update_query=mysql_query($update_query);
			$logs->Log("(Reject) Rejected Order : " . $id);
				return True ; 
		}
		
		
		
		
	}




}

?>
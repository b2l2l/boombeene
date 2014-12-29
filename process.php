<?php
include "./configs/config.php" ; 
$cmd = $_POST['cmd'] ; 

if($cmd<>"calculate"){
$user->CheckAuth(True) ; 
}




if($cmd=="addfunds"){

	$card_number = $functions->SecureInput($_POST['card_number']) ; 
	$card_value = $functions->SecureInput($_POST['card_value']) ;
	
	$AddFunds_Result = $payments->AddFunds($card_number,$card_value) ;
	echo $AddFunds_Result ; 


}elseif($cmd=="transfunds"){

	$receiver = $functions->SecureInput($_POST['receiver']) ; 
	$transfer_amount = $functions->SecureInput($_POST['transfer_amount']) ; 
	$TransFunds_Result = $payments->TransFunds($transfer_amount,$receiver) ; 
	echo $TransFunds_Result ; 

}elseif($cmd=="calculate"){

	$item_price = $functions->SecureInput($_POST['item_price']) ; 
	$quantity = $functions->SecureInput($_POST['quantity']) ; 
	$item_weight = $functions->SecureInput($_POST['item_weight']) ; 
	$delivery = $functions->SecureInput($_POST['delivery']) ; 
	switch ($delivery) {
    case "erbil_branch":
        $delivery =0;
        break;
    case "erbil_home":
       $delivery =4.5;
        break;
    case "suly_branch":
        $delivery =0;
        break;
    case "suly_home":
        $delivery =5;
}



	$cal_price = ($item_price * $quantity) + ($item_weight * 8) ; 
	$cal_price = $cal_price + ($cal_price * 0.04) ; 
	$cal_price = $cal_price +  $delivery ;
	
	echo "<a style='color:blue;'>Price : " . $cal_price . "</a>" ; 



}elseif($cmd=="ShopCenterOrder"){
	$id = $functions->SecureInput($_POST['item']) ;
	echo $orders->PlaceNewOrder("ShopCenter",$id) ; 


}elseif($cmd=="NewOrder"){
	$original_link = $functions->SecureInput($_POST['original_link']) ;
	$item_name = $functions->SecureInput($_POST['item_name']) ;
	$item_color = $functions->SecureInput($_POST['item_color']) ;
	$item_size = $functions->SecureInput($_POST['item_size']) ;
	$item_model = $functions->SecureInput($_POST['item_model']) ;
	$item_specs = $functions->SecureInput($_POST['item_specs']) ;
	$quantity = $functions->SecureInput($_POST['quantity']) ;
	$delivery = $functions->SecureInput($_POST['delivery']) ;
	$notes = $functions->SecureInput($_POST['notes']) ;
	echo $orders->PlaceNewOrder("Dashboard",$original_link,$item_name,$item_color,$item_size,$item_model,$item_specs,$quantity,$delivery,$notes) ; 
}elseif($cmd=="armin"){
	$name = $_POST['name'] ; 
	$email = $_POST['email'] ; 
	$num = $_POST['num'] ; 
	$msg = $_POST['msg'] ; 
	mail("info@kreeen.com","New Contact Msg From " . $name,"Sender Email : " . $email . "<br/> Sender Name : " . $name . "<br/> Sender Number : " . $num . "<br/> Sender Msg : " . $msg) ; 
	echo $lang['Contact_MsgSent'] ; 
	header( "refresh:3;url=index.php" );
}else{
echo "Wrong Request." ; 
}



?>
                            
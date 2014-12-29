<?php
include "./configs/config.php" ; 
$admin->CheckAuth(True) ; 



$cmd = $_GET['cmd'] . $_POST['cmd'] ; 
			
if($cmd=="SearchOrders"){

$username = $functions->SecureInput($_POST['username']) ; 
$id = $functions->SecureInput($_POST['id']) ; 
$status = $functions->SecureInput($_POST['status']) ; 
$type = $functions->SecureInput($_POST['type']) ; 
echo $orders->GetOrders($username,$id,$status,$type) ; 

}elseif($cmd=="EditOrder"){
$id = $functions->SecureInput($_POST['id']);

// Log the process
		$logs->Log("Updated Order : " . $id);

$orders->UpdateOrderInfo("original_link",$functions->SecureInput($_POST['original_link']),$id);
$orders->UpdateOrderInfo("username",$functions->SecureInput($_POST['username']),$id);
$orders->UpdateOrderInfo("item_name",$functions->SecureInput($_POST['item_name']),$id);
$orders->UpdateOrderInfo("item_color",$functions->SecureInput($_POST['item_color']),$id);
$orders->UpdateOrderInfo("item_size",$functions->SecureInput($_POST['item_size']),$id);
$orders->UpdateOrderInfo("item_model",$functions->SecureInput($_POST['item_model']),$id);
$orders->UpdateOrderInfo("item_specs",$functions->SecureInput($_POST['item_specs']),$id);
$orders->UpdateOrderInfo("quantity",$functions->SecureInput($_POST['quantity']),$id);
$orders->UpdateOrderInfo("delivery",$functions->SecureInput($_POST['delivery']),$id);
$orders->UpdateOrderInfo("original_price",$functions->SecureInput($_POST['original_price']),$id);
$orders->UpdateOrderInfo("total_price",$functions->SecureInput($_POST['total_price']),$id);
$orders->UpdateOrderInfo("notes",$functions->SecureInput($_POST['notes']),$id);
$orders->UpdateOrderInfo("date_placed",$functions->SecureInput($_POST['date_placed']),$id);
$orders->UpdateOrderInfo("status",$functions->SecureInput($_POST['status']),$id);
echo "<h5 style='color:green;'>Success</h5>" ; 

}elseif($cmd=="SearchUsers"){


$username = $functions->SecureInput($_POST['username']) ; 
$email = $functions->SecureInput($_POST['email']) ; 
$phone = $functions->SecureInput($_POST['phone']) ; 
$city = $functions->SecureInput($_POST['city']) ; 
echo $user->GetUsers($username,$email,$phone,$city) ; 


}elseif($cmd=="EditUser"){

$id = $functions->SecureInput($_POST['id']);

// Log the process
		$logs->Log("Updated User : " . $id);
		
		
$user->UpdateUserInfo("email",$functions->SecureInput($_POST['email']),$id);
$user->UpdateUserInfo("username",$functions->SecureInput($_POST['username']),$id);
$user->UpdateUserInfo("full_name",$functions->SecureInput($_POST['full_name']),$id);
$user->UpdateUserInfo("phone",$functions->SecureInput($_POST['phone']),$id);
$user->UpdateUserInfo("address",$functions->SecureInput($_POST['address']),$id);
$user->UpdateUserInfo("city",$functions->SecureInput($_POST['city']),$id);
$user->UpdateUserInfo("credits",$functions->SecureInput($_POST['credits']),$id);

$new_password = $functions->SecureInput($_POST['password']);
if($new_password<>""){
$user->UpdateUserInfo("password",md5($new_password),$id);
}

echo "<h3 style='color:green;'>Success.</h3>" ; 

}elseif($cmd=="GenerateCards"){
	$value = $functions->SecureInput($_POST['card_type']) ; 
	$quantity = $functions->SecureInput($_POST['quantity']) ;

	// Log the process
		$logs->Log("Generated " . $quantity . " - Value : " . $value);
		
	echo $cards->GenerateCards($value,$quantity);

}elseif($cmd=="SearchItems"){

	$category = $functions->SecureInput($_POST['cat_id']) ; 
	$title = $functions->SecureInput($_POST['title']) ; 
	$status = $functions->SecureInput($_POST['status']) ; 

	echo $shopcenter->GetItems($category,$title,$status);
}elseif($cmd=="EditItem"){

$id = $functions->SecureInput($_POST['id']);

	// Log the process
		$logs->Log("Updated Item : " . $id);

$shopcenter->UpdateItemInfo("title",$functions->SecureInput($_POST['title']),$id);
$shopcenter->UpdateItemInfo("price",$functions->SecureInput($_POST['price']),$id);
$shopcenter->UpdateItemInfo("delivery_time",$functions->SecureInput($_POST['delivery_time']),$id);
$shopcenter->UpdateItemInfo("model",$functions->SecureInput($_POST['model']),$id);
$shopcenter->UpdateItemInfo("color",$functions->SecureInput($_POST['color']),$id);
$shopcenter->UpdateItemInfo("size",$functions->SecureInput($_POST['size']),$id);
$shopcenter->UpdateItemInfo("description",$functions->SecureInput($_POST['description']),$id);
$shopcenter->UpdateItemInfo("video",$functions->SecureInput($_POST['video']),$id);
$shopcenter->UpdateItemInfo("cat_id",$functions->SecureInput($_POST['cat_id']),$id);
$shopcenter->UpdateItemInfo("status",$functions->SecureInput($_POST['status']),$id);

echo "<h3 style='color:green;'>Success.</h3>" ; 
}elseif($cmd=="NewItem"){

$final_link1 = $functions->Upload("file1","|") ; 
if($final_link1==NULL){
	echo("<a style='color:red;'>Please select an image</a>") ; 
	exit;
}

$final_link2 = $functions->Upload("file2","|") ; 
$final_link3 = $functions->Upload("file3","|") ; 
$final_link4 = $functions->Upload("file4","|") ; 
$final_link5 = $functions->Upload("file5","|") ; 
$final_link6 = $functions->Upload("file6","|") ; 
$final_link7 = $functions->Upload("file7","|") ; 
$final_link8 = $functions->Upload("file8","|") ; 
$final_link9 = $functions->Upload("file9","|") ; 
$final_link10 = $functions->Upload("file10","|") ; 



$title = $functions->SecureInput($_POST['title']) ; 

	// Log the process
		$logs->Log("Created Item : " . $title);


$model = $functions->SecureInput($_POST['model']) ; 
$color = $functions->SecureInput($_POST['color']) ; 
$size = $functions->SecureInput($_POST['size']) ; 
$description = $functions->SecureInput($_POST['description']) ; 
$cat_id = $functions->SecureInput($_POST['cat_id']) ; 
$price = $functions->SecureInput($_POST['price']) ; 
$delivery_time = $functions->SecureInput($_POST['delivery_time']) ; 
$video = $functions->SecureInput($_POST['video']) ; 
$status = $functions->SecureInput($_POST['status']) ; 

$photos = $final_link1 . $final_link2 . $final_link3 ; 




$shopcenter->NewItem($title,$model,$color,$size,$description,$cat_id,$price,$delivery_time,$photos,$video,$status); 
echo "<h3 style='color:green;'>Success. Redirecting you in 3 seconds ...</h3>" ;
header( "refresh:3;url=./items.php" );

}elseif($cmd=="Remove"){
	$remove_type = $functions->SecureInput($_GET['remove_type']) ; 
	$id = $functions->SecureInput($_GET['id']) ; 
	
	if($remove_type=="user"){
		$user->RemoveUser($id) ; 
		$rm_location = "./users.php";  
	}elseif($remove_type=="order"){
		$orders->RemoveOrder($id) ; 
		$rm_location = "./orders.php";  
	}elseif($remove_type=="item"){
		$shopcenter->RemoveItem($id) ; 
		$rm_location = "./items.php";  
	}
	
		// Log the process
		$logs->Log("Removed " . $remove_type . " : " . $id);
		
echo "<h3 style='color:green;'>Success. Redirecting you in 3 seconds ...</h3>" ;
header( "refresh:3;url=$rm_location" );

}elseif($cmd=="AddNewCategory"){
	$new_title = $functions->SecureInput($_POST['title']) ; 
	$new_parent = $functions->SecureInput($_POST['new_cat_id']) ; 
	
	if(($new_parent == "") or ($new_parent == "Main")){
		$new_parent = NULL ; 
	}
	
	$categories->AddCategory($new_title,$new_parent); 
	echo "<h3 style='color:green;'>Success. Redirecting you in 5 seconds ...</h3>" ;
	header( "refresh:5;url=./categories.php" );
}elseif($cmd=="ChangeParentNameCategory"){
	$old_cat_id = $functions->SecureInput($_POST['old_cat_id']) ; 
	$new_title = $functions->SecureInput($_POST['title']) ; 
	$new_parent = $functions->SecureInput($_POST['new_cat_id']) ; 
	
	if($new_title<>""){
		$categories->UpdateCategory("name",$new_title,$old_cat_id) ; 
	}
	
	if($new_parent<>""){
		if($new_parent == "Main"){
		$new_parent = NULL ; 
		}
	
		$categories->UpdateCategory("parents","-" . $new_parent . "-|",$old_cat_id) ; 
	}
	
	echo "<h3 style='color:green;'>Success. Redirecting you in 5 seconds ...</h3>" ;
	header( "refresh:5;url=./categories.php" );
	
}elseif($cmd=="RemoveCategory"){

	$old_cat_id = $functions->SecureInput($_POST['old_cat_id']) ; 
	$categories->RemoveCategory($old_cat_id);
	
	echo "<h3 style='color:green;'>Success. Redirecting you in 5 seconds ...</h3>" ;
	header( "refresh:5;url=./categories.php" );
	
}elseif($cmd=="NewCatSliderImage"){

$final_img_link = $functions->Upload("ImageFile") ; 
if($final_img_link==NULL){
	echo("<a style='color:red;'>Please select an image</a>") ; 
	exit;
}

$c_id = $functions->SecureInput($_POST['cat_id']) ; 
$hyperlink = $functions->SecureInput($_POST['hyperlink']) ; 
$shopcenter->NewSliderImage($final_img_link,$c_id,$hyperlink) ; 

	echo "<h3 style='color:green;'>Success. Redirecting you in 2 seconds ...</h3>" ;
	header( "refresh:2;url=./categories_slider.php" );


}elseif($cmd=="ChangeCatSliderImageCat"){
	$id = $functions->SecureInput($_POST['id']) ; 
	$c_id = $functions->SecureInput($_POST['cat_id']) ; 
	
	$shopcenter->ChangeImageCat($id,$c_id) ; 
	echo "<h3 style='color:green;'>Success. Redirecting you in 2 seconds ...</h3>" ;
	header( "refresh:2;url=./categories_slider.php" );
}elseif($cmd=="RemoveCSliderImage"){
	$id = $functions->SecureInput($_GET['id']) ;
	$shopcenter->RemoveSliderImage($id) ; 
	
	echo "<h3 style='color:green;'>Success. Redirecting you in 2 seconds ...</h3>" ;
	header( "refresh:2;url=./categories_slider.php" );
	
}elseif($cmd=="RequestExcelFile"){
	
	$date = $functions->SecureInput($_POST['date']) ;
	$orders->RequestExcelFile($date) ; 
	
}elseif($cmd=="SetCategoryImage"){
$id = $functions->SecureInput($_POST['cat_id']) ;
$final_img_link = $functions->Upload("CategoryImage") ; 

$categories->UpdateCategory("image",$final_img_link,$id) ; 
	echo "<h3 style='color:green;'>Success. Redirecting you in 2 seconds ...</h3>" ;
	header( "refresh:2;url=./categories_image.php" );
	
}
?>
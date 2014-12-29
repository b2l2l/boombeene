<?php

class ShopCenter{

	protected $lang;

    public function __construct() {
        global $lang;
        $this->lang = $lang;
    }
	
	function GetPathTree($type,$id){
		Global $functions ; 
		
		if($type=="item"){
			$GetItemTitle = $this->GetSpecificItemInfo("title",$id) ; 
			$GetItemCat = $this->GetSpecificItemInfo("cat_id",$id) ; 
			$ItemCatName = $functions->EnglishOnlyCheckAndReturn($this->GetSpecificCatInfo("name",$GetItemCat)) ; 
			$CatLink = "<a href='./shop_center.php?cat=$GetItemCat'>$ItemCatName</a>" ; 
			$return = "<center><a href='./shop_center.php'>" . $this->lang['MENU_SHOP_CENTRE'] . "</a> > " . $CatLink . " > " . $GetItemTitle . "</center>" ; 
		}else{
			$GetCatParents = $this->GetSpecificCatInfo("parents",$id) ; 
			$GetCatExploder = explode("-",$GetCatParents) ;
			$CatParent = $GetCatExploder[1] ; 
			$CurrentCatName = $functions->EnglishOnlyCheckAndReturn($this->GetSpecificCatInfo("name",$id)) ;
			$ParentCatName = $functions->EnglishOnlyCheckAndReturn($this->GetSpecificCatInfo("name",$CatParent)) ;
			$CatParentLink = "<a href='./shop_center.php?cat=$CatParent'>$ParentCatName</a>" ; 
			$return = "<center><a href='./shop_center.php'>" . $this->lang['MENU_SHOP_CENTRE'] . "</a> > " . $CatParentLink . " > " . $CurrentCatName . "</center>" ; 
		}
		
		return $return ; 
	
	}

	function GetSpecificCatInfo($field,$cat){
		
		$GetSpecificItemInfoQuery = "SELECT * FROM `categories` WHERE `id` = '$cat' LIMIT 1 ;" ; 
		$DoGetSpecificItemInfoQuery = mysql_query($GetSpecificItemInfoQuery) ; 

		while ($fetch_info= mysql_fetch_array($DoGetSpecificItemInfoQuery)) {
					$requested_info = $fetch_info[$field] ;
		}
		
		return $requested_info ; 
	}
	
	
	function GetSlider($c_id = NULL){
		error_reporting(0);
		if($c_id<>NULL){
		Global $files_path ; 
		$GetSliderQuery = mysql_query("SELECT * FROM `categories_slider` WHERE `c_id` = $c_id ; ") ; 
		$i = 0 ; 
		$return = '<div class="row carousel-holder"><div class="col-md-12"><div id="carousel-example-generic" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">' ; 
		while ($fetch_items= mysql_fetch_array($GetSliderQuery)) {
			
					$return = $return . '<li data-target="#carousel-example-generic" data-slide-to="' . $i .  '"></li>' ; 
					$i++ ; 
					
		}
		
		$return = $return . '</ol><div class="carousel-inner">' ; 
		
		$GetSliderQuery2 = mysql_query("SELECT * FROM `categories_slider` WHERE `c_id` = '$c_id' ; ") ; 
		$z = 0 ; 
		while ($fetch_items= mysql_fetch_array($GetSliderQuery2)) {
			if($z == 0){
				$active = "active" ; 
			}else{
				$active = "" ; 
			}
			
			$image_link = $fetch_items['image_link'] ; 
			$hyperlink = $fetch_items['hyperlink'] ; 
			
					$return = $return . '<div class="item ' . $active . '"><a href="' . $hyperlink . '"><img style="height:250px;" class="slide-image" src="' . $files_path . $image_link .  '" alt=""></a></div>' ; 
					$z++ ; 
					
		}
		
		$return = $return . '</div><a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a></div></div></div>' ; 
		
		return $return ; 
		}
	}
	
	
	
	
	function GetCategories(){
		Global $functions ; 
echo '
<style>@media screen and (max-width: 991px){
    .columns{
        max-height: 50px;
        overflow:scroll;
    }
}

@media screen and (min-width: 992px){
    .columns{
        -moz-column-count:2; /* Firefox */
        -webkit-column-count:2; /* Safari and Chrome */
        column-count:1;
        width: auto;

        max-height: 250px;
    }
}
</style>


';
$mo = $functions->EnglishOnlyCheckAndReturn("زۆرترین کڕدراو - Most Ordered") ; 
			echo '<a href="./shop_center.php?cat=most_ordered"><button type="button" class="btn btn-success" style="padding-right:20px;">' . $mo . '</button></a>' ;
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		$ev = $functions->EnglishOnlyCheckAndReturn("گشتی - Everything") ; 
		echo '<a href="./shop_center.php?cat=all"><button type="button" class="btn btn-primary" style="padding-right:20px;">' . $ev . '</button></a>' ; 
		// echo '<a class="list-group-item" style="color:orange;" href="./shop_center.php">گشتی - Everything</a>' ;
		//First fetch only parent categories
		$first_level_cats = mysql_query("SELECT * FROM `categories` WHERE `parents` IS NULL ;");

			 while($row = mysql_fetch_array($first_level_cats)) {     
			// // echo '<a class="list-group-item" style="" href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a>' ; 
			// echo '<li class="dropdown list-group-item" ><a data-toggle="dropdown" class="dropdown-toggle" href="#">' . $row['name'] . '<span class="caret"></span></a><ul role="menu" class="dropdown-menu">' ; 
            // echo '<li><a style="color:blue; font-weight:bold;" href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a></li>' ;   
            // echo '<li><a href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a><ul>' ; 
			echo '<div class="btn-group text-center"><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="padding-right:30px;">' . $functions->EnglishOnlyCheckAndReturn($row['name']) . '<span class="caret"></span></button><ul class="dropdown-menu columns" role="menu">' ; 
			echo '<li><a style="color:red; font-weight:bold; text-align: center;" href="./shop_center.php?cat=' . $row['id'] . '">' . $functions->EnglishOnlyCheckAndReturn($row['name']) . '</a></li>' ; 
			
				 $second_level_cats = mysql_query("SELECT * FROM categories WHERE parents LIKE '%-" . $row['id'] . "-|%';");

			 while($row = mysql_fetch_array($second_level_cats)) {      
				echo '<li><a style="color:navy; font-weight:bold; text-align: center;" href="./shop_center.php?cat=' . $row['id'] . '">' . $functions->EnglishOnlyCheckAndReturn($row['name']) . '</a></li>' ;  
				// echo '<a class="list-group-item" style="margin-right:10%;" href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a>' ;              
				
				  $third_level_cats = mysql_query("SELECT * FROM categories WHERE parents LIKE '%-" . $row['id'] . "-|%';");
				  
			 while($row = mysql_fetch_array($third_level_cats)) {   
				echo '<li><a style="text-align: center;" href="./shop_center.php?cat=' . $row['id'] . '">' . $functions->EnglishOnlyCheckAndReturn($row['name']) . '</a></li>' ;  			 
				// echo '<a class="list-group-item" style="margin-right:25%;" href="./shop_center.php?cat=' . $row['id'] . '">--' . $row['name'] . '</a>' ;             
				
					}

				  } 
				echo '</ul></div>' ; 
			
		   
			}
			 
			
			
		
		
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		

	}
	
	function GetItems($category = NULL,$page = NULL){
		Global $files_path ; 
		$order_by = "id" ; 
		
		
		if($page==NULL or $page=='1'){
			$page = 1 ; 
			$limit = "LIMIT 0,30" ; 
		}else{
		
			$previous_page = $page - 1 ; 
			$limit = 30 * $page ;
			$limit = "LIMIT " . $limit . "," . ($limit + 30) ; 
		}
		
		$next_page = $page + 1 ; 
		
		
		
		
		if($category<>NULL){

			
			if($category=="all"){
			$category = "" ; 
			}elseif($category=="most_ordered"){
			$category = "" ; 
			$order_by = "ordered" ; 
			}else{
			$link_category = $category ; 
			$category = "`cat_id` = '$category' AND " ; 
			}
			
			$GetItemsQuery = mysql_query("SELECT * FROM `shop_center` WHERE $category `status` = 'active' ORDER BY `$order_by` DESC $limit ;");
		
		
		
		
		while ($fetch_items= mysql_fetch_array($GetItemsQuery)) {
			$id = $fetch_items['id'] ;
			$title = $fetch_items['title'] ; 
			$price = $fetch_items['price'] ; 
			$photos = $fetch_items['photos'] ; 
			$photos = explode("|",$photos); 
			$first_photo = $photos[0] ; 
			$description = $fetch_items['description'] ; 
			
			$return = $return . '<div class="col-sm-3 col-lg-3 col-md-3 text-center">' . '<div class="thumbnail">' . '<img style="height:250px;width:300px;" src="' . $files_path . $first_photo . '" alt="' . $title .  '">' ; 
			$return = $return . '<div class="caption">' . '<h4 class="pull-right" style="text-align:left;">$' . $price . '</h4>' . "<h4><a href='shop_center.php?cmd=item&item=$id'>$title</a></h4>" ; 
			$return = $return . "<a class='btn btn-primary'   href='shop_center.php?cmd=order&item=$id'>" .  $this->lang['Shopcenter_Buynow'] . '</a>' ; 
			$return = $return . "<a class='btn btn-default' href='shop_center.php?cmd=item&item=$id'>" .  $this->lang['Shopcenter_Readmore'] . '</a>' ;
			$return = $return . "<p>" . $description . "</p>" . "</div></div></div>" ; 
		}
		
		$PNPages = "<br/> <a href='./shop_center.php?page=$previous_page&cat=$link_category'><img src='./imges/prev.png' width='75px;'> </a> -- <a href='./shop_center.php?page=$next_page&cat=$link_category'> <img src='./imges/next.png' width='75px;'>  </a>" ; 
					
		}else{
			$GetItemsQuery = mysql_query("SELECT * FROM `categories` WHERE `image` <> '' ;");
			
			while ($fetch_items= mysql_fetch_array($GetItemsQuery)) {
			$id = $fetch_items['id'] ;
			$title = $fetch_items['name'] ; 
			$first_photo = $fetch_items['image'] ; 
			
			$return = $return . '<div class="col-sm-3 col-lg-3 col-md-3 text-center">' . "<a href='shop_center.php?cat=$id'>" . '<div class="thumbnail">' . '<img style="height:80px;width:300px;" src="' . $files_path . $first_photo . '" alt="' . $title .  '">' ; 
			$return = $return . '<div class="caption">' . "<center><h4>$title</h4><center></a>" ; 
			$return = $return . "</div></div></div>" ; 
			}
			
		}
					
		return $return . $PNPages ;
		
	}
	
	
	
	function GetItemInfo($item){
		Global $files_path ; 
		
			$id = $this->GetSpecificItemInfo("id",$item) ; 
			$title = $this->GetSpecificItemInfo("title",$item) ; 
			$price = $this->GetSpecificItemInfo("price",$item) ; 
			$delivery_time = $this->GetSpecificItemInfo("delivery_time",$item) ;  
			$model = $this->GetSpecificItemInfo("model",$item) ; 
			$color = $this->GetSpecificItemInfo("color",$item) ; 
			$size = $this->GetSpecificItemInfo("size",$item) ; 
			$description = $this->GetSpecificItemInfo("description",$item) ; 
			$photos = $this->GetSpecificItemInfo("photos",$item) ; 
			$photos = explode("|",$photos); 
			$video = $this->GetSpecificItemInfo("video",$item) ; 
			
			for($i = 0; $i < (count($photos) - 1); ++$i) {
				$item_photos = $item_photos . '<a href="' . $files_path . $photos[$i] . '" data-lightbox="' . $i . '"><img src="' . $files_path . $photos[$i] . '" width="90px" height=150px" /></a>' ; 
			}
			
			
			
            
              
            
			
			$return = $return . '<div class="panel panel-info" dir="rtl"><div class="panel-heading"><h3 class="panel-title">' . $title .  '</h3></div><div class="panel-body">' ; 
			$return = $return . "<img src='$files_path$photos[0]' width='200px' height='300px' />" ; 
			$return = $return . '<div style="position:absolute; top:10%; left:50%;"> <h4>' . $this->lang['ShopCenter_Model'] . " : " . $model . '<br/>' . $this->lang['ShopCenter_Color'] . " : " . $color . '<br/>' . $this->lang['ShopCenter_Size'] . " : " . $size . '<br/>' . $this->lang['ShopCenter_Description'] . " : " . $description . '<br/>' . $this->lang['ShopCenter_Price'] . " : " . $price . '<br/>' . $this->lang['ShopCenter_Delivery_Time'] . " : " . $delivery_time . '</h4>' . "<a class='btn btn-primary' href='shop_center.php?cmd=order&item=$id'>" .  $this->lang['Shopcenter_Buynow'] . '</a></div>' ; ; 
			$return = $return . '</div></div><div class="panel panel-info"><div class="panel-heading"><h3 class="panel-title"></h3></div><div class="panel-body"><center>' . $item_photos . '<br/><br/>' . $video . '</center></div></div>' ; 
		
		return $return ; 
	}

	
	function ConfirmOrder($item){
			Global $files_path ; 

			$id = $this->GetSpecificItemInfo("id",$item) ; 
			$title = $this->GetSpecificItemInfo("title",$item) ; 
			$price = $this->GetSpecificItemInfo("price",$item) ; 
			$photos = $this->GetSpecificItemInfo("photos",$item) ; 
			$photos = explode("|",$photos); 
			
			for($i = 0; $i < (count($photos) - 1); ++$i) {
				$item_photos = $item_photos . '<img src="' . $files_path . $photos[$i] . '" width="200px" height="300px" />' ; 
			}
			
			$notes = $this->GetSpecificItemInfo("notes",$item) ; 
			
			$return = $return . '<div class="panel panel-info"><div class="panel-heading"><h3 class="panel-title">' . $title .  '</h3></div><div class="panel-body">' ; 
			$return = $return . $item_photos ; 
			$return = $return . '<h4 style="color:red">' . $this->lang['ShopCenter_AreYouSure'] . '(' . $price . '$)</h4>' ; 
			$return = $return . '<br/> <form action="process.php" method="post" name="ShopCenterOrder" id="ShopCenterOrder"> <input type="hidden" name="cmd" id="cmd" value="ShopCenterOrder" /> <input type="hidden" name="item" id="item" value="'. $item . '" /> <button name="YesImSure" id="YesImSure" class="btn btn-primary" type="submit">Yes I\'m Sure</button> </form> <div id="ShopCenterOrderResponse" class="col-md-12"></div>' ; 
			$return = $return . '</div></div>' ; 			
			return $return ; 
			
	}
	
	
	
	function GetSpecificItemInfo($field,$item){
		
		$GetSpecificItemInfoQuery = "SELECT * FROM `shop_center` WHERE `id` = '$item' AND `status` = 'active' LIMIT 1 ;" ; 
		$DoGetSpecificItemInfoQuery = mysql_query($GetSpecificItemInfoQuery) ; 

		while ($fetch_info= mysql_fetch_array($DoGetSpecificItemInfoQuery)) {
					$requested_info = $fetch_info[$field] ;
		}
		
		return $requested_info ; 
	}
	
	function UpdateItemInfo($field,$new_value,$id){
		
		$update_query="UPDATE `shop_center` SET `$field` = '$new_value' WHERE `shop_center`.`id` = '$id' ;";
		$do_update_query=mysql_query($update_query);
		
	}



}

?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
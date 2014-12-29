<?php

class ShopCenter{

	function GetSliderImages($c_id = NULL,$id = NULL){
		if($c_id<>NULL){
			$c_id = "AND (`c_id` = $c_id)" ; 
		}
		
		if($id<>NULL){
			$id = "AND (`id` = $id)" ; 
		}
		
		$GetSliderQuery = mysql_query("SELECT * FROM `categories_slider` WHERE (`c_id` <> '-7') $c_id $id ; ") ; 
		
		$return = '<table class="table table-striped"><thead><tr><th>#ID</th><th>Image Random Link</th><th>Associated Category</th><th>Remove</th></tr></thead><tbody>' ; 
		while ($fetch_items= mysql_fetch_array($GetSliderQuery)) {
			$id = $fetch_items['id'] ;
			$image_link = $fetch_items['image_link'] ; 
			$c_id = $fetch_items['c_id'] ; 
			
					$return = $return . '<tr><th>' . $id . '</th>' ; 
					$return = $return . '<th>' . $image_link . '</th>' ; 
					$return = $return . '<th><form action="process.php" method="post"><input type="hidden" name="cmd" id="cmd" value="ChangeCatSliderImageCat" /><input type="hidden" name="id" id="id" value="' . $id . '" /><div class="col-md-6"><select id="cat_id" name="cat_id" class="form-control"><option selected="" value="' . $c_id . '">Category ID : ' . $c_id . '</option>' . $this->GetCategories() . '</select></div><button type="submit" id="editimagebtn" name="editimagebtn" class="btn btn-primary">Save</button></form></th>' ; 
					$return = $return . '<th><a href="./process.php?cmd=RemoveCSliderImage&id=' . $id . '"> <button id="removeimagebtn" name="removeimagebtn" class="btn btn-danger">Remove</button></a></th>' ; 
					$return = $return . '</tr>' ; 
					

		}
		
		return $return ;
		
	}
	
	function NewSliderImage($image_link,$c_id,$hyperlink = NULL){ ; 
		mysql_query("INSERT INTO `categories_slider` (`id`, `image_link`, `c_id`, `hyperlink`) VALUES (NULL, '$image_link', '$c_id', '$hyperlink'); ") ; 
	}
	
	function ChangeImageCat($id,$c_id){
		mysql_query("UPDATE `categories_slider` SET `c_id` = '$c_id' WHERE `categories_slider`.`id` = '$id' ;");
	}
	
	function RemoveSliderImage($id){ ; 
		mysql_query("DELETE FROM `categories_slider` WHERE `categories_slider`.`id` = $id") ; 
	}
	
	

	function GetCategories(){
					 
		
			//First fetch only parent categories
			$first_level_cats = mysql_query("SELECT * FROM `categories` WHERE `parents` IS NULL ;");

			 while($row = mysql_fetch_array($first_level_cats)) {     
			// echo '<a class="list-group-item" style="" href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a>' ; 
 
            $return = $return . '<option value="' . $row['id'] . '">' . $row['id'] . ":" . $row['name'] . '</option>' ;   
              
				
				 $second_level_cats = mysql_query("SELECT * FROM categories WHERE parents LIKE '%-" . $row['id'] . "-|%';");

			 while($row = mysql_fetch_array($second_level_cats)) {      
				$return = $return . '<option value="' . $row['id'] . '">-' . $row['id'] . ":" . $row['name'] . '</option>' ;
				// echo '<a class="list-group-item" style="margin-right:10%;" href="./shop_center.php?cat=' . $row['id'] . '">' . $row['name'] . '</a>' ;              
				
					$third_level_cats = mysql_query("SELECT * FROM categories WHERE parents LIKE '%-" . $row['id'] . "-|%';");
				  
			 while($row = mysql_fetch_array($third_level_cats)) {   
				$return = $return . '<option value="' . $row['id'] . '">--' . $row['id'] . ":" . $row['name'] . '</option>' ; 			 
				// echo '<a class="list-group-item" style="margin-right:25%;" href="./shop_center.php?cat=' . $row['id'] . '">--' . $row['name'] . '</a>' ;             
				
					}

				  } 			
		   
			}
			
	return $return ; 
			
	}
	
	function GetItems($category = NULL,$title = NULL,$status = NULL){
		Global $files_path ; 
		if($category<>NULL){
			$category = "AND `cat_id` = '$category' " ; 
		}
		
		if($title<>NULL){
			$title = "AND `title` = '$title' " ; 
		}
		
		
		if($status<>NULL){
			$status = "AND `status` = '$status' " ; 
		}
		
		
		
		$GetItemsQuery = mysql_query("SELECT * FROM `shop_center` WHERE (`id` <> '-7') $category $title $status ORDER BY `id` DESC LIMIT 0,299 ;");
		
		$return = '<table class="table table-striped"><thead><tr><th>#ID</th><th>Title</th><th>Price</th><th>Category</th><th>Status</th><th>-</th></tr></thead><tbody>' ; 
		while ($fetch_items= mysql_fetch_array($GetItemsQuery)) {
			$id = $fetch_items['id'] ;
			$title = $fetch_items['title'] ; 
			$price = $fetch_items['price'] ; 
			$category = $fetch_items['cat_id'] ; 
			$status = $fetch_items['status'] ; 
			
					$return = $return . '<tr><th>' . $id . '</th>' ; 
					$return = $return . '<th>' . $title . '</th>' ; 
					$return = $return . '<th>' . $price . '</th>' ; 
					$return = $return . '<th>' . $category . '</th>' ; 
					$return = $return . '<th>' . $status . '</th>' ; 
					$return = $return . '<th><a href="./items.php?cmd=edit_item&id=' . $id . '"> <button id="edititembtn" name="edititembtn" class="btn btn-primary">Edit</button></a></th></tr></form>' ; 
					

		}
		
		return $return ;
					
					
		
	}
	
	
	
	function EditItem($item){
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
			$status = $this->GetSpecificItemInfo("status",$item) ;
			$category = $this->GetSpecificItemInfo("cat_id",$item) ;
			
			for($i = 0; $i < (count($photos) - 1); ++$i) {
				$item_photos = $item_photos . '<a href="' . $files_path . $photos[$i] . '" data-lightbox="' . $i . '"><img src="' . $files_path . $photos[$i] . '" width="90px" height=150px" /></a>' ; 
			}
			
			
					$return = '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">#' . $id . ' - ' . $title . '</h3></div><div class="panel-body">' ; 
					$return = $return . '<form action="process.php" name="EditItem" id="EditItem" method="post"><input type="hidden" name="cmd" id="cmd" value="EditItem" /><input type="hidden" name="id" id="id" value="' . $id . '" />' ; 
					$return = $return . '<div class="col-md-6">' ; 
					$return = $return . 'Title : <input id="title" name="title" placeholder="Title" class="form-control input-md" type="text" value="' . $title . '"/>' ; 
					$return = $return . 'Price : <input id="price" name="price" placeholder="Price" class="form-control input-md" type="text" value="' . $price . '"/>' ; 
					$return = $return . 'Delivery Time : <input id="delivery_time" name="delivery_time" placeholder="Delivery Time" class="form-control input-md" type="text" value="' . $delivery_time . '"/>' ; 
					$return = $return . 'Model/Type : <input id="model" name="model" placeholder="Model/Type" class="form-control input-md" type="text" value="' . $model . '"/>' ; 
					$return = $return . 'Color : <input id="color" name="color" placeholder="Color" class="form-control input-md" type="text" value="' . $color . '"/>' ; 
					$return = $return . 'Size : <input id="size" name="size" placeholder="Size" class="form-control input-md" type="text" value="' . $size . '"/>' ; 
					$return = $return . 'Description : <input id="description" name="description" placeholder="Description" class="form-control input-md" type="text" value="' . $description . '"/>' ; 
					$return = $return . 'Video : <textarea id="video" name="video" placeholder="Video" class="form-control input-md">' . $video . '</textarea>' ; 
					$return = $return . 'Category : <select id="cat_id" name="cat_id" class="form-control"><option selected="" value="' . $category . '">CAT ID : ' . $category . '</option>' . $this->GetCategories() . '</select>' ;
					$return = $return . 'Status : <select id="status" name="status" class="form-control"><option selected="" value="' . $status . '">' . $status . '</option><option value="active">Active</option><option value="inactive">Inactive</option></select>' ; 
					$return = $return . '<button type="submit" id="edititembtn" name="edititembtn" class="btn btn-primary">Save</button></div></form><div id="EditItemResponse" class="col-md-12"></div><a href="./process.php?cmd=Remove&remove_type=item&id=' . $id . '"> <button id="remove" name="remove" class="btn btn-danger">Remove</button></a></div></div>' ; 
					return $return ; 
					
		return $return ; 
	}
	
	
	
	function GetSpecificItemInfo($field,$item){
		
		$GetSpecificItemInfoQuery = "SELECT * FROM `shop_center` WHERE `id` = '$item' LIMIT 1 ;" ; 
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
	
	function RemoveItem($id){
		$remove_query = mysql_query("DELETE FROM `shop_center` WHERE `shop_center`.`id` = $id ;"); 
	}

	
	function NewItem($title = NULL,$model = NULL,$color = NULL,$size = NULL,$description = NULL,$cat_id = NULL,$price = NULL,$delivery_time = NULL,$photos = NULL,$video = NULL,$status = NULL){
		
		if($title==NULL){
					$return = '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">#New Item</h3></div><div class="panel-body">' ; 
					$return = $return . '<form action="process.php" name="NewItem" id="NewItem" method="post" enctype="multipart/form-data"><input type="hidden" name="cmd" id="cmd" value="NewItem" />' ; 
					$return = $return . '<div class="col-md-6">' ; 
					$return = $return . 'Title : <input id="title" required="" name="title" placeholder="Title" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Price : <input id="price" required="" name="price" placeholder="Price" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Delivery Time : <input id="delivery_time" required="" name="delivery_time" placeholder="Delivery Time" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Model/Type : <input id="model" name="model" placeholder="Model/Type" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Color : <input id="color" name="color" placeholder="Color" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Size : <input id="size" name="size" placeholder="Size" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Description : <input id="description" required="" name="description" placeholder="Description" class="form-control input-md" type="text" value=""/>' ; 
					$return = $return . 'Video : <textarea id="video" name="video" placeholder="Video" class="form-control input-md"></textarea>' ; 
					$return = $return . 'Category : <select id="cat_id" required="" name="cat_id" class="form-control"><option value="">Category</option>' . $this->GetCategories() . '</select>' ;
					$return = $return . 'Status : <select id="status" required="" name="status" class="form-control"><option value="">Status</option><option value="active">Active</option><option value="inactive">Inactive</option></select>' ; 
					$return = $return . 'Photos (YOU CAN NOT EDIT PHOTOS LATER) : <input type="file" required="" name="file1" id="file1" /><input type="file" name="file2" id="file2" /><input type="file" name="file3" id="file3" /><input type="file" name="file4" id="file4" /><input type="file" name="file5" id="file5" /><input type="file" name="file6" id="file6" /><input type="file" name="file7" id="file7" /><input type="file" name="file8" id="file8" /><input type="file" name="file9" id="file9" /><input type="file" name="file10" id="file10" />' ; 
					$return = $return . '<button type="submit" id="edititembtn" name="edititembtn" class="btn btn-primary">Save</button></div></form><div id="EditItemResponse" class="col-md-12"></div></div></div>' ; 
					return $return ; 
					
			return $return ; 
		}else{
					$NewItemQuery = mysql_query("INSERT INTO `shop_center` (`id`, `title`, `model`, `color`, `size`, `description`, `cat_id`, `price`, `delivery_time`, `photos`, `video`, `status`) VALUES (NULL, '$title', '$model', '$color', '$size', '$description', '$cat_id', '$price', '$delivery_time', '$photos', '$video', '$status'); ") ; 
		}

		
		return $requested_info ; 
	}


}

?>
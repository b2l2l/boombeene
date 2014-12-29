<?php


class Categories{
	
	
	function AddCategory($title,$parent = NULL){
		if($parent<>NULL){
			$AddCategoryQuery = mysql_query("INSERT INTO `categories` (`id`, `name`, `parents`) VALUES (NULL, '$title', '-$parent-|');") or die(mysql_error()); 
		}else{
			$AddCategoryQuery = mysql_query("INSERT INTO `categories` (`id`, `name`, `parents`) VALUES (NULL, '$title', NULL);") or die(mysql_error()); 
		}
	}
	
	
	function UpdateCategory($field,$new_value,$category){
		
		$update_query="UPDATE `categories` SET `$field` = '$new_value' WHERE `categories`.`id` = '$category' ;";
		$do_update_query=mysql_query($update_query);
		
	}
	
	function RemoveCategory($id){
		$remove_query = mysql_query("DELETE FROM `categories` WHERE `categories`.`id` = $id ;"); 
	}
		
	
}

?>
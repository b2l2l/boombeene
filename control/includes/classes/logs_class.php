<?php

class Logs{

	function Log($event){
		$ip = $_SERVER['REMOTE_ADDR'] ; 
		$user = $_SESSION['user'] ; 
		mysql_query("INSERT INTO `logs` (`id`, `event`, `date`) VALUES (NULL, '$ip - $user - CONTROL PANEL - $event', NOW()); ");
	}
	
	function GetLogs($text = NULL,$user = NULL,$date = NULL,$limit = 299){
		if(($text<>"") or ($user<>"")){
		$text = "AND `event` LIKE '%$user% %$text%'" ; 
		}
		
		if($date<>""){
		$date = "AND `date` LIKE '%$date%'" ; 
		}
		
		
		
		
		$GetLogsQuery = "SELECT * FROM `logs` WHERE (id <> '-7') $text $date ORDER BY `id` DESC LIMIT 0,$limit ;" ; 
		$DoGetLogsQuery = mysql_query($GetLogsQuery) ; 

		$return = '<table class="table table-striped"><thead><tr><th>#</th><th>Event</th><th>Date</th></tr></thead><tbody>' ; 
		while ($fetch_info= mysql_fetch_array($DoGetLogsQuery)) {
					$id = $fetch_info['id'] ;
					$event = $fetch_info['event'] ; 
					$date =  $fetch_info['date'] ; 
					$return = $return . '<tr><th>' . $id . '</th><th>' . $event . '</th><th>' . $date . '</th></tr>' ; 
		}
		
		return $return . '</tbody></table>' ; 
	
	}

}

?>
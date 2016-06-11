<?php
	function searchModel() {
		include "../database.inc.php";
	    
	    $select = '*';
	    $from = 'Model';

	    $user_query = "SELECT ".$select." FROM ".$from.";";

		$data = mysqli_query($link, $user_query); 

		$results = array();
		while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			$results[] = $row;
		}

		return $results;
	}
?>
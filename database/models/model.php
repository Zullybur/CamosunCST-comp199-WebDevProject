<?php
	function getModel($model_name){
		include "../../../database.inc.php";
	    
	    $select = '*';
	    $from = 'Model';
	    $where = $model_name;

	    $user_query = "SELECT ".$select." FROM ".$from." WHERE model_name =".$where;

		$data = mysqli_query($link, $user_query); 
		$result = mysqli_fetch_array($data);
		print_r($result);
		echo mysqli_error($link);
	}
	getModel("'Silver Fast'");
?>
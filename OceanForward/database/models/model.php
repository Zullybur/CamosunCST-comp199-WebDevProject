<?php
	function getModel($model_name){
		include "../database.inc.php";
	    
	    $select = '*';
	    $from = 'Model';
	    $where = $model_name;

	    $user_query = "SELECT ".$select." FROM ".$from." WHERE model_name ='".$where."';";

		#mysqli_select_db($link, "c199grp03DB");   
		$data = mysqli_query($link, $user_query); 
		#echo mysqli_error($link);
		$result = mysqli_fetch_array($data);
		#print_r($result);
		return $result;
	}
?>
<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
// Require database model for queries
(require $rootPath . 'public_html/OceanForward/database/model.php') or 
  exit("Unable to include 'model.php' from public_html/OceanForward/database/");

// Return an array of a specified model in the database
function getModel($model_name){
    $LinkID = dbConnect();

    $select = '*';
    $from = 'Model';
    $where = $model_name;

    $query = "SELECT ".$select." FROM ".$from." WHERE model_name ='".$where."';";

    $result = getQuery($LinkID, $query);

    dbClose($LinkID);

    return $result;
}
?>
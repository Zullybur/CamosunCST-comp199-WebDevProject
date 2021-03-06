<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
// Require database model for queries
(require $rootPath . 'public_html/OceanForward/database/model.php') or 
  exit("Unable to include 'model.php' from public_html/OceanForward/database/");

function getModelsArray() {
    $LinkID = dbConnect();

    $select = '*';
    $from = 'Model';

    $query = "SELECT ".$select." FROM ".$from.";";

	$resultsArray = getQuery($LinkID, $query); 

    dbClose($LinkID);

	return $resultsArray;
}
?>
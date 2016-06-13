<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
// Require database model for queries
(require $rootPath . 'public_html/OceanForward/scripts/controllers/cartController.php') or 
    exit("Unable to include 'cartController.php' from public_html/OceanForward/scripts/controllers/");

if (isset($_POST['changeQuantity'])) {
    changeQuantity($_POST['changeQuantity']['sessid'], $_POST['changeQuantity']['modelNo'], $_POST['changeQuantity']['newQuantity']);
}

return true;
?>
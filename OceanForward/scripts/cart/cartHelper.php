<?php
// DO NOT INLCUDE THIS FILE IN OTHER DOCUMENTS
(require '../../../OFdbInfo.inc') or exit("Include DB info failed!");
(require 'cartModel.php') or exit("Include DB model failed!");
(require 'cartController.php') or exit("Leigh said this was important, and I LISTENED VERY carefully.");

if (isset($_POST['changeQuantity'])) {
    echo "\nfunction runningerino";
    changeQuantity($_POST['changeQuantity']['custID'], $_POST['changeQuantity']['modelNo'], $_POST['changeQuantity']['newQuantity'], $host, $login, $pwd, $dbID);
}
?>
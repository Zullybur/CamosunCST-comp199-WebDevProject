<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
// Require database model for queries
(require $rootPath . 'public_html/OceanForward/database/model.php') or 
  exit("Unable to include 'model.php' from public_html/OceanForward/database/");
  
function deleteItem($sessid, $modelNo) {
    $LinkID = dbConnect();
    
    $insert = "DELETE FROM ShoppingCart WHERE sessid = '$sessid' AND Model_model_no = $modelNo";
    sendQuery($LinkID, $insert);
    
    dbClose($LinkID);
}

function deleteAll($sessid) {
    $LinkID = dbConnect();
    
    $insert = "DELETE FROM ShoppingCart WHERE sessid = '$sessid'";
    sendQuery($LinkID, $insert);
    
    dbClose($LinkID);
}

function changeQuantity($sessid, $modelNo, $updatedQuantity) {
    $LinkID = dbConnect();

    $change = "UPDATE ShoppingCart SET quantity = $updatedQuantity WHERE sessid = '$sessid' AND Model_model_no = $modelNo";
    sendQuery($LinkID, $change);

    dbClose($LinkID);
}

function insertItem($sessid, $modelNo) {
    $LinkID = dbConnect();
    //do a query to check if the KVP(sid+modelno) already exists
    //result array 0 should be ok
    $checkQuantity = "SELECT COUNT(*) FROM ShoppingCart WHERE sessid = '$sessid' AND Model_model_no = $modelNo;";
    $qtyArray = getQuery($LinkID, $checkQuantity);
    echo $checkQuantity;
    //if theres nothing in the query result then do the insert
    if($qtyArray[0]['COUNT(*)'] == 0){
        $insert = "INSERT INTO ShoppingCart (sessid, Model_model_no, quantity) ".
        "VALUES ('" . $sessid . "', " . $modelNo . ", 1)";
        sendQuery($LinkID, $insert);
    }
    dbClose($LinkID);
}

function getCartItems($sessid) {
    // Get data from Model
    $LinkID = dbConnect();

    $queryString = 'SELECT m.brand, m.model_no, m.model_name, m.price, s.sessid, s.quantity '.
    'FROM ShoppingCart s, Model m '.
    'WHERE s.Model_model_no = m.model_no '.
    "AND s.sessid = '$sessid'";

    $resultArray = getQuery($LinkID, $queryString);

    dbClose($LinkID);

    // Create object from result data IF IT WOULD FUCKING WORK
    // foreach ($resultArray as $result => $array) {
    //     echo "DEBUG:\n<pre>\n<code>\n"; print_r($array); echo "\n</code>\n</pre>\n:END DEBUG\n";
    //     $cartItem = new CartItem($array['customer_id'], $array['brand'],
    //                              $array['first_name'].$array['last_name'],
    //                              $array['model_no'], $array['model_name'], 
    //                              $array['price'], $array['quantity']);
    // //     $cartItem = new CartItem();
    //     $string = $cartItem;
    //     echo "\nCart Output: $string\n";
    // }
    return $resultArray;
}
?>
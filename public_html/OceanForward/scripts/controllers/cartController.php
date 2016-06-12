<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
// Require database model for queries
(require $rootPath . 'public_html/OceanForward/database/model.php') or 
  exit("Unable to include 'model.php' from public_html/OceanForward/database/");
  
function deleteItem($custID, $modelNo) {
    $LinkID = dbConnect();
    
    $insert = "DELETE FROM ShoppingCart WHERE Customers_customer_id = $custID AND Model_model_no = $modelNo";
    sendQuery($LinkID, $insert);
    
    dbClose($LinkID);
}

function deleteAll($custID) {
    $LinkID = dbConnect();
    
    $insert = "DELETE FROM ShoppingCart WHERE Customers_customer_id = $custID";
    sendQuery($LinkID, $insert);
    
    dbClose($LinkID);
}

function changeQuantity($custID, $modelNo, $updatedQuantity) {
    $LinkID = dbConnect();

    $change = "UPDATE ShoppingCart SET quantity = $updatedQuantity WHERE Customers_customer_id = $custID AND Model_model_no = $modelNo";
    sendQuery($LinkID, $change);

    dbClose($LinkID);
}

function insertItem($custID, $modelNo) {
    $LinkID = dbConnect();
    //do a query to check if the KVP(custid+modelno) already exists
    //result array 0 should be ok
    $checkQuantity = 'SELECT COUNT(*) FROM ShoppingCart WHERE Customers_customer_id='.strval($custID).' AND Model_model_no='.strval($modelNo);
    $qtyArray = getQuery($LinkID, $checkQuantity);
    // print_r($qtyArray);
    if($qtyArray[0]['COUNT(*)'] == 0){
        //if theres nothing in the query result then do the insert
        // echo "QtyArray[0] = 0";
        $insert = "INSERT INTO ShoppingCart (Customers_customer_id, Model_model_no, quantity) ".
        "VALUES (" . $custID . ", " . $modelNo . ", 1)";
        sendQuery($LinkID, $insert);
    }
    dbClose($LinkID);
}

function getCartItems($customerID = '1') {
    // Get data from Model
    $LinkID = dbConnect();

    $queryString = 'SELECT c.customer_id, m.brand, c.first_name, '.
    'c.last_name, m.model_no, m.model_name, m.price, s.quantity '.
    'FROM ShoppingCart s, Model m, Customers c '.
    'WHERE s.Customers_customer_id = c.customer_id '.
    'AND s.Model_model_no = m.model_no '.
    'AND s.Customers_customer_id = '."$customerID";

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
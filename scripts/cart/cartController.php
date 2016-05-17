<?php
// Error codes for tracking
$error1052 = "<html><body>An error has occured: 1052<br>\n".
             "We're sorry, if this problem persists, please <a href=\"contact.php\">contact us</a><br>\n".
             "<a href=\"index.html\">back to home</a></body></html>";
$error1057 = "<html><body>An error has occured: 1057<br>\n".
             "We're sorry, if this problem persists, please <a href=\"contact.php\">contact us</a><br>\n".
             "<a href=\"index.html\">back to home</a></body></html>";
// Require files for cart operations
(require 'scripts/cart/cartModel.php') or exit($error1052);
(require 'scripts/cart/CartItem.php') or exit($error1067);

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
    //     $cartItem = new CartItem();
    //     $string = $cartItem->getCustomerName();
    //     echo "\nCart Output: $string\n";
    // }
    return $resultArray;
}
?>
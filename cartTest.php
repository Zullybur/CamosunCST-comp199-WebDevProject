<?php
echo "<html>\n<body>";
// Error codes for tracking
$error1052 = "<html><body>An error has occured: 1049<br>\n".
             "We're sorry, if this problem persists, please <a href=\"contact.php\">contact us</a><br>\n".
             "<a href=\"index.html\">back to home</a></body></html>";
// Require files for cart operations
(require 'scripts/cart/cartController.php') or exit($error1049);

getCartItems();

foreach ($resultArray as $result => $array) {
    // $array['customer_id']
    // $array['brand']
    // $array['first_name']
    // $array['last_name']
    // $array['model_no']
    // $array['model_name']
    // $array['price']
    // $array['quantity']
}

echo "</body>\n</html>";
?>
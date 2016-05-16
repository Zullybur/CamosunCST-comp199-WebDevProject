<?php
echo "<html>\n<body>";
// Error codes for tracking
$error1052 = "<html><body>An error has occured: 1052<br>\n".
             "We're sorry, if this problem persists, please <a href=\"contact.php\">contact us</a><br>\n".
             "<a href=\"index.html\">back to home</a></body></html>";
$error1057 = "<html><body>An error has occured: 1057<br>\n".
             "We're sorry, if this problem persists, please <a href=\"contact.php\">contact us</a><br>\n".
             "<a href=\"index.html\">back to home</a></body></html>";
// Require files for cart operations
(require 'scripts/cart/cartModel.php') or exit($error1052);
(require 'scripts/cart/cartItem.php') or exit($error1067);
$LinkID = dbConnect();
// TODO: Connect to user account!
$customerID = "1";
$queryString = 'SELECT c.first_name, c.last_name, m.model_no, m.model_name, m.price, s.quantity '.
               'FROM ShoppingCart s, Model m, Customers c '.
               'WHERE s.Customers_customer_id = c.customer_id '.
               'AND s.Model_model_no = m.model_no '.
               'AND s.Customers_customer_id = '."$customerID";
$resultArray = getQuery($LinkID, $queryString);
dbClose($LinkID);

echo "DEBUG:\n<pre>\n<code>\n"; print_r($resultArray); ":END DEBUG\n<\code>\n<\pre>\n";
echo "</body>\n</html>";
?>
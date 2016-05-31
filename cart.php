<?php
// Get initial data from cart table to display
// Include file with database specific information or exit
(require '../OFdbInfo.inc') or exit("Unable to load server/database credentials.<br>\n");
// Require files for cart operations
(require 'scripts/cart/cartController.php') or exit("controller not found (1023)");
(require 'scripts/cart/cartModel.php') or exit($error1052);

// Add new item to cart if sent in GET
if (isset($_GET['addItem']) && $_GET['addItem'] == 'true'){
  insertItem($_GET["custID"], $_GET["modelNo"], $host, $login, $pwd, $dbID);
} else if (isset($_GET['delItem']) && $_GET['delItem'] == 'true') {
  deleteItem($_GET["custID"], $_GET["modelNo"], $host, $login, $pwd, $dbID);
} else if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 'true') {
  deleteAll($_GET["custID"], $host, $login, $pwd, $dbID);
}
$resultArray = getCartItems($host, $login, $pwd, $dbID);
//?custid=1&modelno=Athena 
//addToCart();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="scripts/cart/cartJQuery.js" type="text/javascript"></script>
    <script type="text/javascript">
      // Scripts here?
    </script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-left navigation">
            <li><a href="index.html" class="scroll">Home</a></li>
            <li><a href="catalog.php" class="scroll">Catalog</a></li>
            <li class="active"><a href="#" class="scroll">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <section>
      <div class="col-md-12">
        <div class="page-title">
          <img src="images/black-logo.png">
          <h1>Shopping Cart</h1>
          <img src="images/black-logo.png">
        </div>
      </div>
    </section>
    <!-- debug content -->
    <!-- <section>
      <div class="col-md-6 col-md-offset-3">
      <legend>DEBUG: GET DATA</legend>
      <?php
      echo "\n<pre>\n<code>\n"; print_r($_GET); echo "\n</pre>\n</code>\n";
      ?>
      </div>
      <div class="col-md-6 col-md-offset-3">
      <legend>DEBUG: POST DATA</legend>
      <?php
      echo "\n<pre>\n<code>\n"; print_r($_POST); echo "\n</pre>\n</code>\n";
      ?>
      </div>
      <div class="col-md-6 col-md-offset-3">
      <legend>DEBUG: ARRAY DATA</legend>
      <?php
      echo "\n<pre>\n<code>\n"; print_r($resultArray); echo "\n</pre>\n</code>\n";
      ?>
      </div>
    </section> -->
    <!-- Page Content -->
    <section>
      <div class="col-md-8 col-md-offset-2" style="display:table;">
        <label><h3>Your Shopping Cart</h3></label>
        <!--Form needs a php file to link to here -->
        <form name="cart" method="post" id="formbox">
            <table id="cartcontents">
			<!-- each individual yacht in the cart will be php-generated -->
<?php
  $subTotal = 0;
  if (!isset($resultArray)) {exit("Your shopping cart is empty.");}
  foreach ($resultArray as $result => $array){
    $subTotal += ($array['quantity'] * $array['price']);
    echo "\n<tr>\n".
    "<td><legend class=\"legend\">".$array['model_name']."</legend></td>\n".
    "</tr>\n".
    "<tr>\n<td>\n<ul>\n".
    // quantity
    "<li>Quantity: <input type=\"text\" name=\"quantity\" onchange=\"quantityChange();\" \n".
    "class=\"qtytxt\" id=\"qty-cust-".$array['customer_id']."-mod-".$array['model_no']."\" value=\"".$array['quantity']."\"> \n".
    // update
    "<a href=\"?\" id=\"upd-cust-".$array['customer_id']."-mod-".$array['model_no']."\" \n".
    "name=\"update\" onclick=\"quantityUpdate();\" class=\"updatedelete\">Update</a> | ".
    // delete
    "<a href=\"cart.php?delItem=true&custID=".$array['customer_id']."&modelNo=".$array['model_no']."\" id=\"del-cust-".$array['customer_id']."-mod-".$array['model_no']."\" \n".
    " name=\"delete\" class=\"updatedelete\">Delete</a></li>\n".
    "<li class=\"boatprice\">$".number_format($array['price'],2)."</li>\n".
    "<li>Sold by: </li>\n<li class=\"alignright\">$".number_format($array['price'],2)."\n".
    "</li>\n</ul>\n</td>\n</tr>\n";
  }
?>
    			  <!--end of php generated cart items -->
    			  <tr>
      				<td>
      					<legend class="legend"></legend>
              </td>
            </tr>
            <tr>
              <td>
    						<ul class="subtotal">
    							<li id="subtotal">Subtotal: $<?php echo number_format($subTotal, 2); ?></li><br>
    							<form>
									<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
										data-key="<?php echo $stripe['publishable_key']; ?>"
										data-description="Payment Checkout"
										data-amount="<?php echo number_format(($subTotal * 100), 2);; ?>"
										data-locale="auto">
									</script>
    								<input type="button" class="btn" id="checkout" onClick="#" value="Checkout">
    							</form> 
    							<li>
                    <?php echo "<a href=\"cart.php?deleteAll=true&custID=".$array['customer_id']."\" id=\"deleteAll\" class=\"updatedelete\">Delete All</a>"; ?>
    							</li>
    						</ul>
    				  </td>
            </tr>
          </table>
        </form>
      </div>
    </section>
    <footer class="footer OF-footer">
      <div class="row">
        <div class="col-md-3 col-md-offset-2">
          <ul>
            <li class="footer-title">Site Map</li>
            <li><a href="index.html">Home</a></li>
            <li><a href="catalog.html">Catalog</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <ul>
            <li class="footer-title">My Account</li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">My Returns</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul>
            <li class="footer-title">Misc</li>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Legal</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 copy copy_top">
          &copy; 2016 Ocean Forward Inc. Victoria BC CANADA
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 copy copy_bottom">
          This site is for academic purposes only
        </div>
      </div>
    </footer>
  </body>
</html>
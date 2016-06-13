<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../";
}

(require $rootPath . 'public_html/OceanForward/scripts/controllers/cartController.php') or 
  exit("Unable to include 'cartController.php' from public_html/OceanForward/scripts/controllers/");

(require $rootPath . 'OFstripeConfig.inc') or 
  exit("Unable to include 'OFstripeConfig.inc' from root");

// Add new item to cart if sent in GET
if (isset($_GET['addItem']) && $_GET['addItem'] == 'true'){
  insertItem($_GET["custID"], $_GET["modelNo"], $host, $login, $pwd, $dbID);
} else if (isset($_GET['delItem']) && $_GET['delItem'] == 'true') {
  deleteItem($_GET["custID"], $_GET["modelNo"], $host, $login, $pwd, $dbID);
} else if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 'true') {
  deleteAll($_GET["custID"], $host, $login, $pwd, $dbID);
}

$resultArray = getCartItems();
//?custid=1&modelno=Athena
//addToCart();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/default.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <link href="../css/cart.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="../scripts/cart/cartJQuery.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="wrapper">
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
              <li><a href="../index.html" class="scroll">Home</a></li>
              <li><a href="catalog.php" class="scroll">Catalog</a></li>
              <li><a href="contact.php" class="scroll">Contact</a></li>
            </ul>
            <!-- <a href="#" class="shopping_cart glyphicon glyphicon-log-in" title="Log in">
            </a> -->
            <a href="cart.php" class="shopping_cart glyphicon glyphicon-shopping-cart" title="Shopping Cart">
            </a>
          </div>
        </div>
      </nav>
      <!-- Page Header -->
      <section>
        <div class="col-md-12">
          <div class="page-title">
            <img src="../images/black-logo.png">
            <h1>Shopping Cart</h1>
            <img src="../images/black-logo.png">
          </div>
        </div>
      </section>
      <!-- debug content -->
      <!-- <section>
        <div class="col-md-6 col-md-offset-3">
        <legend>DEBUG: GET DATA</legend>
        <?php
        #echo "\n<pre>\n<code>\n"; print_r($_GET); echo "\n</pre>\n</code>\n";
        ?>
        </div>
        <div class="col-md-6 col-md-offset-3">
        <legend>DEBUG: POST DATA</legend>
        <?php
        #echo "\n<pre>\n<code>\n"; print_r($_POST); echo "\n</pre>\n</code>\n";
        ?>
        </div>
        <div class="col-md-6 col-md-offset-3">
        <legend>DEBUG: ARRAY DATA</legend>
        <?php
        #echo "\n<pre>\n<code>\n"; print_r($resultArray); echo "\n</pre>\n</code>\n";
        ?>
        </div>
      </section> -->
      <!-- Page Content -->
      <section>
        <div class="col-md-8 col-md-offset-2" style="display:table;">
          <label><h3>Your Shopping Cart</h3></label>
          <!--Form needs a php file to link to here -->
          <form action="../scripts/cart/charge.php" method="post">
              <table id="cartcontents">
  			<!-- each individual yacht in the cart will be php-generated -->
  <?php
    $subTotal = 0;
    $showCart = true;
    if (!isset($resultArray)) {
      $showCart = false;
      echo "Your shopping cart is empty.";
    } 
    if ($showCart) {
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
        "<li class=\"alignright\">$".number_format(($array['price'] * $array['quantity']),2)."\n".
        "</li>\n</ul>\n</td>\n</tr>\n";
      }
    }
  ?>
      			  <!--end of php generated cart items -->
      			  <tr>
        				<td>
        					<legend class="legend"></legend>
                </td>
              </tr>
              <?php if ($showCart): ?>
              <tr>
                <td>
      						<ul class="subtotal">
      							<li id="subtotal">Subtotal: $<?php echo number_format($subTotal, 2); ?></li><br>
    									<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    										data-key="<?php echo $stripe['publishable_key']; ?>"
    										data-description="Payment Checkout"
    										data-amount="<?php $payTotal = $subTotal * 1; echo "$payTotal"; ?>"
    										data-locale="auto">
    									</script>
                      <input type="hidden" id="stripeAmount" name="stripeAmount" value="<?php echo "$payTotal" ?>">
      							<li>
                      <a href="cart.php?deleteAll=true&amp;custID=<?php echo $array['customer_id'] ?>" id="deleteAll" class="updatedelete">Delete All</a>
      							</li>
      						</ul>
      				  </td>
              </tr>
              <?php endif ?>
            </table>
          </form>
        </div>
      </section>
    </div>
    <footer class="footer OF-footer">
      <div class="row">
        <div class="col-md-3 col-md-offset-2">
          <ul>
            <li class="footer-title">Site Map</li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="catalog.php">Catalog</a></li>
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

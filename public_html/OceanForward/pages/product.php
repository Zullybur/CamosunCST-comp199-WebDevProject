<?php
// start session
session_start();
// Capture previous session ID if available, otherwise save current session ID as cookie
if(isset($_COOKIE['PHPSESSID'])) {
  session_id($_COOKIE['PHPSESSID']);
}
// re-set cookie to maintain session ID
setcookie('PHPSESSID', session_id(), time() + 60*60*24*30);

// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../";
}

(require $rootPath . 'public_html/OceanForward/scripts/controllers/productController.php') or 
  exit("Unable to include 'productController.php' from public_html/OceanForward/scripts/controllers/");

$modelName = $_GET["model"];
$modelArr = getModel($modelName)[0];
// echo "DEBUG:<code><pre><br>\n"; print_r($modelArr); echo "END DEBUG</pre></code>";
$string = str_replace(' ', '', $modelName);
$folderLoc = "../images/product_database_images/" . $string . "/";
#custid=1& modelno=$array[1] &1
$addCartGet = "cart.php?addItem=true&modelNo=".strval($modelArr['model_no']);
//echo $addCartGet; //?custid=1&modelno=Athena cart.php?custid=1&modelno=2
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/default.css" rel="stylesheet">
	  <link href="../css/product.css" rel="stylesheet">
 </head>
  <body>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-left navigation">
            <li><a href="../index.html" class="scroll">Home</a></li>
            <li><a href="catalog.php" class="scroll">Catalog</a></li>
            <li><a href="contact.php" class="scroll">Contact</a></li>
            <li class="active"><a href="#" class="scroll"><?php echo $modelArr['model_name']; ?></a></li>
          </ul>
          <!-- <a href="#" class="shopping_cart glyphicon glyphicon-log-in" title="Log in">
          </a> -->
          <a href="cart.php" class="shopping_cart glyphicon glyphicon-shopping-cart" title="Shopping Cart">
          </a>
        </div>
      </div>
    </nav>
    <section>
      <div class="container products col-md-12" style="background:url(<?php print_r($folderLoc."1.jpg") ?>)no-repeat scroll 0px / cover rgba(104, 100, 147, 0.8);">
        <div class="page-title">
          <h1><?php echo $modelArr['model_name']; ?></h1>
          <img src="../images/logo-white.png">
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="prodName"><?php print_r($modelArr['model_name']); ?></h2>
            <p class="abouttext">
              <?php print_r($modelArr['description']); ?>
            </p>
          </div>
          <div class="col-md-4">
            <h2 class="subtitle">Asking Price</h2>
			<!-- TESTING HERE -->
            <p><?php print_r("$".number_format($modelArr['price'],2)); ?></p>
          </div>
          <div class="col-md-4">
            <h2 class="subtitle">Length</h2>
            <p><?php print_r($modelArr['length']." ft"); ?></p>
          </div>
        	<div class="col-md-4">
            <h2 class="subtitle">Brand</h2>
            <p><?php print_r($modelArr['brand']); ?></p>
          </div>
        	<div class="col-md-4">
            <h2 class="subtitle">Year Built</h2>
            <p><?php print_r($modelArr['year_built']); ?></p>
          </div>
        	<div class="col-md-4">
            <h2 class="subtitle">Beds &amp; Baths</h2>
            <p><?php print_r("Beds: ".$modelArr['beds'].", Baths: ".$modelArr['baths']); ?></p>
          </div>
        	<div class="col-md-4">
            <h2 class="subtitle">Displacement</h2>
            <p><?php print_r(number_format($modelArr['year_built'])." tonnes"); ?></p>
          </div>
			<div class="col-md-4">
            <h2 class="subtitle">Draft</h2>
            <p><?php print_r($modelArr['draft']." ft"); ?></p>
          </div>
			<div class="col-md-4">
            <h2 class="subtitle">Class</h2>
            <p><?php print_r($modelArr['class']); ?></p>
          </div>
		  	<div class="col-md-4">
            <h2 class="subtitle">Cruising Speed</h2>
            <p><?php print_r($modelArr['cruising_speed']." knots"); ?></p>
          </div>
            <div class="col-lg-1 col-lg-offset-10">
              <input type="button" class="btn" onClick="parent.location='<?php print_r($addCartGet); ?>'" value="Add to Cart">
            </div>
        	<div class="col-md-12">
              <h2 class="subtitle">Gallery</h2>
        	</div>
        	<div id="carousel" class="col-md-12">
        		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
        			<ol class="carousel-indicators">
        				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        				<li data-target="#myCarousel" data-slide-to="1"></li>
        				<li data-target="#myCarousel" data-slide-to="2"></li>
        				<li data-target="#myCarousel" data-slide-to="3"></li>
        				<li data-target="#myCarousel" data-slide-to="4"></li>
        			</ol>
        			<!-- Wrapper for slides -->
        			<div class="carousel-inner" role="listbox">
        				<div class="item active">
        					<img src="<?php print_r($folderLoc."1.jpg") ?>" alt="Boat">
        				</div>
        				<div class="item">
        					<img src="<?php print_r($folderLoc."2.jpg") ?>" alt="Boat2">
        				</div>
        				<div class="item">
        					<img src="<?php print_r($folderLoc."3.jpg") ?>" alt="Boat3">
        				</div>
        				<div class="item">
        					<img src="<?php print_r($folderLoc."4.jpg") ?>" alt="Boat3">
        				</div>
        				<div class="item">
        					<img src="<?php print_r($folderLoc."5.jpg") ?>" alt="Boat3">
        				</div>
        			</div>
        			<!-- Left and right carousel controls -->
        			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        				<span class="sr-only">Previous</span>
        			</a>
        			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        				<span class="sr-only">Next</span>
        			</a>
        		</div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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

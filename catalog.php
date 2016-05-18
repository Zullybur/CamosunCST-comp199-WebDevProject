<?php
	include "database/models/model.php";
	$modelName = $_GET["model"];
	$modelArr = getModel($modelName);
	$size = sizeof($modelArr);
	$string = str_replace(' ', '', $modelName);
	$folderLoc = "images/product_database_images/" . $string . "/";
	#custid=1& modelno=$array[1] &1 
	$addCartGet = "cart.php?custid=1&modelno=".strval($modelArr[0]);
	echo $addCartGet; //?custid=1&modelno=Athena cart.php?custid=1&modelno=2 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalog</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="css/catalog.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">                            
        <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-left navigation">
            <li><a href="index.html" class="scroll">Home</a></li>
            <li class="active"><a href="#" class="scroll">Catalog</a></li>
            <li><a href="#" class="scroll">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <section>
      <div class="container products col-md-12">
        <div class="page-title">
          <h1>Yachts</h1>
          <img src="images/logo.png">
        </div>
      </div>
    </section>
    <!-- Filter -->
    <section>
      <div class="container col-md-12" id="filter">
        <div class="filter-title">
          <h3>Yacht Search</h3>
        </div>
        <div class="filter-body styled-select">
          <div class="row">
            <div class="col-md-4 dropdown">
              <label>Name:</label>
              <select>
                <option>Big mama</option>
                <option>Biga mama 2</option>
              </select>
              <label>Currency:</label>
              <select>
                <option>Us</option>
                <option>Euro</option>
              </select>
              <label>Built:</label> 
              <select>
                <option>2017</option>
                <option>2016</option>
              </select>
            </div>
            <div class="col-md-4 dropdown">
              <label>Shipyard:</label>
              <select>
                <option>Greece</option>
                <option>Italy</option>
              </select>
              <label>Guests:</label>
              <select>
                <option>20+</option>
                <option>50+</option>
              </select>
              <label>New/Used:</label>
              <select>
                <option>New</option>
                <option>Used</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="yacht-type" id="radio">
                <label>Type:</label>
                <label for="all" class="radio-mar">All</label>
                <input type="radio" name="type" value="all" checked> 
                <label class="radio-mar">Motor</label>
                <input type="radio" name="type" value="motor"> 
                <label class="radio-mar">Sailing</label>
                <input type="radio" name="type" value="sailing"> 
              </div>
              <div class="slider"> 
                <label>Price:</label>
                <input type="range"  min="0" max="100" value="0"/>
                <label>Length</label>
                <input type="range"  min="0" max="100" value="0"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Catalog Items -->
	<section>
      <div class="container">
        <div class="row new-section">
        <?php
        	for(i = 0; i < size; i++) {
	        	echo"<div class="col-md-4 contain">
	            <div class="product-thumb1">
	            </div>
	            <div class="content-thumb">";
	              print_r("<h4>".$modelArr[1]."</h4>");
	              print_r("<h5>Price:".$modelArr[4]."</h5>");
	              print_r("<h6>Length:".$modelArr[2]."</h6>");
	    			//<FORM>
					// <INPUT TYPE="button" class="btn" onClick="parent.location='product.php?model=Athena'" value="More">
				 //</FORM> 
	          echo"</div>
	          </div>";
        	}
          ?>
        </div>
      </div>
    </section>
    <footer class="footer OF-footer">
      <div class="row">
        <div class="col-md-3 col-md-offset-2">
          <ul>
            <li class="footer-title">Site Map</li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Catalog</a></li>
            <li><a href="contact.html">Contact</a></li>
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
            <li class="footer-title">Contact</li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

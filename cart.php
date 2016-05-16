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
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
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
            <li><a href="catalog.html" class="scroll">Catalog</a></li>
            <li class="active"><a href="#" class="scroll">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <section>
      <div class="container header-image col-md-12">
        <div class="page-title">
          <h1>Cart</h1>
          <img src="images/logo.png">
        </div>
      </div>
    </section>
    <!-- Page Content -->
    <section>
      <div class="col-md-8 col-md-offset-2" style="display:table;">
        <label><h3>Your Shopping Cart</h3></label>
        <!--Form needs a php file to link to here -->
        <form name="cart" method="post" id="formbox">
            <table border="1">
                <tr>
                <td>
			<ul>
              <li class="boatname">Name of boat</li>
              <li>Quantity: <input type="text" name="quantity" id="qtytxt">
                <a href="#" class="updatedelete">Update | </a>
                <a href="#" class="updatedelete">Delete</a>
              </li>
              <li>Price of individual boat</li>
            </ul>
                </td>
                <td class="alignright">another thing</td>
                <tr>
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
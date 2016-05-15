<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
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
          <h1>Contact</h1>
          <img src="images/logo.png">
        </div>
      </div>
    </section>
    <!-- Page Content -->
    <section>
      <div class="container col-md-12">
        <h1 class="main-page-content-title">Contact Us</h1>
        <div class="col-lg-8 col-lg-offset-2">
          <span class="main-page-content">
            <p>We would love to hear from you!</p>
            <p>Please contact us using one of the methods listed below, or fill out the contact form and we will contact you.</p>
          </span>
          <legend><h3>Contact Information</h3></legend>
          <div class="col-md-6">
            <div class="row">
              <span class="contact_header">Direct Contact</span>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-1">
                Email:
              </div>
              <div class="col-sm-8">
                <a href="mailto:info@oceanforward.com">info@oceanforward.com</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-1">
                Phone:
              </div>
              <div class="col-sm-8">
                <a href="tel:+1-250-889-4846">1-250-889-4846</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-1">
                Fax:
              </div>
              <div class="col-sm-8">
                1-250-889-4847
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <span class="contact_header">Mailing Address</span>
            </div>
            <div class="row">
              <ul>
                <li>1036 Burrad St. Unit 1562</li>
                <li>Vancouver&nbsp;BC&nbsp;&nbsp;V6E 3T1</li>
                <li>CANADA</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="col-md-8 col-md-offset-2">
        <!-- Success Message -->
        <div class="alert alert-success alert-dismissible alert_box" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          <span class="sr-only">Success:</span>Your email has been sent!
        </div>
        <!-- Email Error -->
        <div class="alert alert-danger alert-dismissible alert_box" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>Enter a valid email address.
        </div>
        <!-- Email Submission Error -->
        <div class="alert alert-danger alert-dismissible alert_box" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>We were unable to send your email, please try again.
        </div>
      </div>
    </section>
    <!-- Contact Form -->
    <section>
      <div class="col-md-8 col-md-offset-2">
        <label><h3>Contact Form</h3></label>
        <form name="email_template" method="post" id="formbox" action="script/contact_form.php">
          <legend>Personal Information</legend>
          <div class="row top_row">
            <div class="col-sm-2">
              <label>First Name:</label>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form_element_lrg" name="firstname" required id="firstname" placeholder="First Name" />
            </div>
            <div class="col-sm-2 col-sm-offset-2">
              <label>Last Name:</label>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form_element_lrg" name="lastname" required id="lastname" placeholder="Last Name" />
            </div>
          </div>
          <div class="row bottom_row">
            <div class="col-sm-2">
              <label>Email:</label>
              </div>
            <div class="col-sm-3">
              <input type="text" class="form_element_lrg" name="email" required id="email" placeholder="example@email.com" />
            </div>
            <div class="col-sm-2 col-sm-offset-2">
              <label>Phone #:</label>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form_element_lrg" name="phonenumber" id="phonenumber" pattern="[1-9]{3}[ -]{0,1}\d{3}[ -]{0,1}\d{4}" placeholder="999-999-9999" />
            </div>
          </div>
          <legend>Preferred contact method</legend>
          <div class="row bottom_row">
            <div class="col-sm-3 col-sm-offest-1 radio_label">
              <label>Email:</label>
            </div>
            <div class="col-sm-1">
              <input type="radio" name="contact_method" value="email" class="contact_method" />
            </div>
            <div class="col-sm-3 col-sm-offset-2 radio_label">
              <label>Phone:</label>
            </div>
            <div class="col-sm-1">
              <input type="radio" name="contact_method" value="phone" class="contact_method" />
            </div>
          </div>
          <legend>Message</legend>
          <div class="row bottom_row">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" class="form_element_lrg big_message_box" required name="message">
            </div>
          </div>
          <legend></legend>
          <div class="row form_bottom">
            <div class="col-md-3 col-md-offset-2">
              <input type="button" class="button" value="Clear" />
            </div>
            <div class="col-md-3 col-md-offset-2">
              <input type="button" class="button submit" value="Submit" />
            </div>
          </div>
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
            <li><a href="#">Contact</a></li>
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
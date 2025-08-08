<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Superb Maid</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>


li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #000000;
  min-width: 260px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #13287e;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>
    <!-- ################# Header Starts Here#######################--->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 left-item">
                        <ul>
                            <li><i class="fas fa-envelope-square"></i> admin@themaid.com</li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block right-item">
                       <ul>
                            
                            <li><i class="fas fa-phone-square"></i> +91-9909374708 | 7984435952</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 nav-img">
                        <img src="assets/images/logo4.png" alt="" >
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="client_view_services.php">Services</a></li>
		        <?php
			if(isset($_SESSION['clientid']))
			{
				?>
				 <li><a href="client_complain.php">Complain</a></li>
				 <li class="dropdown">
							<a href="javascript:void(0)" class=" dropbtn">View</a>
							<div class="dropdown-content">
								<a href="client_view_booking.php">View Booking</a>
								<a href="client_view_complain.php">View Complain Status</a>
								
							</div>
						</li>
				<?php
			}else{
		        ?>
                            <li><a href="login.php">Login</a></li>
                      <?php
			}
		  ?>      
                            
		        <?php
		        if(isset($_SESSION['clientid']))
			{
				?>
				<li><a href="logout.php">Logout</a></li>
				<?php
			}else{
				?>
				<li><a href="contactus.php">Contact Us</a></li>
				<?php
			}
		  ?>      
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </header>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Adhuna Theater Bangladesh</title>
    <meta name="keywords" content="Adhuna Theater" >
    <meta name="description" content="Adhuna Theater">
    <meta name="author" content="SOFT PRO IT">
	
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/front/images/favicon.png"/>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="/front/css/packages.min.css">
    <link rel="stylesheet" type="text/css" href="/front/css/default.css">
</head>
<body class="sticky-menu">
    <div id="loader">
        <div class="loader-ring">
          <div class="loader-ring-light"></div>
          <div class="loader-ring-track"></div>
        </div>
    </div>
    <div class="wrapper">


 <header id="header" class="menu-top-left">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-4">
                <a href="/" id="logo" title="Adhuna" class="logo-image" data-bg-image="/front/images/logo.png">Adhuna Logo
                </a>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-8 phl0">
                
				<div class="hidden-xs hidden-sm"> <!-- Hidden in Mobile -->
				<div class="header_author">
                    <a href="/">Home</a>
                    
                </div>
                <div class="header_ticket">
                    <a href="#">Members</a>
                </div>
				</div>
                
                <div class="button_container" id="toggle">
                     <span class="top"></span>
                     <span class="middle"></span>
                     <span class="bottom"></span>
                </div>
<div class="overlay" id="overlay">
<a href="#" class="close-window"></a>
  <nav class="overlay-menu">
    <ul >
        <li ><a href="index.html">Home</a></li>
        <li><a href="#">Members</a></li>
        <li><a href="#">Notice Board</a></li>
        <li><a href="#">Media & Publications</a></li>
		<li><a href="#">Video Gllery</a></li>
		<li><a href="#">Image Gllery</a></li>
    </ul>
  </nav>
</div>            </div>
        </div>
    </div>
</header>
  <?php echo $this->fetch('content'); ?>  

</section>
    <footer id="footer">
        <div class="container footer-container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Menu</h5>
                        <ul class="menu">
                            <li ><a href="index.html">Home</a></li>
                            <li><a href="#">Members</a></li>
                            <li><a href="#">Notice Board</a></li>
                            <li><a href="#">Media & Publications</a></li>
		                    <li><a href="#">Video Gllery</a></li>
		                    <li><a href="#">Image Gllery</a></li>
                        </ul>
                    </div>
                   </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Address information</h5>
                        <p>
                            Comilla,Bangladesh<br>
                            Street 26, Distritc 543 #108
                         </p> 
                         <p>
                            <i class="fa fa-mail"></i>info@adhuna.org<br>
                            <i class="fa fa-phone"></i> + 8801670814387
                         </p> 
                    </div>
					 <div class="widget">
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="widget">
                    <h5 class="widget-title">Leave a message</h5>
                        <form class="contact_form transparent">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" class="inputValidation" name="name" placeholder="Name *">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="inputValidation" name="email" placeholder="Email *">
                                </div>
                                <div class="col-sm-12 ">
                                    <textarea class="inputValidation" placeholder="Message *"></textarea>
                                    <button type="submit" class="button fill rectangle">Send to us</button>
                                </div>
                            </div>
                        </form>
                        <div class="errorMessage"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row copyright-text">
                    <div class="col-sm-12 col-md-6">
                        <p class="mv3 mvt0 text-left">&copy; Copyrights 2017 Adhuna. All rights reserved</p>
                    </div>
					<div class="col-sm-12 col-md-6">
                        <p class="mv3 mvt0 text-right">Design & Developed by: <a href="#">SOFT PRO IT</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- Overlay Search -->
    <div id="overlay-search">
        <form method="get" action="./">
            <input type="text" name="s" placeholder="Search..." autocomplete="off">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
        <a href="#" class="close-window"></a>
    </div>
    <div id="order">
        <div class="container">
            <div class="row order-content">
                <div class="col-sm-8 col-xs-12 seat_content ph0">
                    <h2>order a ticket</h2>
                    <div class="entry-order-content">
                        <form id="msform" name="msform">
                            <!-- fieldsets -->
                            <fieldset>
                                 <div class="wpc-content">
                                    <h3>location</h3>
                                    <select name="location">
                                        <option>Adhuna Cinema Tysons corner</option>
                                        <option>Adhuna Cinema </option>
                                        <option>Adhuna Cinema corner</option>
                                        <option>Adhuna Cinema Tysons</option>
                                    </select>
                                    <h3 class="mt3">Movie</h3>
                                    <select>
                                        <option>Dead pool</option>
                                        <option>THE BATTLE OF ALGIERS (DI ALGERI)</option>
                                        <option>LORD OF THE RINGS: THE RETURN OF THE KINGS</option>
                                        <option>Adhuna Cinema Tysons corner</option>
                                    </select>
                                    <h3 class="mt3">Date</h3>
                                    <input type='date' class="datetime"/>
                                    <h3 class="mt3">TIME</h3>
                                    <ul class="order-date">
                                        <li><a href="#"><i>11:50</i></a></li>
                                        <li><a href="#"><i>13:40</i></a></li>
                                        <li><a href="#"><i>16:35</i></a></li>
                                        <li><a href="#"><i>17:30</i></a></li>
                                        <li><a href="#"><i>19:50</i></a></li>
                                        <li><a href="#"><i>21:10</i></a></li>
                                    </ul>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset class="seat-content">
                                <div class="wpc-content">
                                    <h3 class="seat_title">seat</h3>
                                    <div id="seat-map"></div>
                                    <div id="legend"></div>
                                </div>
                                <input type="button" name="previous" class="action-button previous" value="Previous" />
                                <input type="submit" name="submit" class="submit action-button" value="Submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                    <h2>Your Information</h2>
                    <div class="order-details">
                        <span> Location:</span><p id="locationp">Adhuna Cinema Tysons corner</p>
                        <span>Time:</span>  <p>2016.3.8 18:30</p>
                        <span>Seat: </span>
                        <ul id="selected-seats"></ul>
                        <div>Tickets: <span id="counter">0</span></div>
                        <div>Total: <b>$<span id="total">0</span></b></div>
                    </div>
                    <a href="#" class="close-window"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Scripts -->
    <script type="text/javascript" src="/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/front/js/packages.min.js"></script>
    <script type="text/javascript" src="/front/js/scripts.min.js"></script>
<!-- jQuery easing plugin -->
</body>
</html> 
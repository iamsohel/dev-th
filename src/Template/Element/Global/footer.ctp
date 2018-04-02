 <footer id="footer">
        <div class="container footer-container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Menu</h5>
                        <ul class="menu">
                            <li ><a href="/">Home</a></li>
                            <li><a href="/members">Members</a></li>
                            <li><a href="#">Latest Events</a></li>
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
                        <p class="mv3 mvt0 text-left">&copy; Copyrights <?php echo date('Y');?> Adhuna. All rights reserved</p>
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
    
	
<!-- Member Modals -->
	<!-- Include jQuery and Scripts -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/packages.min.js"></script>
    <script type="text/javascript" src="/js/scripts.min.js"></script>
<!-- jQuery easing plugin -->

<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 1200
    })
  });
</script>

<script type="text/javascript">
function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>
</body>
</html> 
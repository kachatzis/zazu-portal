<?php  ?>


  	<!-- Footer -->

  	<footer class="footer">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-6">
  					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
  						<ul class="footer_nav">
  							<!--<li><a href="#">Blog</a></li>
  							<li><a href="#">FAQs</a></li>-->
  							<!--<li><a href="/contact">Επικοινωνία</a></li>-->
                <li><a href="http://kotoulasenergy.gr/">Αρχική Σελίδα</a></li>
                <li><a href="/contact">Επικοινωνία</a></li>
  						</ul>
  					</div>
  				</div>

  				<!--<div class="col-lg-6">
  					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
  						<ul>
  							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
  							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
  						</ul>
  					</div>
  				</div>-->

  			</div>
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="footer_nav_container">
  						<div class="cr">© <?php echo date('Y');?>  <?php echo $config['footer_title'];?></div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</footer>

  </div>

  <?php // Insert the specified scripts ?>

  <?php if(isset($page_include)&&$page_include=='index'){ ?>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/styles/bootstrap4/popper.js"></script>
    <script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/plugins/easing/easing.js"></script>

    <script src="/assets/js/custom.js"></script>
  <?php } ?>

  <?php if(isset($page_include)&&$page_include=='single'){ ?>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/styles/bootstrap4/popper.js"></script>
    <script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/plugins/easing/easing.js"></script>
    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="/assets/js/single_custom.js"></script>
  <?php } ?>

  <?php if(isset($page_include)&&$page_include=='contact'){ ?>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/styles/bootstrap4/popper.js"></script>
    <script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/plugins/easing/easing.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="/assets/js/contact_custom.js"></script>
  <?php } ?>

  <?php if(isset($page_include)&&$page_include=='categories'){ ?>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/styles/bootstrap4/popper.js"></script>
    <script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/plugins/easing/easing.js"></script>
    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="/assets/js/categories_custom.js"></script>
  <?php } ?>

  <?php if(isset($page_include)&&$page_include=='material'){ ?>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/styles/bootstrap4/popper.js"></script>
    <script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/plugins/easing/easing.js"></script>
    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="/assets/js/categories_custom.js"></script>
  <?php } ?>


  <?php  // Insert analytics if Tracking Id is set ?>

  <?php if ($config['analytics_tracking_id']&&$config['analytics_tracking_id']!=' ') { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $config['analytics_tracking_id']; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', "<?php echo $config['analytics_tracking_id']; ?>");
    </script>
    <!-- -->
  <?php } ?>
  

  </body>

  </html>

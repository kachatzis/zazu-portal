<?php



  function show_menu($restrict_login){

    include( 'Config.php' ); ?>


    <!-- Header -->

    <header class="header trans_300">
      

      <!-- Main Navigation -->

      <div class="main_nav_container">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-right">
              <div class="logo_container">
                <a href="http://kotoulasenergy.gr/"><?php //echo $config['nav_title']; ?><img src="/assets/images/logo.png"></a>
              </div>
              <nav class="navbar">
                <ul class="navbar_menu">
                  <li><a href="http://kotoulasenergy.gr/">ΑΡΧΙΚΗ</a></li>
                  <!--
                  <li><a href="/">ΑΡΧΙΚΗ</a></li>
                  <li><a href="/gifts">ΔΩΡΑ</a></li>
                  <li><a href="/levels">ΒΑΘΜΙΔΕΣ</a></li>
                  <li><a href="/contact">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
                  -->
                  <?php require_once 'utils/RestrictLogin.php'; ?>
                  <?php if($restrict_login){ ?>
                    <li><a href="/account">ΠΡΟΦΙΛ</a></li>
                  <?php } ?>
                  <?php if(!$restrict_login){ ?>
                    <li><a href="/login">ΕΙΣΟΔΟΣ/ΕΓΓΡΑΦΗ</a></li>
                  <?php } ?>
                </ul>
                <!--
                <ul class="navbar_user">
                  <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                  <li class="checkout">
                    <a href="#">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <span id="checkout_items" class="checkout_items">2</span>
                    </a>
                  </li>
                </ul>-->
                <div class="hamburger_container">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
      <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
      <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">

          <!-- Logged In -->
          <?php /*if($restrict_login){ ?>
          <li class="menu_item has-children">
            <a href="#">
              ΠΡΟΦΙΛ
              <i class="fa fa-angle-down"></i>
            </a>
          </li>
          <?php }*/ ?>


          <!-- Not Logged In -->
          <?php /*if(!$restrict_login){ ?>
          <li class="menu_item has-children">
            <a href="#">

              <i class="fa fa-angle-down"></i>
            </a>
            <ul class="menu_selection">
              <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
              <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
            </ul>
          </li>
          <?php }*/ ?>
          <!-- Logged In -->
          <?php if(!$restrict_login){ ?>
          <li class="menu_item"><a href="/login">ΕΓΓΡΑΦΗ / ΕΙΣΟΔΟΣ</a></li>
          <?php } ?>


          <li><a href="http://kotoulasenergy.gr/">ΑΡΧΙΚΗ</a></li>
          <!--
          <li class="menu_item"><a href="/">ΑΡΧΙΚΗ</a></li>
          <li class="menu_item"><a href="/gifts">ΔΩΡΑ</a></li>
          <li class="menu_item"><a href="/levels">ΒΑΘΜΙΔΕΣ</a></li>
          <li class="menu_item"><a href="/contact">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
          -->

          <!-- Logged In -->
          <?php if($restrict_login){ ?>
          <li class="menu_item"><a href="/account">ΠΡΟΦΙΛ</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>



    <?php
  }


 ?>

<?php

date_default_timezone_set('Europe/Athens');
//include_once 'utils/Redirect.php';
include 'utils/Config.php';

if(!$config['show_login_form']) redirect('/');

// Set first login trial
if(!isset($_SESSION['login_try_time'])){
  //$_SESSION['login_try_time'] = date('Y-m-d H:i:s');
  $_SESSION['login_try_time'] = date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s')+$config['seconds_first_login_try']-$config['seconds_between_login_tries'], date('n'), date('j'), date('Y')));
  redirect('/login');
}

if(isset($_POST['username'])&&isset($_POST['password'])) {
  // POST

  if(isset($_SESSION['login_try_time'])){
    $login_try_time = strtotime($_SESSION['login_try_time']);
    $current_time = strtotime(date('Y-m-d H:i:s'));
    if($current_time - $login_try_time < $config['seconds_between_login_tries']){
      // Login Try without passing the time limit (possible threat), Reset timer.
      $_SESSION['login_try_time'] = date('Y-m-d H:i:s');
      redirect('/login');
      exit();
    }
  }

  // Set login try
  $_SESSION['login_try_time'] = date('Y-m-d H:i:s');

  // Checks login
  require_once 'utils/LoginHandler.php';

  $login_handler = new LoginHandler();
  $login_handler->set_api_uri('/zazu_customer/');
  $login_handler->username_key[0] = 'phone_mobile';
  $login_handler->username_key[1] = 'phone_home';
  $login_handler->username_key[2] = 'email1';
  $login_handler->username_key[3] = 'email2';
  $login_handler->password_key = 'card';
  $login_handler->handle();

} else {
    // Show GET
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <link rel="stylesheet" href="/assets/login_page/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-deep_purple.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link href="/assets/login_page/fonts/fontello/css/fontello.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/login_page/css/bootstrap-offset-right.css">
  <link rel="stylesheet" href="/assets/login_page/css/style.css">
  <title><?php echo $config['header_title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


  <style>
      .mdl-textfield__label {
          margin-bottom: 0;
          color: #7f888a;
          font-weight: normal;
      }

      .mdl-textfield--floating-label.is-focused .mdl-textfield__label,
      .mdl-textfield--floating-label.is-dirty .mdl-textfield__label {
          text-transform: uppercase
      }

      .has-feedback label~.form-control-feedback {
          top: 15px;
      }

      .mdl-textfield {
          width: 100%;
      }

      .mdl-checkbox__label {
          cursor: text;
          font-size: 13px;
          float: left;
          color: #b0b3b4;
          font-weight: normal;
      }

      .mdl-checkbox__box-outline {
          border: 1px solid #b0b3b4;
      }

      .mdl-textfield__input {
          border: none;
          border-bottom: 1px solid rgba(0, 0, 0, .12);
          display: block;
          font-size: 16px;
          margin: 0;
          padding: 4px 0;
          width: 100%;
          background: 0 0;
          text-align: left;
          color: inherit;
          font-weight: bold;
      }

      .mdl-switch__label {
          float: left;
          font-weight: normal;
          color: #b0b3b4;
          font-size: 14px;
      }
  </style>


    <!-- Progress Bar Style -->
    <style>
      #progress {
        width: auto;
        background-color: white;
        margin-top: -20px;
        margin-left: -20px;
        margin-right: -20px;
      }
      #progressbar {
        width: 0%;
        height: 2.5px;
        background: linear-gradient(to right, #5da1f4 0%, #39dd30 100%);
      }
    </style>
</head>

<body>


  <div class="container">
      <div class="center-block">
          <!-- Login -->
          <div class="col-md-3"></div>

          <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 no-padding">
              <div class="mlt-content">
                  <ul class="nav nav-tabs">
                      <li  class="active"><a href="" data-toggle="tab">ΣΥΝΔΕΣΗ</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="login">

                          <!--register form-->
                          <form method="POST" action="" form data-feedback='{"success": "fa-check", "error": "fa-times"}'>
                              <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">

                                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                      <input name="username" class="mdl-textfield__input " type="text" id="emailAddress ">
                                      <label class="mdl-textfield__label " for="emailAddress ">Email ή Τηλέφωνο</label>
                                  </div>

                                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                      <input name="password" class="mdl-textfield__input " type="text" pattern="[0-9]+" id="mobileNumber ">
                                      <label class="mdl-textfield__label " for="mobileNumber ">Αριθμός Κάρτας</label>
                                      <span class="mdl-textfield__error ">Ο αριθμός είναι λανθασμένος</span>
                                  </div>

                                  <button class="btn lt-register-btn " formaction="">ΕΙΣΟΔΟΣ <i class="icon-right pull-right "></i></button>
                              </div>
                          </form>
                          <!--register form-->
                          <!--<a href="/signup"><button class="btn lt-register-btn " formaction="">ΕΓΓΡΑΦΗ <i class="icon-right pull-right "></i></button></a>-->

                      </div>
                      <div><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                        <a href="/contact"><p>Ξέχασα το Τηλέφωνο/Email μου.</p></a><br>
                        <a href="/contact"><p>Έχασα την Κάρτα μου.</p></a>
                      </div>
                  </div>
              </div>
              <!--Login-->
          </div>
          <!--center-block-->
      </div>
      <!--container-->
  </div>




  <script src="/assets/login_page/node_modules/jquery/dist/jquery.min.js "></script>
  <script src="/assets/login_page/node_modules/bootstrap/dist/js/bootstrap.min.js "></script>
  <script src="/assets/login_page/libs/mdl/material.min.js "></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js "></script>


    <!-- Language Script -->
    <script>
      function languageChange(){
        var value = document.getElementById('language').value;
        if(value=="en_us"||value=="el_gr"){
          cname = "locale"; // Cookie Name
          cvalue = value;   // Cookie Value
          var exdays = 30;  // Expiration Days
          var d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          var expires = "expires="+ d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
          var curr_language = document.getElementById('curr_language').value;

          if(curr_language!=value){
            window.location.href = '/login';
          }
        }
      }
      languageChange(); // Run when the form loads, to create the default cookie
    </script>

    <!-- Display the countdown timer in an element -->



    <!-- Login Timeout Script -->
    <script>
    // Set the date we're counting down to
    //var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();
    var countDownDateValue= document.getElementById("last_login_time").value;
    var countDownDate = new Date(countDownDateValue).getTime();
    var next_try_seconds = parseInt(document.getElementById("next_try_seconds").value);
    var starting_time = 0;

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate + next_try_seconds*1000 - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      if(starting_time == 0){
        starting_time = distance;
      }

      var percentage = 100 * distance /  starting_time ;

      document.getElementById("progressbar").style.width = percentage+"%";

      // Display the result in the element with id="demo"
      document.getElementById("countdown").innerHTML = parseInt(distance/1000) + "s";
      document.getElementById("countdown").style.visibility = 'hidden';
      document.getElementById("username").disabled = false;
      document.getElementById("password").disabled = false;
      document.getElementById("language").disabled = false;
      document.getElementById("submit").disabled = true;

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("progressbar").style.width = '0%';
        document.getElementById("countdown").innerHTML = "0s";
        document.getElementById("countdown").style.visibility = 'hidden';
        document.getElementById("username").disabled = false;
        document.getElementById("password").disabled = false;
        document.getElementById("language").disabled = false;
        document.getElementById("submit").disabled = false;
      }
    }, 25);
    </script>

    <script>
        //Form validation.
        $('form').validate({
            rules: {
                fname: {
                    minlength: 3,
                    maxlength: 15,
                }
            },
            errorPlacement: function(error, element) {},
            highlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(id_attr).removeClass('icon-ok-circled2').addClass('icon-cancel-circled2');
            },
            unhighlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(id_attr).removeClass('icon-cancel-circled2').addClass('icon-ok-circled2');
            },
        });
    </script>

</body>

</html>

<?php } // End Post Check ?>

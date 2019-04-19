<?php


  require 'utils/ApiClient.php';
  

  include 'utils/Redirect.php';
  require 'utils/Config.php';
  if($config['site_maintenance_mode']){
    require __DIR__ . $config['maintenance_url'];
    exit();
  }


  session_start(); // Start Session for all pages

  require_once 'utils/AltoRouter.php';
  include 'utils/Translate.php';

  // Initialize Router
  $router = new AltoRouter();

  // Select Timezone
  date_default_timezone_set($config['timezone']);


  // Create Paths

  // Home
  $router->map( 'GET', '/', function() {  require __DIR__ . '/views/Home.php'; }, 'Home_GET');

  // Login
  $router->map( 'GET', '/login', function() {require __DIR__ . '/views/Login.php';}, 'Login_GET');
  $router->map( 'POST', '/login', function() {require __DIR__ . '/views/Login.php';}, 'Login_POST');

  // Logout
  $router->map( 'GET', '/logout', function() {require __DIR__ . '/views/Logout.php';}, 'Logout_GET');

  // Signup
  $router->map( 'GET', '/signup', function() { require __DIR__ . '/views/SignUp.php'; }, 'SignUp_GET');
  $router->map( 'POST', '/signup', function() { require __DIR__ . '/views/SignUp.php'; }, 'SignUp_POST');

  // Account
  $router->map( 'GET', '/account', function() { require __DIR__ . '/views/Account.php'; }, 'Account_GET');
  $router->map( 'POST', '/account', function() { require __DIR__ . '/views/Account.php'; }, 'Account_POST');

  // Account_Info
  $router->map( 'GET', '/account/info', function() { require __DIR__ . '/views/Account_Info.php'; }, 'Account_Info_GET');
  $router->map( 'POST', '/account/info', function() { require __DIR__ . '/views/Account_Info.php'; }, 'Account_Info_POST');

  // Account_Card
  $router->map( 'GET', '/account/card', function() { require __DIR__ . '/views/Account_Card.php'; }, 'Account_Card_GET');
  $router->map( 'POST', '/account/card', function() { require __DIR__ . '/views/Account_Card.php'; }, 'Account_Card_POST');

  // Account_Transactions
  $router->map( 'GET', '/account/transactions', function() { require __DIR__ . '/views/Account_Transactions.php'; }, 'Account_Transactions_GET');
  $router->map( 'POST', '/account/transactions', function() { require __DIR__ . '/views/Account_Transactions.php'; }, 'Account_Transactions_POST');

  // Contact
  $router->map( 'GET', '/contact', function() {require __DIR__ . '/views/Contact.php';}, 'Contact_GET');


  // Maintenance
  $router->map( 'GET', '/maintenance', function() {  require __DIR__ . '/views/under_maintenance/index.php'; }, 'Maintenance_GET');


  // Match Routes and Load file
  $match = $router->match();
  if( $match && is_callable( $match['target'] ) ) {
	   call_user_func_array( $match['target'], $match['params'] );
  } else {
	   // no route was matched
	   //header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
     require __DIR__ . '/views/error-404.php';
  }


?>

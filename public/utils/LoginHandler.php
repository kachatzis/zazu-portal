<?php

  require_once 'utils/ApiClient.php';

  class LoginHandler {

    public $username;
    public $password;
    public $api_uri;      // API uri
    public $username_key; // Column From the API for the username
    public $password_key; // Column from the API for the password
    public $id;


    public function __construct() {
      $this->username = '';
      $this->password = '';
      $this->api_uri= '';
      $this->username_key[] = '';
      $this->password_key = '';
      $this->id = -1;
    }


    public function set_api_uri($api_uri) { $this->api_uri = $api_uri; }


    public function handle(){
      if($this->get_params()){
        if($this->check_login()){
          $this->redirect_to_home();
        }
      }
      $this->redirect_to_login();
    }


    public function get_params(){
        if(isset($_POST['username'])&&isset($_POST['password'])){
          $this->username = $_POST['username'];
          $this->password = $_POST['password'];
        } else {
          //Break Login
          exit();
        }

        return $this->check_login();
    }


    public function check_login(){

      $this->check_phone_length();

        $id = -1;
        $username_filter = '';
        foreach($this->username_key as $row=>$key){
          $username_filter .= '('.$key. urlencode(' LIKE %') . $this->username.')or';
        }
        $username_filter .= '()';
        $username_filter = str_replace('or()', '', $username_filter);


        $api = new ApiClient();
        $api->get_filter($this->api_uri,'('.$username_filter.')and('.$this->password_key.'='.$this->password.')and(is_enabled=1)&limit=1');

        if($api->get_response_code()==200){

          if ($api->get_results_count()>0) {

            foreach($api->get_resource() as $row_key=>$row){
              $id = $row->customer_id;
              $this->id = $id;
            }

            if ($id>0){
              $this->create_session();
              return 1;
            }
          }
        }

        return 0;
    }

    public function create_session(){
      $_SESSION['customer_id'] = $this->id;
    }


    public function redirect_to_login(){
      ?>
        <p>Redirecting to Login Page</p>
        <p>If you are not redirected, <a href="/login">Click Here</a></p>
      <?php
      redirect('/login');
    }


    public function redirect_to_home(){
      ?>
        <p>Redirecting to Home Page</p>
        <p>If you are not redirected, <a href="/">Click Here</a></p>
      <?php
      header_redirect('/');
    }

    private function check_phone_length() {
      if ( strlen($this->username) < 8) {
        $this->redirect_to_login();
        exit();
      }
    }


  }

 ?>

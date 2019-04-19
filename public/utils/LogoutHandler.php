<?php


  class LogoutHandler {

    public function __construct() {;}


    public function handle(){
      $this->destroy_session();
      $this->redirect_to_login();
    }


    public function destroy_session(){
      unset($_SESSION['customer_id']);
      session_unset();
      session_destroy();
    }


    public function redirect_to_login(){
      header_redirect('http://kotoulasenergy.gr/');
    }


  }

 ?>

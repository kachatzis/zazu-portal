<?php


  require_once 'utils/Cookie.php';

  class RestrictLogin {

    public function __construct(){;}

    public function handle(){
      if (! $this->get_customer()) $this->redirect_to_logout();
    }

    public function get_customer(){
      if(isset($_SESSION["customer_id"])) return 1;
      return 0;
    }

    public function redirect_to_logout(){
      header_redirect('/logout');
    }

    public function get_logged_in_state(){
      return $this->get_customer();
    }

  }

?>

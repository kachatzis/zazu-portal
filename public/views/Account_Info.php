<?php if($_SERVER['REQUEST_METHOD']=='POST'){
  // Handle POST

  // Give it to PostHandler

  require_once 'utils/PostHandler.php';
  $postHandler = new PostHandler();

  // Find ID
  $api_customer = new ApiClient();
  $api_customer->get_row('/zazu_customer/', $_SESSION['customer_id']);
  $customer = $api_customer->get_resource();
  if( !$customer->customer_id>0 || !$customer->customer_id==$_SESSION['customer_id'] ){
    include 'utils/Redirect.php';
    header_redirect('/logout');
    exit();
  }

  // TODO: Add Field checking
  $field_check = true;

  // Reload if the field check is not correct
  if ( !$field_check ){
    include 'utils/Redirect.php';
    header_redirect('/account/info');
    exit();
  }

  $handler = new PostHandler();
  $handler->set_api_action_uri('/zazu_customer/');
  $handler->set_form_action_update_absolute('/account/info');
  $handler->set_id($customer->customer_id);
  $handler->set_id_name('customer_id');
  $handler->set_params([
    ['first_name'=>'string'],
    ['last_name'=>'string'],
    ['phone_mobile'=>'string'],
    ['city'=>'string'],
    ['address'=>'string'],
    ['country'=>'string'],
    ['postal_code'=>'integer'],
    ['phone_home'=>'string'],
    ['send_sms'=>'integer'],
    ['email1'=>'string'],
    ['is_individual'=>'integer'],
  ]);
  $handler->handle();


} else {
  // Handle GET
?>

  <?php include 'Account_Page.php';
    start_account_page(); ?>


        <?php
          $api_customer = new ApiClient();
          $api_customer->get_row('/zazu_customer/', $_SESSION['customer_id']);
          $customer = $api_customer->get_resource();
         ?>
              <div class="mdl-cell mdl-cell--12-col">
                <h4>Επεξεργασία Προφίλ</h4><br>
                <form method="POST" action="">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="first_name" class="mdl-textfield__input" type="text" pattert="[0-9+.-]{8,30}" id="first_name" required value="<?php echo $customer->first_name; ?>">
                    <label class="mdl-textfield__label" for="first_name">Όνομα</label>
                    <span class="mdl-textfield__error">Το Όνομα είναι λανθασμένο</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="last_name" class="mdl-textfield__input" type="text" pattert="[0-9+.-]{8,30}" id="last_name" required value="<?php echo $customer->last_name; ?>">
                    <label class="mdl-textfield__label" for="last_name">Επίθετο</label>
                    <span class="mdl-textfield__error">Το Επίθετο είναι λανθασμένο</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="phone_mobile" class="mdl-textfield__input" type="text" pattert="[0-9+.-]{8,15}" id="phone_mobile" required value="<?php echo $customer->phone_mobile; ?>">
                    <label class="mdl-textfield__label" for="phone_mobile">Κινητό Τηλέφωνο</label>
                    <span class="mdl-textfield__error">Το Τηλέφωνο είναι λανθασμένο</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="phone_home" class="mdl-textfield__input" type="text" pattert="[0-9+.-]{8,15}" id="phone_home" value="<?php echo $customer->phone_home; ?>">
                    <label class="mdl-textfield__label" for="phone_home">Τηλέφωνο Κατοικίας</label>
                    <span class="mdl-textfield__error">Το Τηλέφωνο είναι λανθασμένο</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="email1" class="mdl-textfield__input" type="email" id="email1" pattern=".{3,40}" value="<?php echo $customer->email1; ?>">
                    <label class="mdl-textfield__label" for="email1">Email</label>
                    <span class="mdl-textfield__error">Το Email είναι λανθασμένο</span>
                  </div><br><br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="address" class="mdl-textfield__input" type="text" id="address" required pattern=".{1,42}" value="<?php echo $customer->address; ?>">
                    <label class="mdl-textfield__label" for="address">Διεύθυνση</label>
                    <span class="mdl-textfield__error">Η Διεύθυνση είναι λανθασμένη</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="city" class="mdl-textfield__input" type="text" id="phone_home" required pattern=".{3,40}" value="<?php echo $customer->city; ?>">
                    <label class="mdl-textfield__label" for="city">Πόλη</label>
                    <span class="mdl-textfield__error">Η Πόλη είναι λανθασμένη</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="postal_code" class="mdl-textfield__input" type="text" pattern="[0-9]{4,6}" required id="postal_code" value="<?php echo $customer->postal_code; ?>">
                    <label class="mdl-textfield__label" for="postal_code">Ταχυδρομικός Κώδικας</label>
                    <span class="mdl-textfield__error">Ο Τ.Κ. είναι λανθασμένος</span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="country" class="mdl-textfield__input" type="text" pattern=".{3,30}" required id="country" value="<?php echo $customer->country; ?>">
                    <label class="mdl-textfield__label" for="country">Χώρα</label>
                    <span class="mdl-textfield__error">Η Χώρα είναι λανθασμένη</span>
                  </div><br><br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input " required id="send_sms" name="is_individual" style="cursor: pointer;">
                      <option <?php if($customer->is_individual) echo 'selected'; ?> value="1">Ναι</option>
                      <option <?php if(!$customer->is_individual) echo 'selected'; ?> value="0">Όχι</option>
                    </select>
                    <label class="mdl-textfield__label" for="is_individual">Ιδιώτης</label>
                  </div><br><br>

                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input " required id="send_sms" name="send_sms" style="cursor: pointer;">
                      <option <?php if($customer->send_sms) echo 'selected'; ?> value="1">Ναι</option>
                      <option <?php if(!$customer->send_sms) echo 'selected'; ?> value="0">Όχι</option>
                    </select>
                    <label class="mdl-textfield__label" for="send_sms">Αποστολή ενημερωτικών SMS</label>
                  </div>







                  <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                    <input style="cursor: pointer;" name="country" id="send_sms" class=" mdl-textfield__input" type="text" readonly required id="send_sms" value="">
                    <ul id="send_sms_menu" class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        for="send_sms">
                      <li data-imput="" class="mdl-menu__item">Ναι</li>
                      <li class="mdl-menu__item">Όχι</li>
                    </ul>
                    <label class="mdl-textfield__label" for="send_sms">Αποστολή διαφημιστικών SMS</label>
                  </div>-->


                  <br><br><br><br>


                  <button type="submit" name="form-send" value="update" class="mdl-button mdl-js-button mdl-button--accent">
                    ΑΠΟΘΗΚΕΥΣΗ
                  </button>
                </form>
              </div>
    <?php end_account_page(); ?>
<?php } ?>

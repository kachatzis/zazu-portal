<?php if($_SERVER['REQUEST_METHOD']=='POST'){
  // Handle POST
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
            <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--6-col">

              <h4 class="mdl-cell mdl-cell--12-col">Προφίλ</h4>
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <h6 class="mdl-cell mdl-cell--12-col"><?php echo $customer->first_name.' '.$customer->last_name; ?></h6>
              <h6 class="mdl-cell mdl-cell--12-col">Πόντοι: <?php echo $customer->credit; ?></h6>

            </div>
            <div class="mdl-cell mdl-cell--6-col">
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <a href="/account/card"><div class="mdl-cell mdl-cell--12-col" id="qrcode"></div></a>
              <a href="/account/card"><h4 class="mdl-cell mdl-cell--12-col"><?php echo $customer->card; ?></h4></a>

            </div>
          </div>
        </div>


          <script src="/assets/qrcode/qrcode.js"></script>
          <script type="text/javascript">
          var qrcode = new QRCode("qrcode", {
              text: "<?php echo $customer->card; ?>",
              width: 120,
              height: 120,
              colorDark : "#000000",
              colorLight : "#ffffff",
              correctLevel : QRCode.CorrectLevel.H
          });
          </script>

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php end_account_page(); ?>
<?php } ?>

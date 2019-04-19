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

      $api_card_level = new ApiClient();
      $api_card_level->get_row('/zazu_card_level/', $customer->card_level_id);
      $card_level = $api_card_level->get_resource();
    ?>
          <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--6-col">

              <h4 class="mdl-cell mdl-cell--12-col">Κάρτα</h4>
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <h6 class="mdl-cell mdl-cell--12-col"><?php echo $customer->card; ?></h6>
              <h6 class="mdl-cell mdl-cell--12-col">Πόντοι: <?php echo $customer->credit; ?></h6>
              <h6 class="mdl-cell mdl-cell--12-col">Βαθμίδα: <?php echo $card_level->title; ?></h6>

            </div>
            <div class="mdl-cell mdl-cell--6-col">
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <h4 class="mdl-cell mdl-cell--12-col">&nbsp;</h4>
              <a href="/account/card"><div class="mdl-cell mdl-cell--12-col" id="qrcode"></div></a>
              <a href="/account/card"><h4 class="mdl-cell mdl-cell--12-col"><?php echo $customer->card; ?></h4></a>

            </div>
          </div>

          <div class="mdl-grid">

        <?php if($config['show_card_print_button']){ ?>
          <div class="mdl-cell mdl-cell--6-col">
            <a href=""><button type="submit" disabled class="mdl-button mdl-js-button mdl-button--accent">ΕΚΔΟΣΗ ΚΑΡΤΑΣ</button></a>
         </div>
        <?php } ?>

          <div class="mdl-cell mdl-cell--6-col">

          </div>
        </div>
        </div>


          <script src="/assets/qrcode/qrcode.js"></script>
          <script type="text/javascript">
          var qrcode = new QRCode("qrcode", {
              text: "<?php echo $customer->card; ?>",
              width: 170,
              height: 170,
              colorDark : "#000000",
              colorLight : "#ffffff",
              correctLevel : QRCode.CorrectLevel.H
          });
          </script>

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php end_account_page(); ?>
<?php } ?>

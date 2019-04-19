<?php if($_SERVER['REQUEST_METHOD']=='POST'){
  // Handle POST
} else {
  // Handle GET
?>

  <?php include 'Account_Page.php';
    start_account_page(); ?>

    <?php
      if(!$config['show_account_transactions']) redirect('/account');

      $customer_id = $_SESSION['customer_id'];

      $api_transactions = new ApiClient();
      $api_transactions->get_filter('/zazu_transaction/', '(customer_id='.$customer_id.')');
      $transactions = $api_transactions->get_resource();
     ?>

          <div class="mdl-cell mdl-cell--12-col">



            <table class="mdl-data-table mdl-js-data-table" style="width: 100%;">

              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">Ημερομηνία</th>
                  <th class="mdl-data-table__cell--non-numeric">Κατάστημα</th>
                  <th                                          >Πόντοι</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($transactions as $row=>$transaction) { ?>
                  <?php $api_store = new ApiCLient();
                        $api_store->get_row('/zazu_store/', $transaction->store_id);
                        $store = $api_store->get_resource();
                  ?>

                  <tr>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $transaction->transaction_date ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $store->name.' ('.$store->code.')'; ?></td>
                    <td                                          ><?php echo $transaction->credit ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>


          </div>

    <?php end_account_page(); ?>
<?php } ?>

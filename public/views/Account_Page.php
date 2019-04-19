<?php //require 'utils/ApiClient.php'; ?>

<?php $restrict_login = true; $page_include='material'; ?>

<?php require 'header.php';?>

<?php function start_account_page(){
require 'utils/Config.php'; ?>


<br><br><br><br><br><br><br>
<div class="col-12">
  <div class="mdl-grid">
    <!--<div class="mdl-cell mdl-cell--2-col"></div>-->
    <div class="mdl-cell mdl-cell--1-col"></div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
      <!-- Content Card -->
      <div class="mdl-card mdl-cell--12-col mdl-shadow--4dp">
        <!--<div class="mdl-card__media" style="padding:10px; background: #00032b;">
        </div>-->
        <div class="mdl-card__supporting-text">
          Ρυθμίσεις Προφίλ
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            href="/account">
            ΠΡΟΦΙΛ
          </a><br>
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            href="/account/info">
            ΣΤΟΙΧΕΙΑ
          </a><br>
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            href="/account/card">
            ΚΑΡΤΑ
          </a><br>
          <?php if($config['show_account_transactions']){ ?>
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            href="/account/transactions">
            ΣΥΝΑΛΛΑΓΕΣ
          </a>
          <?php } ?>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            href="/logout">
            ΑΠΟΣΥΝΔΕΣΗ
          </a>
        </div>
      </div>
      <!---->
    </div>
    <!--<div class="mdl-cell mdl-cell--1-col"></div>-->
    <div class="mdl-cell mdl-cell--8-col">

      <!-- Content Card -->
      <div class="mdl-card mdl-cell--12-col mdl-shadow--4dp">
        <!--<div class="mdl-card__media" style="padding:10px; background: red;">
        </div>-->
        <div class="mdl-grid" style="width:100%;">

          <!-- Card Content -->
          <?php } ?>
          <?php function end_account_page(){ ?>

        </div>

      </div>
      <!---->
 

    </div>
    <div class="mdl-cell mdl-cell--1-col"></div>
  </div>
</div>


<?php require 'utils/Config.php'; require 'footer.php'; ?>
<?php } ?>

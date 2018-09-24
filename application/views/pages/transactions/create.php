<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('templates/header'); ?>
<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
  <div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<?php $this->load->view('templates/headbar'); ?>
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">
    <?php $this->load->view('templates/leftsidebar'); ?>
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTENT -->
    <section id="content">
      <!--start container-->
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              <h4 class="header2">Create New Transaction</h4>
              <div class="row">
                <form class="col s12" method="post">
                  <div class="row">
                    <div class="input-field col s12">
                          <i class="material-icons prefix">bubble_chart</i>
                      <select class="icons" name="category" required>
                        <option value="" disabled selected>Choose a category</option>
                          <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id ?>" <?php print isset($old['category']) && $old['category'] == $category->id ? 'selected' : ''; ?> data-icon="<?php echo asset_url();?>images/icons/<?= $category->category_icon ?>.svg" class="left circle dynamic-color <?= $category->category_color ?>"><?= $category->category_name ?></option>
                          <?php } ?>
                      </select>
                      <label>Select Category</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">today</i>
                      <input type="date" class="datepicker" name="transaction_date" id="transaction_date" required value="<?php print isset($old['transaction_date']) ? $old['transaction_date']: ''; ?>">
                      <label for="transaction_date">Transaction Date</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">widgets</i>
                        <select class="icons" name="transaction_type" required>
                            <option value="" disabled selected>Choose a Type</option>
                              <option value="expense" <?php print isset($old['transaction_type']) && $old['transaction_type'] == 'expense'? 'selected': ''; ?>>Expense</option>
                              <option value="income" <?php print isset($old['transaction_type']) && $old['transaction_type'] == 'income'? 'selected': ''; ?>>Income</option>
                        </select>
                        <label>Select Type of Transaction</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">attach_money</i>
                      <input id="amount" type="number" name="amount" required value="<?php print isset($old['amount']) ? $old['amount']: ''; ?>">
                      <label for="amount">Amount</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">speaker_notes</i>
                      <textarea id="message" class="materialize-textarea" length="120" name="notes"><?php print isset($old['notes']) ? $old['notes']: ''; ?></textarea>
                      <label for="message">Notes (optional)</label>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <?php if (isset($result) && count($result) > 0) { ?>
                            <p class="center materialize-green-text" role="alert">
                                <strong><?php print_r($result); ?></strong>
                            </p>
                        <?php } ?>
                          <input type="hidden" name="create-form" value="1" />
                        <button class="btn cyan waves-effect waves-light right" type="submit">Save
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
      <!--end container-->
    </section>
    <!-- END CONTENT -->
    <?php $this->load->view('templates/rightsidebar'); ?>
  </div>
  <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<?php $this->load->view('templates/footer'); ?>
</body>
</html>
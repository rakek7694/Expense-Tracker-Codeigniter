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
          <div id="table-datatables">
                <h4 class="header"><?= $title ?></h4>
                <div class="row">
                    <div class="col s12">
                      <?php if (isset($result) && count($result) > 0) { ?>
                          <p class="center materialize-green-text" role="alert" style="text-align: center">
                                <strong><?php print_r($result); ?></strong>
                            </p>
                      <?php } ?>
                      <?php if (isset($error) && count($error) > 0) { ?>
                          <p class="materialize-red-text" style="text-align: center !important;">
                                <strong><?php print_r($error); ?></strong>
                            </p>
                      <?php } ?>
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Transaction Type</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Transaction Type</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($transactions as $transaction) { ?>
                            <tr>
                                <td><?= ucwords($this->session->userdata('username')) ?></td>
                                <td><?= ucwords($transaction->transaction_type) ?></td>
                                <td><img alt="" src="<?php echo asset_url();?>images/icons/<?= $categories[$transaction->category_id]['category_icon'] ?>.svg" class="left circle dynamic-color <?= $categories[$transaction->category_id]['category_color'] ?>"> &nbsp; <?= $categories[$transaction->category_id]['category_name'] ?></td>
                                <td style="text-align: right">$<?= round($transaction->amount,2) ?></td>
                                <td><?= date('F d, Y', strtotime($transaction->transaction_date)) ?></td>
                                <td><?= $transaction->notes ?></td>
                                <td><a href="/transaction/edit/<?= ucwords($transaction->id) ?>"><i class="material-icons" name="Edit" title="Edit">mode_edit</i></a> &nbsp; &nbsp; <a class="modal-trigger" href="#modal<?= $transaction->id ?>"><i class="material-icons" name="Delete" title="Delete">delete</i></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                      <?php foreach ($transactions as $transaction) { ?>
                        <!-- Modal Structure -->
                        <div id="modal<?= $transaction->id ?>" class="modal" style="padding:10px;">
                            <div class="modal-content">
                                <h5>Do you want to delete your transaction [<?= $categories[$transaction->category_id]['category_name'] ?> ($<?= round($transaction->amount,2) ?>)]?</h5>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green waves-effect waves-light btn" style="margin-right:10px;">Disagree</a>
                                <a href="/transaction/delete/<?= ucwords($transaction->id) ?>" class="modal-action modal-close waves-effect waves-light btn red accent-2">Agree</a>
                            </div>
                        </div>
                      <?php } ?>
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
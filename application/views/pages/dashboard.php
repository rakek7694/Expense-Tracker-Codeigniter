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
                    <div class="col s12 m6 l6">
                        <div class="card">
                            <div class="card-content red accent-2 white-text center">
                                <p class="card-stats-title">
                                    <i class="material-icons">attach_money</i>Total Expense</p>
                                <h4 class="card-stats-number">$<?= $expenses ?></h4>
                                <p class="card-stats-compare">
                                    <i class="material-icons">keyboard_arrow_up</i> 70%
                                    <span class="red-text text-lighten-5">last month</span>
                                </p>
                            </div>
                            <div class="card-action red darken-1">
                                <div id="sales-compositebar" class="white-text center-align">Expenses</div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="card">
                            <div class="card-content teal accent-4 white-text center">
                                <p class="card-stats-title">
                                    <i class="material-icons">trending_up</i> Total Income</p>
                                <h4 class="card-stats-number">$<?= $incomes ?></h4>
                                <p class="card-stats-compare">
                                    <i class="material-icons">keyboard_arrow_up</i> 80%
                                    <span class="teal-text text-lighten-5">last month</span>
                                </p>
                            </div>
                            <div class="card-action teal darken-1">
                                <div id="profit-tristate" class="white-text center-align">Incomes</div>
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
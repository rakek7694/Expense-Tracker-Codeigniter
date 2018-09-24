<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('templates/header-unauthentic'); ?>
<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="register-form" method="post" autocomplete="off">
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Register</h4>
                    <p class="center">Starting Managing your Finance!</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">person_outline</i>
                    <input id="username" type="text" name="username" required value="<?php print isset($old['username']) ? $old['username']: ''; ?>">
                    <label for="username" class="center-align">Username</label>
                </div>
              <?php if (isset($errors['username'])) { ?>
                  <p class="center materialize-red-text" role="alert">
                    <strong><?php print $errors['username']; ?></strong>
                </p>
              <?php } ?>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">email</i>
                    <input id="email" type="email" name="email" required value="<?php print isset($old['email']) ? $old['email']: ''; ?>">
                    <label for="email" class="center-align">Email</label>
                </div>
              <?php if (isset($errors['email'])) { ?>
                  <p class="center materialize-red-text" role="alert">
                    <strong><?php print $errors['email']; ?></strong>
                </p>
              <?php } ?>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password" type="password" required name="password">
                    <label for="password">Password</label>
                </div>
                <?php if (isset($errors['password'])) { ?>
                <p class="center materialize-red-text" role="alert">
                    <strong><?php print $errors['password']; ?></strong>
                </p>
                <?php } ?>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password-again" type="password" required name="repassword">
                    <label for="password-again">Password again</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">

                  <?php if (isset($result) && count($result) > 0) { ?>
                      <p class="center materialize-green-text" role="alert">
                    <strong><?php print_r($result); ?></strong>
                </p>
                  <?php } ?>
                    <input type="submit" name="register-from" value="Register Now" class="btn waves-effect waves-light col s12" />
                </div>
                <div class="input-field col s12">
                    <p class="margin center medium-small sign-up">Already have an account? <a href="/user/login">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('templates/footer-unauthentic'); ?>
</body>
</html>
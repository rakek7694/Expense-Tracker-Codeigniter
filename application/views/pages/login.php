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
        <form class="login-form" method="post">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="<?php echo asset_url();?>images/logo.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Managing your personal finances has never been easier.</p>
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
            <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-3">
                    <input type="checkbox" id="remember-me" name="remember-me" />
                    <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" name="login-from" value="Login" class="btn waves-effect waves-light col s12" />
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="/user/register">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="/user/forgotpassword">Forgot password ?</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
 <?php $this->load->view('templates/footer-unauthentic'); ?>
</body>
</html>
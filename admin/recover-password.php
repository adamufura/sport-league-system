<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_recover.php'; ?>

<?php
$pageDetails = [
  'title' => "Recover Password | SPS"
];
Includes::custom_include('includes/ex-header.php', $pageDetails, true);
?>


<body class="app app-reset-password p-0">
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <div class="app-auth-branding mb-4">
            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo" /></a>
          </div>
          <h2 class="auth-heading text-center mb-4">Recover Passsword</h2>

          <div class="auth-intro mb-4 text-center">
            Enter your email address below. We'll email you a link to a page
            where you can easily create a new password.
          </div>

          <div class="auth-form-container text-left">
            <form class="auth-form resetpass-form" accept="" method="POST">
              <div class="email mb-3">
                <label class="sr-only" for="reg-email">Your Email</label>
                <input id="reg-email" name="email" type="email" class="form-control login-email" placeholder="Your Email" name="email" />
                <span class="text-danger">
                  <?php if (isset($recoverErrors['emailErr'])) {
                    echo $recoverErrors['emailErr'];
                  } ?>
                </span>
                <span class="text-success">
                  <?php if (isset($recoverErrors['emailSucc'])) {
                    echo $recoverErrors['emailSucc'];
                  } ?>
                </span>
              </div>
              <!--//form-group-->
              <div class="text-center">
                <button type="submit" name="recover" class="btn app-btn-primary btn-block theme-btn mx-auto">
                  Recover Password
                </button>
              </div>
            </form>

            <div class="auth-option text-center pt-5">
              <a class="app-link" href="login.php">Log in</a>
            </div>
          </div>
          <!--//auth-form-container-->
        </div>
        <!--//auth-body-->

        <?php Includes::custom_include('includes/ex-footer.php', [], true); ?>
<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_login.php'; ?>

<?php
$pageDetails = [
  'title' => "Admin Login"
];
Includes::custom_include('includes/ex-header.php', $pageDetails, true);

?>

<body class="app app-login p-0">
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <div class="app-auth-branding mb-4">
            <a class="app-logo" href="../index.php"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo" /></a>
          </div>

          <h2 class="auth-heading text-center mb-5">Log in to Admin</h2>
          <div class="auth-form-container text-start">
            <form class="auth-form login-form" method="POST">
              <div class="email mb-3">
                <label class="sr-only" for="signin-username">Username</label>
                <input id="signin-username" name="username" type="text" class="form-control signin-email" placeholder="Username" value="<?php if (isset($username)) {
                                                                                                                                          echo $username;
                                                                                                                                        } ?>" />
                <span class="text-danger"><?php
                                          if (isset($adminErrors['usernameErr'])) {
                                            echo $adminErrors['usernameErr'];
                                          }
                                          ?></span>
              </div>
              <!--//form-group-->
              <div class="password mb-3">
                <label class="sr-only" for="signin-password">Password</label>
                <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" />
                <span class="text-danger"><?php
                                          if (isset($adminErrors['passErr'])) {
                                            echo $adminErrors['passErr'];
                                          }
                                          ?></span>
                <div class="extra mt-3 row justify-content-between">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="RememberPassword" />
                      <label class="form-check-label" for="RememberPassword">
                        Remember me
                      </label>
                    </div>
                  </div>
                  <!--//col-6-->
                  <div class="col-6">
                    <div class="forgot-password text-end">
                      <a href="recover-password.php">Forgot password?</a>
                    </div>
                  </div>
                  <!--//col-6-->
                </div>
                <!--//extra-->
              </div>
              <!--//form-group-->
              <div class="text-center">
                <span class="text-danger"><?php
                                          if (isset($adminErrors['credentialErr']) && !isset($adminErrors['usernameErr']) && !isset($adminErrors['passErr'])) {
                                            echo $adminErrors['credentialErr'];
                                          }
                                          ?></span>
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" name="loginAdmin">
                  Log In
                </button>
              </div>
            </form>
          </div>
          <!--//auth-form-container-->
        </div>
        <!--//auth-body-->

        <?php Includes::custom_include('includes/ex-footer.php', [], true); ?>
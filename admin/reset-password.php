<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_reset.php'; ?>

<?php
$pageDetails = [
	'title' => "Reset Password | SSS"
];
Includes::custom_include('includes/ex-header.php', $pageDetails, true);

if (!isset($_GET['hash']) || !isValidHash($_GET['hash'])) {
	header("Location: login.php");
}
?>

<body class="app app-signup p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/auk-logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Reset Password</h2>

					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" accept="" method="POST">

							<div class="password mb-3">
								<label class="sr-only" for="signup-password">New Password</label>
								<input id="signup-password" name="newpassword" type="password" class="form-control signup-password" placeholder="Create a New password">
								<span class="text-danger text-center">
									<?php
									if (isset($resetErrors['passErr'])) {
										echo $resetErrors['passErr'];
									} ?>
								</span>
							</div>

							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Confirm New Password</label>
								<input id="signup-password" name="cnewpassword" type="password" class="form-control signup-password" placeholder="Confimr New password">
								<span class="text-danger text-center">
									<?php
									if (isset($resetErrors['cpassErr'])) {
										echo $resetErrors['cpassErr'];
									} ?>
								</span>
							</div>


							<!--//extra-->

							<div class="text-center">
								<span class="text-success">
									<?php
									if (isset($resetErrors['passUpdateSucc'])) {
										echo $resetErrors['passUpdateSucc'];
									}
									?>
								</span>
								<span class="text-danger">
									<?php
									if (isset($resetErrors['passUpdateErr'])) {
										echo $resetErrors['passUpdateErr'];
									}
									?>
								</span>
								<button type="submit" name="reset" class="btn app-btn-primary w-100 theme-btn mx-auto">Reset Password</button>
							</div>
						</form>
						<!--//auth-form-->

						<div class="auth-option text-center pt-5">
							<a class="app-link" href="login.php">Log in</a>
						</div>
					</div>
					<!--//auth-form-container-->



				</div>
				<!--//auth-body-->
				<?php Includes::custom_include('includes/ex-footer.php', [], true); ?>
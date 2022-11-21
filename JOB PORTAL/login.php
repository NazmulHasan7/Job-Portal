
<?php  include('./config.php') ?>
<?php  include('includes/head.php') ?>
<?php  include('includes/login.php'); ?>

<title>JOB FINDER BD | LOGIN</title>
<link rel="shortcut icon" href="./static/icons/logo.png">

<body>
    <?php include('includes/menubar.php') ?>
	<div class="main-container d-flex">	
		<div class="content">
            <!-- login -->
			<div class="login-center popup-login-form" id="login-form">
				<div class="login-container">
					<div style="text-align: center;">
						<i class="fa-solid fa-house-user fa-2x" style="font-size: 33px;"></i>
                        <h1 class="entry-title" style="margin-top: -20px;">Login</h1>
					</div>
						
					<?php include('./includes/errors.php') ?>

					<form class="login-form" method="post" action="login.php">
                        <div class="login-data" style="margin-bottom: 0px !important">
                            <select class="form-select form-select-lg shadow-none bg-light border-0" name="user_type">
                                <option value="user">Login as user</option>
                                <option value="admin">Login as admin</option>
                                <option value="company">Login as company</option>
                            </select>
                        </div>
						<div class="login-data" style="margin-top: 10px;">
							<label><i class="fa-solid fa-envelope"></i> Email address</label>
							<input type="email" name="email" value="<?php echo $email; ?>" value="" placeholder="Enter email address" required>
						</div>
						<div class="login-data" style="margin: 0 0 42px 0;">
							<label><i class="fa-solid fa-lock"></i> Password</label>
							<input type="password" name="password" required placeholder="Enter password">
						</div>
						<div style="text-align: center;">
							<p style="font-weight:bold; font-size:15px; margin: 0 0 5px 0;">continue to the dashboard</p>
							<button class="login-btn" type="submit" name="login_btn">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>
</body>
</html>
<?php include('load_script.php') ?>

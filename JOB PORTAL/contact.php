
<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/login.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>

<title>JOB FINDER BD | LOGIN</title>
<link rel="shortcut icon" href="./static/icons/logo.png">

<body>
    <?php include('includes/menubar.php') ?>
	<div class="main-container d-flex">	
		<div class="content">
            <!-- contact -->
			<div class="login-center popup-contact-form" id="contact-form">
				<div class="login-container">
					<div style="text-align: center;">
						<i class="fa-solid fa-envelope fa-2x" style="font-size: 33px;"></i>
                        <h1 class="entry-title" style="margin-top: -20px;">Contact Form</h1>
					</div>

					<form class="login-form needs-validation" action="index.php" method="post">
						<div class="login-data">
							<label><i class="fa-solid fa-envelope"></i> Email</label>
							<input type="email" name="email" required placeholder="Enter email">
						</div>
						<div class="login-data" style="margin: 0 0 13px 0;">	
							<label><i class="fa-solid fa-paper-plane"></i> Subject</label>
							<input type="text" name="subject" required placeholder="Enter subject">
						</div>
						<div class="login-data" style="margin: 30px 0 60px 0;">
							<label><i class="fa-solid fa-message"></i> Message</label>
							<textarea name="message_text" rows="3" required placeholder="Type message here"></textarea>
						</div>

						<div style="text-align: center;">
							<p style="font-weight:bold; font-size:15px; margin: -10px 0 7px 0;">you will get feedback through email</p>
							<button class="submit-btn login-btn" type="submit" name="submit_message" id="submit-info">Submit</button>
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

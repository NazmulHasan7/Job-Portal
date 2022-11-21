<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>

<title>ADMIN DASHBOARD</title>
<link rel="shortcut icon" href="static/icons/logo.png">

<?php if (isset($_SESSION['warning'])){ ?>
	<div class="container-message" id="popup-contact-message">
		<div class="popup-msg" id="popup-success-msg">
			<img src="static/icons/warning.png" alt="image not found">
			<h2 style="text-align: center;">Warning!</h2>
			<p><?php echo $_SESSION['warning']; ?></p>
			<button type="button" class="submit-btn login-btn" id="msg-btn">OKAY</button>
		</div>
	</div>
<?php unset($_SESSION['warning']); } ?>

<body>
	<div class="main-container d-flex">	
		<div class="content" style="width: 100%;">
		<?php include('includes/menubar.php') ?>
        
        <div class="row justify-content-md-center m-5">
                <header class="entry-header m-3">
					<h1 class="entry-title">ADMIN DASHBOARD</h1>	
				</header>

            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
                    <div class="card-header"><h5><i class="fas fa-envelope"></i> MESSAGE</h5></div>
                    <div class="card-body">
                        <h6 class="card-text" style="text-align: center; font-size: larger; line-height: 2.0rem;">
                            <i class="fas fa-envelope-open" style="font-size: 30px;"></i><br>
                            CONTACT MESSAGE  <span class="badge badge-light" style="background: red;">105</span><br>
                            UNREAD MESSAGE <span class="badge badge-light" style="background: red;">10</span><br>
                            <a href="messages.php">
                                <button type="button" class="btn btn-primary pdf-btn bg-dark" style="margin-top: 20px; border: 1px solid white;">MANAGE MESSAGE</button>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white mb-3 bg-primary" style="max-width: 25rem;">
                    <div class="card-header"><h5><i class="fas fa-briefcase"></i> POSTED JOB</h5></div>
                    <div class="card-body">
                        <h6 class="card-text" style="text-align: center; font-size: larger; line-height: 2.0rem;">
                            <i class="fas fa-briefcase" style="font-size: 30px;"></i><br>
                            JOB CATEGORIES  <span class="badge badge-light" style="background: red;">105</span><br>
                            AVAILABLE JOBS <span class="badge badge-light" style="background: red;">10</span><br>
                            <a href="manage_jobs.php">
                                <button type="button" class="btn btn-primary pdf-btn bg-dark" style="margin-top: 20px; border: 1px solid white;">MANAGE JOBS</button>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
                    <div class="card-header"><h5><i class="fas fa-list"></i> CATEGORY</h5></div>
                    <div class="card-body">
                        <h6 class="card-text" style="text-align: center; font-size: larger; line-height: 2.0rem;">
                            <i class="fas fa-list" style="font-size: 30px;"></i><br>
                            JOB CATEGORIES  <span class="badge badge-light" style="background: red;">105</span><br>
                            AVAILABLE JOBS <span class="badge badge-light" style="background: red;">10</span><br>
                            <a href="manage_category.php">
                                <button type="button" class="btn btn-primary pdf-btn bg-dark" style="margin-top: 20px; border: 1px solid white;">MANAGE CATEGORY</button>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
		</div>
	</div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>
</body>
</html>

<!--JAVASCRIPT-->
<script src='js/jquery.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/toggle.js'></script>
<script src='js/scripts.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	
</script>


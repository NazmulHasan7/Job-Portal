
<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('backend_login.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>

<title>JOB FINDER BD | REGISTER</title>
<link rel="shortcut icon" href="./static/icons/logo.png">

<body>
	<!-- Register User Modal -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="userRegView">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content p-2" style="background: #2980B9;
                        background: -webkit-linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea); 
                        background: linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea);
                        font-family: Oswald; 
						box-shadow: 0px 1px 2px 0px rgba(0,255,255,0.7),
            			1px 2px 4px 0px rgba(0,255,255,0.7),
            			2px 4px 8px 0px rgba(0,255,255,0.7),
            			2px 4px 16px 0px rgba(0,255,255,0.7);">
                <div class="modal-header" style="display: unset; border: 0; padding-bottom: 5px;">
                    <h4 style="text-align: center; font-weight: bolder; letter-spacing:unset; font-size: 28px;">
						<i class="fas fa-address-book" style="font-size: 40px;"></i> <br>
						REGISTER USER <br>
                    </h4>
                </div>
				<div class="modal-body" style="padding-bottom: 0px; padding-top: 0px;">
					<form  action="backend_login.php" method="post" enctype="multipart/form-data">
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="user-name" name="name" required placeholder="Enter name">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="email" class="form-control" id="user-email" name="email" required placeholder="Enter email">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="password" class="form-control" id="user-password" name="password" required placeholder="Enter password">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="tel" class="form-control" id="user-number" name="contact" pattern="[0-9]{11}" required placeholder="Enter contact number">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="user-address" name="address" required placeholder="Enter mailing address">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input class="form-control" type="file" name="profileImage" style="padding-left: 0px !important; padding: 10px !important;" required>
						</div>
						<div class="modal-footer" style="border: 0;">
							<button type="button" class="btn text-light login-btn modal-btn" data-bs-dismiss="modal" style="background: red;">Close</button>
							<button type="submit" class="btn text-light login-btn modal-btn" style="background: #0BDA14;" name="registerUser">Submit</button>
						</div>
					</form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Register Company Modal -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="companyRegView">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content p-2" style="background: #2980B9;
                        background: -webkit-linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea); 
                        background: linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea);
                        font-family: Oswald; 
						box-shadow: 0px 1px 2px 0px rgba(0,255,255,0.7),
            			1px 2px 4px 0px rgba(0,255,255,0.7),
            			2px 4px 8px 0px rgba(0,255,255,0.7),
            			2px 4px 16px 0px rgba(0,255,255,0.7);">
                <div class="modal-header" style="display: unset; border: 0; padding-bottom: 5px;">
                    <h4 style="text-align: center; font-weight: bolder; letter-spacing:unset; font-size: 28px;">
						<i class="fas fa-address-book" style="font-size: 40px;"></i> <br>
						REGISTER COMPANY <br>
                    </h4>
                </div>
				<div class="modal-body" style="padding-bottom: 0px; padding-top: 0px;">
					<form  action="backend_login.php" method="post" enctype="multipart/form-data">
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="company-name" name="cname" required placeholder="Enter Organization Name">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="email" class="form-control" id="company-email" name="email" required placeholder="Enter Organization Email">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="password" class="form-control" id="company-password" name="password" required placeholder="Enter password">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="tel" pattern="[0-9]{11}" class="form-control" id="company-number" name="contact" required placeholder="Enter contact number">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="company-address" name="address" required placeholder="Enter mailing address">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input class="form-control" type="file" name="profileImage" style="padding-left: 0px !important; padding: 10px !important;" required>
						</div>
						<div class="modal-footer" style="border: 0;">
							<button type="button" class="btn text-light login-btn modal-btn" data-bs-dismiss="modal" style="background: red;">Close</button>
							<button type="submit" class="btn text-light login-btn modal-btn" style="background: #0BDA14;" name="registerCompany">Submit</button>
						</div>
					</form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php include('includes/menubar.php') ?>
	<div class="main-container d-flex">	
		<div class="content" style="width: 100%;">
        <div class="container-fluid px-4" >
				<div id="primary" class="content-area column full">
					<main id="main" class="site-main">

						<?php if (isset($_SESSION['user'])) { ?>
						<div class="logged_in_info" style="text-align: end;">
							<span>Welcome <?php echo $_SESSION['user'] ?></span>
							| <span><a href="./logout.php" style="color: red;">Logout</a></span>
						<?php } ?>
					</main>
				</div>
			</div>
			<header class="entry-header">
				<h1 id="aboutme" class="entry-title">REGISTER ON JOB FINDER BD</h1>	
			</header>
            <div class="cv-btn center">
				<p><button type="button" class="btn btn-primary pdf-btn" id="file-upload" onclick="registerCompany()">REGISTER COMPANY</button> &nbsp;
                <button type="button" class="btn btn-primary pdf-btn" id="file-share" onclick="registerUser()">REGUSTER AS USER</button></p> 
            </div>
			
			<?php if(isset($_SESSION['message'])){ ?>
				<div class="alert alert-success" role="alert">
  					<?php echo $_SESSION['message']; ?>
					<p style="text-align: end; margin-bottom: 0px;"><a href="login.php"><button type="button" class="btn btn-primary">LOGIN</button></a></p>
				</div>
			<?php unset($_SESSION['message']); } ?>
			<p style="text-align: center;"><i class="fal fa-briefcase fa-10x" style="padding-bottom: 120px; padding-top: 70px; padding-left: 20px;"></i></p>
		</div>
	</div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>
</body>
</html>
<?php include('load_script.php') ?>

<script>
    function registerUser(){
        $('#userRegView').modal('show');
    }
    function registerCompany(){
        $('#companyRegView').modal('show');
    }
</script>
<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>

<title>USER DASHBOARD | <?php echo $_SESSION['user']['name'] ?></title>
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

<?php $id = $_SESSION['user']['id'];
 $user = getUserById($id);
 $job_list = getAppliedJobs($user['id']); ?>

<body>
    <!-- Register User Modal -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="userUpdateView">
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
						<i class="fas fa-address-book" style="font-size: 35px;"></i> <br>
						UPDATE PROFILE <br>
                    </h4>
                </div>
				<div class="modal-body" style="padding-bottom: 0px; padding-top: 0px;">
					<form  action="backend_login.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['id'] ?>">
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="user-name" name="name" required value="<?php echo $user['name'] ?>">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="email" class="form-control" id="user-email" name="email" required value="<?php echo $user['email'] ?>">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="tel" class="form-control" id="user-number" name="contact" pattern="[0-9]{11}" required value="<?php echo $user['contact_no'] ?>">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input type="text" class="form-control" id="user-address" name="address" required value="<?php echo $user['address'] ?>">
						</div>
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input class="form-control" type="file" name="profileImage" style="padding-left: 0px !important; padding: 10px !important;" required value="<?php echo $user['profile_picture'] ?>">
						</div>
						<div class="modal-footer" style="border: 0;">
							<button type="button" class="btn text-light login-btn modal-btn" data-bs-dismiss="modal" style="background: red;">Close</button>
							<button type="submit" class="btn text-light login-btn modal-btn" style="background: #0BDA14;" name="updateUser">Submit</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>


	<div class="main-container d-flex">	
		<div style="width: 100%; height: 700px;">
		<?php include('includes/menubar.php') ?>

        <header class="entry-header">
				<h1 class="entry-title" style="font-size: xx-large;"><?php echo $user['name'] ?></h1><br>	
		</header>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card p-2" style="width: 22rem; margin-top: 20px; justify-content: center;
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;">
                    <p style="text-align: center;">
                        <img src="<?php echo './static/userImages/' . $user['profile_picture']; ?>" class="post_image" alt="Failed Loading Image" style="width: 150px; height: 150px;">
                    </p>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user['name'] ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-envelope"></i> <?php echo $user['email'] ?></li>
                        <li class="list-group-item"><i class="fas fa-address-book"></i> <?php echo $user['address'] ?></li>
                        <li class="list-group-item"><i class="fas fa-phone-alt"></i> <?php echo $user['contact_no'] ?></li>
                    </ul>
                    <div class="card-body">
                    <button type="button" class="btn btn-primary" id="file-share" onclick="updateProfile()">Update Profile</button>
                    </div>
                </div>
                </div>

                <div class="col-8">
                <?php if(!empty($job_list)): ?>
                    <table class="table table-striped table-hover message-table cat-table" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                        <thead>
                            <th style="width: 50%;"><i class="far fa-briefcase"></i> JOB TITLE</th>
                            <th style="text-align: right;"><i class="fas fa-file-pdf"></i> RESUME</th>
                        </thead>
                        <tbody>
                            <?php foreach ($job_list as $job): $job_post = getPostById($job['post_id']); ?>
                            <tr>
                                <td><a class="px-3" style="color:blue" style="text-decoration:none; color:black" href="single_post.php?post-slug=<?php echo $job_post['slug']; ?>"><i class="fas fa-external-link"></i></a> <?php echo $job_post['title']; ?></a></td>
                                <td style="text-align: right;">
                                    <a href="<?php echo 'static/userCV/' . $job['cv']; ?>" style="text-decoration:none" download>
                                        <i class="fas fa-arrow-to-bottom fa-2x" style="color: red; font-size: 22px;" title="Download"></i>
                                    </a><?php echo $job['cv']; ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>   
                    </table>
                <?php else: ?>
                    <h5 style="text-align: center; margin-top:50px">YOU HAVE NOT APPLIED FOR ANY JOB</h5>
                <?php endif ?>
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
    function updateProfile(){
        $('#userUpdateView').modal('show');
    }
</script>


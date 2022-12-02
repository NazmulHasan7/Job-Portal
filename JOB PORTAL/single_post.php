<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<?php  $company_posts = getAllCompanyPosts(); ?>

<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
        $company_info = getPostAuthorById($post['user_id']);
	}
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
        $user = getUserById($id);
        $check = hasUserApplied($id, $post['id']);
    }
?>

<title><?php echo $post['title'] ?></title>
<link rel="shortcut icon" href="static/icons/logo.png">

<body>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="uploadCV">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content p-2">
				<div class="modal-body" style="padding-bottom: 0px; padding-top: 0px; font-family: 'Oswald';">
                    <p style="padding-top: 20px;">Hey, <?php echo $user['name'] ?> <br>Upload your resume to apply for this job</p>
					<form  action="backend_login.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="userid" value="<?php echo $user['id'] ?>">
                        <input type="hidden" name="postid" value="<?php echo $post['id'] ?>">
						<div class="form-group" style="padding-bottom: 15px !important;">
							<input class="form-control" type="file" name="cv" style="padding-left: 0px !important; padding: 10px !important;" required>
						</div>
						<div class="modal-footer" style="border: 0;">
							<button type="button" class="btn text-light login-btn modal-btn" data-bs-dismiss="modal" style="background: red;">Close</button>
							<button type="submit" class="btn text-light login-btn modal-btn" style="background: #0BDA14;" name="submitCV">Submit</button>
						</div>
					</form>
                </div>
            </div>
            </div>
        </div>

	<div class="main-container d-flex">	
		<div class="content" style="width: 100%;">
		<?php include('includes/menubar.php') ?>
        
        <div class="row justify-content-md-center" style="width: 100%;">
        <header class="entry-header">
				<h1 class="entry-title" style="font-size: xx-large;"><?php echo $company_info['name']; ?></h1><br>	
		</header>
            <div class="col col-lg-2">
                <p style="text-align: center;">
                    <img src="<?php echo './static/compnayImages/' . $company_info['profile_picture']; ?>" class="post_image" alt="Image Not Found" style="width: 100px; height: 100px;">
                </p>
            </div>
                <div class="col-md-auto" style="line-height: 2.0em;">
                    <strong>Office Address :</strong> <?php echo $company_info['office_address'] ?><br>
                    <strong>Contact Email :</strong> <?php echo $company_info['email'] ?><br>
                    <strong>Contact Number :</strong> <?php echo $company_info['contact_no'] ?><br>
                </div>
                <br><h4 style="text-align: center;"><?php echo $post['title'] ?></h4><br>
                <?php if ($post['published'] == false): ?>
				    <p style="color: red; text-align: center;">This job post is not published yet</p> <br>
                <?php endif ?>
                <?php if ($post['expired'] == false): ?>
                    <p class="error-p" style="text-align: center; width: 500px;">Last Date to Apply: <?php echo date("F j, Y, g:i a ", strtotime($post['updated_at'])); ?></p>
                <?php endif ?>
        </div>
        <div class="mx-5 mb-2">
            <?php echo html_entity_decode($post['body']); ?>

            <?php if(isset($_SESSION['user'])) {
                if($_SESSION['user']['user_type'] == "user") : 
                    if($check):?>
                        <h5 style="text-align: center;"><i class="fas fa-check-circle" style="color:greenyellow"></i> You have applied in this job</h5>
                    <?php else: ?>
                        <p style="text-align: center;"><button class="btn btn-primary text-white" onclick="uploadCV()">Apply Online</button></p>
                    <?php endif ?>
                <?php endif ?>
            <?php } else { ?>
                <p class="error-p" style="text-align: center; margin-left:40%; margin-right:40%">You need to Login as user to apply</p>
            <?php } ?>         
        </div>
        <!-- footer -->
	<?php include('includes/footer.php') ?>
	</div>
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
    function uploadCV(){
        $('#uploadCV').modal('show');
    }
</script>

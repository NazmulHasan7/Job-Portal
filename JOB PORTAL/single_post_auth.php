<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>
<?php  $company_posts = getAllCompanyPosts(); ?>

<title><?php echo $_SESSION['user']['name'] ?></title>
<link rel="shortcut icon" href="static/icons/logo.png">

<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
        $company_info = getPostAuthorById($post['user_id']);
        $applicants = getApplicantsOfPost($post['id']);
	}
?>

<body>
	<div class="main-container d-flex">	
		<div class="content" style="width: 100%;">
		<?php include('includes/menubar.php') ?>
        
        <div class="row justify-content-md-center" style="width: 100%;">
        <header class="entry-header">
				<h1 class="entry-title" style="font-size: xx-large;"><?php echo $_SESSION['user']['name'] ?></h1><br>	
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
        </div>
        <div class="mx-5 mb-2">
            <?php echo html_entity_decode($post['body']); ?>
            
            <?php if(!empty($applicants)): ?>
                    <table class="table table-striped table-hover message-table cat-table" style="border-collapse: collapse; width: 50%; margin-top: 20px; margin-left: auto; margin-right: auto;">
                        <thead>
                            <th style="width: 50%;"><i class="far fa-briefcase"></i> Applicant Name</th>
                            <th style="text-align: right;"><i class="fas fa-file-pdf"></i> Resume</th>
                        </thead>
                        <tbody>
                            <?php foreach ($applicants as $applicant): $user = getUserById($applicant['user_id']); ?>
                            <tr>
                                <td> <?php echo $user['name']; ?></a></td>
                                <td style="text-align: right;">
                                    <a href="<?php echo 'static/userCV/' . $applicant['cv']; ?>" style="text-decoration:none" download>
                                        <i class="fas fa-arrow-to-bottom fa-2x" style="color: red; font-size: 22px;" title="Download"></i>
                                    </a><?php echo $applicant['cv']; ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>   
                    </table>
                <?php else: ?>
                    <h5 style="text-align: center; margin-top:50px">None has applied to this job</h5>
                <?php endif ?>
            
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
	
</script>


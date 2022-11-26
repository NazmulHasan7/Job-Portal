<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!--Get profile information from database-->

<title>JOB FINDER BD | FILTERED POST</title>
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

<?php if (isset($_GET['topic'])) {
		$topic_id = $_GET['topic'];
		$posts = getPublishedPostsByTopic($topic_id);
	}
?>

<body>
<div class="main-container d-flex">	
		<div style="width: 100%;">
		<?php include('includes/menubar.php') ?>

			<div class="container-fluid px-4" style="height: 100vh">
				<div id="primary" class="content-area column full">
					<main id="main" class="site-main">

						<h4 style="font-weight: bolder; color: black; text-align: center; margin-top: 30px; border-bottom: 2px solid black; padding-bottom: 10px;">
							FILTERED JOB CATEGORY: <?php echo getTopicNameById($topic_id); ?></h4>
						<div class="row mx-2">
							<?php if(empty($posts)) : ?>
								<h4 style=" text-align:center;  margin-top:100px; margin-bottom:100px;"><i class="fal fa-briefcase" style="font-size:100px;"></i>
								<br>No job available in this category
							</h4>

							<?php elseif (!empty($posts)): ?>
								<?php foreach ($posts as $post): ?>
									<?php if($post['published'] == 1): ?>
									<div class="col-sm-6" style="max-height: 120px; min-height: 120px; margin-top: 20px !important;">
										<div class="card" style="box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;">
										<div class="row no-gutters">
										<div class="col-md-3">
											<img src="<?php $company_info = getPostAuthorById($post['user_id']); echo './static/compnayImages/' . $company_info['profile_picture']; ?>" class="card-img" alt="Not Found" style="height: 120px; width: 120px;">
										</div>
										<div class="col-md-8">
											<div class="card-body" style="padding: 5px;">
												<h5 class="card-title"><?php echo $post['title'] ?></h5>
												<p class="card-text" style="overflow: hidden; max-width: 75ch; text-overflow: ellipsis; white-space: nowrap;"><?php $company_info = getPostAuthorById($post['user_id']); echo $company_info['office_address']; ?></p>
												<a class="btn btn-primary" href="single_post.php?post-slug=<?php echo $post['slug']; ?>">Read More</a>
											</div>
											</div>
										</div>
									</div>
									</div>
									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
						</div> <br>
					</main>
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


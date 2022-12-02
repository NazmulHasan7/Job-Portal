<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!--Get profile information from database-->

<title>JOB FINDER BD | JOBS</title>
<link rel="shortcut icon" href="static/icons/logo.png">

<?php $topics = getAllTopics();	?>
<?php $posts = getAllPublishedPosts();	?>

<body>
	<div class="main-container d-flex">	
		<div style="width: 100%;">
		<?php include('includes/menubar.php') ?>			

            <h4 style="font-weight: bolder; color: black; text-align: center; margin-top: 20px;">
                            <i class="fab fa-chrome"></i> BROWSE THROUGH THE JOB CATEGORIES</h4>
                            <hr style="margin-top: 7px;">
			<div class="container-fluid px-4">
				<div id="primary" class="content-area column full">
					<main id="main" class="site-main">
                        
                        <div class="row align-items-center" style="font-size: 1.2em;">
                                <?php if (empty($topics)): ?>
                                    <h4 style="text-align: center; font-weight:bolder;">NO DATA AVAILABLE TO SHOW</h4>
                                <?php else: ?>
                                <?php foreach ($topics as $topic): ?>
                                    <div class="col-4 p-2 px-5">
                                        <a href="<?php echo './filtered_post.php?topic=' . $topic['id'] ?>" style="text-decoration: none; color: black;"><i class="fas fa-external-link"></i> <?php echo $topic['name']; ?></a>
                                    </div>
                                <?php endforeach ?>
                                <?php endif ?>
                        </div> <br>

						<h4 style="font-weight: bolder; color: black; text-align: center;">
                            SHOWING ALL THE JOB - FIND YOUR OPPORTUNITY</h4>
						<hr style="margin-top: 7px;">
						<div class="row mx-2">
							<?php foreach ($posts as $post): ?>
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
											<a class="btn btn-primary" href="single_post.php?post-slug=<?php echo $post['slug']; ?>">Read More</a> <span style="color:red; font-size:medium; font-weight:bold; font-family: Oswald;"> Expires: <?php echo date("F j, Y, g:i a ", strtotime($post['updated_at'])); ?></span>
										</div>
										</div>
									</div>
								</div>
								</div>
							<?php endforeach ?>
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



<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!--Get profile information from database-->

<title>JOB FINDER BD | HOME</title>
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
<?php $topics = getAllTopics();	?>
<?php $posts = getAllTop10PublishedPosts();	?>

<body>
	<div class="main-container d-flex">	
		<div style="width: 100%;">
		<?php include('includes/menubar.php') ?>
						
			<div class="d-flex justify-content-center search-box">

				<div class="input-group" style="height: 30px; margin-top: 100px; opacity: 100%;">
					<div class="input-group-text p-0">
						<select class="form-select form-select-lg shadow-none bg-light border-0">
							<option value="">Category</option>
							<option value="">Resources</option>
							<option value="">Project</option>
							<option value="">Blog Post</option>
						</select>
					</div>
					<input type="search" class="form-control" name="search" placeholder="Search Your Desired Job Here">
					<button class="input-group-text shadow-none px-3 btn-warning" style="background: #2ac4ea; border-color:#2ac4ea; color:white">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</div>
			</div>

			<div class="container-fluid px-4">
				<div id="primary" class="content-area column full">
					<main id="main" class="site-main">
						
						<h4 style="font-weight: bolder; color: black; text-align: center;">
						<i class="fab fa-chrome"></i> BROWSE THROUGH THE JOB CATEGORIES</h4>
						<hr style="margin-top: 7px;">

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
							RECENT HOT JOB - FIND YOUR OPPORTUNITY</h4>
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
											<a class="btn btn-primary" href="single_post.php?post-slug=<?php echo $post['slug']; ?>">Read More</a>
										</div>
										</div>
									</div>
								</div>
								</div>
							<?php endforeach ?>
						</div> <br>

						<br>
						<article class="hentry">
						<header class="entry-header">
							<h4 style="text-align: center; font-weight: bolder; color:black">ABOUT JOB FINDER BD - BEST JOB PORTAL OF BANGLADESH</h4>	
						</header>

						<div class="row">
							<div class="col-md-5">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
										<div class="carousel-item active">
											<img class="d-block w-100 rounded" style="height: 290px;" src="static/slideshow/first.jpg" alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100 rounded" style="height: 290px;" src="static/slideshow/30-Career-Paths-in-IT.webp" alt="Second slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100 rounded" style="height: 290px;" src="static/slideshow/writer-work-from-home-jobs.png" alt="Third slide">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
							<div class="col-md-7" style="text-align: justify;">
							<hr style="margin-top: 0px;">
								<p>
									JOB FINDER BD is the job finding platfrom for Bangladeshi as well as international candidates to find a 
									suitable job. Companies added to the site can post jobs with detailed description 
									and users can serch job that matches their interest. Find jobs in a more easier way. We aim to make your life easier.
									Job websites serve as the modern equivalent of classified ads by compiling and listing available telecommute, 
									remote, and local openings. Equipped with millions of listings and additional resources like career coaching, 
									resume tailoring, and blog posts full of helpful tips, using a job website is one of the best and most efficient ways to search for and apply to dozens of opportunities.
								</p>
								<h5>FIND YOUR DESIRED JOB</h5>
								<p id="notes"> - 👀 Register your company and create job posts </br>
											- 🌱 Create your profile, upload CV and find job</br>
											- 🔭 Search for jobs that match your preferences and apply</br>
								</p>
								<hr>
							</div>
						</div>
						</article>
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


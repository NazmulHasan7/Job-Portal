<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>
<?php $topics = getAllTopics();	?>
<?php $published_post = getAllPublishedPosts();	?>
<?php $unpublished_post = getAllUnpublishedPosts();	?>

<title>ADMIN | MANAGE JOBS</title>
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

        <header class="entry-header m-3">
			<h1 class="entry-title">MANAGE POSTED JOB</h1>	
		</header>
        <p style="text-align: center;">
            <a href="admin_dashboard.php"><button class="button-92 p-2" role="button">DASHBOARD</button></a>
        </p>

		<br><h5 style="text-align: center;"><i class="fas fa-check-circle" style="color:greenyellow"></i> Apporoved Job post</h5><br>
		<div class="d-flex justify-content-center">
			<table class="table table-striped table-hover message-table cat-table" style="border-collapse: collapse; width: 40%;">
				<thead>
					<th style="width: 70%;"><i class="far fa-briefcase"></i> JOB TITLE</th>
					<th style="text-align: right;"><i class="fas fa-cogs"></i> ACTION</th>
				</thead>
				<tbody>
					<?php foreach ($published_post as $p_post): ?>
					<tr>
						<td><?php echo $p_post['title']; ?></a></td>
						<td style="text-align: right;">
							<a class="px-3" style="color:blue" style="text-decoration:none; color:black" href="single_post_auth.php?post-slug=<?php echo $p_post['slug']; ?>"><i class="fas fa-external-link"></i></a>
							<a style="color:red" href="post_functions.php?unpublish=<?php echo $p_post['id'] ?>"><i class="fas fa-times-circle"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>   
            </table>
		</div> <br>

		<br><h5 style="text-align: center;"><i class="fas fa-times-circle" style="color:red"></i> Pending Job post</h5><br>
		<div class="d-flex justify-content-center">
			<table class="table table-striped table-hover message-table cat-table" style="border-collapse: collapse; width: 40%;">
				<thead>
					<th style="width: 70%;"><i class="far fa-briefcase"></i> JOB TITLE</th>
					<th style="text-align: right;"><i class="fas fa-cogs"></i> ACTION</th>
				</thead>
				<tbody>
					<?php foreach ($unpublished_post as $post): ?>
					<tr>
						<td><?php echo $post['title']; ?></a></td>
						<td style="text-align: right;">
							<a class="px-3" style="color:blue" style="text-decoration:none; color:black" href="single_post_auth.php?post-slug=<?php echo $post['slug']; ?>"><i class="fas fa-external-link"></i></a>
							<a style="color:red" href="post_functions.php?publish=<?php echo $post['id'] ?>"><i class="fas fa-check-circle"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>   
            </table>
		</div>
			<!-- footer -->
	<?php include('includes/footer.php') ?>
		</div>
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


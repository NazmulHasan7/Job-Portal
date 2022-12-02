<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>

<title><?php echo $_SESSION['user']['name'] ?> | CREATE JOB</title>
<link rel="shortcut icon" href="static/icons/logo.png">

<?php $topics = getAllTopics();	?>

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
        
        <header class="entry-header">
            <h1 class="entry-title" style="font-size: x-large;"><?php echo $_SESSION['user']['name'] ?> | CREATE OR EDIT JOB</h1><br>	
        </header>

        <div class="action create-post-div justify-content-center" style="margin-left: 20%; width: 60%;">
			<form method="post" enctype="multipart/form-data" action="<?php echo 'create_job.php'; ?>" >
				
            <div class="form-group">
                <!-- validation errors for the form -->
				<?php include('./includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>

				<input class="mb-2" type="text" name="title" value="<?php echo $title; ?>" placeholder="Title of the job" required>
				<textarea class="mb-2" name="body" id="body" cols="30" rows="10" required><?php echo $body; ?></textarea>
				<select name="topic_id" required class="form-select form-select-lg bg-light my-2">
					<option value="" selected disabled>Choose Job Category</option>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<input class="mb-2" type="datetime-local" class="form-control" name="due-date" style="padding-top:5px !important; padding-bottom:5px !important; border:2px solid black !important" required>			
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn btn-primary text-white" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn btn-primary text-white" name="create_post">CREATE</button>
				<?php endif ?>
            </div>
			</form>
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
<!-- ckeditor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
<script>
	CKEDITOR.replace('body');
</script>


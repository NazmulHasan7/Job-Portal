<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>
<?php $topics = getAllTopics();	?>

<title>ADMIN | JOB CATEGORY</title>
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
			<h1 class="entry-title">MANAGE JOB CATEGORIES</h1>	
		</header>
        <p style="text-align: center;">
            <a href="admin_dashboard.php"><button class="button-92 p-2" role="button">DASHBOARD</button></a>
        </p>

        <div class="d-flex justify-content-center">
            <div class="bg-dark text-white p-3 pb-0" style="border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                <h5 style="text-align: center;">CREATE OR EDIT JOB CATEGORY</h5>

                <form class="form-inline" method="post" action="<?php echo 'admin_functions.php'; ?>" >
                    <!-- validation errors for the form -->
                    <?php include('./includes/errors.php') ?>
                    <!-- if editing topic, the id is required to identify that topic -->
                    <?php if ($isEditingTopic === true): ?>
                        <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" required>
                       
                    <?php endif ?>
                        <div class="form-group mb-2">
                            <input type="text" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Enter Job Category Name" required style="border-radius: 5px">
                        </div>
                        <!-- if editing topic, display the update button instead of create button -->
                    <?php if ($isEditingTopic === true): ?> 
                        <h6 style="text-align: center;"><button type="submit" class="btn bg-primary text-white mb-2" name="update_topic">Update Category</button></h6>
                    <?php else: ?>
                        <h6 style="text-align: center;"><button type="submit" class="btn bg-primary text-white mb-2" name="create_topic">Save Category</button></h6>
                    <?php endif ?>
                </form>
            </div>
        </div> <br>

		<br><h5 style="font-weight: bolder; text-align: center;"><i class="fas fa-list"></i> EXISTING JOB CATEGORIES</h5>
		<div class="d-flex justify-content-center">
			<table class="table table-striped table-hover message-table cat-table" style="border-collapse: collapse; width: 40%;">
				<thead>
					<th style="width: 70%;"><i class="fas fa-list"></i> JOB CATEGORY</th>
					<th style="text-align: right;"><i class="fas fa-cogs"></i> ACTION</th>
				</thead>
				<tbody>
					<?php foreach ($topics as $topic): ?>
					<tr>
						<td><?php echo $topic['name']; ?></td>
						<td style="text-align: right;">
							<a class="px-3" style="color:blue" href="manage_category.php?edit-topic=<?php echo $topic['id'] ?>"><i class="fas fa-pencil"></i></a> &nbsp;
							<a style="color:red" href="manage_category.php?delete-topic=<?php echo $topic['id'] ?>"><i class="fas fa-trash-alt"></i></a>
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


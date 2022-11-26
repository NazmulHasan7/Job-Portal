<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<?php 
if (isset($_GET['comp_id'])) {
    $id = $_GET['comp_id'];
}?>
<!-- None can access this without login -->
<?php   $company_info = getCompanyInfo($id);
        $company_posts = getAllCompanyPostsByID($id); ?>

<title><?php echo $company_info['name'] ?></title>
<link rel="shortcut icon" href="static/icons/logo.png">

<body>
	<div class="main-container d-flex" style="height: 800px;">	
		<div style="width: 100%;">
		<?php include('includes/menubar.php') ?>
        
        <div class="row justify-content-md-center" style="width: 100%;">
        <header class="entry-header">
				<h1 class="entry-title" style="font-size: xx-large;"><?php echo $company_info['name'] ?></h1><br>	
		</header>
            <div class="col col-lg-2">
                <p style="text-align: center;">
                    <img src="<?php echo './static/compnayImages/' . $company_info['profile_picture']; ?>" class="post_image" alt="Image Not Found" style="width: 120px; height: 120px;">
                </p>
            </div>
                <div class="col-md-auto" style="line-height: 2.5em;">
                    <strong>Office Address :</strong> <?php echo $company_info['office_address'] ?><br>
                    <strong>Contact Email :</strong> <?php echo $company_info['email'] ?><br>
                    <strong>Contact Number :</strong> <?php echo $company_info['contact_no'] ?><br>
                </div>
            </div>
            
            <br><h4 style="text-align: center; padding-bottom: 10px;" class="mx-4">JOBS CREATED BY THE COMPANY</h4>
            <div class="row mx-2">
                <?php foreach ($company_posts as $company_post): 
                    if($company_post['published'] == 1): ?>
                        <div class="col-sm-6" style="margin-bottom: 20px;">
                            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $company_post['title'] ?></h5>
                                <p class="card-text"><?php echo html_entity_decode($company_post['highlight']) ?></h5></p>
                                <a class="btn btn-primary" href="single_post.php?post-slug=<?php echo $company_post['slug']; ?>">Read More</a>
                            </div>
                            </div>
                        </div>
                    <?php endif ?>
				<?php endforeach ?>
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



<?php if (!isset($_SESSION['user'])){
	$_SESSION['warning'] = "You need to login first"; 
	header('location: ./index.php'); ?>
<?php } ?>
<?php 
// variable declaration
	$email    = "";
	$errors = array(); 

	//LOGIN FOR ALL USER
	if (isset($_POST['login_btn'])) {
		$email = escString($_POST['email']);
		$password = escString($_POST['password']);
		$user_type = $_POST['user_type'];

		if($user_type == "admin"){
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM admin WHERE email='$email' and password='$password' LIMIT 1";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$_SESSION['user'] = mysqli_fetch_assoc($result);
				header("location: admin_dashboard.php");
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
        else if($user_type == "user"){
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM user WHERE email='$email' and password='$password' LIMIT 1";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$_SESSION['user'] = mysqli_fetch_assoc($result);
				header("location: user_dashboard.php");
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
        else if($user_type == "company"){
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM company WHERE email='$email' and password='$password' LIMIT 1";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$_SESSION['user'] = mysqli_fetch_assoc($result);
				header("location: company_dashboard.php");
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
	}

    // escape value from form
	function escString(String $value) {	
		// brings the global db connect object into function
		global $conn;
		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);
		return $val;
	}
?>
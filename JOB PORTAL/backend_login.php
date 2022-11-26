<?php 
$conn = mysqli_connect("localhost", "root", "", "job_portal");

	//REGISTER USER
	if (isset($_POST['registerUser'])) {
		$name = escSTRING($_POST['name']);
		$email = escSTRING($_POST['email']);
		$password = escSTRING($_POST['password']);
		$contact = escSTRING($_POST['contact']);
		$address = escSTRING($_POST['address']);
		$image = $_FILES['profileImage']['name'];
		echo $_FILES['profileImage']['name'];
	    $password = md5($password); // encrypt password
		
		$upload_dir = 'static/userImages/'.$image;
		$current_dir = $_FILES['profileImage']['tmp_name'];

		$query = "INSERT INTO user (name, email, password, contact_no, address, profile_picture) VALUES('$name','$email', '$password', '$contact', '$address', '$image')";
	
		if (mysqli_query($conn, $query)) {
			move_uploaded_file($current_dir, $upload_dir);
			$_SESSION['message'] = "Registration Successful\nYou can now login";
			header("location: login.php");
			exit(0);
		}
	}

	//REGISTER COMPANY
	if (isset($_POST['registerCompany'])) {
		$name = escSTRING($_POST['cname']);
		$email = escSTRING($_POST['email']);
		$password = escSTRING($_POST['password']);
		$contact = escSTRING($_POST['contact']);
		$address = escSTRING($_POST['address']);
		$image = $_FILES['profileImage']['name'];
		echo $_FILES['profileImage']['name'];
	    $password = md5($password); // encrypt password
		
		$upload_dir = './static/compnayImages/'.$image;
		$current_dir = $_FILES['profileImage']['tmp_name'];

		$query = "INSERT INTO company (name, email, password, contact_no, office_address, profile_picture) VALUES('$name','$email', '$password', '$contact', '$address', '$image')";
	
		if (mysqli_query($conn, $query)) {
			move_uploaded_file($current_dir, $upload_dir);
			$_SESSION['message'] = "Registration Successful\nYou can now login";
			header("location: login.php");
			exit(0);
		}
	}

	// escape value from form
	function escSTRING(String $value) {	
		// brings the global db connect object into function
		global $conn;
		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);
		return $val;
	}

		//UPDATE PROFILE
		if (isset($_POST['updateUser'])) {
			$name = escSTRING($_POST['name']);
			$email = escSTRING($_POST['email']);
			$contact = escSTRING($_POST['contact']);
			$address = escSTRING($_POST['address']);
			$image = $_FILES['profileImage']['name'];
			echo $_FILES['profileImage']['name'];
			$id = $_POST['userid'];
			
			$upload_dir = './static/userImages/'.$image;
			$current_dir = $_FILES['profileImage']['tmp_name'];
	
			$query = "UPDATE user SET name='$name', email='$email', contact_no='$contact', address='$address', profile_picture='$image' WHERE id=$id";
		
			if (mysqli_query($conn, $query)) {
				move_uploaded_file($current_dir, $upload_dir);
				$_SESSION['message'] = "Successfully updated";
				header("location: user_dashboard.php");
				exit(0);
			}
		}

		//APPLY JOB
		if (isset($_POST['submitCV'])) {
			$userid = escSTRING($_POST['userid']);
			$postid = escSTRING($_POST['postid']);
			$filename = $_FILES['cv']['name'];
			$time = strtotime("now");
			$filename = $time."_"."$filename";

			$upload_dir = './static/userCV/'.$filename;
			$current_dir = $_FILES['cv']['tmp_name'];
			echo $filename;
	
			$query = "INSERT INTO job_apply (post_id, user_id, cv) VALUES('$postid','$userid', '$filename')";
			if (mysqli_query($conn, $query)) {
				move_uploaded_file($current_dir, $upload_dir);
				$_SESSION['message'] = "Successfully updated";
				header("location: user_dashboard.php");
				exit(0);
			}
		}
?>
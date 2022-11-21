<?php
function getProfileInformation(){
    global $conn;
	$sql = "SELECT * FROM profile_information";
	$result = mysqli_query($conn, $sql);
    // fetch query results as associative array
    $info = mysqli_fetch_assoc($result);
    return $info;
}
function getSocialMediaInfo(){
    global $conn;
	$sql = "SELECT * FROM social_media";
	$result = mysqli_query($conn, $sql);
    // fetch query results as associative array
    $links = mysqli_fetch_assoc($result);
    return $links;
}

/* CONTACT SECTION */
if (isset($_POST['submit_message'])) { 
    storeMessage($_POST); 
}
function storeMessage($request_values){
	global $conn;
	$email = $_POST['email'];
    $subject = $_POST['subject'];
	$body = htmlentities($request_values['message_text']);
	$query = "INSERT INTO contact_information (email, subject, message, submitted_on, seen) VALUES('$email', '$subject', '$body', now(), 0)";
	
	if (mysqli_query($conn, $query)) {
		$_SESSION['contact-message'] = "Your response have been recorded \n You will get the feedback through mail";
		header("location: index.php");
		exit(0);
	}
}
function getAllMessages(){
    global $conn;
	if(isset($_GET['pageno'])){
		$pageno = $_GET['pageno'];
		$offset = ($pageno - 1) * 10;
		$sql = "SELECT * FROM contact_information ORDER BY submitted_on DESC LIMIT 10 OFFSET $offset";
		$result = mysqli_query($conn, $sql);
	}
	else{
		$sql = "SELECT * FROM contact_information ORDER BY submitted_on DESC";
		$result = mysqli_query($conn, $sql);
	}
    // fetch query results as associative array
    $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $messages;
}
function getMessageCounts(){
	global $conn;
	$sql = "SELECT * FROM contact_information";
	$result = mysqli_query($conn, $sql);
	return mysqli_num_rows($result);
}
function getUnseenMessageCounts(){
	global $conn;
	$sql = "SELECT * FROM contact_information WHERE seen=0";
	$result = mysqli_query($conn, $sql);
	return mysqli_num_rows($result);
}


// ALL POST RELATED WORK
// Receives a post id and returns topic of the post

function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

// Returns all posts under a topic
function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

// Returns topic name by topic id
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

//Returns a single post
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}
function getPostAuthorById($user_id)
{
	global $conn;
	$sql = "SELECT * FROM company WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result);
	} else {
		return null;
	}
}
function getUserById($user_id)
{
	global $conn;
	$sql = "SELECT * FROM user WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result);
	} else {
		return null;
	}
}

function getPostById($post_id)
{
	global $conn;
	$sql = "SELECT * FROM posts WHERE id=$post_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result);
	} else {
		return null;
	}
}

function hasUserApplied($user_id, $post_id)
{
	global $conn;
	$sql = "SELECT * FROM job_apply WHERE user_id=$user_id AND post_id=$post_id";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)> 0) {
		// return username
		return true;
	} else {
		return false;
	}
}

function getAppliedJobs($user_id)
{
	global $conn;
	$sql = "SELECT * FROM job_apply WHERE user_id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return mysqli_fetch_all($result, MYSQLI_ASSOC);;
	} else {
		return null;
	}
}
function getApplicantsOfPost($post_id){
	global $conn;
	$sql = "SELECT * FROM job_apply WHERE post_id=$post_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return mysqli_fetch_all($result, MYSQLI_ASSOC);;
	} else {
		return null;
	}
}
?>

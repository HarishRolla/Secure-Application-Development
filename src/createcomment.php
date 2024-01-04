<?php
	require "database.php";
	require "session_auth.php";
	$comment = $_POST["comment"];
	$postid = $_POST["postid"];
	$username = $_SESSION["username"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($comment) and !empty($comment)) {
		if(addcomment(sanitize_input($comment), $username, $postid)) {
			echo "<script>alert('Comment has been posted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Unable to add comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to add comment');</script>";
		header("Refresh:0; url=index.php");
	}

?>
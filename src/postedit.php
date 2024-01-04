<?php
	require "session_auth.php";
	require "database.php";
	$postid = $_POST["postid"];
	$post = $_POST["post"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}

	if((isset($postid) and !empty($postid)) and (isset($post) and !empty($post))) {
		if (editpost(sanitize_input($postid), sanitize_input($post))) {
			echo "<script>alert('Post has been edited successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot edit post');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to edit post');</script>";
		header("Refresh:0; url=index.php");
	}
?>

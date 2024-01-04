<?php
	require "database.php";
	require "session_auth.php";
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($_POST["postid"]) and !empty($_POST["postid"])) {

		if (deletepost($_POST["postid"])) {
			echo "<script>alert('Post has been deleted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot delete post');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Cannot delete post');</script>";
		header("Refresh:0; url=index.php");
	}

?>
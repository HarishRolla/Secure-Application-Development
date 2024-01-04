<?php
	require "database.php";
	require "session_auth.php";
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($_POST["commentid"]) and !empty($_POST["commentid"])) {

		if (deletecomment($_POST["commentid"])) {
			echo "<script>alert('Comment has been deleted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Unable to delete the comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to delete the comment');</script>";
		header("Refresh:0; url=index.php");
	}

?>
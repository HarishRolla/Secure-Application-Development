<?php
	require "session_auth.php";
	require "database.php";
	$commentid = $_POST["commentid"];
	$comment = $_POST["comment"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}

	if((isset($commentid) and !empty($commentid)) and (isset($comment) and !empty($comment))) {
		if (editcomment(sanitize_input($commentid), sanitize_input($comment))) {
			echo "<script>alert('Comment has been edited successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot edit comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Cannot edit comment');</script>";
		header("Refresh:0; url=index.php");
	}
?>

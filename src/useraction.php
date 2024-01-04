<?php
	require "session_auth.php";
	require 'database.php';
	$username = $_POST['username'];
	$superuser = $_SESSION['superuser'];
	$status = $_POST['status'];
	$nocsrftoken = $_POST['nocsrftoken'];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if ($superuser) {
		if (isset($username)) {
			$changestatus = 1;
			if ($status == 1) {
				$changestatus = 0;
			}
			if (enabledisableuser($username, $changestatus)) {
				echo "<script>alert('User status has been changed');</script>";
				header("Refresh:0; url=userlist.php");
			} else {
				echo "<script>alert('Error: Cannot update userstatus');</script>";
				header("Refresh:0; url=userlist.php");
			}
		} else {
			echo "<script>alert('Error: Cannot update userstatus');</script>";
			header("Refresh:0; url=userlist.php");
		}
	}
?>
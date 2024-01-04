<?php
	require "database.php";
	require "session_auth.php";
	$postdescription = $_POST["post"];
	$username = $_SESSION["username"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($postdescription) and !empty($postdescription)) {
		if(addpost(sanitize_input($postdescription), $username)) {
			echo "<script>alert('Post has been created successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot create post.');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: No data provided to create a post');</script>";
		header("Refresh:0; url=index.php");
	}

?>
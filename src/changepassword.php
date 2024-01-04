<style>
.up-container {
  width: fit-content;
  padding: 0.5rem;
  background-color: white;
  margin-bottom: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}
.container {
  display: block;
  margin: 0 auto;
  margin-top: 2rem;
  width: 60%;
  padding: 2rem;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

h1, h2 {
/*  text-align: center;*/
  margin-bottom: 16px;
  color: #2a5298;
}

.button {
  background-color: #2a5298;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  display: inline-block;
  text-decoration: none;
}

.button:hover {
  background-color: #1e3c72;
}
</style>
<?php
	require "session_auth.php";
	require 'database.php';
	$username = $_SESSION['username'];
	$new_password = $_REQUEST['newpassword'];
	$oldpassword = $_REQUEST['oldpassword'];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($username) AND isset($new_password)) {
		if (changepassword($username, $oldpassword, $new_password)) {
			?>
			<div class="container">
				<div class="up-container">
			      <a href="index.php" class="home">
			        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="black" class="bi bi-house" viewBox="0 0 16 16">
			          <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
			        </svg>
			        Home
			      </a>
			    </div>
				<h2>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
				  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</svg>
					Your password has been changed.
				</h2>
			</div>
			<?php
		} else {
			echo "<script>alert('Error: Cannot change the password.');</script>";
			header("Refresh:0; url=index.php");
			die();
		}
	} else {
		echo "<script>alert('Error: No provided username/password to change.');</script>";
		header("Refresh:0; url=index.php");
		die();
	}
?>

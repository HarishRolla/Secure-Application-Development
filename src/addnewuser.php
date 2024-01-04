<style>
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
	require "database.php";
	if ((isset($_POST["username"]) and !empty($_POST["username"])) and (isset($_POST["name"]) and !empty($_POST["name"])) and (isset($_POST["password"]) and !empty($_POST["password"])) and (isset($_POST["mobile"]) and !empty($_POST["mobile"]))) {

		if (addnewuser(sanitize_input($_POST["username"]), sanitize_input($_POST["name"]), sanitize_input($_POST["password"]), sanitize_input($_POST["mobile"]))) {
			
			?>
			<div class="container">
				<h2>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
				  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				</svg>
				Registration successful! Welcome to MiniFacebook. Login to the system to acccess all the features.
				</h2>
				<a href="form.php" class="button">Login Again</a>
			</div>
			<?php
		} else {
			echo "<script>alert('Error: Unable to add user');</script>";
			header("Refresh:0; url=registrationform.php");
		}
	} else {
		echo "<script>alert('Error: Unable to add user as no data provided');</script>";
		header("Refresh:0; url=registrationform.php");
	}
?>
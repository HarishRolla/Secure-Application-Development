<style>
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(to right, #1e3c72 0%, #2a5298 100%);
    background-attachment: fixed;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-content: center;
}
* {
    margin: 0;
    padding: 0;
}
.container-inner {
	width: 90%;
	display: flex;
	flex-direction: row;
	margin-bottom: 0.5rem;
	align-items: center;
	justify-content: space-between;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	border-radius: 5px;
	padding: 1rem;
}
.container {
    width: 80%;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: white;
    margin-bottom: 1rem;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.heading {
	text-align: center;
	margin-bottom: 1rem;
}

h2, h3 {
    color: #2a5298;
}

a {
	text-decoration: none;
	color: black;
}

.up-container {
  width: fit-content;
  padding: 0.5rem;
  background-color: white;
  margin-bottom: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.button {
    background-color: #2a5298;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    display: inline-block;
}

.up-up-container {
	width: 100%;
	align-items: flex-start;
}
</style>
<?php
  require "session_auth.php";
  require "database.php";
  $rand= bin2hex(openssl_random_pseudo_bytes(16));
  $_SESSION['nocsrftoken']= $rand;
  $issuperuser = $_SESSION['superuser'];
  if (!$issuperuser) {
  	echo "<script>alert('Logged in user is not a superuser');</script>";
	header("Refresh:0; url=logout.php");
	die();
  }
  $stmt = getallusers();
  $username = NULL;
  $name = NULL;
  $password = NULL;
  $mobile = NULL;
  $superuser = NULL;
  $enabled = NULL;
  if(!$stmt -> bind_result($username, $name, $password, $mobile, $superuser, $enabled)) echo "Binding failed";

  $num_rows = 0;
  	?>
  	<div class="container">
			<div class="up-up-container">
				<div class="up-container">
					<a href="index.php" class="home">
					<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="black" class="bi bi-house" viewBox="0 0 16 16">
					  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
					</svg>
					Home
					</a>
				</div>
			</div>
			<h2 class="heading">Registered users:</h2>
  	<?php
	while ($stmt -> fetch()) {
		?>
			<div class="container-inner">
				<h3><?php echo htmlentities($username); ?></h3>
				<div class="button-container">
				<form action="useraction.php" method="POST" class="form post">
					<input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
					<input type='hidden' name="status" value="<?php echo $enabled; ?>" />
					<input type='hidden' name='username' value="<?php echo $username; ?>">
			      	<button class="button">
			        	<?php
			        		if ($enabled == 1) {
			        			echo "Disable";
			        		} else {
			        			echo "Enable";
			        		}
			        	?>
			      	</button>
				</form>
				</div>
			</div>
		
		<?php
		$num_rows++;
	}
	?>
	</div>
	<?php
	if ($num_rows == 0) {
		echo "No users found.";
	}
?>
<style>
    body {
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right, #1e3c72 0%, #2a5298 100%);
      background-attachment: fixed;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    * {
      margin: 0;
      padding: 0;
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
      text-align: center;
      margin-bottom: 16px;
      color: #2a5298;
    }

    .options > a {
      color: white;
      text-decoration: underline;
      padding: 0.9rem;
      margin-bottom: 2rem;
    }

    button {
      width: 100%;
      background-color: #2a5298;
      color: white;
      padding: 10px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #1e3c72;
    }

    .userbutton {
    	width: 20%;
    	text-align: center;
    	color: white;
    	text-decoration: none;
    	display: block;
    	margin: 0 auto;
    	padding: 0.7rem 1.5rem 0.7rem 1.5rem;
    	background-color: #2a5298;
    }
    .chat {
	    width: 20%;
    	text-align: center;
    	color: white;
    	text-decoration: none;
    	display: block;
    	margin: 0 auto;
    	background-color: #2a5298;
  	}
    .userbutton:hover {
    	background-color: #1e3c72;
    }
</style>
<?php
	$lifetime = 15 * 60;
	$path = "/teamproject";
	$domain = "*.minifacebook.com";
	$secure = TRUE;
	$httponly = TRUE;
	session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
	session_start();

	$mysqli = new mysqli('localhost', 'secad-team12', 'p@ssw0rd', 'team12');
	if ($mysqli -> connect_errno) {
		printf('Database connection failed: %s\n', $mysqli->connect_error);
		exit();
	}
	if ((isset($_POST["username"]) and !empty($_POST["username"])) and isset($_POST["password"]) AND !empty($_POST["password"])) {
		if (securechecklogin($_POST["username"],$_POST["password"])) {	
			if (userenabled($_POST["username"])) {
				$_SESSION["logged"] = TRUE;
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
				if (checksuperuser($_POST["username"])) {
					$_SESSION["superuser"] = TRUE;
				} else {
					$_SESSION["superuser"] = FALSE;
				}
			} else {
				echo "<script>alert('Your account has been disabled, please contact administrator');</script>";
				session_destroy();
				header("Refresh:0; url=form.php");
				die();
			}
			
		}else{
			echo "<script>alert('Invalid username/password');</script>";
			session_destroy();
			header("Refresh:0; url=form.php");
			die();
		}
	}
	
	if (!isset($_SESSION["logged"]) or $_SESSION["logged"] != TRUE) {
		echo "<script>alert('You have not logged in, please login first.')</script>";
		header("Refresh:0; url=form.php");
		die();
	}
	if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
		echo "<script>alert('Session hijacking is detected');</script>";
		header("Refresh:0;url=form.php");
		die();
	}
	?>
		<div class="container">
		    <h1>Team Project, SecAD - MiniFacebook</h1>
		    <h2>Team 12: Shravanth Reddy and Harish Rolla</h2>
		    <h2>Welcome <?php echo htmlentities($_POST['username']); ?>!</h2>
		    <?php
		    if ($_SESSION["superuser"]) {
		    	?>
		    		<a href="userlist.php" class="userbutton">See all users</a>
		    	<?php
		    }
		      require "timeline.php";
		    ?>
				<form action="https://172.16.39.69:4430" class="chat">
		    	<button class="button chatbutton" type="submit">
	        	Chat Now
	      	</button>

		    </form>

		</div>
		<div class="options">
		      <a href="logout.php">Logout</a>
		      |
		      <a href="changepasswordform.php">Change Password</a>
		</div>
		<script src=""></script>
	<?php
	
  	function securechecklogin($username, $password) {
  		global $mysqli;
  		$prepared_sql = "SELECT * FROM users WHERE username = ? " .
  						" AND password=md5(?);";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			echo "Prepared statement error";
  		$stmt -> bind_param("ss", $username, $password);
  		if(!$stmt->execute()) echo "Execute error";
  		if(!$stmt->store_result()) echo "Store_result Error";
  		$result = $stmt;
			if ($result -> num_rows == 1)
				return TRUE;
			return FALSE;
  	}

  	function checksuperuser($username) {
  		global $mysqli;
  		$prepared_sql = "SELECT (superuser) FROM users WHERE username = ? ;";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			echo "Prepared statement error";
  		$stmt -> bind_param("s", $username);
  		if(!$stmt->execute()) echo "Execute error";
  		if(!$stmt->store_result()) echo "Store_result Error";
  		$stmt->bind_result($superuser);
  		$stmt->fetch();
  		if($superuser == 1) {
  			return TRUE;
  		}
  		return FALSE;
  	}
  	function userenabled($username) {
  		global $mysqli;
  		$prepared_sql = "SELECT (enabled) FROM users WHERE username = ? ;";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			echo "Prepared statement error";
  		$stmt -> bind_param("s", $username);
  		if(!$stmt->execute()) echo "Execute error";
  		if(!$stmt->store_result()) echo "Store_result Error";
  		$stmt->bind_result($enabled);
  		$stmt->fetch();
  		if($enabled == 1) {
  			return TRUE;
  		}
  		return FALSE;
  	}
?>

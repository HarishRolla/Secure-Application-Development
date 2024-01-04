<style>
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(to right, #1e3c72 0%, #2a5298 100%);
    background-attachment: fixed;
    color: #ffffff;
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
  padding: 16px;
  background-color: white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.up-container {
  width: fit-content;
  padding: 0.5rem;
  background-color: white;
  margin-bottom: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.commentcontainer {
  width: 90%;
  padding: 16px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

h3 {
  color: #2a5298;
  padding: 0.5rem 0.5rem 0.5rem 0;
}

.post {
	font-size: 1.5rem;
}

.home {
	color: #333;
	text-decoration: none;
}

p {
	padding: 0rem 0.5rem 0.5rem 0;
  font-size: 1rem;
  color: #333;
}

.text_field {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.button {
  background-color: #2a5298;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  display: inline-block;
}

.button:hover {
  background-color: #1e3c72;
}

.button.delete {
  background-color: #b22222;
}

.button.delete:hover {
  background-color: #8b0000;
}

.button-container {
  display: flex;
  flex-wrap: wrap;
}
</style>
<?php 
require "database.php";
require "session_auth.php";
$session_username = $_SESSION["username"];
$rand= bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['nocsrftoken']= $rand;
if(isset($_POST['username']) AND isset($_POST['post']) AND isset($_POST['postid'])) {
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
		<h3><?php echo htmlentities($_POST['username']); ?></h3>
		<p class="post"><?php echo htmlentities($_POST['post']); ?></p>
		<?php
			if($session_username == $_POST['username']) {
				?>
				<div class="button-container">
					<form action="posteditform.php" method="POST" class="form edit">
						<input type='hidden' name='postid' value="<?php echo $_POST['postid']; ?>">
						<input type='hidden' name='post' value="<?php echo $_POST['post']; ?>">
						<button class="button">
				        	Edit post
				      	</button>
					</form>
					<form action="postdelete.php" method="POST" class="form delete">
						<input type='hidden' name='postid' value="<?php echo $_POST['postid']; ?>">
						<input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
						<button class="button delete">
				        	Delete post
				      	</button>
					</form>
				</div>
				<?php
			}
		?>
		<h3>Comments:</h4>
	<?php
	$stmt = getcomments($_POST['postid']);
	$username = NULL;
	$comment = NULL;
	$commentid = NULL;
	$postid = NULL;
	if(!$stmt -> bind_result($commentid, $comment, $postid, $username)) echo "Binding failed";
	$num_rows = 0;
	while ($stmt -> fetch()) {
		?>
			<div class="commentcontainer">
				<h3><?php echo htmlentities($username); ?></h3>
	    	<p><?php echo htmlentities($comment); ?></p>
	  <?php
		if($username == $session_username) {
			?>
			<div class="button-container">
			<form action="commenteditform.php" method="POST" class="form edit">
				<input type='hidden' name='commentid' value="<?php echo htmlentities($commentid); ?>">
				<input type='hidden' name='comment' value="<?php echo htmlentities($comment); ?>">
				<button class="button" type="submit">
               		Edit Comment
            	</button>
			</form>
			<?php
		}
		if ($username == $session_username or $_POST['username'] == $session_username) {
			?>
			<form action="commentdelete.php" method="POST" class="form delete">
				<input type='hidden' name='commentid' value="<?php echo htmlentities($commentid) ?>">
				<input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
				<button class="button delete" type="submit">
               		Delete comment
            	</button><br>
			</form>
			</div>
			<?php
		}
		?>
	</div>
	<?php
		$num_rows++;
	}
	if($num_rows == 0) {
		?>
			<h3>No comments found</h3>
		<?php
	}
	?>
	<form action="createcomment.php" method="POST" class="form postcreate">
    	<br>
        <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
        <input type='hidden' name="postid" value="<?php echo htmlentities($_POST['postid']); ?>" />

        <b>Comment:</b> <br>
        <input type="text" class="text_field" name="comment" required placeholder="Enter your comment here.. "/> <br><br>         
        <button class="button" type="submit">
          Comment
        </button>
	</form>
	<?php
} 
?>
</div>

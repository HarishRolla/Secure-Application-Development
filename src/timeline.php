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
    width: 80%;
    background-color: white;
    margin-bottom: 1rem;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  }

  h2, h3 {
    color: #2a5298;
  }

  textarea {
    display: block;
    margin: 0 auto;
    align-items: center;
    width: 80%;
    height: 5rem;
    padding: 0.5rem;
    margin-bottom: 1rem;
  }

  .button {
    background-color: #2a5298;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    display: inline-block;
  }

  .createpost {
    background-color: #3CB043;
    color: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 2rem;
    width: 30%;
    padding: 0.7rem;
    box-sizing: border-box;	
  }

  .button.createpost:hover {
    background-color: #028A0F;
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

  p {
    font-size: 2rem;
    color: #333;
    margin-bottom: 1rem;
  }

  .button-container {
    display: flex;
    flex-wrap: wrap;
  }
  </style>
<?php
require "database.php";
$rand= bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['nocsrftoken']= $rand;
$result = getposts();
?>
<!--  -->
	<form action="createpost.php" method="POST" class="form post">
	    <br>
	        <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
	        <textarea name="post" required placeholder="Enter your thoughts here.. "></textarea>       
	        <button class="button createpost" type="submit">
	          Post
	        </button>
	</form>

	<?php
	if ($result -> num_rows > 0) {
		while($row = $result -> fetch_assoc()) {
			?>	
			<div class="container">
				<h3><?php echo htmlentities($row['username']); ?></h3>
				<p><?php echo htmlentities($row['post']); ?></p>
				<div class="button-container">
					<form action="post.php" method="POST" class="form post">
						<input type='hidden' name='postid' value="<?php echo $row['postid']; ?>">
						<input type='hidden' name='username' value="<?php echo $row['username']; ?>">
						<input type='hidden' name='post' value="<?php echo $row['post']; ?>">
				      	<button class="button">
				        	View comments
				      	</button>
					</form>
			<?php
			if($_SESSION['username'] == $row['username']) {
				?>
					<form action="postdelete.php" method="POST" class="form delete">
						<input type='hidden' name='postid' value="<?php echo $row['postid'] ?>">
						<input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
						<button class="button delete">
				        	Delete post
				      	</button>
					</form>
					<form action="posteditform.php" method="POST" class="form edit">
						<input type='hidden' name='postid' value="<?php echo $row['postid']; ?>">
						<input type='hidden' name='post' value="<?php echo $row['post']; ?>">
						<button class="button">
				        	Edit post
				      	</button>
					</form>
				<?php
			}
			?>
			</div>
		</div>
			<?php
		}
	} else {
		?>
			<h2>No posts to display.. </h2>
		<?php
	}
?>
<!-- </div> -->



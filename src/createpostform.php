<?php
	require "session_auth.php";
	$rand= bin2hex(openssl_random_pseudo_bytes(16));
  	$_SESSION['nocsrftoken']= $rand;
?>
	<form action="createpost.php" method="POST" class="form postcreate">
        <br>
            <b>Username:</b> <br>
            <?php echo htmlentities($_SESSION['username']); ?>
            <br><br>
            <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />

            <b>Post description:</b> <br>
            <input type="text" class="text_field" name="post" required placeholder="Enter your thoughts here.. "/> <br><br>         
            <button class="button" type="submit">
              Post
            </button>
    </form>
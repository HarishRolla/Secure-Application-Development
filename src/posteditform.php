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

input {
  display: block;
  margin: 0 auto;
  align-items: center;
  width: 80%;
  height: 5rem;
  padding: 0.5rem;
  margin-bottom: 1rem;
}

.home {
  color: #333;
  text-decoration: none;
}

.button {
  background-color: #2a5298;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  display: inline-block;
}

.editpost {
  background-color: #3CB043;
  color: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 2rem;
  width: 30%;
  padding: 0.7rem;
  box-sizing: border-box; 
}

.up-container {
  width: fit-content;
  padding: 0.5rem;
  background-color: white;
  margin-bottom: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.button.createpost:hover {
  background-color: #028A0F;
}

</style>
<?php
	require "session_auth.php";
  $post = $_POST["post"];
  $postid = $_POST["postid"];
  $rand= bin2hex(openssl_random_pseudo_bytes(16));
  $_SESSION['nocsrftoken']= $rand;
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
  	<form action="postedit.php" method="POST" class="form postedit">
      <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
      <input type="text" name="post" required value="<?php echo htmlentities($post); ?>"></input>  
      <input type='hidden' name='postid' value="<?php echo $postid; ?>">       
      <button class="button editpost" type="submit">
        Edit Post
      </button>
    </form>
  </div>
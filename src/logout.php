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
session_start();
session_destroy();
?>

<div class="container">
	<h2>
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
	  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
	</svg>
	You have been successfully logged out.
	</h2>
	<a href="form.php" class="button">Login Again</a>
</div>

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
  width: 40%;
  padding: 16px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  margin: 100px auto;
}

h3, h1 {
  color: #2a5298;
  margin-bottom: 8px;
}

p {
  color:black;
  margin-bottom: 1rem;
}

.text_field {
  width: 100%;
  padding: 8px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.button {
  background-color: #2a5298;
  color: white;
  margin-top: 1rem;
  margin-bottom: 1rem;
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registration page - SecAD</title>
</head>
<body>
  <div class="container">
    <h1>Sign Up for a new account</h1>
    <p>Current time: <?php echo date("Y-m-d h:i:sa"); ?></p>
    <form action="addnewuser.php" method="POST" class="form register">
      <input type="text" class="text_field" name="username" required
      pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
      title="Please enter a valid email as username"
      placeholder="Your email address"
      onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/>
      <input type="text" class="text_field" name="name" placeholder="Name"/>

      <input type="password" class="text_field" name="password" required
      pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$"
      placeholder="Your password"
      title="Password must have at least 8 charaters with 1 special symbol !@#$%^& 1 number, 1 lowecase and 1 UPPERCASE"
      onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');
      form.repassword.pattern = this.value; "/>

      <input type="password" class="text_field" name="repassword"
      placeholder="Retype your password" required
      title="Password does not match"
      onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'')" />

      <input type="tel" class="text_field" name="mobile" placeholder="Mobile" />
      <button class="button" type="submit">
        Sign Up
      </button>
      <p>Already have an account? <a href="form.php">Login here</a>
</form>
</div>
</body>
</html>


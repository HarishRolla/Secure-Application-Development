<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login page - SecAD - MiniFacebook</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right, #1e3c72 0%, #2a5298 100%);
      background-attachment: fixed;
    }

    .container {
      width: fit-content;
      padding: 16px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      margin: 100px auto;
    }

    h1, h2 {
      text-align: center;
      margin-bottom: 16px;
      color: #2a5298;
    }

    label {
      display: block;
      font-weight: bold;
      color: #2a5298;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      background-color: #2a5298;
      color: white;
      padding: 10px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #1e3c72;
    }

    a {
      color: #2a5298;
      text-decoration: none;
    }

    a:hover {
      color: #1e3c72;
      text-decoration: underline;
    }

    .register {
      display: flex;
      justify-content: center;
      margin-top: 16px;
    }
    p {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Team Project, SecAD - MiniFacebook</h1>
    <h2>Team 12: Harish Rolla and Shravanth Reddy</h2>
    <p>Current time: <?php echo date("Y-m-d h:i:sa"); ?></p>

    <form action="index.php" method="POST" class="form login">
      <input type="text" class="text_field" name="username" id="username" required
      pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
      title="Please enter a valid email as username"
      placeholder="username"
      onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/>

      <input type="password" class="text_field" name="password" required
      pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$"
      placeholder="Password"
      title="Password must have at least 8 charaters with 1 special symbol !@#$%^& 1 number, 1 lowecase and 1 UPPERCASE"
      onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');
       "/>

      <button class="button" type="submit">
        Login
      </button>
    </form>
    <div class="register">
      <span>Don't have an account? <a href="registrationform.php">Sign Up</a></span>
    </div>
  </div>
</body>
</html>
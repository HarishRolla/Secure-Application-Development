<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Change password page - SecAD-Team12</title>
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

    input[type="password"] {
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

    .up-container {
      width: fit-content;
      padding: 0.5rem;
      background-color: white;
      margin-bottom: 1rem;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .home {
      color: #333;
      text-decoration: none;
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
        <div class="up-container">
          <a href="index.php" class="home">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="black" class="bi bi-house" viewBox="0 0 16 16">
              <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg>
            Home
          </a>
        </div>
      	<h1>Change password, SecAD-Team12</h1>
        <h2>By Harish Rolla and Shravanth Reddy</h2>
        <p>Current time: <?php echo date("Y-m-d h:i:sa"); ?></p>
<?php
  require "session_auth.php";
  $rand= bin2hex(openssl_random_pseudo_bytes(16));
  $_SESSION['nocsrftoken']= $rand;
?>
          <form action="changepassword.php" method="POST" class="form login">
            <br>
                <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />

                <input type="password" class="text_field" name="oldpassword" required 
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$" 
                placeholder="Old password"
                title="Password must have at least 8 charaters with 1 special symbol !@#$%^& 1 number, 1 lowecase and 1 UPPERCASE"
                onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/>

                <input type="password" class="text_field" name="newpassword" required 
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$" 
                placeholder="New password"
                title="Password must have at least 8 charaters with 1 special symbol !@#$%^& 1 number, 1 lowercase and 1 UPPERCASE"
                onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/> 

                <button class="button" type="submit">
                  Change Password
                </button>
          </form>
  </div>
</body>
</html>


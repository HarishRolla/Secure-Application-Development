# Project title: Mini Facebook Web Application

<a href="https://bitbucket.org/secad-s23-team12/secad-s23-team12-project/src/master/">Link to repository</a>

<b>Course Number:</b> CPS 475/575

<b>Course Name:</b> Secure Application Development

<b>Instructor:</b> Dr. Phu Phung

<b>Team members:</b>

1. Shravanth Reddy Reddy

2. Harish Pavan Rolla

<b>ID#:</b>

1. reddys14

2. rollah1

<b>Email:</b>

1. reddys14@udayton.edu

2. rollah1@udayton.edu


## 1. Introduction

Developing secure miniFacebook web application where Users can sign in and communicate with each other via chat, as well as share their thoughts by posting them for others to see. Other users can leave comments on these posts, and users are able to change their passwords. In addition, we offer superusers, who can access the database without registering, view the list of users, and enable/disable registered users.

## 2. Design

### Database

For the database design section, we have developed a user table that serves to store all relevant user information, including their username, name, phone number, and password. This table will help maintain user details and ensure secure access to the system.
In the user table , we have added two additional fields, "superuser" and "enabled". The "superuser" field contains a value of either 1 or 0, where 1 represents a superuser who has access to the user list and 0 represents a regular user.
The "enabled" field also contains a value of either 1 or 0, where 1 represents an enabled user and 0 represents a disabled user. Enabled user will be able to login to the account and access posts and comments while disabled user will not be able to login to the system. Specifically, superusers with a "superuser" value of 1 have access to the user list, while users with an "enabled" value of 1 have access to the system.

In addition to the user table. we have also created two additional tables. The first is the posts table, which stores all relevant information about a post, including the post ID (primary key), post, and the username of the user who created it (foreign key referencing the user table). The second is the comments table, which stores all relevant information about a comment, including the comment ID (primary key), comment, the username of the user who created it (foreign key referencing the user table), and the post ID of the post it belongs to (foreign key referencing the posts table).


The relationships between these tables are as follows:


* A single user can create many posts (one-to-many relationship).
* Each post can have many comments (one-to-many relationship).
* A single user can create many comments (one-to-many relationship).


By setting up these relationships and using primary and foreign keys, we can ensure that the data in our system is organized, easily accessible, and can be used to support a wide range of use cases.
<br> </br>


<img src="https://shravanthreddy.github.io/DemoScreenshots/erdiagram.png" alt="Alt Text" style="width: 600px;">


### Web Interface

Regarding the web interface, our project allows anyone to easily register for a MiniFacebook account. Once registered, users can log in to the website and gain access to various features and functionalities. In addition, registered users have the ability to change their password at any time, ensuring the security and privacy of their account.


In addition to the ability to register and log in, our MiniFacebook project allows registered users to post their thoughts and share them with other users. Users can create a new post and publish it on the website. Moreover, registered users can also interact with other posts by commenting on them. They can read other users' posts, add comments, and engage in discussions.


For Implementation , we have set up the following rules:


* Logged-in users can add a new post, view posts, and add comments on any post.
* Logged-in users can delete their own posts and comments.
* A user cannot edit posts and comments of other users.

In our Mini Facebook project, superusers have the ability to log in and view the list of registered users. This functionality is made possible through the "superuser" field in the user table. Specifically, we check the value of the "superuser" field for each user, and if it is 1, we display the option to view the user list.

Additionally, in the user list, we have provided a feature where superusers can enable or disable a user. This is achieved through an "enable/disable" button located next to each user's name. However, that superusers do not have the ability to delete users from the system.

## 3. Implementation & Secure Analysis

### Security Programming Principles:

In our Mini Facebook project, we have implemented various security programming principles to ensure the <b>confidentiality</b> of users' data.here unauthorized users are unable to read or modify any posts or chats.
We have utilized a session_auth file to verify the user's session and to determine whether they are a logged-in user or an attacker. Moreover, our system has multiple <b>defense-in-depth</b> mechanisms layers, such as a three-tier validation process in the front-end, back-end, and database before executing any action.
Furthermore, our system follows an <b>open design</b>. Additionally, we have a <b>fail-safe default</b> where users have no access to the system by default, and they need to register to gain access. and we only giving acces to the super user for uses list and privilege to enable and disable the users. Overall, our project is designed to prioritize the security and confidentiality of our users' data.

### Defense-in-depth and Defense-in-breath Principles:

We have implemented both defense in depth and defense in breadth principles to ensure the security of our system. For instance, we have utilized regular expressions to enforce correct syntax for fields like phone numbers and usernames. We have also incorporated prepared SQL statements and performed data checks before making any modifications to the database.

We have implemented a three-tier security approach that includes security layers in the front-end, back-end, and database. This approach ensures that our system is secure and that any potential threats are detected and prevented at multiple levels.

### Robust and Defensive Programming

We have prioritized robust and defensive programming by ensuring that all abnormal inputs are handled. Our system has the ability to handle any unexpected actions or abnormal termination effectively.

Input data can be uncontrolled, unexpected, and unpredictable, we developed our project with the expectation that anything unexpected could occur. To ensure the robustness and defensiveness of our system, we have written exception handlers that can detect and handle any potential errors or issues that arise. Overall, our project is designed to be highly resilient, ensuring that it can handle any potential threats or issues that may arise.

### Super Users

In our Mini Facebook project, we have added a new field called "superuser" in the users table of our database. This field contains either a value of 1 or 0, where 1 represents a superuser and 0 represents a regular user.

By utilizing this field, we have implemented a feature that enables or disables the "show user list" button on the homepage. Specifically, we only show this button to superusers by checking the value of the "superuser" field in the database.

### Preventing Attacks

In this Minifacebook application, a user will be able to login using their existing credentials or create an account by providing details such as username, name, password, mobile etc. Once logged in the user will be able to change their password.

We have implemented a secure login page that ensures the safety and privacy of user information. We have taken several measures to prevent potential security threats.

### XSS attacks:

To prevent XSS attacks, we have implemented the use of <b>'htmlentities()'</b> function while taking user input. This function ensures that all user inputs are treated as strings, even if the input contains potentially harmful script elements.

### SQL Injection attacks:

To prevent SQL Injection attacks that can happen when checking if the credentials are in database or not, we have created a prepared SQL statement without any inputs. Afterward, we bind the user input to the prepared statement and execute the query. By using this approach, we can prevent any malicious user input from altering the SQL statement or accessing sensitive data.

### Session Hijacking attacks:

After a user successfully logs in, a session ID is generated. However, it's possible for attackers to steal the session ID and gain access to the website as the user. To prevent session hijacking attacks, we have implemented several security measures.

First, we have set session cookie parameters to enhance the security of our system. This includes using HTTPOnly session cookies to prevent JavaScript from accessing the cookie, setting the Secure flag for session cookies to ensure that they are only sent via HTTPS, and limiting the session lifetime to reduce the attack window.

However, to further strengthen the security of our system, we have added an extra layer of defense for the session. This involves storing a new session variable with browser information, which is then checked against the session information. If there is any difference between the two, it indicates that the session has been hijacked.

In the change password page, we require users to log in before accessing the change password page. This ensures that only authorized users can access this feature to prevent others from changing password of other users. We have used the session_auth to ensure that the session belongs to the user who is authenticated.

### CSRF Attacks:

We have taken measures to prevent CSRF attacks. We have implemented Secret Token implementation, which involves generating a random secret token and storing it in the user's session and also in the form in the changepassword form. On the change password page, we check the token to ensure that the request is coming from a legitimate source and not a CSRF attack. If the token in the session matches the token sent by the form, only then the password is changed.

By implementing these security measures, We strive to create a safe and trustworthy environment for our users, and these measures are critical in achieving this goal.

## 4. Demo

### Login Page:

All users will be able to access this page and can login to their accounts using username and password. First time users will also be able to create a new account by clicking on Sign up below.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/loginpage.png" alt="Alt Text" style="width: 600px;">

### Sign Up:

All users will be able to access this page. Here users will be able to enter their details and click on sign up to create a new account in the MiniFacebook application.

<img src="https://shravanthreddy.github.io/DemoScreenshots/registerpage.png" alt="Alt Text" style="width: 600px;">

### Add new user:

This page will be displayed once the sign up has been successful.

<img src="https://shravanthreddy.github.io/DemoScreenshots/registrationsuccessful.png" alt="Alt Text" style="width: 600px;">

### Home Page:

Once the user enters correct credentials, user will be redirected to the home page where a welcome message will be shown. This welcome page will be same for both superuser and regular user, however the only notable difference is that of the addition of a "See all users" button for a superuser. From this page, the user will be able to change the password or logout from the account.

<img src="https://shravanthreddy.github.io/DemoScreenshots/regularuserhomescreen.png" alt="Alt Text" style="width: 600px;">

<img src="https://shravanthreddy.github.io/DemoScreenshots/adminhomescreen.png" alt="Alt Text" style="width: 600px;">

### User list:

This page will be only visible to the superuser. Here the superuser will be able to see all the registered users and the superuser will be able to enable/disable their account.

<img src="https://shravanthreddy.github.io/DemoScreenshots/userlistpage.png" alt="Alt Text" style="width: 600px;">

### Change password Form:

This page is only accessible to the authorized users. Here user will be able to change their password. They have to enter only the new password and username will be autofilled.

<img src="https://shravanthreddy.github.io/DemoScreenshots/changepwd.png" alt="Alt Text" style="width: 600px;">

### Change password:

This page will be displayed after the password is changed.

<img src="https://shravanthreddy.github.io/DemoScreenshots/changepwdsuccessful.png" alt="Alt Text" style="width: 600px;">

### Logout

This page will be displayed once the user clicks on logout in the Home page.

<img src="https://shravanthreddy.github.io/DemoScreenshots/logoutpage.png" alt="Alt Text" style="width: 600px;">

### Comments

This page will display an individual post and it will have comments put out by users. Here edit post or comment and delete post or comment will only be displayed to the author of the post or comment. All the other users will not see this option.

<img src="https://shravanthreddy.github.io/DemoScreenshots/postpage.png" alt="Alt Text" style="width: 600px;">

### Edit post page

This page will be displayed to the user who clicks on the editpage button and should be an author of the post. Here users will be able to edit their posts. Edit comments page will also have same UI.

<img src="https://shravanthreddy.github.io/DemoScreenshots/editpost.png" alt="Alt Text" style="width: 600px;">

### Superuser can disable and enable account

The superuser will be able to enable or disable the registered accounts. Once disable the user will not be able to login, until the superuser enables the account again.

<img src="https://shravanthreddy.github.io/DemoScreenshots/accdisabled.png" alt="Alt Text" style="width: 600px;">

<img src="https://shravanthreddy.github.io/DemoScreenshots/accenabled.png" alt="Alt Text" style="width: 600px;">

<img src="https://shravanthreddy.github.io/DemoScreenshots/enabledacclogin.png" alt="Alt Text" style="width: 600px;">


### A regular logged-in user can delete their own posts but cannot delete posts of others

Only the author of the post will be given an option to delete the post and for the posts of others, this button will not be displayed.

<img src="https://shravanthreddy.github.io/DemoScreenshots/deleteoption.png" alt="Alt Text" style="width: 600px;">

### CSRF Attack to delete a post should be detected and prevented

CSRF attack to delete a post will be detected and an alert will be displayed to the user stating the same. The user will be logged out of the account immediately.

<img src="https://shravanthreddy.github.io/DemoScreenshots/csrfdelete.png" alt="Alt Text" style="width: 600px;">

### A regular logged-in user cannot access the link for superusers

A regular logged-in user if tried to access the link specific users, an alert will be displayed stating that the logged in user is not a superuser.

<img src="https://shravanthreddy.github.io/DemoScreenshots/regularusersuperuseraccess.png" alt="Alt Text" style="width: 600px;">

### A logged-in user can have real-time chat with other users

A logged-in user will be able to chat directly with other logged in users using the chat server.

<img src="https://shravanthreddy.github.io/DemoScreenshots/realtimechat.png" alt="Alt Text" style="width: 600px;">

## 5. Appendix

## database.sql
```sql
DROP TABLE IF EXISTS `users`,`posts`,`comments`;

CREATE TABLE users(
	username varchar(50) PRIMARY KEY,
	name varchar(30) NOT NULL,
	password varchar(100) NOT NULL,
	mobile varchar(20) NOT NULL,
	superuser int UNSIGNED NOT NULL,
	enabled int UNSIGNED NOT NULL);

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES ('admin@udayton.edu', 'Administrator', md5('secadTeam@12'), '9371234567', 1, 1);
UNLOCK TABLES;

CREATE TABLE posts(
	postid int NOT NULL AUTO_INCREMENT,
	post varchar(300) NOT NULL,
	username varchar(50) NOT NULL,
	PRIMARY KEY(postid),
	FOREIGN KEY(username) REFERENCES users(username));

CREATE TABLE comments(
	commentid int NOT NULL AUTO_INCREMENT,
	comment varchar(100) NOT NULL,
	postid int NOT NULL,
	username varchar(50) NOT NULL,
	PRIMARY KEY(commentid),
	FOREIGN KEY(postid) REFERENCES posts(postid),
	FOREIGN KEY(username) REFERENCES users(username));
```
## createpostform.php
```php
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
```
## posteditform.php
```php
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
```
## changepasswordform.php
```php
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


```
## commentedit.php
```php
<?php
	require "session_auth.php";
	require "database.php";
	$commentid = $_POST["commentid"];
	$comment = $_POST["comment"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}

	if((isset($commentid) and !empty($commentid)) and (isset($comment) and !empty($comment))) {
		if (editcomment(sanitize_input($commentid), sanitize_input($comment))) {
			echo "<script>alert('Comment has been edited successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot edit comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Cannot edit comment');</script>";
		header("Refresh:0; url=index.php");
	}
?>

```
## changepassword.php
```php
<style>
.up-container {
  width: fit-content;
  padding: 0.5rem;
  background-color: white;
  margin-bottom: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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
	require "session_auth.php";
	require 'database.php';
	$username = $_SESSION['username'];
	$new_password = $_REQUEST['newpassword'];
	$oldpassword = $_REQUEST['oldpassword'];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($username) AND isset($new_password)) {
		if (changepassword($username, $oldpassword, $new_password)) {
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
				<h2>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
				  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</svg>
					Your password has been changed.
				</h2>
			</div>
			<?php
		} else {
			echo "<script>alert('Error: Cannot change the password.');</script>";
			header("Refresh:0; url=index.php");
			die();
		}
	} else {
		echo "<script>alert('Error: No provided username/password to change.');</script>";
		header("Refresh:0; url=index.php");
		die();
	}
?>

```
## timeline.php
```php
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



```
## createcomment.php
```php
<?php
	require "database.php";
	require "session_auth.php";
	$comment = $_POST["comment"];
	$postid = $_POST["postid"];
	$username = $_SESSION["username"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($comment) and !empty($comment)) {
		if(addcomment(sanitize_input($comment), $username, $postid)) {
			echo "<script>alert('Comment has been posted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Unable to add comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to add comment');</script>";
		header("Refresh:0; url=index.php");
	}

?>
```
## userlist.php
```php
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
```
## index.php
```php
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

```
## postdelete.php
```php
<?php
	require "database.php";
	require "session_auth.php";
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($_POST["postid"]) and !empty($_POST["postid"])) {

		if (deletepost($_POST["postid"])) {
			echo "<script>alert('Post has been deleted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot delete post');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Cannot delete post');</script>";
		header("Refresh:0; url=index.php");
	}

?>
```
## addnewuser.php
```php
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
	require "database.php";
	if ((isset($_POST["username"]) and !empty($_POST["username"])) and (isset($_POST["name"]) and !empty($_POST["name"])) and (isset($_POST["password"]) and !empty($_POST["password"])) and (isset($_POST["mobile"]) and !empty($_POST["mobile"]))) {

		if (addnewuser(sanitize_input($_POST["username"]), sanitize_input($_POST["name"]), sanitize_input($_POST["password"]), sanitize_input($_POST["mobile"]))) {
			
			?>
			<div class="container">
				<h2>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
				  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				</svg>
				Registration successful! Welcome to MiniFacebook. Login to the system to acccess all the features.
				</h2>
				<a href="form.php" class="button">Login Again</a>
			</div>
			<?php
		} else {
			echo "<script>alert('Error: Unable to add user');</script>";
			header("Refresh:0; url=registrationform.php");
		}
	} else {
		echo "<script>alert('Error: Unable to add user as no data provided');</script>";
		header("Refresh:0; url=registrationform.php");
	}
?>
```
## commentdelete.php
```php
<?php
	require "database.php";
	require "session_auth.php";
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if (isset($_POST["commentid"]) and !empty($_POST["commentid"])) {

		if (deletecomment($_POST["commentid"])) {
			echo "<script>alert('Comment has been deleted successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Unable to delete the comment');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to delete the comment');</script>";
		header("Refresh:0; url=index.php");
	}

?>
```
## form.php
```php
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
```
## logout.php
```php
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

```
## database.php
```php
<?php
	$mysqli = new mysqli('localhost', 'secad-team12', 'p@ssw0rd', 'team12');
	if ($mysqli -> connect_errno) {
		exit();
	}

  	function changepassword($username, $oldpassword, $newpassword) {
  		if(!checkoldpassword($username, $oldpassword)) {
  			return FALSE;
  		}
  		global $mysqli;
  		$prepared_sql = "UPDATE users SET password=md5(?) WHERE username = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("ss", $newpassword, $username);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function enabledisableuser($username, $status) {
  		global $mysqli;
  		$prepared_sql = "UPDATE users SET enabled=? WHERE username = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("is", $status, $username);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function checkoldpassword($username, $password) {
  		global $mysqli;
  		$prepared_sql = "SELECT * FROM users WHERE username = ? " .
  						" AND password=md5(?);";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("ss", $username, $password);
  		if(!$stmt->execute()) return FALSE;
  		if(!$stmt->store_result()) return FALSE;
  		$result = $stmt;
		if ($result -> num_rows == 1)
			return TRUE;
		return FALSE;
  	}

  	function addnewuser($username, $name, $password, $mobile) {
  		if(!preg_match("/^[\w.-]+@[\w-]+(.[\w-]+)*$/", $username) or !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[\w!@#$%^&]{8,}$/", $password)) {
  			return FALSE;
  		}
  		$superuser = 0;
  		$enabled = 1;
  		global $mysqli;
  		$prepared_sql = "INSERT INTO users (username, name, password, mobile, superuser, enabled) VALUES (?, ?, md5(?), ?, ?, ?); ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("ssssii", $username, $name, $password, $mobile, $superuser, $enabled);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}

  	function getallusers() {
  		global $mysqli;
  		$superuser = 0;
  		$prepared_sql = "SELECT * FROM users WHERE superuser = ? ;";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("i", $superuser);
  		if($stmt->execute()) {
  			return $stmt;
  		}

  	}

  	function getposts(){
  		global $mysqli;
  		$sql = "SELECT * FROM posts;";
		$result=$mysqli->query($sql);
		return $result;
  	}
  	function getcomments($postid){
  		global $mysqli;
  		$prepared_sql = "SELECT * FROM comments WHERE postid = ? ;";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("i", $postid);
  		if($stmt->execute()) return $stmt;
  	}
  	function sanitize_input($input) {
  		$input = trim($input);
  		$input = stripslashes($input);
  		$input = htmlspecialchars($input);
  		return $input;
  	}
  	function deletepost($postid) {
  		global $mysqli;
  		deletepostcomments($postid);
  		$prepared_sql = "DELETE FROM posts WHERE postid = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("i", $postid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function deletepostcomments($postid) {
  		global $mysqli;
  		$prepared_sql = "DELETE FROM comments WHERE postid = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("i", $postid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function addpost($post, $username) {
  		global $mysqli;
  		$prepared_sql = "INSERT INTO posts (post, username) VALUES (?, ?); ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("ss", $post, $username);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function editpost($postid, $post) {
  		global $mysqli;
  		$prepared_sql = "UPDATE posts SET post=? WHERE postid = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("si", $post, $postid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function deletecomment($commentid) {
  		global $mysqli;
  		$prepared_sql = "DELETE FROM comments WHERE commentid = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("i", $commentid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function editcomment($commentid, $comment) {
  		global $mysqli;
  		$prepared_sql = "UPDATE comments SET comment=? WHERE commentid = ?; ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("si", $comment, $commentid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
  	function addcomment($comment, $username, $postid) {
  		global $mysqli;
  		$prepared_sql = "INSERT INTO comments (comment, username, postid) VALUES (?, ?, ?); ";
  		if(!$stmt = $mysqli -> prepare($prepared_sql))
  			return FALSE;
  		$stmt -> bind_param("ssi", $comment, $username, $postid);
  		if(!$stmt->execute()) return FALSE;
  		return TRUE;
  	}
?>

```
## session_auth.php
```php
<?php
    $lifetime = 15 * 60;
    $path = "/";
    $domain = "*.minifacebook.com"; 
    $secure = TRUE;
    $httponly = TRUE;
    session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
    session_start();

    //check the session
    if( !isset($_SESSION["logged"]) or $_SESSION["logged"] != TRUE){
    //the session is not authenticated
      echo "<script>alert('You have to login first!');</script>";
      echo $_SESSION["logged"];
      session_destroy();
      header("Refresh:0; url=form.php");
      die();
    }

    if( $_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]){
    //it is a session hijacking attack since it comes from a different browser
      echo "<script>alert('Session hijacking attack is detected!');</script>";
      session_destroy();
      header("Refresh:0; url=form.php");
      die();
    }
?>
```
## post.php
```php
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

```
## commenteditform.php
```php
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
  /*border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;*/
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

.editcomment {
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
  $comment = $_POST["comment"];
  $commentid = $_POST["commentid"];
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

  	<form action="commentedit.php" method="POST" class="form commentedit">
      <input type='hidden' name="nocsrftoken" value="<?php echo $rand; ?>" />
      <input type="text" class="text_field" name="comment" required value="<?php echo htmlentities($comment); ?>"/> <br><br>  
      <input type='hidden' name='commentid' value="<?php echo $commentid; ?>">       
      <button class="button editcomment" type="submit">
        Edit Comment
      </button>
    </form>
  </div>
```
## registrationform.php
```php
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


```
## postedit.php
```php
<?php
	require "session_auth.php";
	require "database.php";
	$postid = $_POST["postid"];
	$post = $_POST["post"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}

	if((isset($postid) and !empty($postid)) and (isset($post) and !empty($post))) {
		if (editpost(sanitize_input($postid), sanitize_input($post))) {
			echo "<script>alert('Post has been edited successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot edit post');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: Unable to edit post');</script>";
		header("Refresh:0; url=index.php");
	}
?>

```
## createpost.php
```php
<?php
	require "database.php";
	require "session_auth.php";
	$postdescription = $_POST["post"];
	$username = $_SESSION["username"];
	$nocsrftoken = $_POST["nocsrftoken"];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if(isset($postdescription) and !empty($postdescription)) {
		if(addpost(sanitize_input($postdescription), $username)) {
			echo "<script>alert('Post has been created successfully');</script>";
			header("Refresh:0; url=index.php");
		} else {
			echo "<script>alert('Error: Cannot create post.');</script>";
			header("Refresh:0; url=index.php");
		}
	} else {
		echo "<script>alert('Error: No data provided to create a post');</script>";
		header("Refresh:0; url=index.php");
	}

?>
```
## useraction.php
```php
<?php
	require "session_auth.php";
	require 'database.php';
	$username = $_POST['username'];
	$superuser = $_SESSION['superuser'];
	$status = $_POST['status'];
	$nocsrftoken = $_POST['nocsrftoken'];
	if(!isset($nocsrftoken) or ($nocsrftoken!=$_SESSION['nocsrftoken'])){
		echo "<script>alert('Cross-site request forgery is detected!');</script>";
		header("Refresh:0; url=logout.php");
		die();
	}
	if ($superuser) {
		if (isset($username)) {
			$changestatus = 1;
			if ($status == 1) {
				$changestatus = 0;
			}
			if (enabledisableuser($username, $changestatus)) {
				echo "<script>alert('User status has been changed');</script>";
				header("Refresh:0; url=userlist.php");
			} else {
				echo "<script>alert('Error: Cannot update userstatus');</script>";
				header("Refresh:0; url=userlist.php");
			}
		} else {
			echo "<script>alert('Error: Cannot update userstatus');</script>";
			header("Refresh:0; url=userlist.php");
		}
	}
?>
```


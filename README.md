# Project title: Mini Facebook Web Application

<a href="https://github.com/HarishRolla/Secure-Application-Development">Link to repository</a>


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


<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/erdiagram.png" alt="Alt Text" style="width: 600px;">


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

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/signup.png" alt="Alt Text" style="width: 600px;">

### Add new user:

This page will be displayed once the sign up has been successful.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/adduser.png" alt="Alt Text" style="width: 600px;">

### Home Page:

Once the user enters correct credentials, user will be redirected to the home page where a welcome message will be shown. This welcome page will be same for both superuser and regular user, however the only notable difference is that of the addition of a "See all users" button for a superuser. From this page, the user will be able to change the password or logout from the account.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/homepage.png" alt="Alt Text" style="width: 600px;">

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/homepage2.png" alt="Alt Text" style="width: 600px;">

### User list:

This page will be only visible to the superuser. Here the superuser will be able to see all the registered users and the superuser will be able to enable/disable their account.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/userlist.png" alt="Alt Text" style="width: 600px;">

### Change password Form:

This page is only accessible to the authorized users. Here user will be able to change their password. They have to enter only the new password and username will be autofilled.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/changepassword.png" alt="Alt Text" style="width: 600px;">

### Change password:

This page will be displayed after the password is changed.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/passwordchanged.png" alt="Alt Text" style="width: 600px;">

### Logout

This page will be displayed once the user clicks on logout in the Home page.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/logout.png" alt="Alt Text" style="width: 600px;">

### Comments

This page will display an individual post and it will have comments put out by users. Here edit post or comment and delete post or comment will only be displayed to the author of the post or comment. All the other users will not see this option.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/comments.png" alt="Alt Text" style="width: 600px;">

### Edit post page

This page will be displayed to the user who clicks on the editpage button and should be an author of the post. Here users will be able to edit their posts. Edit comments page will also have same UI.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/editpost.png" alt="Alt Text" style="width: 600px;">

### Superuser can disable and enable account

The superuser will be able to enable or disable the registered accounts. Once disable the user will not be able to login, until the superuser enables the account again.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/superuser.png" alt="Alt Text" style="width: 600px;">

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/disableuser.png" alt="Alt Text" style="width: 600px;">

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/harishwelcome.png" alt="Alt Text" style="width: 600px;">


### A regular logged-in user can delete their own posts but cannot delete posts of others

Only the author of the post will be given an option to delete the post and for the posts of others, this button will not be displayed.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/postscanotbedeleted.png" alt="Alt Text" style="width: 600px;">

### CSRF Attack to delete a post should be detected and prevented

CSRF attack to delete a post will be detected and an alert will be displayed to the user stating the same. The user will be logged out of the account immediately.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/csrf.png" alt="Alt Text" style="width: 600px;">

### A regular logged-in user cannot access the link for superusers

A regular logged-in user if tried to access the link specific users, an alert will be displayed stating that the logged in user is not a superuser.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/userescannotusesuperlink.png" alt="Alt Text" style="width: 600px;">

### A logged-in user can have real-time chat with other users

A logged-in user will be able to chat directly with other logged in users using the chat server.

<img src="https://github.com/HarishRolla/Secure-Application-Development/blob/main/DemoScreenshots/realtimechat.png" alt="Alt Text" style="width: 600px;">

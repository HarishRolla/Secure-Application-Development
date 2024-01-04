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

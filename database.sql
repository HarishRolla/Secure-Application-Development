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
<?php

function dbConnect() {
	$dsn = "mysql:host=127.0.0.1;port=3306;dbname=tweet_labelisation";
	$username = "root";
	$password = "root";
	$db = new PDO($dsn, $username, $password);
	return $db;
}
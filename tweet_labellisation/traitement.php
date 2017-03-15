<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo $_REQUEST['tweet_id'].PHP_EOL;
echo $_REQUEST['optionsRadios'];
// header('Location: index.php');
// Cette fonction permet de récupérer un tweet à partir d'un dataset (fichier csv)
// ou d'une base de données SQL
function getTweetFromDataSetOrDatabase() {
    // Ecrire le code ici
}

function getTweet() {
	$db = dbConnect();
}

function saveResult() {

}

function selectTweetRandom($db) {

}

function dbConnect() {
	$dsn = "mysql:dbname=tweet_labelisation;host=localhost;port=8889";
	$username = "root";
	$password = "root";
	$db = new PDO();
	return $db;
}

?>
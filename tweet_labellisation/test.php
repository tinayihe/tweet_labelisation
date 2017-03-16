<?php
$filename = "test.csv";
$column_tweetId = 2;
$column_tweetText = 0;
getTweetFromCSVDataSet($column_tweetId, $column_tweetText, $filename);


function getTweetFromCSVDataSet($column_tweetId, $column_tweetText, $filename) {
    $ligne = 1; // compteur de ligne
    $fichier = fopen($filename, "a+");
    while ($tab = fgetcsv($fichier, 1024, ';')) {
        $res = insertTweet($tab[$column_tweetId], $tab[$column_tweetText]);
        if ($res) {
        	echo "Insert the tweet ".$tab[$column_tweetText]. "with succes. </br>";
        } else {
        	echo "Failed to insert the tweet ".$tab[$column_tweetText] ."</br>";
        }
    }
}

function insertTweet($tweet_id, $tweet_text) {
	$db = dbConnect();
	$state = "INSERT INTO `tweet`(`id_tweet`, `text`) VALUES ('".$tweet_id."','".$tweet_text."')";
	$res = $db->exec($state);
	return $res;
}

function dbConnect() {
	$dsn = "mysql:host=127.0.0.1;port=3306;dbname=tweet_labelisation";
	$username = "root";
	$password = "root";
	$db = new PDO($dsn, $username, $password);
	return $db;
}
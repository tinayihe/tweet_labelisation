<?php
include_once "db.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ERROR | E_PARSE);

saveResult($_REQUEST['tweet_id'], $_REQUEST['optionsRadios']);
header('Location: index.php');

// Cette fonction permet de récupérer un tweet à partir d'un dataset (fichier csv)
// ou d'une base de données SQL

function getTweet() {
	$db = dbConnect();
	$state = "SELECT * FROM tweet WHERE `count_label1`+`count_label2`+`count_label3`<5 ORDER BY RAND() LIMIT 1";
	$res = $db->query($state, PDO::FETCH_ASSOC)->fetchAll();
	// $res[0]['text'] = maskMention($res[0]['text']);
	return $res[0];
}

// function maskMention($text) {
// 	$pattern = "/@\\w+/u";
// 	return preg_replace($pattern, "@xxx", $text);
// }

function saveResult($id, $optionsRadios) {
	$db = dbConnect();
	$count_label = 'count_label'.$optionsRadios;
	$state = 'UPDATE `tweet` 
				SET '.$count_label.' = '.$count_label.'+1
				WHERE id = '.$id.'';
	$res = $db->query($state);
}

function getAllTweets() {
	$db = dbConnect();
	$state = "SELECT * FROM tweet";
	$res = $db->query($state, PDO::FETCH_ASSOC)->fetchAll();
	return $res;
}

?>
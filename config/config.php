<?php

include './Csha3.php';

//Les lignes suivantes sont indispensables pour afficher les erreurs levées
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//On définit les labels
define('POSITIF', '1');
define('NEUTRE', '2');
define('IRONIQUE', '3');
define('NEGATIF', '4');

//On définit les éléments de connexion à la base de données
define('HOST', 'localhost');
define('PORT', '3306');
define('DBNAME', 'debat');
define('TABLENAME', 'tweet');
define('USER', 'root');
define('PASS', 'MgnTskym');

//On stocke une connexion persistante dans la variable db
$connection = db_connect();

//Paramètres de connexion à la base de données
function db_connect() {
    $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME;
    return new PDO($dsn, USER, PASS, array(
        PDO::ATTR_PERSISTENT => true
    ));
}

function read_tweet_randomly() {
    $user_id = read_user_id_randomly();
    $tweet = read_tweet_randomly_by_user_id($user_id);
    return $tweet;
}

function read_user_id_randomly() {
    global $connection;
    $state = 'SELECT DISTINCT user_id FROM `' . TABLENAME . '` WHERE `isRetweet` = 0 AND LENGTH(`label`) < 5';
    // $state = 'SELECT DISTINCT user_id FROM `' . TABLENAME . '` WHERE LENGTH(`label`) < 5';
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    return $res[array_rand($res)]['user_id'];
}

function read_tweet_randomly_by_user_id($user_id) {
    global $connection;
    $state = "SELECT * FROM " . TABLENAME
            . " WHERE `user_id` = " . $user_id
            . " AND LENGTH(`label`) < 5 AND `isRetweet` = 0"
            . " ORDER BY RAND() LIMIT 1";

    /*    $state = "SELECT * FROM " . TABLENAME
      . " WHERE `user_id` = " . $user_id
      . " AND LENGTH(`label`) < 5"
      . " ORDER BY RAND() LIMIT 1"; */
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    if (sizeof($res) != 0) {
        return $res[0];
    }
    return NULL;
}

function read_all_tweets($page) {
    global $connection;
    $state = "SELECT * FROM " . TABLENAME . " WHERE LENGTH(`label`) > 0 LIMIT " . (50 * ($page - 1)) . ", " . (50 * $page);
    // $state = "SELECT * FROM " . TABLENAME . " WHERE `isRetweet` = 0 LIMIT ".(50*($page-1)).", ". (50*$page);
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    return $res;
}

function update_tweet_labels($mysql_id, $label) {
    global $connection;
    $state = 'UPDATE ' . TABLENAME . ' SET  `label` = "' . $label . '" WHERE mysql_id = ' . $mysql_id;
    $connection->query($state);
}

function tweet_content_anonymizer($tweet_content) {
    $pattern = "/@\\w+/u";
    return preg_replace($pattern, "@xxx", $tweet_content);
}

function tendance_globale($tweet) {
    $tendance = 'PAS DE TENDANCE MARQUEE';
    if ($tweet['label'] != NULL && strlen($tweet['label']) != 0) {
        $tableau_labels = str_split($tweet['label']);
        $tableau_occurences = array_count_values($tableau_labels);
        for ($i = 1; $i < 5; $i++) {
            if (!isset($tableau_occurences[$i])) {
                $tableau_occurences[$i] = 0;
            }
        }
        $tableau_cles = array_keys($tableau_occurences);
        $tableau_valeurs = array_values($tableau_occurences);
        $indice = array_search(max($tableau_valeurs), $tableau_valeurs);

        switch ($tableau_cles[$indice]) {
            case POSITIF:
                $tendance = 'POSITIF';
                break;
            case NEUTRE:
                $tendance = 'NEUTRE  ';
                break;
            case IRONIQUE:
                $tendance = 'IRONIQUE';
                break;
            case NEGATIF:
                $tendance = 'NEGATIF';
                break;
            default:
                $tendance = 'PAS DE TENDANCE MARQUEE';
                break;
        }
    }
    $result = [
        '1' => $tendance,
        '2' => $tableau_occurences
    ];
    return $result;
}

function getTotalPage() {
    global $connection;
    $state = "SELECT COUNT(*) AS `count` FROM " . TABLENAME . " WHERE LENGTH(`label`) > 0";
    // $state = "SELECT COUNT(*) AS `count` FROM " . TABLENAME . " WHERE `isRetweet` = 0";
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    return $res[0]['count'];
}

function count_all_tweets() {
    global $connection;
    $state = "SELECT count(*) as nb FROM `" . TABLENAME . "` WHERE `isRetweet` = 0";
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    return $res[0]['nb'];
}

function proportion_tweets_labellises() {
    global $connection;
    $state = "SELECT count(*) as nb_labellise FROM `" . TABLENAME . "` WHERE `isRetweet` = 0 AND LENGTH(label) = 5";
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    $nb_labellise = $res[0]['nb_labellise'];

    return round($nb_labellise / count_all_tweets());
}

function redirect($new_URL) {
    header('Location: ' . $new_URL);
}

function hacher($chaine) {
    // On hache les chaines de caractères avec SHA3 512 bits
    $sponge = Csha3::init(4);
    $sponge->absorb($chaine);

    return bin2hex($sponge->squeeze());
}

?>

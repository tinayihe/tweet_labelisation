<?php

//Les lignes suivantes sont indispensables pour afficher les erreurs levées
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message =  "Veuillez vous authentifier pour accéder à la page de visualisation";

function authenticate($message) {
    header("WWW-Authenticate: Basic realm=$message");
    echo "Saisir le login et le mot de passe";
    exit();
}

function validate($login, $pass) {
    
}

authenticate($message);

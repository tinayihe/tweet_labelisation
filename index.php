<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include './config/config.php';

if (isset($_POST['tweet_id']) && isset($_POST['option_radio'])) {
    update_tweet_labels($_POST['tweet_id'], $_POST['option_radio']);
}

$tweet = read_tweet_randomly();
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plateforme de labellisation pour la classification de tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>


    <body id="body-index">
        <div id="container-main">
            <p class="lead" id="intro-cours">IF25 - Data mining pour les réseaux sociaux</p>
            <h1 id="h1-index">Labellisation de tweets</h1>
            <p class="intro">Le principe:</p>
            <p class="intro">Cette plateforme a pour but de réaliser un sondage sur les contenus des tweets.
                Ce sondage nous aidera dans notre projet à réaliser une étude se rapportant 
                à l'approche supervisée des graphes de contenus sur les réseaux sociaux.</p>
            <p class="intro">Nous vous remercions sincèrement pour votre participation.</p>

            <div id="div_main" class="container">
            <p id="le-tweet">Le tweet:</p>
                <form method="post" action="#">
                    <table>
                        <fieldset>

                            <div id="tweet_content">
                                <p>
                                    <?php
                                    if ($tweet != NULL) {
                                        echo $tweet[0]['tweet_content'];
                                        echo '<input type="hidden" name="tweet_id" value=' . $tweet[0]['id'] . ' />';
                                    } else {
                                        echo 'Tous les tweets de la base ont déjà atteint le nombre maximum de labels autorisés.';
                                    }
                                    ?>
                                </p>
                            </div>
                        </fieldset>

                        <p id="le-tweet">est: </p>

                        <div id="div_radio">
                            <div class="radio">

                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_positif" 
                                       value="positif"/>Avis positif   
                            </div>
                            <div class="radio">
                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_neutre" 
                                       value="neutre"/>Avis neutre
                            </div>
                            <div class="radio">
                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_negatif" 
                                       value="negatif"/>Avis négatif

                            </div>
                        </div>

                    </table>

                    <?php
                    if ($tweet != NULL) {

                        echo '<div id="button_submit">';
                        echo '<button type="submit" class="btn btn-info" id="btn-envoyer">Valider</button>';
                    }
                    ?>
                    <button type="button" class="btn btn-default" id="button-exit">Exit</button>
                    </div>
                </form>
                <p>Tweet's labellisation rate:</p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                    35%
                  </div>
                </div>
            </div>                
        </div>
        
    </body>


</html>
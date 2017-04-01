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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>


    <body id="body-index">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        
        <div id="container-main">
            <p class="lead" id="intro-cours">IF25 - Data mining pour les réseaux sociaux - Université de Technologie de Troyes (UTT)</p>
            <h1 id="h1-index">Plateforme CrowdLabel</h1>
            <p class="intro">Le principe:</p>
            <p class="intro">Cette plateforme a pour but de réaliser un sondage sur le sentiment que véhicule le contenu des messages postés sur Twitter. Chaque message contient 140 caractère et permet de se prononcer plus facilement.</p>
            <p class="intro">La finalité de notre projet est d'arriver à labelliser une nombre suffisant de tweets pour nous permettre de faire notre projet de classification de données dans le cadre d' l'UV IF25.</p>
            <p class="intro">Le travaille ne pouvant pas être fait efficacement par quelques étudiants, nous faisons appel à vous pour nous aider.</p>
            <p class="intro">NB. Donnez votre avis sur le sentiment que véhicule le contenu et non sur le sentiment qu'il provoque chez vous.</p>
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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Exit</button>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <img id="emoticon-smile"src="include/image/Emotes-face-smile-icon.png" alt="Emoticon smile"/>
                            <h4> Bravo! Nous vous remercions d'avoir contribué à notre projet<br/><br/>
                            Aidez-nous à recueillir plus de données en partageant ce sondage avec vos amis sur les réseaux sociaux</h4>
                            <!-- fb button share -->
                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://exed.utt.fr/fr/formations-diplomantes/mastere-specialise/mastere-specialise-expert-big-data-analytics-metriques.html" data-layout="button_count%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" data-layout="button_count" data-mobile-iframe="true" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="icon-rs"
                          src="include/image/fb-icon.png" alt="Partager sur Facebook"/></a>
                            
                           
                            
                            <!-- twitter button share -->
                            <a href="https://twitter.com/share?url=http://exed.utt.fr/fr/formations-diplomantes/mastere-specialise/mastere-specialise-expert-big-data-analytics-metriques.html"  target="_blank" data-show-count="true" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="icon-rs"
                          src="include/image/twitter-iconn.png" alt="Tweet"/></a>
                            
                           
                            <!-- google+ button share -->
                            <a style="color:white" href="https://plus.google.com/share?url=http://exed.utt.fr/fr/formations-diplomantes/mastere-specialise/mastere-specialise-expert-big-data-analytics-metriques.html" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="icon-rs"
                          src="include/image/google-plus-icon1.png" alt="Partager sur Google+"/>
                                </a>
                          
                          <!-- linkedin button share -->  
                          <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: fr_FR</script>
                        <a href="https://linkedin.com/cws/share?url=http://exed.utt.fr/fr/formations-diplomantes/mastere-specialise/mastere-specialise-expert-big-data-analytics-metriques.html" data-link="https://linkedin.com/cws/share?url=http://exed.utt.fr/fr/formations-diplomantes/mastere-specialise/mastere-specialise-expert-big-data-analytics-metriques.html" target="_blank"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="icon-rs" src="include/image/linkedin-icon.png" alt="Partager sur Linkedin"/></a>  
                            
                            
                        </div>
                      </div>
                    </div>
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
   
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    </body>



</html>
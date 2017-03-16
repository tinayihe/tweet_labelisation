<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once "traitement.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plateforme de labellisation de tweets</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="main">
                    <h1 id="title">Labellisation de tweets</h1>
                    <form action="traitement.php">
                    <table>
                        <p id="tweet_text"><?php
                        $tweet = getTweet();
                        $tweet_id = $tweet['id'];
                        echo $tweet['text'];
                        echo '<input type="hidden" name="tweet_id" value='.$tweet_id.' />';
                        ?></p>
                        <!-- 2 c'est Avis positif; 1 c'est Avis neutre; 0 c'est Avis négatif-->
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                            Avis positif
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" checked>
                            Avis neutre
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="3" checked>
                            Avis négatif
                          </label>
                        </div>
                    </table>
                    <div id="buttons">
                        <button type="submit" class="btn btn-info" id="btn-envoyer"> Envoyer </button>
                        <button type="reset" class="btn btn-default" id="btn-skip"> Ignorer </button>
                    </div>
                    
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
    </body>
</html>
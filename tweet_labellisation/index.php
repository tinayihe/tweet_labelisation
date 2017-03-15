<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

$texte_tweet = "texte du tweet";

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plateforme de labellisation de tweets</title>
        <link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.css>
    </head>
    <body>
        <h1>Labellisation de tweets</h1>

        <form action="traitement.php">

            <table>

                <tr>
                    <td>                        
                        <?php
                        echo '<input type="text" name="tweet_area" value="$texte_tweet" readonly="readonly" />';
                        ?>
                    </td>

                    <td>

                        <!-- 2 c'est Avis positif; 1 c'est Avis neutre; 0 c'est Avis négatif-->
                        <input type="radio" id="choix" name="choix" value="2" />Avis positif
                        <input type="radio" id="choix" name="choix" value="1" />Avis neutre
                        <input type="radio" id="choix" name="choix" value="0" />Avis négatif

                    </td>
                </tr>


            </table>

            <button type="submit"> Envoyer </button> 
            <button type="reset"> Annuler </button>

        </form>


    </body>
</html>
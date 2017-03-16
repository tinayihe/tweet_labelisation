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
        <title>Visualisation des labels des tweets</title>
        <link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
         <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="main">
                    <h1 id="title">Visualisation des labels des tweets</h1>
                    <table class="table table-hover">
                        <tr>
                            <th>Text de Tweet</th>
                            <th>Avis positif</th>
                            <th>Avis neutre</th>
                            <th>Avis négatif</th>
                        </tr>
                        <?php
                            $tweets = getAllTweets();
                            foreach ($tweets as $key => $tweet) {
                                echo '<tr>';
                                    echo '<th>'.$tweet['text'].'</th>';
                                    echo '<th>'.$tweet['count_label1'].'</th>';
                                    echo '<th>'.$tweet['count_label2'].'</th>';
                                    echo '<th>'.$tweet['count_label3'].'</th>';
                                echo '</tr>';
                            }
                        // put your code here
                        ?>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
    </body>
</html>

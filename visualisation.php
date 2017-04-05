<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './config/config.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualisation des labels des tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
    </head>
    <body>

        <h1>Tendances des tweets</h1>

        <div id="div_main">

            <table title="Tableau des tendances des tweets" 
                   class="table table-hover">
                <tr>
                    <th>Tweet</th>
                    <th>Tendance</th>
                    <td>Positif</td>
                    <td>Neutre</td>
                    <td>Ironique</td>
                    <td>Négatif</td>
                </tr>
                <?php
                $tweets = read_all_tweets($page);
                foreach ($tweets as $key => $tweet) {
                    echo '<tr>';
                    echo '<td>' . $tweet['Text'] . '</td>';
                    $tendance_globale = tendance_globale($tweet);
                    echo '<th>' . $tendance_globale['1'] . '</th>';
                    $tendance_details = $tendance_globale['2'];
                    echo '<td>' . $tendance_details['1'] . '</td>';
                    echo '<td>' . $tendance_details['2'] . '</td>';
                    echo '<td>' . $tendance_details['3'] . '</td>';
                    echo '<td>' . $tendance_details['4'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="active"><a href="?page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                    <li class="active"><a href="?page=<?= $page > 1 ? $page-1 : 1?>" aria-label="Previous"><span aria-hidden="true">&lt;</span></a></li>
                    <?php
                        $totalPages = ceil(intval(getTotalPage()) / 50);
                        if ($totalPages <= 3) {
                            for ($i=1; $i <= $page; $i++) { 
                                echo '<li class="active"><a href="?page='.$i.'">'.$i.' <span class="sr-only">(current)</span></a></li>';
                            }
                        } else {
                            echo '<li class="active"><a href="?page=1" aria-label="Previous"><span aria-hidden="true">1</span></a></li>';
                            if ($page <= 3) {
                            for ($i=2; $i <= $page + 1; $i++) { 
                                echo '<li class="active"><a href="?page='.$i.'">'.$i.' <span class="sr-only">(current)</span></a></li>';
                            }
                                echo '<li class="active"><span>......</span></li>';
                            } elseif ($page >= $totalPages - 2 && $page < $totalPages) {
                                echo '<li class="active"><span>......</span></li>';
                                for ($i=$page - 1; $i <= $totalPages - 1; $i++) { 
                                    echo '<li class="active"><a href="?page='.$i.'">'.$i.' <span class="sr-only">(current)</span></a></li>';
                                }
                            } elseif ($page == $totalPages) {
                                $i = $totalPages - 1;
                                echo '<li class="active"><span>......</span></li>';
                                echo '<li class="active"><a href="?page='.$i.'">'.$i.' <span class="sr-only">(current)</span></a></li>';
                            } else {
                                echo '<li class="active"><span>......</span></li>';
                                for ($i=$page - 1; $i <= $page + 1; $i++) { 
                                    echo '<li class="active"><a href="?page='.$i.'">'.$i.' <span class="sr-only">(current)</span></a></li>';
                                }
                                echo '<li class="active"><span>......</span></li>';
                            }
                            echo '<li class="active"><a href="?page='.$totalPages.'">'.$totalPages.' <span class="sr-only">(current)</span></a></li>';
                        }
                        $next = $page<$totalPages ? $page +1 : $totalPages;
                        echo '<li class="active"><a href="?page='.$next.'" aria-label="Previous"><span aria-hidden="true">&gt;</span></a></li>';
                        echo '<li class="active"><a href="?page='.$totalPages.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
                    ?>
                </ul>
            </nav>
        </div>
    </body>
</html>

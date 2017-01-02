<div class='col-xs-12 start-xs'>

    <?php

    $numrows = 0;

    if ($result_filme->num_rows == 0) {
        echo "No results";
    }

    if ($result_filme->num_rows > 0) {
    // output data of each row
        echo "<br>" . $results . " results<br>";   //imprime o nº de resultados

        $num_pages = ceil($results / $results_per_page);
        //ceil() retorna o inteiro maior mais próximo arrendondano o valor para cima se necessário

        echo "<div class='row center-xs'>";

        //next pages
        for ($i = 1; $i <= $num_pages; $i ++) {  // print links for all pages
            echo "<a href='search.php?page=" . $i . "' class='pages";

            if ($i == $page) {
                echo " curPage";
            }
            echo "'>Page " . $i . "</a>";
        }
        echo "</div><br>";

        echo "<div class='row start-md'>";
        while($row = $result_filme->fetch_assoc()) {

            $numrows++;

            echo "
                <div class='col-xs-4 col-md-2'>
                    <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>
                </div>
                <div class='col-xs-7 col-md-4'>
                    <p class='subtitle text-left middle-xs'><a href=" . "movie.php?movieid=" . $row["_id_filmes"] . ">" . $row["filme"] . "</a></p>" .
                    "<p class='text text-left middle-xs'>";

            if (!(!isset($row["data_lanc"]))){     //se tiver data_lanc definido
                echo "<b>Release date: </b>" . $row["data_lanc"];
            }
            if (!(!isset($row["classif"]))){         //se tiver classif etária definido
                echo "<br><b>Age Rating: </b>" . $row["classif"];
            }
            if (!(!isset($row["realizador"]))){   //se tiver realizador definido
                echo "<br><b>Director: </b>" . $row["realizador"];
            }
            if (!(!isset($row["imdb_rating"]))){ //se tiver imdb_rating definido
                echo "<br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10";
            }
            if (!(!isset($row["ost_rating"]))){   //se tiver ost_rating definido
                echo "<br><b>OST Rating: </b>" . $row["ost_rating"] . "/100";
            }
            echo "  </p>
                </div>
            <br>";

        }

    }
?>
    
</div>
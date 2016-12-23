<!---- Acesso à base de bados --->
<?php

    include 'connection.php';  
 include('logx.php');
    //----------------------SELECT FILME------------------------//

    $select_filme = "SELECT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes
    
    ORDER BY imdb_rating DESC";
    
    $result_filme = $conn->query($select_filme);

?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight Top IMDB</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    </head>


    <body>

        <?php include 'navbar.php'; ?>

            <section class="section-resized">

                <div class="row">

                    <div class="subtitle col-xs-12 start-xs">
                        <p>IMDB RATING TOP 25 MOVIES</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 start-xs">

                        <?php

                        $numrows_imdb = 0;

                        echo "<div class='row start-md'>";

                        while(($row = $result_filme->fetch_assoc()) && ($num_rows < 25)) {

                        $numrows_imdb++;

                        echo "<div class='col-xs-5 col-md-2'>
                                        <div><br><b> #$numrows_imdb </b></div>
                                    <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>
                                </div>
                                <div class='col-xs-7 col-md-4'>
                                    <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                    "<p class='text text-left middle-xs'>";
                        
                        if (!(!isset($row["data_lanc"]) || empty(trim($row["data_lanc"])))){ //se tiver data_lanc definido
                            echo "<b>Release date: </b>" . $row["data_lanc"];
                        }
                        if (!(!isset($row["realizador"]) || empty(trim($row["realizador"])))){ //se tiver realizador definido
                            echo "<br><b>Director: </b>" . $row["realizador"];
                        }
                        if (!(!isset($row["imdb_rating"]) || empty(trim($row["imdb_rating"])))){ //se tiver imdb_rating definido
                            echo "<br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10";
                        }
                        if (!(!isset($row["ost_rating"]) || empty(trim($row["ost_rating"])))){ //se tiver ost_rating definido
                            echo "<br><b>OST Rating: </b>" . $row["ost_rating"] . "/100";
                        }
                        echo "  </p>
                            </div>
                        <br>";

                    }

                ?>

                    </div>

                </div>

            </section>

            <div class="md-overlay"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
            <script type="text/javascript" src="assets/js/classie.js"></script>
            <script type="text/javascript" src="assets/js/modalEffects.js"></script>
            <script src="assets/js/cssParser.js"></script>

    </body>

    </html>
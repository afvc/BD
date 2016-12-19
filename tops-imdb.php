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

                    <div class="subtitle start-xs">
                        <p>IMDB RATING TOP 25 MOVIES</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 start-xs">

                        <?php

                        $numrows = 0;

                        echo "<div class='row start-md'>";

                        while(($row = $result_filme->fetch_assoc()) && ($num_rows < 25)) {

                        $num_rows++;

                        echo "<div class='col-xs-5 col-sm-2'>
                                <div><br><b> #$num_rows </b></div>
                                <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>                            </div>
                                <div class='col-xs-7 col-sm-4'>
                                        <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                        "<p class='text text-left middle-xs'>
                                            <b>Release date: </b>" . $row["data_lanc"] .
                                            "<br><b>Director: </b>" . $row["realizador"] . "
                                            <br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10
                                            <br><b>OST Rating: </b>" . $row["ost_rating"] . "/100
                                        </p>
                                    </div><br>";

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
<!---- Acesso à base de bados --->
<?php

    $order = $_POST["orders"];

    include 'connection.php';
        
    //---------------------------------SELECT-------------------------------//

    $select_musicas = "SELECT nome_musica, m_generos, m_ano, cantor

    FROM musicas
    
    ORDER BY $order";


    $result_musicas = $conn->query($select_musicas)
        
?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight Song List</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    </head>


    <body>

        <?php include 'navbar.php'; ?>

        <section class="section-resized">

            <div class="row">

                <div class="subtitle col-xs-12  start-xs">
                    <p>SONG LIST</p>
                </div>

                <div class="col-xs-6 start-xs">

                    <form method="post">
                        <label>Order by</label>
                        <select name="orders">
                            <option value="nome_musica" selected>Song name</option>
                            <option value="cantor">Band/Singer name</option>
                        </select>
                        <input type="submit" value="GO">
                    </form>

                </div>
            </div>

            <?php 
        
                $numrows = 0;

                //--------------------------RESULTADOS - MUSICAS--------------------------//
                echo "<div class='row center-xs start-md'>";

                while($row = $result_musicas->fetch_assoc()) {

                    $num_rows++;

                    echo "<div class='col-xs-6'>
                            <div><br><b> #$num_rows </b></div>
                            <p class='text text-left middle-xs'
                            <br><b>Song: </b> " . $row["nome_musica"] . "
                            <br><b>Genre: </b>" . $row["m_generos"] . "
                            <br><b>Year: </b>" . $row["m_ano"] . "
                            <br><b>Singer/Band: </b>" . $row["cantor"] . "</p>
                         </div>";
                }

            ?>
                </div>
        </section>

        <div class="md-overlay"></div>

        <!--

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script type="text/javascript" src="assets/js/classie.js"></script>
    <script type="text/javascript" src="assets/js/modalEffects.js"></script>
    <script src="assets/js/cssParser.js"></script>
    <script src="assets/js/css-filters-polyfill.js"></script>

-->

    </body>

    </html>
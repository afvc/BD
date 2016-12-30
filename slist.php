<!---- Acesso à base de bados --->
<?php

    $_SESSION['order'] = $_POST["order"];

    include 'connection.php';
        
    //---------------------------------SELECT-------------------------------//

    $select_musicas = "SELECT nome_musica, m_generos, m_ano, cantor

    FROM musicas
    
    ORDER BY " . $_SESSION['order'] . "";


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
                            <select name="order" onchange="this.form.submit()">
                                <option value="" selected>none</option>
                                <option value="nome_musica" <?php if ($_SESSION['order']=="nome_musica") {echo selected;} ?> >Song</option>
                                <option value="cantor" <?php if ($_SESSION['order']=="cantor") {echo selected;} ?> >Band/Singer</option>
                            </select>
                        </form>

                    </div>
                </div>

                <?php 
 
                //--------------------------RESULTADOS - MUSICAS--------------------------//

                $numrows = 0;
            
                echo "<div class='row start-md'>";

                while($row = $result_musicas->fetch_assoc()) {

                    $num_rows++;
                        
                    echo "<div class='col-xs-12 col-sm-6'>
                            <p class='subtitle text-left middle-xs'
                            <br>  #$num_rows<br>" . $row["nome_musica"] . "
                            <p class='text text-left middle-xs'";
                    
                            if (!(!isset($row["m_generos"]) || empty(trim($row["m_generos"])))){ //se tiver género definido
                                echo "<br><b>Genre: </b>" . $row["m_generos"];
                            }
                    
                            if (!(!isset($row["m_ano"]) || empty(trim($row["m_ano"])))){ //se tiver ano definido
                                echo "<br><b>Year: </b>" . $row["m_ano"];
                            }  
                    
                            if (!(!isset($row["cantor"]) || empty(trim($row["cantor"])))){ //se tiver cantor definido
                                echo "<br><b>Singer/Band: </b>" . $row["cantor"];
                            }
                            echo "</p>
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
<!---- Acesso à base de bados --->
<?php
    include 'connection.php'; //para a ligação à base de dados
    include 'logx.php'; //para o login do site

    session_start();
    
    //---------------------------------- SELECT FILME ----------------------------------//
    if(isset($_POST['search'])) {
        
        //VARIÁVEIS PARA USAR NO SELECT:

        //os filtros usados
        
        $_SESSION['filters'] = $_POST["filters"];
        $filters_2 = $_POST["ID2_filters"];
        $filters_3 = $_POST["ID3_filters"];
        $filters_4 = $_POST["ID4_filters"];
        $filters_5 = $_POST["ID5_filters"];
        $filters_6 = $_POST["ID6_filters"];
        $filters_7 = $_POST["ID7_filters"];
        $filters_8 = $_POST["ID8_filters"];
        $filters_9 = $_POST["ID9_filters"];

        //o que foi escrito nos filtros
        $_SESSION['option'] = $_POST["option"];
        $option_2 = $_POST["ID2_option"];
        $option_3 = $_POST["ID3_option"];
        $option_4 = $_POST["ID4_option"];
        $option_5 = $_POST["ID5_option"];
        $option_6 = $_POST["ID6_option"];
        $option_7 = $_POST["ID7_option"];
        $option_8 = $_POST["ID8_option"];
        $option_9 = $_POST["ID9_option"];

        echo $_SESSION['filters'];
        echo $_SESSION['option'];
        //SELECT FILME COM AS RESPETIVAS REFERÊNCIAS ENTRE TABELAS + O QUE FOI PESQUISADO 

        $results_per_page = 2;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }; 

        $start_from = ($page-1) * $results_per_page;

        $select_filme = "SELECT DISTINCT _id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating

        FROM filmes, filmes_atores, atores, filmes_generos, generos, filmes_musicas, musicas

        WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator

        AND filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero

        AND filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

        AND " . $_SESSION['filters'] ." LIKE '%" . $_SESSION['option'] . "%'

        ";

        if($filters_2 != '') {
            $select_filme = $select_filme . " AND $filters_2 LIKE '%$option_2%'";
        }

        if($filters_3 != '') {
            $select_filme = $select_filme . " AND $filters_3 LIKE '%$option_3%'";
        }

        if($filters_4 != '') {
            $select_filme = $select_filme . " AND $filters_4 LIKE '%$option_4%'";
        }

        if($filters_5 != '') {
            $select_filme = $select_filme . " AND $filters_5 LIKE '%$option_5%'";
        }

        if($filters_6 != '') {
            $select_filme = $select_filme . " AND $filters_6 LIKE '%$option_6%'";
        }

        if($filters_7 != '') {
            $select_filme = $select_filme . " AND $filters_7 LIKE '%$option_7%'";
        }

        if($filters_8 != '') {
            $select_filme = $select_filme . " AND $filters_8 LIKE '%$option_8%'";
        }

        if($filters_9 != '') {
            $select_filme = $select_filme . " AND $filters_9 LIKE '%$option_9%'";
        }

        //resultado do SELECT antes do "LIMIT" - para saber e utilizar o nº de resultados
        $result_filme = $conn->query($select_filme);
        $results = ($result_filme->num_rows);

        //adição do LIMIT ao SELECT para mostrar resultados por páginas
        $select_filme = $select_filme . " LIMIT $start_from, $results_per_page";

        //resultado do SELECT - depois do LIMIT
        $result_filme = $conn->query($select_filme);
        echo $select_filme;
    }

    //---------------------------------- INSERT FILME ----------------------------------//
    if(isset($_REQUEST['addmovie'])) {  

        $filme = $_POST["filme"];           //o que foi escrito no filme
        $classif = $_POST["classif"];       //o que foi escrito na classificação
        $data_lanc = $_POST["data_lanc"];   //o que foi escrito na data de lançamento
        $realizador = $_POST["realizador"]; //o que foi escrito no realizador

        $mov=$conn->query("INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)

        VALUES (NULL , '$filme', 'NULL', '$classif', '2016-12-19', '$realizador', '10', '100', '1', '1', 'user')");

        echo "New movie inserted";

    }
?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight Search</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="clone.js"></script>
        <script src="clone-song.js"></script>
        <script src="clone-act.js"></script>
    </head>


    <body>
        <?php include 'navbar.php'; ?>

            <section class="section-resized">
                <div class="row">

                    <div class=" col-xs-12 subtitle start-xs">
                        <p>SEARCH</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 start-xs">

                        <form method="post">

                            <!--
                        ########################################## -->
                            <!-- START CLONED SECTION -->
                            <!-- ########################################## -->
                            <div id="testingDiv1" class="clonedInput">
                                <h2 id="reference" name="reference" class="heading-reference"></h2>

                                <label for="select" class="test-select-label">FILTER</label>
                                <select id="select" name="filters"  class="test-select">
                                    <option value="filme" <?php if ($_SESSION['filters']=="filme") {echo selected;} ?> >Movie Name</option>
                                    <option value="data_lanc" <?php if ($_SESSION['filters']=="data_lanc") {echo selected;} ?> >Release date</option>
                                    <option value="classif" <?php if ($_SESSION['filters']=="classif") {echo selected;} ?> >Age rating</option>
                                    <option value="realizador" <?php if ($_SESSION['filters']=="realizador") {echo selected;} ?> >Director</option>
                                    <option value="nome_ator" <?php if ($_SESSION['filters']=="nome_ator") {echo selected;} ?> >Actor</option>
                                    <option value="nome_genero" <?php if ($_SESSION['filters']=="nome_genero") {echo selected;} ?> >Genre</option>
                                    <option value="nome_musica" <?php if ($_SESSION['filters']=="nome_musica") {echo selected;} ?> >Song</option>
                                    <option value="cantor" <?php if ($_SESSION['filters']=="cantor") {echo selected;} ?> >Singer/Band</option>
                                    <option value="imdb_rating" <?php if ($_SESSION['filters']=="imdb_rating") {echo selected;} ?> >Imdb Rating</option>
                                    <option value="ost_rating" <?php if ($_SESSION['filters']=="ost_rating") {echo selected;} ?> >OST Rating</option>
                                </select>

                                <label for="option" class="test-option-label">Your Option:</label>
                                <input type="option" id="option" name="option" class="test-option" value="<?php echo $_SESSION['option']; ?>"/>

                            </div>
                            <!--/clonedInput-->
                            <!-- ########################################## -->
                            <!-- END CLONED SECTION -->
                            <!-- ########################################## -->
                            <!-- ADD - DELETE BUTTONS -->
                            <div class="row">
                                <div id="add-del-buttons" class="col-xs-12 center-xs start-sm">
                                    <input type="button" id="btnAdd" class="btn-default col-xs-5 col-sm-4" value="ADD FILTER">
                                    <input type="button" id="btnDel" class="btn-default col-xs-5 col-sm-4" value="REMOVE FILTER">

                                    <input type="submit" class="col-xs-12 col-sm-3 btn-dark" value="SEARCH" name="search">
                                </div>
                            </div>
                            <!-- /ADD - DELETE BUTTONS -->
                        </form>

                    </div>

                    <div class='col-xs-12 start-xs'>

                        <?php

           //-------------------------------RESULTADOS-----------------------------//
            
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

                echo "<div class='row center-xs start-md'>";
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
                </div>

                </div>

                <!--------------MODAL---------->

                 <?php include 'add-movie.php';?>


            </section>

            <div class="md-overlay"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
            <script type="text/javascript" src="assets/js/classie.js"></script>
            <script type="text/javascript" src="assets/js/modalEffects.js"></script>
            <script src="assets/js/cssParser.js"></script>
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


            <script>
                $(".grow").click(function () {

                    $(".md-overlay").css("visibility", "visible");
                    $(".md-overlay").css("opacity", "1");

                });

                $(".md-close").click(function () {

                    $(".md-overlay").css("visibility", "hidden");
                    $(".md-overlay").css("opacity", "0");

                });

                $(".md-overlay").click(function () {

                    $(".md-overlay").css("visibility", "hidden");
                    $(".md-overlay").css("opacity", "0");

                });
            </script>

    </body>

    </html>
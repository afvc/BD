<!---- Acesso à base de bados --->
<?php
    include 'connection.php'; //para a ligação à base de dados
    include 'logx.php'; //para o login do site

    session_start();

    
     //---------------------------------SELECT-------------------------------//

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    };
    
    if(isset($_POST['search'])) { //depois de carregar no botão - atribuir novamente a variável de sessão e página 1
        $_SESSION['order'] = $_POST["order"];
        
        $page = 1;
    }

    $select_musicas = "SELECT nome_musica, m_generos, m_ano, cantor

    FROM musicas
    
    ORDER BY " . $_SESSION['order'] . "";
    
    //resultado do SELECT antes do "LIMIT" - apenas para guardar o nº de resultados total
    $result_musicas = $conn->query($select_musicas);
    $total_musicas = ($result_musicas->num_rows);
    
    $results_per_page = 6;

    $start_from = ($page-1) * $results_per_page;

    //adição do LIMIT ao SELECT para mostrar resultados por páginas
    $select_musicas = $select_musicas . " LIMIT $start_from, $results_per_page";

    //resultado do SELECT - depois do LIMIT

    $result_musicas_limit = $conn->query($select_musicas);
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
                            <select name="order">
                                <option value="nome_musica" <?php if ($_SESSION['order']=="nome_musica") {echo selected;} ?> >Song</option>
                                <option value="cantor" <?php if ($_SESSION['order']=="cantor") {echo selected;} ?> >Band/Singer</option>
                            </select>
                            <input type="submit" id="orderby" class="col-xs-12 col-sm-3 btn-dark" value="SEARCH" name="search">
                        </form>

                    </div>
                </div>

                <?php 
 
                //--------------------------RESULTADOS - MUSICAS--------------------------//

                if ($result_musicas->num_rows > 0) {
                    echo "<br>" . $total_musicas . " songs <br><br>";   //imprime o nº de músicas na base de dados

                    $num_pages = ceil($total_musicas / $results_per_page);
                    //ceil() retorna o inteiro maior mais próximo arrendondano o valor para cima se necessário
                    
                    echo "</div>";
                    echo "<div class='row center-xs'>";
                
                    //next pages
                    for ($i = 1; $i <= $num_pages; $i ++) {  // print links for all pages
                        echo "<a href='slist.php?page=" . $i . "' class='pages";

                        if ($i == $page) {
                            echo " curPage";
                        }
                        echo "'>Page " . $i . "</a>";
                    }
                    echo "</div><br>";

                    echo "<div class='row start-md'>";
                    
                    
                    while($row = $result_musicas_limit->fetch_assoc()) {
                        echo "<div class='col-xs-12 col-sm-6 col-md-4 blue'>
                                <p class='subtitle text-left middle-xs'
                                <br>" . $row["nome_musica"] . "
                                <p class='text text-left middle-xs'";

                                if (!(!isset($row["m_generos"]))){ //se tiver género definido
                                    echo "<br><b>Genre: </b>" . $row["m_generos"];
                                }

                                if (!(!isset($row["m_ano"]))){ //se tiver ano definido
                                    echo "<br><b>Year: </b>" . $row["m_ano"];
                                }  

                                if (!(!isset($row["cantor"]))){ //se tiver cantor definido
                                    echo "<br><b>Singer/Band: </b>" . $row["cantor"];
                                }
                                echo "</p><br>
                             </div>";
                    }
                }
            ?>


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
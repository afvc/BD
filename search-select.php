<!---- Acesso à base de bados --->
<?php
    
    //---------------------------------- SELECT FILME ----------------------------------//

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    };
    
    if(isset($_POST['search'])) { //depois de carregar no botão - atribuir novamente as variáveis de sessão e página 1
        
        //VARIÁVEIS PARA USAR NO SELECT:

        //os filtros usados
        
        $_SESSION['filters'] = $_POST["filters"];
        $_SESSION['filters_2'] = $_POST["ID2_filters"];
        $_SESSION['filters_3'] = $_POST["ID3_filters"];
        $_SESSION['filters_4'] = $_POST["ID4_filters"];
        $_SESSION['filters_5'] = $_POST["ID5_filters"];
        $_SESSION['filters_6'] = $_POST["ID6_filters"];
        $_SESSION['filters_7'] = $_POST["ID7_filters"];
        $_SESSION['filters_8'] = $_POST["ID8_filters"];
        $_SESSION['filters_9'] = $_POST["ID9_filters"];

        //o que foi escrito nos filtros
        $_SESSION['option'] = $_POST["option"];
        $_SESSION['option_2'] = $_POST["ID2_option"];
        $_SESSION['option_3'] = $_POST["ID3_option"];
        $_SESSION['option_4'] = $_POST["ID4_option"];
        $_SESSION['option_5'] = $_POST["ID5_option"];
        $_SESSION['option_6'] = $_POST["ID6_option"];
        $_SESSION['option_7'] = $_POST["ID7_option"];
        $_SESSION['option_8'] = $_POST["ID8_option"];
        $_SESSION['option_9'] = $_POST["ID9_option"];

        $page = 1;
    }
        
        //SELECT FILME COM AS RESPETIVAS REFERÊNCIAS ENTRE TABELAS + O QUE FOI PESQUISADO 

        $results_per_page = 4;

        $start_from = ($page-1) * $results_per_page;

        $select_filme = "SELECT DISTINCT _id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating

        FROM filmes, filmes_atores, atores, filmes_generos, generos, filmes_musicas, musicas

        WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator

        AND filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero

        AND filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

        AND " . $_SESSION['filters'] ." LIKE '%" . $_SESSION['option'] . "%'

        ";

        if($_SESSION['filters_2'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_2'] . " LIKE '%" . $_SESSION['option_2'] . "%'";
        }

        if($_SESSION['filters_3'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_3'] . " LIKE '%" . $_SESSION['option_3'] . "%'";
        }

        if($_SESSION['filters_4'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_4'] . " LIKE '%" . $_SESSION['option_4'] . "%'";
        }

        if($_SESSION['filters_5'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_5'] . " LIKE '%" . $_SESSION['option_5'] . "%'";
        }

        if($_SESSION['filters_6'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_6'] . " LIKE '%" . $_SESSION['option_6'] . "%'";
        }

        if($_SESSION['filters_7'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_7'] . " LIKE '%" . $_SESSION['option_7'] . "%'";
        }

        if($_SESSION['filters_8'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_8'] . " LIKE '%" . $_SESSION['option_8'] . "%'";
        }

        if($_SESSION['filters_9'] != '') {
            $select_filme = $select_filme . " AND " . $_SESSION['filters_9'] . " LIKE '%" . $_SESSION['option_9'] . "%'";
        }

        //resultado do SELECT antes do "LIMIT" - apenas para guardar o nº de resultados total
        $result_filme = $conn->query($select_filme);
        $results = ($result_filme->num_rows);

        //adição do LIMIT ao SELECT para mostrar resultados por páginas
        $select_filme = $select_filme . " LIMIT $start_from, $results_per_page";

        //resultado do SELECT - depois do LIMIT
        $result_filme = $conn->query($select_filme);
            


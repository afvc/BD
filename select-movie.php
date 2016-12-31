<?php
    include 'connection.php';

    $url = $_SERVER['REQUEST_URI']; //vai buscar URL

    $movieid = substr($url, -1); //vai buscar ao URL o id do filme (último caracter)
            
    //---------------------------------SELECTS-------------------------------//

    //SECLECT nome do filme - apenas para dar título à pagina
    $select_filme_title = "SELECT filme

    FROM filmes

    WHERE _id_filmes LIKE '$movieid'";

    $result_filme_title = $conn->query($select_filme_title);

    //SELECT nome do filme e da imagem
    $select_filme = "SELECT filme, image

    FROM filmes

    WHERE _id_filmes LIKE '$movieid'";

    $result_filme = $conn->query($select_filme);

    //SELECT outros dados do filme - mostrados noutra div do HTML
    $select_filme_more = "SELECT data_lanc, realizador, classif, imdb_rating, ost_rating

    FROM filmes

    WHERE _id_filmes LIKE '$movieid'";

    $result_filme_more = $conn->query($select_filme_more);

    //SELECT atores do filme
    $select_atores = "SELECT nome_ator

    FROM filmes, filmes_atores, atores

    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator

    AND _id_filmes LIKE '$movieid'";

    $result_atores = $conn->query($select_atores);

    //SELECT géneros do filme
    $select_generos = "SELECT nome_genero

    FROM filmes, filmes_generos, generos

    WHERE filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero

    AND _id_filmes LIKE '$movieid'";

    $result_generos = $conn->query($select_generos);

    //SELECT músicas da banda sonora
    $select_musicas = "SELECT nome_musica, m_generos, m_ano, cantor

    FROM filmes, filmes_musicas, musicas

    WHERE filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

    AND _id_filmes LIKE '$movieid'";

    $result_musicas = $conn->query($select_musicas);

?> 
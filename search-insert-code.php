<?php
    
    $MovieOuterError="";
    $newMovie="";
    //---------------------------------- INSERT FILME ----------------------------------//
    if(isset($_POST['addmovie'])) {

        //----VARIÁVEIS PARA USAR NO INSERT

        $filme = $_POST["filme"];           //o que foi escrito no filme
        $classif = $_POST["classif"];       //o que foi escrito na classificação
        $data_lanc = $_POST["data_lanc"];   //o que foi escrito na data de lançamento
        $realizador = $_POST["realizador"]; //o que foi escrito no realizador
        $imdb_rat = $_POST["imdb_rating"];  //o que foi escrito no imdb_rating
        $ost_rat = $_POST["ost_rating"];    //o que foi escrito no ost_rating
        
        $genero = $_POST["nome_genero"];    //o que foi escrito no género
        
        $nome_musica = $_POST["nome_musica"]; //o que foi escrito na música
        $genero_musica = $_POST["genero"];   //o que foi escrito no género
        $ano_musica = $_POST["ano"];         //o que foi escrito no ano
        $cantor = $_POST["cantor"];          //o que foi escrito no cantor/banda
        
        $nome_ator = $_POST["nome_ator"];    //o que foi escrito no ator
        
        //----INSERTS
        
        $insert_movie=$conn->query("INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)

        VALUES (' ' , '$filme', 'assets/images/soon.jpg', '$classif', '$data_lanc', '$realizador', '$imdb_rat', '$ost_rat', '1', '1', 'user')");
        
        $last_movie = mysqli_insert_id($conn);
        
        $insert_genre=$conn->query("INSERT INTO generos (_id_genero, nome_genero)

        VALUES (' ' , '$genero')");
        
        $last_genre = mysqli_insert_id($conn);

        $insert_genre_movie=$conn->query("INSERT INTO filmes_generos (filmes_id_filmes, generos_id_genero)
    
        VALUES ('$last_movie', '$last_genre')");    
        
        
        $insert_song=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)
            
        VALUES (' ', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user');");
            
        $last_song = mysqli_insert_id($conn);

        $insert_song_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)
    
        VALUES ('$last_movie', '$last_song')");
        
        
        $insert_actor=$conn->query("INSERT INTO atores(_id_ator, nome_ator, nasc_ator)

        VALUES (' ' , '$nome_ator', 'NULL')");
        
        $last_ator = mysqli_insert_id($conn);
        
        $insert_actor_movie=$conn->query("INSERT INTO filmes_atores (filmes_id_filmes, atores_id_ator)
    
        VALUES ('$last_movie', '$last_ator')");

    }
?>
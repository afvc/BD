<?php

    if(isset($_REQUEST['addsong'])) {

        $newsong=$conn->query("SET autocommit=0;") or die (mysqli_error());
        $newsong=$conn->query("START TRANSACTION;") or die (mysqli_error());

        $newsong_movie=$conn->query("SET autocommit=0;") or die (mysqli_error());
        $newsong_movie=$conn->query("START TRANSACTION;") or die (mysqli_error());


        //VARIÁVEIS PARA USAR NO INSERT:

        $nome_musica = $_POST["nome_musica"];       //o que foi escrito na música
        $genero_musica = $_POST["genero"];          //o que foi escrito no género
        $ano_musica = $_POST["ano"];                //o que foi escrito no ano
        $cantor = $_POST["cantor"];                 //o que foi escrito no cantor/banda

        $nome_musica_2 = $_POST["nome_musica"];       //o que foi escrito na música
        $genero_musica_2 = $_POST["genero"];          //o que foi escrito no género
        $ano_musica_2 = $_POST["ano"];                //o que foi escrito no ano
        $cantor_2 = $_POST["cantor"];                 //o que foi escrito no cantor/banda

        $nome_musica_3 = $_POST["nome_musica"];       //o que foi escrito na música
        $genero_musica_3 = $_POST["genero"];          //o que foi escrito no género
        $ano_musica_3 = $_POST["ano"];                //o que foi escrito no ano
        $cantor_3 = $_POST["cantor"];                 //o que foi escrito no cantor/banda

        $YearError ="";
        $OuterError="";
        $yearnum = $_POST['ano'];
      
        if( (is_numeric($yearnum)) ){
            
            $addsong=("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)
            
                        VALUES (' ', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user');");
            
            $addsong_movie=("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)
    
                        VALUES ('$movieid', last_insert_id())");

            $newsong=$conn->query($addsong) or die (mysqli_error());                        
            $newsong=$conn->query("COMMIT") or die (mysqli_error());

            $newsong_movie=$conn->query($addsong_movie) or die (mysqli_error());
            $newsong_movie=$conn->query("COMMIT") or die (mysqli_error());
            
            $OuterError = "Song submited with success";
        }
        
        else {
         
            $OuterError = "Song not submited, try again";
            $YearError = "Please enter a number."; 

        }
    }
?>
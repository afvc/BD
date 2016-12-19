$(.btn_add_song).click(function () {

    <?php $insert_song = "INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name) VALUES('$id_musica', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user')"; ?>
}
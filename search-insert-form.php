<!--------------MODAL---------->

<div class="row center-xs ">

    <span class="text col-xs-12"><?php echo $MovieOuterError; ?><br></span>
    <button class="grow  btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

    <div class="md-modal-xs md-effect-1" id="modal-1">
        <div class="md-content-xs">
            <button class="md-close btn-default-fixed">Close me!</button>

            <div>
                <form action="#" method="post">
                    <label class="input-anim" for="">
                        <br>
                        <br><span class="label__info">Movie Name</span>
                        <input class="input-anim" type="text" name="filme" required>
                        <br> </label>

                    <label class="input-anim" for="">
                        <span class="label__info">Age rating</span>
                        <input type="text" pattern="\d*" maxlength="2" name="classif">
                        <br>
                    </label>

                    <label class="input-anim" for="">
                        <span class="label__info">Release date</span>
                        <input class="lighter" placeholder="yyyy-mm-dd" type="text" name="data_lanc" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
                        <br>
                    </label>

                    <label class="input-anim" for="">
                        <span class="label__info">Director</span>
                        <input type="text" name="realizador">
                        <br>
                    </label>

                    <label class="input-anim" for="">
                        <span class="label__info">IMDB Rating</span>
                        <input placeholder="0-10" type="number" step="any" max="10" name="imdb_rating">
                        <br>
                    </label>

                    <label class="input-anim" for="">
                        <span class="label__info">OST Rating</span>
                        <input placeholder="0-100" type="number" step="any" max="100" name="ost_rating">
                        <br>
                    </label>

                    <div id="copyG" class="cloneG">
                        <label class="input-anim test-mgenre-label" for="">
                            <span class="label__info">Genre</span>
                            <input type="text" id="mgenre" class="test-mgenre" name="nome_genero" required>
                            <br>
                        </label>
                    </div>

                    <div id="add-del-buttons">
                        <input type="button" id="btnAddG" class="btn-default" value="1 MORE GENRE">
                        <input type="button" id="btnDelG" class="btn-default" value="REMOVE LAST GENRE">
                    </div>
                    
                     <div id="copy1" class="clone">
                                             
                                            <label for="text" class="test-song-label input-anim">
                                                <span class="label__info">Song</span>
                                                <input type="text" id="song" name="nome_musica" class="test-song " />
                                                <br>
                                            </label>

                                            <label for="text" class="input-anim test-genre-label">
                                                <span class="label__info">Genre</span>
                                                <input type="text" id="genre" name="genero" class="test-genre">
                                            </label>
                                            <br>
                                            <label class="input-anim" class="test-year-label">
                                                <span class="label__info">Year</span>
                                                <input type="number" id="year" max="3000" name="ano" class="test-year">
                                                <br>
                                                
                                            </label>

                                            <label class="input-anim">
                                                <span class="label__info test-band-label">Singer/Band</span>
                                                <input type="text" class="test-band" id="band" name="cantor">
                                            </label>
                                            <br>
                                        </div>

                                        <div id="add-del-buttons">
                                            <input type="button" id="btnAddS" class="btn-default" value="1 MORE SONG">
                                            <input type="button" id="btnDelS" class="btn-default" value="REMOVE LAST SONG">
                                        </div>

                    <div id="copyC1" class="cloneC">

                        <label for="text" class="test-ator-label input-anim">
                            <span class="label__info">Actor</span>
                            <input type="text" id="ator" name="nome_ator" class="test-ator" required>
                            <br>
                        </label>
                    </div>

                    <div id="add-del-buttons">
                        <input type="button" id="btnAddC" class="btn-default" value="1 MORE ACTOR">
                        <input type="button" id="btnDelC" class="btn-default" value="REMOVE LAST ACTOR">
                    </div>


                    <br>
                    <input type="submit" class="btn-default" value="ADD MOVIE" name="addmovie">
                </form>

            </div>

        </div>
    </div>
</div>
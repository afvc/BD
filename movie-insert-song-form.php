<!--------------MODAL---------->

<div class="row center-xs">
    <span class="text col-xs-12 text-danger"><?php echo $OuterError; ?><br></span>
    <button class="grow btn-default  md-trigger" data-modal="modal-1">IS THERE A MISING SONG?</button>

    <div class="md-modal-xs md-effect-1" id="modal-1">
        <div class="md-content-xs">
            <button class="md-close btn-default-fixed">Close me!</button>

            <div>
                <form method="post">
                    <div id="copy1" class="clone">
                        <br>
                        <br>
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
                        <br>
                        <label class="input-anim" class="test-year-label">
                            <span class="label__info">Year</span>
                            <input type="number" id="year" max="3000" name="ano" class="test-year">
                            <br>
                            <span class="text"><?php echo $YearError; ?><br></span>
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

                    <br>
                    <input type="submit" class="btn-default btn_add_song" value="ADD SONGS" name="addsong">

                </form>

            </div>
        </div>

    </div>
</div>
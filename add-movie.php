 

                <!--------------MODAL---------->

                <div class="row center-xs ">

                    <button class="grow  btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>

                            <div>
                                <form action="#" method="post">
                                    <label class="input-anim" for="">
                                        <br>
                                        <br><span class="label__info">Movie Name</span>
                                        <input class="input-anim" type="text" name="filme">
                                        <br> </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">Age rating</span>
                                        <input type="text" pattern="\d*" maxlength="2" name="classif">
                                        <br>
                                    </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">Release date</span>
                                        <input type="text" name="data_lanc">
                                        <br>
                                    </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">Director</span>
                                        <input type="text" name="realizador">
                                        <br>
                                    </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">IMDB Rating</span>
                                        <input type="text" pattern="\d*" maxlength="3" name="imdb_rating">
                                        <br>
                                    </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">OST Rating</span>
                                        <input type="text" pattern="\d*" maxlength="4" name="ost_rating">
                                        <br>
                                    </label>
                                    <label class="input-anim" for="">
                                        <span class="label__info">Genre</span>
                                        <input type="text" name="genre">
                                        <br>
                                    </label>


                                    <div id="copy1" class="clone">
                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info">Song</span>
                                            <input type="text" id="text" name="nome_musica" class="test-text " />
                                            <br>
                                        </label>

                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info"> Artist/Band</span>
                                            <input type="text" id="text" name="cantor" class="test-text" />
                                            <br>
                                        </label>

                                    </div>

                                    <div id="add-del-buttons">
                                        <input type="button" id="btnAddS" class="btn-default" value="1 MORE SONG">
                                        <input type="button" id="btnDelS" class="btn-default" value="REMOVE LAST SONG">
                                    </div>

                                    <div id="copyC1" class="cloneC">
                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info">Actor</span>
                                            <input type="text" id="text" name="nome_ator" class="test-text " />
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


             
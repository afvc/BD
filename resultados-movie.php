 
                        <?php 
                            //-----------------------RESULTADOS - NOME DO FILME e IMAGEM-----------------------//

                            if ($result_filme->num_rows > 0) {
                                while($row = $result_filme->fetch_assoc()) {

                                    echo $row["filme"] . "</p>

                                        </div>

                                            <div class ='col-sm-6 col-xs-12'>
                                                <a class ='nav__link center-xs menu-selected'>
                                                <img src = " . $row["image"] . " class ='logo'> </a>
                                            </div>";
                                }
                            }
                        ?>
 

                        <div class="col-sm-6 col-xs-12">

 
                            <p class="text text-left middle-xs">

                                <?php 
                                    //--------------RESULTADOS - INFO FILME e ATORES e GÉNERO----------------//

                                    while($row = $result_filme_more->fetch_assoc()) {

                                        echo "<b>Release date: </b>" . $row["data_lanc"] . "<br>";

                                        if (!(!isset($row["classif"]))){ //se tiver classif etária definido
                                            echo "<br><b>Age rating: </b>" . $row["classif"];
                                        }
                                        if (!(!isset($row["realizador"]))){ //se tiver realizador definido
                                            echo "<br><b>Director: </b>" . $row["realizador"];
                                        }
                                        if (!(!isset($row["imdb_rating"]))){ //se tiver imdb_rating definido
                                            echo "<br><b>IMDB rating: </b>" . $row["imdb_rating"] . "/10";
                                        }
                                        if (!(!isset($row["ost_rating"]))){ //se tiver ost_rating definido
                                            echo "<br><b>OST rating: </b>" . $row["ost_rating"] . "/100";
                                        }
                                    }

                                    echo "<br><br><b>Main actors: </b>";

                                    while($row = $result_atores->fetch_assoc()) {
                                        echo "<br>" . $row["nome_ator"];
                                    }

                                    echo "<br><br><b>Genres: </b>";

                                    while($row = $result_generos->fetch_assoc()) {                            
                                        echo "<br>" . $row["nome_genero"];
                                    }

                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="row center-xs start-md">
                        <div class="col-xs-12  ">

                            <div class="subtitle  center-xs start-sm">
                                <p>OFFICIAL SOUNDTRACK</p>
                            </div>
                        </div>

                        
                       <!-- //--------------------------RESULTADOS - MUSICAS--------------------------//-->

                           <?php  while($row = $result_musicas->fetch_assoc()) {

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
                                        echo "</p>
                                             </div>";
                            }
                        ?>
                    </div>
                </div>
                
              
                 
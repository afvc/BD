<?php  

include 'logx.php';  
include 'connection.php';
include  'change-pass.php'

?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    </head>


    <body>
        <?php include 'navbar.php'; ?>
            <section class="section-resized">

 
                <div class="row">
                    <div class="col-xs-12 bg-gray">
                        <br>
                        <p id="welcome" class="text-bold">Username:
                            <?php  echo  $_SESSION['login_user'];
                           ?>
                        </p>
                        
            <span class="text"><br><?php echo $NewpassError; ?><br></span>
                        <a class="text-light" href="logout.php"><button class="btn-default">Log Out</button></a>
                        <button class="grow btn-dark  md-trigger" data-modal="modal-1"> Change Password</button>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>

 
                <!--------------MODAL---------->

                <div class="row center-xs">



                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>

                            <div>
                                <form action="#" method="post">
                                    

                                    <br>
                                    <br>

                                    <label for="text" class="input-anim">
                                        <span class="label__info">New Password</span>
                                        <input type="password" name="passwd" />
                                      
                                           <br>
                                    </label>

                                    <input class="btn-default" type="submit" value="Submit" name="submitpass">
                                    
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                </div>




                <div class="row">

                    <div class="subtitle col-xs-12 start-xs">
                        <p id="about">ABOUT</p>
                    </div>

                    <p class="text text-darkest text-justify col-xs-12">
                        If you're not only a movie fan but also a music addicted this is the right place for you!
                        <br>
                        <br> You can check out the movies with the <a href="tops-OST.php"><b>best Original Soundtracks (OST)</b></a> from
                        <a href="http://www.soundtrackgeek.com/"> <b>Soundtrack Geek</b></a> ratings and also the <a href="tops-imdb.php"><b>IMDB Rating Top 25 Movies</b></a>
                        <!--and the Most Popular Movies Around Here-->on the Tops tab.

                        <br> If you're looking for something a little more specific you can go to <a href="search.php"><b>Search</b></a> and look for what you what. If you think there's a movie we're missing here, feel free to suggest it to us on 'Help Us Grow' by adding the informations you have about it, we'll then confirm them and add it to our website.
                        <br> If you think there's some missing or wrong information on a movie we have here, you can help us with that too.
                        <br>
                        <br> Enjoy!


                    </p>
                </div>

                <div class="row">
                    <div class="subtitle col-xs-12 start-xs">
                        <p id="calendar">CALENDAR</p>
                        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;hl=en&amp;bgcolor=%23ffffff&amp;src=anafilipavc%40gmail.com&amp;color=%23e3e5a9&amp;ctz=Europe%2FLisbon" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>

                </div>


            </section>

 

    </body>


    </html>
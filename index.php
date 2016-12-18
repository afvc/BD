<?php  include('login.php');

 include('logx.php');

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
                    <div class="col-xs-12">
                        <div id="profile">
                            <p id="welcome">Username : <i>
                                <?php echo  $_SESSION['login_user']; ?> </i></p>

                                <p id="welcome">Password : <i>
                                
                                <?php echo  $passdb;;?> </i></p>


                            <button><a id="logout" href="logout.php">Log Out</a></button>
                            <button><a id="logout" href="">Change Password</a></button>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="subtitle start-xs">
                        <p id="about">ABOUT</p>
                    </div>

                    <p class="text text-darkest text-justify">
                        If you're not only a movie fan but also a music addicted this is the right place for you!
                        <br>
                        <br> You can check out the movies with the <a href="tops-OST.php"><b>best Original Soundtracks (OST)</b></a> from Soundtrack Geek ratings and also the <a href="tops-imdb.php"><b>IMDB Rating</b></a> Top 25 Movies <!--and the Most Popular Movies Around Here--> on the Tops tab.
                        <br>
                        <br> If you're looking for something a little more specific you can go to <a href="search.php"><b>Search</b></a> and look for what you what. If you think there's a movie we're missing here, feel free to suggest it to us on 'Help Us Grow' by adding the informations you have about it, we'll then confirm them and add it to our website.
                        <br> If you think there's some missing or wrong information on a movie we have here, you can help us with that too.
                        <br>
                        <br> Enjoy!

                    </p>
                </div>


                <div class="row">
                    <div class="subtitle start-xs">
                        <p class="subtitle start-xs">CALENDAR</p>
                        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;hl=en&amp;bgcolor=%23ffffff&amp;src=anafilipavc%40gmail.com&amp;color=%23e3e5a9&amp;ctz=Europe%2FLisbon" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>

                </div>


            </section>

            <div class="md-overlay"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
            <script type="text/javascript" src="assets/js/classie.js"></script>
            <script type="text/javascript" src="assets/js/modalEffects.js"></script>
            <script src="assets/js/cssParser.js"></script>

    </body>

    </html>
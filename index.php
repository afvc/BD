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

    <!------------#NAVBAR_BIG------------>
    <div class="smalltext nav-big">

        <nav class="navbar">
            <div class="row middle-xs full-height">

                <ul class="smalltext col-xs-8 end-xs  col-sm-10 col-lg-10 text-bold">

                    <li class="navbar__link"><a href="index.php" class="menu-selected">HOME</a></li>
                    <li class="navbar__link"><a href="tops.php">TOPS</a></li>
                    <li class="navbar__link"><a href="slist.php">SONG LIST</a></li>
                    <li class="navbar__link"> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">CONTACT US</a></li>
                    <li class="navbar__link"><a href="search.php">SEARCH</a></li>

                </ul>

            </div>
        </nav>
    </div>


    <!------------#NAVBAR_SMALL------------>

    <div class="nav-small text-bold">

        <input type="checkbox" id="nav-trigger" class="nav-controller" />

        <header class="header-bar">
            <label class="" for="nav-trigger" tabindex="-1">
                <div class="button--icon-container">
                    <span class="icon icon--hamburger"></span>
                </div>
            </label>

        </header>

        <aside class="nav">
            <label class="overlay" for="nav-trigger"></label>
            <div class="nav__body">


                <ul class="  nav__list col-xs-12 subtitle">
                    <label class="nav__item" for="nav-trigger">

                        <li><a class="nav__link start-xs" href="index.php" class="menu-selected">HOME</a></li>
                        <li><a class="nav__link start-xs" href="tops.php">TOPS</a></li>
                        <li><a class="nav__link start-xs" href="slist.php">SONG LIST</a></li>
                        <li><a class="nav__link start-xs" href="mailto:someone@example.com?Subject=Hello%20again" target="_top">CONTACT US</a></li>
                        <li><a class="nav__link start-xs" href="search.php">SEARCH</a></li>

                    </label>
                </ul>
            </div>
        </aside>
    </div>

    <section class="section-resized">

       <div class="row">
           <div class="col-xs-12 bg-gray">  <div>
               <p id="welcome" class="text-bold">Username :   
    <?php  echo  $_SESSION['login_user'];?></p>

            <p id="welcome" class=" text-bold">Password :
    <?php echo  $_SESSION['login_pass'];?></p>


            <button class="btn-default"><a   class="text-light" href="logout.php">Log Out</a></button>
             <button class="btn-dark"><a   href="">Change Password</a></button><br><br><br><br><br><br>
           </div></div></div>

        <div class="row">

            <div class="subtitle start-xs">
                <p id="about">ABOUT</p>
            </div>

            <p class="text text-darkest text-justify">
                If you're not only a movie fan but also a music addicted this is the right place for you!
                <br>
                <br> You can check out below the movies with the best Original Soundtracks (OST) based on the ratings made by all of our users and you can also go check out IMDB Rating Top 25 Movies and the Most Popular Movies Around Here on the Tops tab.
                <br>
                <br> If you're looking for something a little more specific you can go to Search and look for what you what. If you think there's a movie we're missing here, feel free to suggest it to us on 'Help Us Grow' by adding the informations you have about it, we'll then confirm them and add it to our website.
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
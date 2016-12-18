<?php
echo "
<!------------#NAVBAR_BIG------------>
    <div class='smalltext nav-big'>

        <nav class='navbar'>
            <div class='row middle-xs full-height'>

                <ul class='smalltext col-xs-8 end-xs  col-sm-10 col-lg-10 text-bold'>

                    <li class='navbar__link'><a href='index.php'>HOME</a></li>
                    <li class='navbar__link'><a href='tops.php'>TOPS</a></li>
                    <li class='navbar__link'><a href='slist.php'>SONG LIST</a></li>
                    <li class='navbar__link'><a href='search.php'>SEARCH</a></li>
                    <li class='navbar__link'><a href='mailto:someone@example.com?Subject=Hello%20again' target='_top'>CONTACT US</a></li>

                </ul>

            </div>
        </nav>
    </div>


    <!------------#NAVBAR_SMALL------------>

    <div class='nav-small text-bold'>

        <input type='checkbox' id='nav-trigger' class='nav-controller' />

        <header class='header-bar'>
            <label for='nav-trigger' tabindex='-1'>
                <div class='button--icon-container'>
                    <span class='icon icon--hamburger'></span>
                </div>
            </label>

        </header>

        <aside class='nav'>
            <label class='overlay' for='nav-trigger'></label>
            <div class='nav__body'>


                <ul class='nav__list col-xs-12 subtitle'>
                    <label class='nav__item' for='nav-trigger'>

                        <li><a class='nav__link start-xs' href='index.php' class='menu-selected'>HOME</a></li>
                        <li><a class='nav__link start-xs' href='tops.php'>TOPS</a></li>
                        <li><a class='nav__link start-xs' href='slist.php'>SONG LIST</a></li>
                        <li><a class='nav__link start-xs' href='mailto:someone@example.com?Subject=Hello%20again' target='_top'>CONTACT US</a></li>
                        <li><a class='nav__link start-xs' href='search.php'>SEARCH</a></li>

                    </label>
                </ul>
            </div>
        </aside>
    </div>";
        
?>
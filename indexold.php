<!DOCTYPE HTML>

<html>
    <head>
        <title>KDUMOOC</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.scrolly.min.js"></script>
        <script src="js/jquery.scrollzer.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <?php

        include 'require/links.php';
        include 'require/functions.php';
        include 'require/messages.php';
        ?>
    </head>
    <body>

        <!-- Header -->
        <div id="header" class="skel-layers-fixed">

            <div class="top">

                <!-- Logo -->
                <div id="logo">
                    <span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
                    <h1 id="title">KDU MOOC</h1>
                    <p>General Sir John Kotelawala<br> Defence University</p>
                </div>

                <!-- Nav -->
                <nav id="nav">

                    <ul>
                        <li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home</span></a></li>
                        <li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Courses</span></a></li>
                        <li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Us</span></a></li>
                        <li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact</span></a></li>
                    </ul>
                </nav>

            </div>

            <div class="bottom">

                <!-- Social Icons -->
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
                </ul>

            </div>

        </div>

        <!-- Main -->
        <div id="main">

            <!-- Intro -->
            <section id="top" class="one dark cover">
                <div class="container">

                    <header>
                        <?php
                        if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {
                            echo "<div>";
                            echo $_GET['error'];
                            echo "</div><br>";
                        }
                        if (isset($_GET['message']) && ($_GET['token'] == sha1($_GET['message']))) {
                            echo "<div>";
                            echo $_GET['message'];
                            echo "</div><br>";
                        }
                        ?>
                        <img src="images/mook logo.png">
                        <p> General Sir John Kotelawala  Defence University <br> Massive Open Online Course</p><br>
                        <h2 class="alt">Follow our best courses, online.</h2>
                    </header>

                    <footer>
                        <a href="#portfolio" class="button scrolly">SIGN UP</a>

                    </footer>

                </div>
            </section>

            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">

                    <header>
                        <h2>Courses</h2>
                    </header>

                    <p></p>

                    <div class="row">
                        <div class="4u">
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
                                <header>
                                    <h3>Discrete Mathematics </h3>
                                </header>
                            </article>
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
                                <header>
                                    <h3>Probability & Statistics </h3>
                                </header>
                            </article>
                        </div>
                        <div class="4u">
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a>
                                <header>
                                    <h3>Digital electronic</h3>
                                </header>
                            </article>
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a>
                                <header>
                                    <h3>Software Engineering</h3>
                                </header>
                            </article>
                        </div>
                        <div class="4u">
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a>
                                <header>
                                    <h3>Algorithm </h3>
                                </header>
                            </article>
                            <article class="item">
                                <a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a>
                                <header>
                                    <h3>DBMS</h3>
                                </header>
                            </article>
                        </div>
                    </div>

                </div>
            </section>

            <!-- About Me -->
            <section id="about" class="three">
                <div class="container">

                    <header>
                        <h2>About Us</h2>
                    </header>

                    <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>

                    <p></p>

                </div>
            </section>

            <!-- Contact -->
            <section id="contact" class="four">
                <div class="container">

                    <header>
                        <h2>Contact</h2>
                    </header>

                    <p></p>

                    <form method="post" action="#">
                        <div class="row 50%">
                            <div class="6u"><input type="text" name="name" placeholder="Name" /></div>
                            <div class="6u"><input type="text" name="email" placeholder="Email" /></div>
                        </div>
                        <div class="row 50%">
                            <div class="12u">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <input type="submit" value="Send Message" />
                            </div>
                        </div>
                    </form>

                </div>
            </section>

        </div>

        <!-- Footer -->
        <div id="footer">

            <!-- Copyright -->
            <ul class="copyright">
                <li>&copy; Pathum Vidanagamage. All rights reserved.</li><li></a></li>
            </ul>

        </div>

    </body>
</html>
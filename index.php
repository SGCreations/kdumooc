<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'require/links.php'; ?>
        <title>KDUMOOC</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!--
       
        Urbanic Template
        
        http://www.templatemo.com/tm-395-urbanic
        
        -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->

        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                        <img src="images/phone.png" alt="phone"/>
                        +94-11-2635268
                    </div>
                    <div id="email" class="pull-right">
                        <img src="images/email.png" alt="email"/>
                        kdudefence@kdu.ac.lk
                    </div>
                </div>
            </div>
        </div>
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#" class="navbar-brand"><img src="images/templatemo_logo.png" alt="KDUMOOC" title="KDUMOOC" /></a>
                        </div>

                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li><a href="#courses">COURSES</a></li>
                                <li><a href="/kdumooc/signInMain.php">SIGN IN</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SIGN UP <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/kdumooc/addStudent.php">As a Student</a></li>
                                        <li><a href="/kdumooc/addLecturer.php">As a Lecturer</a></li>                                       
                                    </ul>
                                </li>

                                <li><a href="#templatemo-contact">CONTACT</a></li>
                            </ul>

                        </div>

                        <?php
                        if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {
                            echo "<br/>";
                            ?>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Error!</strong> <?php echo $_GET['error']; ?></div>
                            <?php
                        }
                        if (isset($_GET['message']) && ($_GET['token'] == sha1($_GET['message']))) {
                            echo "<br/>";
                            ?>
                            <div class="alert alert-dismissable alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Message!</strong> <?php echo $_GET['message']; ?></div>
                        <?php } ?>
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>

        <div>
            <!-- Carousel -->
            <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#templatemo-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="1"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>WELCOME TO KDUMOOC</h1>
                                <p>Take the best courses, online.</p>
                            </div>                            
                        </div>                       
                    </div>
                     <div class="item 1">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>ALL COURSES FROM HOME!</h1>
                                <p>All university courses at your doorstep!</p>
                            </div>                            
                        </div>                       
                    </div>
                    <div class="item 2">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>EXPERIENCE FUTURE LEARNING!</h1>
                                <p>Step in to the latest trends in education...</p>
                            </div>                            
                        </div>                       
                    </div>
                </div><!-- /#templatemo-carousel -->
            </div>
            
            <div id="courses" >
                <div class="container">
                    <div class="row">
                        <div class="templatemo-line-header" >
                            <div class="text-center">
                                <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey"><b>OUR COURSES</b></span>
                                <hr class="team_hr team_hr_right hr_gray" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="templatemo-gallery-category" style="font-size:16px; margin-top:80px;">

                        </div>
                    </div> <!-- /.row -->


                    <div class="clearfix"></div>
                    <div class="text-center">
                        <ul class="templatemo-project-gallery" >
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                                <a class="colorbox" href="images/full-gallery-image-1.jpg" data-group="gallery-graphic">
                                    <div class="templatemo-project-box">

                                        <img src="images/gallery-image-1.jpg" class="img-responsive" alt="gallery" />

                                        <div class="project-overlay">
                                            <h5>Graphic</h5>
                                            <hr />
                                            <h4>TEA POT</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-creative" >
                                <a class="colorbox" href="images/full-gallery-image-2.jpg" data-group="gallery-creative">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-2.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Creative</h5>
                                            <hr />
                                            <h4>BREAKFAST</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                                <a class="colorbox" href="images/full-gallery-image-3.jpg" data-group="gallery-inspiration">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-3.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Inspiration</h5>
                                            <hr />
                                            <h4>GREEN COLORS</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-design" >
                                <a class="colorbox" href="images/full-gallery-image-4.jpg" data-group="gallery-design">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-4.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Web Design</h5>
                                            <hr />
                                            <h4>CAMERA</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                                <a class="colorbox" href="images/full-gallery-image-5.jpg" data-group="gallery-inspiration">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-5.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Inspiration</h5>
                                            <hr />
                                            <h4>PLANT</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                                <a class="colorbox" href="images/full-gallery-image-6.jpg" data-group="gallery-inspiration">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-6.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Inspiration</h5>
                                            <hr />
                                            <h4>CABLE TRAIN</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-design" >
                                <a class="colorbox" href="images/full-gallery-image-7.jpg" data-group="gallery-design">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-7.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Web Design</h5>
                                            <hr />
                                            <h4>CITY</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-creative" >
                                <a class="colorbox" href="images/full-gallery-image-8.jpg" data-group="gallery-creative">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-8.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Creative</h5>
                                            <hr />
                                            <h4>BIRDS</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-graphic" >
                                <a class="colorbox" href="images/full-gallery-image-9.jpg" data-group="gallery-graphic">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-9.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Graphic</h5>
                                            <hr />
                                            <h4>NATURE</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-inspiration" >
                                <a class="colorbox" href="images/full-gallery-image-10.jpg" data-group="gallery-inspiration">
                                    <div class="templatemo-project-box">
                                        <img src="images/gallery-image-10.jpg" class="img-responsive" alt="gallery" />
                                        <div class="project-overlay">
                                            <h5>Inspiration</h5>
                                            <hr />
                                            <h4>DOGGY</h4>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul><!-- /.gallery -->
                    </div>
                    <div class="clearfix"></div>
                    <br><br><br> <br><br><br>
                </div><!-- /.container -->
            </div> <!-- /.templatemo-portfolio -->



            <div class="templatemo-team" id="templatemo-about">
                <div class="container">
                    <div class="row">
                        <div class="templatemo-line-header">
                            <div class="text-center">
                                <hr class="team_hr team_hr_left"/><span>OUR LECTURERS</span>
                                <hr class="team_hr team_hr_right" />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <ul class="row row_team">
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="images/member1.jpg" class="img-responsive" alt="member 1" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">TRACY</p>
                                    <p class="team-inner-subtext">Designer</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="images/member2.jpg" class="img-responsive" alt="member 2" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">MARY</p>
                                    <p class="team-inner-subtext">Developer</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="images/member3.jpg" class="img-responsive" alt="member 3" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">JULIA</p>
                                    <p class="team-inner-subtext">Director</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="images/member4.jpg" class="img-responsive" alt="member 4" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">LINDA</p>
                                    <p class="team-inner-subtext">Manager</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- /.templatemo-team -->



            <div id="templatemo-contact">
                <div class="container">
                    <div class="row">
                        <div class="templatemo-line-header head_contact">
                            <div class="text-center">
                                <hr class="team_hr team_hr_left hr_white"/><span class="txt_darkgrey">CONTACT US</span>
                                <hr class="team_hr team_hr_right hr_white"/>
                            </div>
                        </div>


                        <div class="col-md-4 contact_right">
                            <p>Please feel free to contact us regarding any queries. A feedback mail will reach you within 72 hours of submitting your query.</p>
                            <p><img src="images/location.png" alt="icon 1" /> General Sir John Kotelawala Defence University, Kandawala Road, Rathmalana, Sri Lanka.</p>
                            <p><img src="images/phone1.png"  alt="icon 2" /> +94-11-2635268</p>
                            <p><img src="images/globe.png" alt="icon 3" /><a class="link_orange" href="http://www.kdu.ac.lk/"><span class="txt_orange">www.kdu.ac.lk</span></a></p>
                            <form class="form-horizontal" action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Name..." maxlength="40" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email..." maxlength="40" />
                                </div>
                                <div class="form-group">
                                    <textarea  class="form-control" style="height: 130px;" placeholder="Write down your message..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-orange pull-right">SEND</button>
                            </form>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /#templatemo-contact -->


    </body>
</html>
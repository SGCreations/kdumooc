<!DOCTYPE html>

<?php
//Sidath 
//23 Sep 2015
//include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';

if (!sessionExists() || !isStudent()) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $courseID = $_GET['courseID'];
    $student_details = loadStudentDetails($_SESSION['userID'], $db);
    $course_details = loadCourseDetails($courseID, $db);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KDUMOOC | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- KDUMOOC Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="adminDashboard.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>K</b>M</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>KDU</b>MOOC</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <?php
                                if (doesImageExist(STUDENT_PROFILE_PIC_UPLOAD_URL . $_SESSION['userID'] . ".jpg")) {
                                    $img_url = STUDENT_PROFILE_PIC_UPLOAD_URL . $_SESSION['userID'] . ".jpg";
                                } else {
                                    $img_url = STUDENT_PROFILE_PIC_UPLOAD_URL . "default.jpg";
                                }
                                ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $img_url; ?>" class="user-image" alt="User Image" />
                                    <span class="hidden-xs"><?php echo $student_details[0]['first_name'] . " " . $student_details[0]['last_name'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo $img_url; ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $student_details[0]['first_name'] . " " . $student_details[0]['last_name']; ?> - Student
                                            <small>Verified Member</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-6 text-center">
                                            <a href="#">Courses</a>
                                        </div>
                                        <!--                                        <div class="col-xs-4 text-center">
                                                                                    <a href="#">My Marks</a>
                                                                                </div>-->
                                        <div class="col-xs-6 text-center">
                                            <a href="#">Assessments</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php
                                            echo "<a href=\"editStudent.php?studentID=" . $_SESSION['userID'] . "&token=" . sha1($_SESSION['userID']) . "\" class=\"btn btn-default btn-flat\">Profile</a>";
                                            ?>
                                        </div>
                                        <div class="pull-right">
                                            <a href="signOut.php" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $img_url; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $student_details[0]['first_name'] . " " . $student_details[0]['last_name'] ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!--                    <form action="#" method="get" class="sidebar-form">
                                            <div class="input-group">
                                                <input type="text" name="q" class="form-control" placeholder="Search..." />
                                                <span class="input-group-btn">
                                                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"><center>COURSE ADMINISTRATION</center></li>
                        <li><?php echo"<a href=\"courseDashboardStudentAnnouncements.php?courseID=" . $courseID . "&token=" . sha1($courseID) . "\">"; ?><i class="fa fa-bullhorn"></i> <span>Announcements</span></a></li>
                        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Course Schedule</span></a></li>
                        <li class="active"><?php echo"<a href=\"courseDashboardStudentTips.php?moduleID=1&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-ticket"></i> <span>Tips for Working in KDUMOOC</span></a></li>
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Modules</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=1&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>The Foundations: Logic and <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proofs</a></li>
                                <li><?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=2&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>Basic Structures: Sets, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Functions, Sequences, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sums, and Matrices</a></li>
                                <li><?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=3&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>Induction and Recursion</a></li>

                            </ul>
                        </li>

                        <li><a href="documentation/index.html"><i class="fa fa-comments-o"></i> <span>Discussion Forum</span></a></li>
                        <li><?php echo"<a href=\"courseDashboardStudentAssignments.php?courseID=" . $courseID . "&token=" . sha1($courseID) . "\">"; ?><i class="fa fa-question-circle"></i> <span>Assignments</span></a></li>
                        <li><?php echo"<a href=\"courseDashboardStudentAboutLecturer.php?courseID=" . $courseID . "&token=" . sha1($courseID) . "\">"; ?><i class="fa fa-male"></i> <span>About Your Lecturer</span></a></li>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->



            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        WELCOME!
                        <small>You are following: <b><?php echo $course_details[0]['title'] ?></b></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section id="idMainContent">
                    <center>
                        <br/>
                        <table style="width: 90%"><tr><td>
                                    <div style="text-align: justify">

                                        <h2 class="post-title">10 Tips to Prepare for Your Upcoming Course</a></h2>

                                        <p>Top-performing KDUMOOC students share their advice on course success. Get the most out of your course experience!</p>
                                        <img src="http://38.media.tumblr.com/e658f54f293afa9d9de940366f579093/tumblr_inline_ndggkl5cHF1rg0l34.png" style="float: left; border: 1px solid #CCC; margin: 5px 12px 5px 0px; width: 255px;" alt="motivation"><p><b>1. Motivation - Write down your reasons for joining the course and ultimate goals</b><br>
                                            Jot down notes like: &ldquo;I want to move ahead in my career&rdquo; or &ldquo;I want to improve my skills as a chef.&ldquo; Post your answers on a refrigerator, bathroom mirror, computer screen so you can see them daily to spark persistence.</p>

                                        <p><b>2. Time Management - Set aside a weekly day and time for coursework</b><br>
                                            Open your calendar and choose a predictable, reliable time to dedicate to watching lectures and completing assignments. Set up a block of time, look ahead and if there are sessions you may miss, adjust accordingly. </p>

                                        <p><b>3. Commitment - Watch the first lecture and complete the first assignment</b><br>
                                            Our studies show that students who pass these first milestones are much more likely to complete the course. </p>

                                        <p><b>4. Communications - Keep an eye out for emails from the Course Staff</b><br>Before and during the course, your instructor will send out emails that might include reminders about upcoming deadlines, announcements of changes to the course schedule, or links to helpful external resources. </p>



                                        <p><b>5. Support - Engage in the forums </b><br>Anecdotal evidence shows that learners are more likely to succeed if they participate in course forums. Be sure to ask questions about assignments, discuss topics, share resources, and make friends. Students often form study groups based on native language and interest areas. If you don&rsquo;t see a group that fits your needs, start one by posting a new thread outlining your interests and goals, and invite others to join you!</p>

                                        <p><b>6. Credentials - Consider earning a Verified Certificate</b><br>Earning a Verified Certificate has a deadline. Not only can you get a credential that can verifies the work you&rsquo;ve completed from a university partner, but it makes you be on track. </p>

                                        <p><b>7. Accountability - Share your plans with your network</b><br>Tell your friends about the course, post achievements to your social media accounts, blog about your homework assignments. Having a fan base to cheer you on makes a difference.</p>

                                        <p><b>8. Anticipate - Pick times to make up missed work</b><br>If you get distracted with obstacles like family, friends, work or an unexpected life event, consider how you will keep up with your coursework. Predicting upcoming roadblocks and adapting accordingly is one of the best strategies for reaching any goal.</p>

                                        <p><b>9. Access - Download the mobile apps</b><br>Learn anytime, anywhere! With the KDUMOOC Apps for iPhone, iPad, and Android you can even download videos to watch lectures offline. </p>

                                        <p><b>10. Supplies - Collect materials </b><br>Bookmark your course page, grab a notebook or digital app for notes (we like Evernote), a webcam, and collect any instructor-recommended materials. </p>

                                    </div>
                                </td></tr></table></center>
                </section>
            </div><!-- /.content-wrapper -->




            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.2.0
                </div>
                <strong>Copyright &copy; 2015 <a href="#">KDUMOOC</a>.</strong> All rights reserved.
            </footer>

            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
        <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- KDUMOOC App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- KDUMOOC dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
        <!-- KDUMOOC for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>
    </body>
</html>




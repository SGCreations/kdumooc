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
    $resultsOfCourse = getCourseDetails($courseID, $db);
    $lecturerDetails = loadLecturerDetails($resultsOfCourse[0]['LECTURER_idLECTURER'], $db);
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
                            <?php
                            if (doesImageExist(STUDENT_PROFILE_PIC_UPLOAD_URL . $_SESSION['userID'] . ".jpg")) {
                                $img_url = STUDENT_PROFILE_PIC_UPLOAD_URL . $_SESSION['userID'] . ".jpg";
                            } else {
                                $img_url = STUDENT_PROFILE_PIC_UPLOAD_URL . "default.jpg";
                            }
                            ?>
                            <li class="dropdown user user-menu">
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
                                            <a target="_parent" href="showReport.php">Assessments</a>
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
                        <li><?php echo"<a href=\"courseDashboardStudentTips.php?moduleID=1&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-ticket"></i> <span>Tips for Working in KDUMOOC</span></a></li>
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Modules</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=1&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>The Foundations: Logic and <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proofs</a></li>
                                <li><?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=2&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>Basic Structures: Sets, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Functions, Sequences, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sums, and Matrices</a></li>
                                <li><<?php echo"<a href=\"courseDashboardStudentModules.php?moduleID=3&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-circle-o"></i>Induction and Recursion</a></li>

                            </ul>
                        </li>

                        <li><?php echo"<a href=\"courseDashboardStudentForum.php?moduleID=1&courseID=" . $courseID . "&token=" . sha1($courseID) . ">"; ?><i class="fa fa-comments-o"></i> <span>Discussion Forum</span></a></li>
                        <li class="active"><?php echo"<a href=\"courseDashboardStudentAssignments.php?courseID=" . $courseID . "&token=" . sha1($courseID) . "\">"; ?><i class="fa fa-question-circle"></i> <span>Assignments</span></a></li>
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
                <section>
                    <center>
                        <br/>
                        <form method="post" action="startAssignment_submit.php"  class="form-horizontal" id="question-form" style="width: 75%">

                            <h3>Start MCQ Moc Exam</h3>
                            <div class="form-group">
                                <label for="id_modules">Choose Module: </label>
                                <?php
                                $value = getModuleDetails($courseID, $db);
                                if (count($value) == 0) {
                                    $no_modules = true;
                                    echo "<h4><i>No modules are associated with this course. It is not possible to generate questions for a non-existent module. Please contact the lecturer!</i></h4>";
                                } else {
                                    $no_modules = false;
                                    ?>
                                    <select name="module" id="id_modules" class="form-control">
                                        <?php
                                        foreach ($value as $val) {
                                            echo "<option value=\"" . $val['idMODULE'] . "\">";
                                            echo $val['module_name'];
                                            echo "</option>";
                                        }
                                    }
                                    ?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default" id="cancel">Cancel</button>
                                <button type="submit" class="btn btn-primary<?php if ($no_modules) echo " disabled"; ?>">Start Exam</button>
                            </div>

                        </form>
                        <br/>
                        
                        
                    </center>
                </section>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
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

<title>View Course</title>
<style type="text/css">
    .user
    {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        float: left;
    }

</style>
<?php
//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
//include 'require/links.php';
//include 'require/functions.php';
//include 'require/connection.php';
include 'header.php';

if ((!isset($_GET['courseID']) || !isset($_GET['token'])) || (sha1($_GET['courseID']) != $_GET['token'])) {
    header("Location:index.php");
} else {
    $courseID = $_GET['courseID'];
}

//$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
//mysql_select_db('kdumooc');

$resultsOfCourse = getCourseDetails($courseID, $db);
//var_dump($resultsOfCourse);
$modulesOfCourse = getModuleDetails($courseID, $db);
$lecturerDetails = loadLecturerDetails($resultsOfCourse[0]['LECTURER_idLECTURER'], $db)
?>

<div class="container">
    <div class="col-lg-9">
        <h2><?php echo $resultsOfCourse[0]["title"] ?></h2>
        <br/>
        <h4>About the Course: </h4>
        <div style="display: block;text-align: justify">
            <p><?php echo $resultsOfCourse[0]["about"] ?></p>
            <br/>
            <h4>Course Modules: </h4>
            <?php
            if (count($modulesOfCourse) == 0) {
                echo "<p><i>This course does not have any associated modules.</i></p>";
            } else {
                echo "<ul type=\"circle\">";
                foreach ($modulesOfCourse as $module) {
                    echo "<li>" . $module["module_name"] . "</li>";
                }
                echo "</ul>";
            }
            ?>
        </div>
        <br/>
        <h4>Course at a Glance: </h4>
        <i class="fa fa-calendar"></i> Duration: <?php echo $resultsOfCourse[0]["duration"] . " weeks"; ?>
        <br/>
        <i class="glyphicon glyphicon-user"></i> Recommended no. of students: <?php echo $resultsOfCourse[0]["no_of_students"] ?>
        <br/><br/>
        <h4>Course Instructor (Lecturer): </h4>
        <?php
        if (doesImageExist(LECTURER_PROFILE_PIC_UPLOAD_URL . $resultsOfCourse[0]['LECTURER_idLECTURER'] . ".jpg")) {
            $img_url = "<img class = \"user\" width=\"75px\"  height=\"75px\" src=\"" . LECTURER_PROFILE_PIC_UPLOAD_URL . $resultsOfCourse[0]['LECTURER_idLECTURER'] . ".jpg\" />";
        } else {
            $img_url = "<img  class = \"user\" width=\"75px\"  height=\"75px\" src=\"" . LECTURER_PROFILE_PIC_UPLOAD_URL . "default.jpg\" />";
        }
        echo $img_url . "<br/>";
        echo "<p><b>&nbsp;&nbsp;&nbsp;" . $lecturerDetails[0]['first_name'] . " " . $lecturerDetails[0]['last_name'] . "</p></b>";
        echo "<p>&nbsp;&nbsp;&nbsp;<i class=\"fa fa-inbox\"></i> " . $lecturerDetails[0]['email'] . "</p>";
        ?>
    </div>

    <div class="col-lg-3">
        <?php
        if (doesImageExist(COURSE_PIC_UPLOAD_URL . $courseID . ".jpg")) {
            $img_url = "<img  width=\"100px\"  height=\"100px\" src=\"" . COURSE_PIC_UPLOAD_URL . $courseID . ".jpg\" />";
        } else {
            $img_url = "<img  width=\"100px\"  height=\"100px\" src=\"" . COURSE_PIC_UPLOAD_URL . "default.jpg\" />";
        }
        echo "<center>" . $img_url . "</center>";
        echo "</br><center>";

        if (sessionExists() && isStudent()) {
            echo "<a href=\"registerForCourse.php?studentID=" . $_SESSION['userID'] . "&token=" . sha1($_SESSION['userID']) . "&courseID=" . $courseID . "\" target=\"new\">";
            echo "<button type=\"button\" class=\"btn btn-success active\">Register For Course</button></a>";
        } else {
            echo "<a href=\"signInMain.php\" target=\"new\">";
            echo "<button type=\"button\" class=\"btn btn-success\">Sign In To Register For Course</button></a>";
        }
        echo "</br></center>";
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>

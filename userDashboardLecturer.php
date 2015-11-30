<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'header.php';

if (!sessionExists()) {
    header("Location:index.php");
} else {
    $student_details = loadStudentDetails($_SESSION['userID'], $db);
    $course_details_of_student = getCoursesOfStudent($_SESSION['userID'], $db);
}
?>

<title>User Dashboard</title>

<div class="container">
    <div class="col-lg-12">
        <center>
            <h2>Hi <?php echo $student_details[0]['first_name'] . "!"; ?></h2> </center>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Courses you are following:</h3>
            </div>
            <div class="panel-body">
                <?php
                if (count($course_details_of_student) == 0) {
                    echo $not_signed_up_for_courses;
                    echo "<a href=\"viewAllCourses.php\"><button type=\"button\" class=\"btn btn-primary\">Find a Course</button></a>";
                } else {
                    foreach ($course_details_of_student as $course) {
                        echo "<div class=\"well well-sm\">";
                        echo "<h4>" . $course['title'] . "</h4>";
                        echo "<a class=\"btn btn-primary btn-lg\" target=\"new\" href=\"courseDashboardStudent.php?courseID=" . $course['idCOURSE'] . "&token=" . sha1($course['idCOURSE']) . "\">Go to Course</a>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
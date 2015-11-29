<?php

/*
 * Registers a student for a particular course.
 */
include 'require/links.php';
include 'require/messages.php';
include 'require/functions.php';
include 'require/connection.php';

if ((!isset($_GET['courseID']) || !isset($_GET['token'])) || (sha1($_GET['studentID']) != $_GET['token'])) {
    header("Location:index.php");
} else {
    $courseID = $_GET['courseID'];
    $studentID = $_GET['studentID'];
}



if (count(isStudentRegisteredForCourse($studentID, $courseID, $db)) >= 1) {
    header("Location:index.php?error=" . $already_registered_for_course . "&token=" . sha1($already_registered_for_course));
}
else{
    registerStudentForCourse($studentID, $courseID, $db);
    header("Location:index.php?message=" . $course_registration_success . "&token=" . sha1($course_registration_success));
}
?>

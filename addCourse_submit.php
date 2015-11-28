<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
//var_dump($_POST);

if (!isset($_POST['courseTitle']) || !isset($_POST['category']) || !isset($_POST['duration'])) {
    header("Location:index.php");
} else {
    $courseTitle = $_POST['courseTitle'];
    $noOfStudents = $_POST['noOfStudents'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $lecturer = $_POST['lecturer'];
    $about = $_POST['about'];
    if (doesCourseExist($courseTitle, $conn) == true) {
        header("Location:addCourse.php?message=" . $error_course_exists . "&token=" . sha1($error_course_exists) . "");
    } else {
        $insert_into_course = "INSERT INTO `kdumooc`.`course` (`idCOURSE`, `no_of_students`, `category`, `duration`, `title`, `LECTURER_idLECTURER`, `deleted`, `about`) VALUES (NULL, '$noOfStudents', '$category', '$duration', '$courseTitle', '$lecturer', '0', '$about');";
        if ($conn->query($insert_into_course) === TRUE) {
            header("Location:index.php?message=" . $success_message_add_course . "&token=" . sha1($success_message_add_course) . "");
        } else {
            header("Location:addCourse.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
        }
    }
    $conn->close();
}
?>

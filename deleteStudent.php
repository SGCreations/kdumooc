<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
//var_dump($_POST);

if (!isset($_GET['studentID']) || !isset($_GET['nic'])) {

    header("Location:viewStudents.php?message=" . $no_authorization . "&token=" . sha1($no_authorization) . "");
    die();
}
$studentID = $_GET['studentID'];
$nic = $_GET['nic'];


if ($studentID != null && $nic != null) {
    $insert_into_user = "UPDATE `kdumooc`.`student` SET `deleted` = '1' WHERE `student`.`idSTUDENT` = $studentID  AND `student`.`nic` = '$nic';";
    if ($conn->query($insert_into_user) === TRUE) {
        header("Location:viewStudents.php?message=" . $student_deletion_success . "&token=" . sha1($student_deletion_success) . "");
    } else {
        header("Location:viewStudents.php?error=" . $conn->error . "&token=" . sha1($conn->error) . "");
    }
}
$conn->close();
?>




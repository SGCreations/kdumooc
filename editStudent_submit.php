<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
include 'uploadImage.php';
//var_dump($_POST);
//var_dump($_FILES);
//die();
if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['nic']) || !isset($_POST['gender'])) {
    header("Location:index.php");
    die();
}
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$registrationNo = $_POST['registrationNo'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$studentID = $_POST['studentID'];
if ($firstName != null) {
    $error = "Sorry, your file is too large.";
    uploadImageStudentProfileImage(null, $_FILES, "Location:editStudent.php?studentID=$studentID&error=" . $error . "&token=" . sha1($error) . "", $studentID);
    $insert_into_user = "UPDATE `kdumooc`.`student` SET `first_name` = '$firstName', `last_name` = '$lastName', `registration_no` = '$registrationNo', `dob` = '$dob', `nic` = '$nic' WHERE `student`.`idSTUDENT` = $studentID;";
    if ($conn->query($insert_into_user) === TRUE) {
        header("Location:index.php?message=" . $success_message_update_student . "&token=" . sha1($success_message_update_student) . "");
        die();
    } else {
        header("Location:index.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
        die();
    }
    $conn->close();
} else {
    header("Location:index.php");
}
?>

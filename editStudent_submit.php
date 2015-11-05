<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
//var_dump($_POST);
//die();
if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['email'])) {
    header("Location:index.php");
    die();
}
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$registrationNo = $_POST['registrationNo'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$studentID = $_POST['studentID'];
if ($firstName != null && $email != null) {
    if (doesUserExist(NULL, $email, $conn) == TRUE) {
        $error = "E-mail already exists in our database! If you are the user of $email and have forgotten your password go to \"Sign In\" and select \"Forgot Your Password\"...";
        //echo sha1($error);
        header("Location:editStudent.php?error=" . $error . "&token=" . sha1($error) . "");
        die();
    } elseif (doesNICExist($nic, $conn) == TRUE) {
        //echo sha1($error);
        header("Location:editStudent.php?error=" . $nic_duplicate_error . "&token=" . sha1($nic_duplicate_error) . "");
        die();
    } else {
        $insert_into_user = "UPDATE `kdumooc`.`student` SET `first_name` = '$firstName', `last_name` = '$lastName', `registration_no` = '$registrationNo', `dob` = '$dob', `nic` = '$nic', `email` = '$email', `username` = '$email' WHERE `student`.`idSTUDENT` = $studentID;";
        if ($conn->query($insert_into_user) === TRUE) {
            header("Location:index.php?message=" . $success_message_update_student . "&token=" . sha1($success_message_update_student) . "");
            die();
        } else {
            header("Location:index.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
            die();
        }
    }

    $conn->close();
} else {
    header("Location:index.php");
}
?>

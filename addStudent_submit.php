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
if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['email']) || !isset($_POST['pwd'])) {
    header("Location:index.php");
}
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$registrationNo = $_POST['registrationNo'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$retype_pwd = $_POST['pwd_confirm'];


if ($firstName != null && $email != null && ($password == $retype_pwd)) {
    if (doesUserExist(NULL, $email, $conn) == TRUE) {
        $error = "E-mail already exists in our database! If you are the user of $email and have forgotten your password go to \"Sign In\" and select \"Forgot Your Password\"...";
        //echo sha1($error);
        header("Location:addStudent.php?error=" . $error . "&token=" . sha1($error) . "");
    } elseif (doesNICExist($nic, $conn) == TRUE) {        
        //echo sha1($error);
        header("Location:addStudent.php?error=" . $nic_duplicate_error . "&token=" . sha1($nic_duplicate_error) . "");
    } else {
        $insert_into_user = "INSERT INTO `kdumooc`.`student` (`idSTUDENT`, `first_name`, `last_name`, `registration_no`, `dob`, `gender`, `nic`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES (NULL, '$firstName', '$lastName', '$registrationNo', '$dob', '$gender', '$nic', '$email', '$email', MD5('$password'), '0', '0', '0');";
        if ($conn->query($insert_into_user) === TRUE) {
            header("Location:index.php?message=" . $success_message_sign_up . "&token=" . sha1($success_message_sign_up) . "");
        } else {
            echo "Error: " . $insert_into_user . "<br>" . $conn->error;
        }
    }

    $conn->close();
} else {
    header("Location:index.php");
}
?>
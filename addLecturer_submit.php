<?php

/*
 * The submit page for Lecturer Sign Up. 
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
include 'sendMail.php';
//var_dump($_POST);

if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['email']) || !isset($_POST['pwd'])) {
    header("Location:index.php");
}
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$qualifications = $_POST['qualifications'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$retype_pwd = $_POST['pwd_confirm'];


if ($firstName != null && $email != null && ($password == $retype_pwd)) {
    if (doesUserExistLecturer(NULL, $email, $conn) == TRUE) {
        $error = "E-mail already exists in our database! If you are the user of $email and have forgotten your password go to \"Sign In\" and select \"Forgot Your Password\"...";
        echo sha1($error);
        header("Location:addLecturer.php?error=" . $error . "&token=" . sha1($error) . "");
    } else {
        $insert_into_user = "INSERT INTO `kdumooc`.`lecturer` (`idLECTURER`, `first_name`, `last_name`, `qualifications`, `nic`, `gender`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES (NULL, '$firstName', '$lastName', '$qualifications', '$nic', '$gender', '$email', '$email', MD5('$password'), '0','0','0')";
        if ($conn->query($insert_into_user) === TRUE) {
            $last_id = $conn->insert_id;
            $fullName = $firstName . " " . $lastName;
            $redirectURL = DOMAIN_URL . "activateLecturer.php?lecturerID=" . $last_id . "&token=" . sha1($last_id) . "&nic=" . $nic . "";
            if (sendWelcomeEmail($redirectURL, $email, $fullName, $firstName) == false) {
                header("Location:index.php?message=" . $error_sending_email . "&token=" . sha1($error_sending_email) . "");
                die();
            } else {
                header("Location:index.php?message=" . $success_message_sign_up . "&token=" . sha1($success_message_sign_up) . "");
            }
        } else {
            header("Location:index.php?error=" . $conn->error . "&token=" . sha1($conn->error) . "");
            //echo "Error: " . $insert_into_user . "<br>" . $conn->error;
        }
    }

    $conn->close();
} else {
    header("Location:index.php");
}
?>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';
if (!isset($_GET['studentID']) || (sha1($_GET['studentID']) != $_GET['token']) || !isset($_GET['nic'])) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $studentID = $_GET['studentID'];
    $nic = $_GET['nic'];
    $student_details = loadStudentDetails($studentID, $db);
    if (count($student_details) == 0) {
        header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
        die();
    } else {
        $activate_user = "UPDATE `kdumooc`.`student` SET `activated` = '1' WHERE `student`.`idSTUDENT` = $studentID AND `student`.`nic` = '$nic';";
        if ($conn->query($activate_user) === TRUE) {
            header("Location:login.php?message=" . $success_message_activate_student . "&token=" . sha1($success_message_activate_student) . "");
            die();
        } else {
            header("Location:index.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
            die();
        }
    }
}
?>


<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';
if (!isset($_GET['lecturerID']) || (sha1($_GET['lecturerID']) != $_GET['token']) || !isset($_GET['nic'])) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $lecturerID = $_GET['lecturerID'];
    $nic = $_GET['nic'];
    $lecturer_details = loadLecturerDetails($lecturerID, $db);
    if (count($lecturer_details) == 0) {
        header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
        die();
    } else {
        $activate_user = "UPDATE `kdumooc`.`lecturer` SET `activated` = '1' WHERE `lecturer`.`idLECTURER` = $lecturerID AND `lecturer`.`nic` = '$nic';";
        if ($conn->query($activate_user) === TRUE) {
            header("Location:index.php?message=" . $success_message_activate_lecturer . "&token=" . sha1($success_message_activate_lecturer) . "");
            die();
        } else {
            header("Location:index.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
            die();
        }
    }
}
?>


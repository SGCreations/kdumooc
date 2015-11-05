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
if (!isset($_POST['moduleTitle'])) {
    header("Location:index.php");
} else {
    $moduleTitle = $_POST['moduleTitle'];
    $course = $_POST['course'];    
    if (doesModuleExist($moduleTitle, $conn) == true) {
        header("Location:addModule.php?message=" . $error_course_exists . "&token=" . sha1($error_course_exists) . "");
    } else {
        $insert_into_module = "INSERT INTO `kdumooc`.`module` (`idMODULE`, `module_name`, `COURSE_idCOURSE`, `deleted`) VALUES (NULL, '$moduleTitle', '$course', '0');";
        if ($conn->query($insert_into_module) === TRUE) {
            header("Location:index.php?message=" . $success_message_add_module . "&token=" . sha1($success_message_add_module) . "");
        } else {
            header("Location:addModule.php?message=" . $conn->error . "&token=" . sha1($conn->error) . "");
        }
    }
    $conn->close();
}
?>




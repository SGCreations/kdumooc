<?php

/*
 * Responds to a POST request initiated from the Add Lecturer / Student module.
 */
include 'require/functions.php';


if (!isset($_POST['email'])) {
    die();
} else {
    $email = $_POST['email'];
    $type = $_POST['type'];
    if (doesEmailExist($email, $type, $conn) == true) {
        echo json_encode("true");
    } else {
        echo json_encode("false");
    }
}
?>

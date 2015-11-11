<?php

include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';

//var_dump($_POST);

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];

if ($username != "" && $password != "" && $type != "") {
    if (validateUser($username, $password, $type, $conn) == TRUE) {
        header("Location:index.php");
    } else {
        $error = "Invalid email and / or password!";
        $sha_error = sha1($error);
        header("Location:signInMain.php?error=" . $error . "&token=" . $sha_error);
    }

    $conn->close();
} else {
    header("Location:index.php");
}
?>

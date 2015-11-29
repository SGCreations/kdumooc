<?php

/*
 * This module signs out a logged in user.
 */

include 'require/links.php';
include 'require/messages.php';
include 'require/functions.php';
include 'require/connection.php';

clearSession();

header("Location:index.php?message=" . $sign_out_success . "&token=" . sha1($sign_out_success) . "");
?>

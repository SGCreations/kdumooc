<?php

/*
 * Starts the assignment.
 */
include 'require/functions.php';
include 'require/connection.php';
//var_dump($_POST);
if (!isStudent()) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $moduleID = $_POST['module'];
    $studentID = $_SESSION['userID'];
    $question_count = 5;
}
$assignmentID = initiateAssignment($studentID, $db);
if ($assignmentID != null) {
    header("Location:showQuestion.php?question_count=" . $question_count . "&studentID=" . $studentID . "&moduleID=" . $moduleID . "&level=3&cur_question_no=1&assignmentID=$assignmentID");
}
?>

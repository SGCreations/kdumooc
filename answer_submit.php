<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/messages.php';
include 'require/functions.php';
//var_dump($_POST);
//die();
if (!isset($_POST['question_count']) || !isset($_POST['moduleID']) || !isset($_POST['studentID']) || !isset($_POST['level']) || !isset($_POST['cur_question_no'])) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $question_count = $_POST['question_count'];
    $moduleID = $_POST['moduleID'];
    $studentID = $_POST['studentID'];
    $level = $_POST['level'];
    $cur_question_no = $_POST['cur_question_no'];
    $assignmentID = $_POST['assignmentID'];
    $answerID = $_POST['answer_selection'];
    $questionID = $_POST['questionID'];
    
    $validity = isCorrectAnswer($answerID, $db);   
    
    insertIntoAttempt($validity, $assignmentID, $questionID);
    
    $new_question_no = $cur_question_no + 1;
    
    header("Location:http://localhost:5020/getQuestion?validity=" . $validity .  "&cur_question_no=" . $new_question_no . "&level=" . $level . "&moduleID=" . $moduleID . "&studentID=" . $studentID . "&question_count=" . $question_count . "&assignmentID=" . $assignmentID);
}
?>

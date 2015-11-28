<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';
//var_dump($_POST);

$courseID = $_POST['courseID'];
$moduleID = $_POST['module'];
$question = addslashes($_POST['name_question']);
$answer_1 = addslashes($_POST['name_answer_1']);
$answer_2 = addslashes($_POST['name_answer_2']);
$answer_3 = addslashes($_POST['name_answer_3']);
$answer_4 = addslashes($_POST['name_answer_4']);
$level = $_POST['level'];
$correct_answer = $_POST['name_answer_selection'];
$answers = array($answer_1, $answer_2, $answer_3, $answer_4);
$array_level = explode(" ", $level);
$array_correct_answer = explode(" ", $correct_answer);
echo $array_correct_answer[1];
//die();
try {
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));
    echo "Connection Successful.";
} catch (Exception $e) {
    die("Unable to connect to database: " . $e->getMessage());
}
try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbh->beginTransaction();
    $dbh->exec("INSERT INTO `kdumooc`.`questionbank` (`idQUESTIONBANK`, `level`, `type`, `content`, `deleted`, `MODULE_idMODULE`) VALUES (NULL, '$array_level[1]', 'MCQ', '$question', '0', '$moduleID');");
    $last_id = $dbh->lastInsertId();
    for ($i = 1; $i <= 4; $i++) {
        //echo "<br/>";
        $temp = $i - 1;
        //echo "INSERT INTO `kdumooc`.`answer` (`idANSWER`, `answer`, `QUESTIONBANK_idQUESTIONBANK`, `deleted`, `correct_answer`) VALUES (NULL, '$answers[$temp]', '$last_id', '0', '" . getCorrectAnswer($i, $array_correct_answer[1]) . "');";
        //echo "<br/>";
        $dbh->exec("INSERT INTO `kdumooc`.`answer` (`idANSWER`, `answer`, `QUESTIONBANK_idQUESTIONBANK`, `deleted`, `correct_answer`) VALUES (NULL, '$answers[$temp]', '$last_id', '0', '" . getCorrectAnswer($i, $array_correct_answer[1]) . "');");
    }
    $dbh->commit();
    //echo "Success";
    header("Location:addQuestion.php?course_id=" . $courseID . "&message=" . $success_message_add_question . "&token=" . sha1($success_message_add_question) . "");
} catch (Exception $e) {
    $dbh->rollBack();
    header("Location:addQuestion.php?course_id=" . $courseID . "&error=" . $failure_message_add_question . "&token=" . sha1($failure_message_add_question) . "");
    //echo "Failed: " . $e->getMessage();
}
?>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'require/links.php';
//include 'require/functions.php';
//include 'require/connection.php';
include 'header.php';
//var_dump($_GET);
//die();
if (!isset($_GET['question_count']) || !isset($_GET['moduleID']) || !isset($_GET['studentID']) || !isset($_GET['level']) || !isset($_GET['cur_question_no'])) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $question_count = $_GET['question_count'];
    $moduleID = $_GET['moduleID'];
    $studentID = $_GET['studentID'];
    $level = $_GET['level'];
    $cur_question_no = $_GET['cur_question_no'];
    $assignmentID = $_GET['assignmentID'];
    
    $questionIDArray = getRandomQuestionFromModule($moduleID, $level, $db);
//    var_dump($questionIDArray);
    $questionID = $questionIDArray[0]['idQUESTIONBANK'];
    $answer_array = getAnswersByQuestionID($questionID, $db);
//    var_dump($answer_array);

    $moduleDetails = getModuleDetailsByID($moduleID, $db);
//    var_dump($moduleDetails);

    $questionContent = getQuestionContent($questionID, $db);
//    var_dump($questionContent);
}
?>

<title>Assessment</title>
<div class="container">

    <div class="col-lg-12 jumbotron">
        <form method="post" action="answer_submit.php"  class="form-horizontal" id="question-form">
            <div class="form-group">
                <h3>Question No.: <?php echo $cur_question_no; ?></h3>
            </div>
            <div class="form-group">
                <label for="id_modules"><b>Module: </b></label>
                <blockquote>
                    <p><?php echo $moduleDetails[0]['module_name'] ?></p> 
                    <small><?php echo "Level " . $questionIDArray[0]['level'] ?></small>
                </blockquote>                
            </div>
            <div class="form-group">
                <p id="id_question"><b><?php echo $questionContent[0]['content'] ?></b></p>
            </div>
            <?php
            $count = 1;
            foreach ($answer_array as $answer) {
                $temp_count = $count - 1;
                echo "<div class=\"form-group\">";
                echo "<input type=\"radio\" name=\"answer_selection\" id=\"answer_id_" . $answer['idANSWER'] . "\" value=\"" . $answer['idANSWER'] . "\"";
                if ($count == 1) {
                    echo " checked=\"checked\">";
                } else {
                    echo "\">";
                }
                echo "<label for=\"answer_id_" . $answer['idANSWER'] . "\" class=\"control-label\"> " . "&nbsp;" . $answer['answer'] . "</label>";
                echo "<br/></div>";
                $count++;
            }
            echoHiddenField("question_count", $question_count);
            echoHiddenField("moduleID", $moduleID);
            echoHiddenField("studentID", $studentID);
            echoHiddenField("level", $level);
            echoHiddenField("cur_question_no", $cur_question_no);
            echoHiddenField("assignmentID", $assignmentID);
            echoHiddenField("questionID", $questionID);
            ?>
            <div class="form-group">
                <button class="btn btn-default" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit Answer</button>
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>
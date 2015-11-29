local<?php
//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';

if (isset($_GET['error'])) {
    //The request / response is errorneous. Redirect to the home / back page.
    echo "Error: " . urldecode($_GET['error']);
} elseif (isset($_GET['question'])) {
    //There is no error, implies that all the relevant data are sent. 
    $question_no = $_GET['question_no'];
    $question = $_GET['question'];
    //$question_id = $_GET['question_id'];
    if (isset($_GET['type'])) {
        //Type of questions with checkboxes
        $type = true;
    } else {
        //Get default type of radio boxes
        $type = false;
    }
    if (isset($_GET['checkboxes'])) {
        //Type of questions with checkboxes
        $checkboxes = true;
    } else {
        //Get default type of radio boxes
        $checkboxes = false;
    }
    if (isset($_GET['answer_count'])) {
        //Type of questions with checkboxes
        $no_of_answers = $_GET['answer_count'];
        //createAnswerArray($no_of_answers);
    } else {
        //Get default type of radio boxes
        $no_of_answers = 4;
    }
    //echo $_GET['question'];
    //echo urldecode($_GET['question']);
    //echo "Question is: " . urldecode($_GET['question']);
}
?>
<div class="container">
    <?php ?>
    <div class="jumbotron container-fluid">
        <form method="POST" class="form-horizontal">
            <h2>Question <?php echo $question_no; ?></h2>
            <br/>
            <p><?php echo $question; ?></p>
            <?php
            if ($type == "MCQ") {
                if ($no_of_answers != 0) {
                    //Getting the answers from database.
                    /* $sql = "SELECT * FROM `answer` where QUESTIONBANK_idQUESTIONBANK=$question_id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                      echo "<div class=\"col-lg-12 col-lg-offset-0\">";
                      echo "<div class=\"radio\">";
                      echo "<input type=\"radio\" name=\"answer\" value=\"" . $row['answer'] . "\" />" . $row['answer'] . "</div></div><br>";
                      }
                      } else {
                      echo "0 results";
                      }
                      $conn->close(); */
                    for ($i = 1; $i <= $no_of_answers; $i++) {
                        $answer_array = array($_GET['a1'],$_GET['a2'],$_GET['a3'],$_GET['a4']);
                        echo "<div class=\"col-lg-12 col-lg-offset-0\">";
                        echo "<div class=\"radio\">";
                        echo "<input type=\"radio\" name=\"answer\" value=\"" . $answer_array[$i-1] . "\" />" . $answer_array[$i-1] . "</div></div><br>";
                    }
                }
            }
            ?>
            <div class="col-lg-12 col-lg-offset-0" align="right">            
                <br/>
                <button class="btn btn-default">Cancel</button>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>
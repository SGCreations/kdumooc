<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//Module to add a question to the question bank
//Include header

include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#cancel").click(function(event) {
            event.preventDefault();
        });
    });
</script>
<div class="container">
    <div class="col-lg-12">
        <form method="post" action="question_submit.php">
            <h3>Add Question - MCQ</h3>
            <?php
            if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {
                echo "<center><div>";
                echo "Invalid username and / or password. Please re-enter.";
                echo "</div></center><br/>";
                ?>
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                </div>
                <div class="alert alert-dismissable alert-warning">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <h4>Warning!</h4>
                    <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                </div>
                <?php
            }
            ?>

            <label for="id_modules">Choose Module: </label>
            <select name="modules" id="id_modules">
                <!--                <option selected="selected">Choose Module: </option>-->
                <?php foreach ($names as $name) { ?>
                    <option value="<?= $name['name'] ?>"><?= $name['name'] ?></option>
                <?php }
                ?>
            </select> 

            <div class="form-group">
                <label for="id_question" class="control-label">Question: </label>
                <input type="text" class="form-control input-lg" id="id_question" name="name_question">
            </div>
            <div class="form-group">

                <label for="answer_1" class="control-label">Answer 1: </label>
                <input type="text" class="form-control" id="answer_1" name="name_answer_1">
            </div>
            <div class="form-group">

                <label for="answer_2" class="control-label">Answer 2:</label>
                <input type="text" class="form-control" id="answer_2" name="name_answer_2">
            </div>
            <div class="form-group">

                <label for="answer_3" class="control-label">Answer 3:</label>
                <input type="text" class="form-control" id="answer_3" name="name_answer_3">
            </div>
            <div class="form-group">

                <label for="answer_4" class="control-label">Answer 4:</label>
                <input type="text" class="form-control" id="answer_4" name="name_answer_4">
            </div>
            <div class="form-group">
                <p>Choose the correct answer:</p>

                <input type="radio" name="name_answer_selection" id="answer_selection_1" value="Answer 1">
                <label for="answer_selection_1" class="control-label">Answer 1</label>
                <br/>
                <input type="radio" name="name_answer_selection" id="answer_selection_2" value="Answer 2">
                <label for="answer_selection_2" class="control-label">Answer 2</label>
                <br/>
                <input type="radio" name="name_answer_selection" id="answer_selection_3" value="Answer 3">
                <label for="answer_selection_3" class="control-label">Answer 3</label>
                <br/>
                <input type="radio" name="name_answer_selection" id="answer_selection_4" value="Answer 4">
                <label for="answer_selection_4" class="control-label">Answer 4</label>
            </div>
            <div class="form-group">
                <button class="btn btn-default" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Question</button>
            </div>
        </form>


    </div>


</div>


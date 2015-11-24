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

if (!isset($_GET['course_id'])) {
    header("Location:index.php");
    
    die();
} else {
    $courseID = $_GET['course_id'];
}
?>
<script type="text/javascript">
    (function($, W, D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
                {
                    setupFormValidation: function()
                    {
                        //form validation rules
                        $("#question-form").validate({
                            rules: {
                                name_question: "required",
                                name_answer_1: "required",
                                name_answer_2: "required",
                                name_answer_3: "required",
                                name_answer_4: "required",
                            },
                            messages: {
                                name_question: "This field is mandatory.",
                                name_answer_1: "This field is mandatory.",
                                name_answer_2: "This field is mandatory.",
                                name_answer_3: "This field is mandatory.",
                                name_answer_4: "This field is mandatory.",
                            },
                            submitHandler: function(form) {
                                form.submit();
                            }
                        });
                    }
                }

        //when the dom has loaded setup form validation rules
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#cancel").click(function(event) {
            event.preventDefault();
        });
    });
</script>
<div class="container">
    <div class="col-lg-12">
        <?php
        if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {
            ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Error!</h4>
                <p><?php echo $_GET['error']; ?></p>
            </div>
            <?php
        }
        if (isset($_GET['message']) && ($_GET['token'] == sha1($_GET['message']))) {
            ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-info"></i> Message</h4>
                <?php echo $_GET['message'];  ?>
              </div>
        <?php } ?>
        <form method="post" action="addQuestion_submit.php"  class="form-horizontal" id="question-form">

            <h3>Add Question - MCQ</h3>

            <div class="form-group">
                <label for="id_modules">Choose Module: </label>
                <select name="module" id="id_modules" class="form-control">
                    <?php
                    $value = getModuleDetails($courseID, $db);
                    foreach ($value as $val) {
                        echo "<option value=\"" . $val['idMODULE'] . "\">";
                        echo $val['module_name'];
                        echo "</option>";
                    }
                    ?>
                </select> 
            </div>
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

                <label for="id_level" class="control-label">Select Level:</label>
                <select name="level" id="id_level" class="form-control">
                    <option value="Level 1">Level 1</option>
                    <option value="Level 2">Level 2</option>
                    <option value="Level 3">Level 3</option>
                    <option value="Level 4">Level 4</option>
                    <option value="Level 5">Level 5</option>
                </select>
            </div>
            <div class="form-group">
                <p>Choose the correct answer:</p>

                <input type="radio" name="name_answer_selection" id="answer_selection_1" value="Answer 1" checked="checked">
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
            <?php echoHiddenField("courseID", $courseID);  ?>
        </form>


    </div>


</div>


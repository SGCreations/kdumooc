<?php
//Sidath 
//23 Sep 2015
//addQuestionBank.php

include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';
?>

<html lang="en">
    <head>
        <title>KDUMOOC</title>
        <script type="text/javascript">
            (function($, W, D)
            {
                var JQUERY4U = {};

                JQUERY4U.UTIL =
                        {
                            setupFormValidation: function()
                            {
                                //form validation rules
                                $("#register-form").validate({
                                    rules: {
                                        questionbankTitle: "required",
                                        category: "required",
                                        lecturer: {
                                            required: true,
                                        },
                                        duration: {
                                            required: true,
                                            minlength: 1,
                                            maxlength: 2,
                                            min: 1,
                                            max: 99,
                                        },
                                        noOfStudents: {
                                            pattern: "[0-9]+",
                                        }
                                    },
                                    messages: {
                                        questionbankTitle: "This field is mandatory.",
                                        category: "This field is mandatory. Enter a suitable category of the QuestionBank, for e.g.: Mathematics, Science etc.",
                                        duration: {
                                            required: "This field is mandatory and should be a numerical value between 1 and 99.",
                                            minlength: "This must be a value between 1 and 99.",
                                            maxlength: "This must be a value between 1 and 99.",
                                        },
                                        lecturer: {
                                            required: "This field is mandatory.",
                                        },
                                        noOfStudents: {
                                            pattern: "Please enter a valid numerical value, else keep it blank.",
                                        }
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
    </head>
    <body>
        <div class="container">
            <center>
                <h3>Add a QuestionBank:</h3></center>
            <br>
            <center>
                <?php
                if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {

                    //echo "The e-mail you entered already exists in our system. Please use \"Forgot your password\" to reset your password, or else enter another e-mail address!";
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
                    <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <h4>Error!</h4>
                        <p><?php echo $_GET['message']; ?></p>
                    </div>
                <?php } ?>
                <form class="form-horizontal" id="register-form" action='addQuestionBank_submit.php' method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idQuestionBankTitle" >Question Bank Title:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idQuestionBankTitle" placeholder="Enter the QuestionBank Title" name="questionbankTitle">
                            </div>
                        </div>  

                       <div class="form-group">
                            <label class="control-label col-sm-4" for="idCourse" >Select a Course:</label>
                            <div class="col-sm-6">
                                <select  class="form-control" id="idLecturer" name="course">
                                    <?php
                                    $value = getActiveCourses($db);
                                    foreach ($value as $val) {
                                        echo "<option value=\"" . $val['idCOURSE'] . "\">";
                                        echo $val['title'];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 

                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="submit btn btn-default">Add QuestionBank</button>
                            </div>
                        </div>
                    </div>
                </form>
                <footer class="footer">                    
                    <p >&copy; KDUMOOC - 2015</p>
                </footer>
        </div>


    </center>
</div>

</body>
</html>




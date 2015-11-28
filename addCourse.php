<?php
//Sidath 
//23 Sep 2015
//addCourse.php
//include 'require/links.php';
//include 'require/functions.php';
//include 'require/messages.php';
include 'header.php';
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
                                        courseTitle: "required",
                                        category: "required",
                                        about:"required",
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
                                        about: "This field is mandatory.",
                                        courseTitle: "This field is mandatory.",
                                        category: "This field is mandatory. Enter a suitable category of the Course, for e.g.: Mathematics, Science etc.",
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
                <h3>Add a Course:</h3></center>
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
                <form class="form-horizontal" id="register-form" action='addCourse_submit.php' method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idCourseTitle" >Course Title:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idCourseTitle" placeholder="Enter the Course Title" name="courseTitle">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idNoOfStudents" >Number of Students:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idNoOfStudents" placeholder="Enter No. of Students" name="noOfStudents">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idCategory" >Category:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idCategory" name="category" placeholder="Enter Category"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idDuration" >Duration:</label>
                            <div class="col-sm-6">
                                <input type="number"  min="1" max="99" maxlength="2"  class="form-control" id="idDuration" placeholder="Enter the Duration of the Course (No. of Months)" name="duration">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idAbout" >Description:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="idAbout" rows="15" name="about" placeholder="Enter a Complete Description of the Course"></textarea>
                            </div>
                        </div> 


                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idLecturer" >Select a Lecturer:</label>
                            <div class="col-sm-6">
                                <select  class="form-control" id="idLecturer" name="lecturer">
                                    <?php
                                    $value = getVerifiedLecturers($db);
                                    foreach ($value as $val) {
                                        echo "<option value=\"" . $val['idLecturer'] . "\">";
                                        echo $val['first_name'] . " " . $val['last_name'];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 

                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="submit btn btn-default">Add Course</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--                <footer class="footer">                    
                                    <p >&copy; KDUMOOC - 2015</p>
                                </footer>-->
        </div>


    </center>
</div>
<?php include 'footer.php'; ?>
</body>
</html>




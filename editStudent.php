<?php
//Sidath 
//23 Sep 2015
//addStudent.php
include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';
if (!isset($_GET['studentID'])) {
    header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
    die();
} else {
    $studentID = $_GET['studentID'];
    $student_details = loadStudentDetails($studentID, $db);
    if (count($student_details) == 0) {
        header("Location:index.php?message=" . $invalid_request . "&token=" . sha1($invalid_request) . "");
        die();
    }
}
include 'headerGeneral.php';
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
                                        firstName: "required",
                                        lastName: "required",
                                        dob: "required",
                                        nic: {
                                            required: true,
                                            minlength: 10,
                                            maxlength: 10,
                                            pattern: "[0-9]{9}[a-zA-Z]",
                                        },
                                    },
                                    messages: {
                                        firstName: "This field is mandatory.",
                                        lastName: "This field is mandatory.",
                                        nic: "Please provide a valid Sri Lankan NIC No.",
                                        username: "Please enter a username.",
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
                <h3>Edit Student Details:</h3></center>
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
                    echo "<div>";
                    echo $_GET['message'];
                    echo "</div>";
                }
                ?>
                <form class="form-horizontal" enctype="multipart/form-data" id="register-form" novalidate="novalidate" action='editStudent_submit.php' method="post"> 
                    <div class="col-lg-12">
                        <input type="hidden" value="<?php echo $student_details[0]['idSTUDENT'] ?>" name="studentID"/>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="fileToUpload" >Upload Profile Image:</label>
                            <div class="col-sm-6">
                                <input class="form-control"  type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idFirstName" >First Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idFirstName" placeholder="Enter Your First Name" name="firstName" value="<?php echo $student_details[0]['first_name'] ?>">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idLastName" >Last Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idLastName" placeholder="Enter Your Last Name" name="lastName" value="<?php echo $student_details[0]['last_name'] ?>">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idRegistrationNo" >Registration No.:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idQualifications" name="registrationNo" placeholder="Enter Your Registration No. (If one has been provided)" value="<?php echo $student_details[0]['registration_no'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idNIC" >NIC No.:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idNIC" placeholder="Enter Your National Identity Card Number" name="nic" value="<?php echo $student_details[0]['nic'] ?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idDoB" >Date of Birth:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="idDoB" placeholder="Enter Your Date of Birth" name="dob" value="<?php echo $student_details[0]['dob'] ?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idGender" >Gender:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="idGender" name="gender" >
                                    <option id="idMale" <?php
                if ($student_details[0]['gender'] == 'Male') {
                    echo "selected=\"selected\"";
                }
                ?>>Male</option>
                                    <option id="idFemale" <?php
                                    if ($student_details[0]['gender'] == 'Female') {
                                        echo "selected=\"selected\"";
                                    }
                ?>>Female</option>

                                </select>
                            </div>
                        </div> 

                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="submit btn btn-primary">Update Student Details</button>
                            </div>
                        </div>


                    </div>
                </form>
            </center>  
        </div>
        <?php include 'footerGeneral.php'; ?>
    </body>
</html>




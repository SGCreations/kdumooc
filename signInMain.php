<?php
//Sidath
//23 Sep 2015

//include 'require/links.php';
//include 'require/functions.php';
//include 'require/connection.php';
include 'header.php'; 
?>
<!DOCTYPE html>
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
                                $("#login-form-lecturer").validate({
                                    rules: {
                                        password: {
                                            required: true,
                                            minlength: 5
                                        },
                                        username: "required",
                                    },
                                    messages: {
                                        Name: "Please enter your name",
                                        username: "Please enter a username",
                                        password: {
                                            required: "Please provide a password",
                                            minlength: "Your password must be at least 5 characters long"
                                        },
                                    },
                                    submitHandler: function(form) {
                                        form.submit();
                                    }
                                });

                                $("#login-form-student").validate({
                                    rules: {
                                        password: {
                                            required: true,
                                            minlength: 5
                                        },
                                        username: "required",
                                    },
                                    messages: {
                                        Name: "Please enter your name",
                                        username: "Please enter a username",
                                        password: {
                                            required: "Please provide a password",
                                            minlength: "Your password must be at least 5 characters long"
                                        },
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
        <style type="text/css">
            .text-strikethru .line {
                height: 1px;
                background-color: #d9d9de;
                width: 90%;
                margin-left: 5%;
            }

            .text-strikethru .text {
                display: inline-block;
                background-color: white;
                padding: 5px 10px;
                font-size: 14px;
                top: -16px;
                position: relative;
                color: #828587;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <center><h3>Login to KDUMOOC</h3></center>
            <br>
            <?php
            if (isset($_GET['error']) && ($_GET['token'] == sha1($_GET['error']))) {
                echo "<center><div>";
                echo "Invalid username and / or password. Please re-enter.";
                echo "</div></center><br/>";
            }
            ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <center>
                        <fieldset>
                            <legend>Sign in as a:</legend>                        
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#idModalLecturer">Lecturer</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#idModalStudent">Student</button>              
                        </fieldset>
                    </center>
                </div>
                
                <!-- Modal Lecturer-->
                <div id="idModalLecturer" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Log in as a Lecturer</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" action="signin_submit.php" method="post" id="login-form-lecturer">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="username">Username:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name ="username" placeholder="Enter E-mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="password">Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Password">
                                            <div style="float:right;">
                                                <i class="fa fa-lock"></i>
                                                <a href="forget_password.php"> Forgot password? </a>
                                            </div>
                                        </div>

                                    </div>
                                    <center>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Log In</button>

                                            </div>
                                        </div>
                                        <input type="text" style="display:none" value="L" name="type"/>
                                    </center>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal Student-->
                <div id="idModalStudent" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Log in as a Student</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" action="signin_submit.php" method="post" id="login-form-student">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="username">Username:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name ="username" placeholder="Enter E-mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="password">Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Password">
                                            <div style="float:right;">
                                                <i class="fa fa-lock"></i>
                                                <a href="forget_password.php"> Forgot password? </a>
                                            </div>
                                        </div>

                                    </div>
                                    <center>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Log In</button>

                                            </div>
                                        </div>
                                        <input type="text" style="display:none" value="S" name="type"/>
                                    </center>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php include 'footer.php'; ?>
    </body>
    
</html>

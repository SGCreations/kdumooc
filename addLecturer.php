<?php
//Sidath 
//23 Sep 2015
//addLecturer.php

include 'require/links.php';
include 'require/functions.php';
include 'require/messages.php';
include 'sendMail.php';
?>

<html lang="en">
    <head>
        <title>KDUMOOC</title>
        <script type="text/javascript">
            $(document).ready(function() {
                //onSelect event
                $('#idEmail').keyup(function() {
                    //get selected value (selectedVal)
                    var selectedVal = $('#idEmail').val();
                    //Ajax
                    $.ajax({
                        type: 'POST',
                        url: 'doesEmailExist.php',
                        data: {email: selectedVal, type: "L"},
                        cache: false,
                        success: function(data) {
                            //Json array convert to JSON dataset
                            var finalData = $.parseJSON(data);
                            //Get json array keys
                            var finalarray = Object.keys(finalData);
                            var stringReturn = JSON.stringify(finalData);
                            //alert(stringReturn);
                            if (stringReturn == "\"true\"") {
                                $('#idEmailMessage').html("<i style=\"visibility: hidden\" id=\"idfacheck\" class=\"fa fa-times\"></i>&nbsp;Username unavailable!").css({"visibility": "visible"});
                                $('#idfacheck').css({"color": "red", }).attr("class", "fa fa-times").css({"visibility": "visible"});
                            } else {
                                $('#idEmailMessage').html("<i style=\"visibility: hidden\" id=\"idfacheck\" class=\"fa fa-times\"></i>&nbsp;Username available!").css({"visibility": "visible"});
                                $('#idfacheck').css({"color": "green", }).attr("class", "fa fa-check").css({"visibility": "visible"});
                            }
                        },
                    });
                });
            });
        </script>
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
                                        nic: {
                                            required: true,
                                            minlength: 10,
                                            maxlength: 10,
                                            pattern: "[0-9]{9}[a-zA-Z]",
                                        },
                                        email: {
                                            required: true,
                                            email: true
                                        },
                                        pwd: {
                                            required: true,
                                            minlength: 5
                                        },
                                        username: "required",
                                        pwd_confirm: {
                                            required: true,
                                            equalTo: "#pwd",
                                            minlength: 5
                                        },
                                    },
                                    messages: {
                                        firstName: "This field is mandatory.",
                                        lastName: "This field is mandatory.",
                                        nic: "Please provide a valid Sri Lankan NIC No.",
                                        username: "Please enter a username.",
                                        password: {
                                            required: "Please provide a password.",
                                            minlength: "Your password must be at least 5 characters long."
                                        },
                                        pwd_confirm: {
                                            required: "Please re-type the password!",
                                            equalTo: "Your passwords do not match! Please re-check."
                                        },
                                        email: "Please enter a valid email address!",
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
            /*$("#register-form").submit(function(e) {
             var emailEntered = $("#idEmailMessage").val();
             alert(emailEntered);
             if (emailEntered == "Email exists") {
             e.preventDefault();
             }
             });      */
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
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1469256366717446";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="container">
            <!--            <div class="header">
                            <nav>
                                <ul class="nav nav-pills pull-right">
                                    <li role="presentation"><a href="/">Home</a></li>
                                    <li role="presentation"><a href="/showSignIn">Sign In</a></li>
                                    <li role="presentation" class="active"><a href="/showSignUp">Sign Up</a></li>
                                </ul>
                            </nav>
                            <h3 class="text-muted">KDUMOOC</h3>
                        </div>-->
            <center>
                <h3>Sign up for KDUMOOC as a Lecturer:</h3></center>
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
                <form class="form-horizontal" id="register-form" novalidate="novalidate" action='addLecturer_submit.php' method="post">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idFirstName" >First Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idFirstName" placeholder="Enter Your First Name" name="firstName">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idLastName" >Last Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idLastName" placeholder="Enter Your Last Name" name="lastName">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idQualifications" >Qualifications:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="3" id="idQualifications" name="qualifications" placeholder="Enter Your Qualifications"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idNIC" >NIC No.:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idNIC" placeholder="Enter Your National Identity Card Number" name="nic">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idGender" >Gender:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="idGender" name="gender">
                                    <option id="idMale" >Male</option>
                                    <option id="idFemale">Female</option>

                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idEmail">E-mail (This will function as your username):</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="idEmail" placeholder="Enter E-mail" name="email">
                            </div>
                            <div class="col-sm-2"> 
                                <p style="visibility: hidden" id="idEmailMessage">E-mail exists!
                                    <i style="visibility: hidden" id="idfacheck" class="fa fa-times"></i></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Password:</label>

                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Confirm Password:</label>

                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="pwd_confirm" placeholder="Confirm Password" name="pwd_confirm">
                            </div>                        
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="submit btn btn-default">Sign Up Now</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-strikethru">
                                    <div class="line"></div>
                                    <div class="text">or</div>
                                </div>
                                <a href="fbconfig.php"> <button type="button" class="btn btn-primary" ><i class="fa fa-facebook"></i>&nbsp;&nbsp; Sign up with Facebook</button></a>&nbsp;&nbsp; <a href="twitterconfig.php"> <button type="button" class="btn btn-info" ><i class="fa fa-twitter"></i>&nbsp;&nbsp; Sign up with Twitter</button></a>&nbsp;&nbsp;<a href="googleconfig.php"> <button type="button" class="btn btn-danger" ><i class="fa fa-google-plus"></i>&nbsp;&nbsp; Sign up with Google+</button></a>                       
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




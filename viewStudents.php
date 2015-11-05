<?php
//Sidath 
//23 Sep 2015
//addStudent.php

include 'require/linksNew.php';
include 'require/functions.php';
include 'require/messages.php';
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
                                    },
                                    messages: {
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

            $(document).ready(function() {
                $('#idTableAllStudents').DataTable();
                $('#idTableActiveStudents').DataTable();
            });
        </script>

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
            }(document, 'script', 'facebook-jssdk'));
        </script>

    <center>
        <h3>View All Students:</h3></center>
    <br>

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
        <center>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Message</h4>
                <p><?php echo $_GET['message']; ?></p>
            </div>
        </center>
        <?php
    }
    ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">All</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Active</a></li>                 
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <p style="text-align: center" ><b>All students registered in KDUMOOC:</b></p>

                <table id="idTableAllStudents" class="table table-bordered table-striped dataTable" role="grid">
                    <thead>
                        <tr role="row">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Registration No.</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>N.I.C. No.</th>
                            <th>E-Mail</th>
                            <th>Active</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $allStudents = getAllStudents($db);
                        foreach ($allStudents as $student) {
                            echo "<tr>";
                            echo "<td>" . $student['first_name'] . "</td>";
                            echo "<td>" . $student['last_name'] . "</td>";
                            echo "<td>" . $student['registration_no'] . "</td>";
                            echo "<td>" . $student['gender'] . "</td>";
                            echo "<td>" . $student['dob'] . "</td>";
                            echo "<td>" . $student['nic'] . "</td>";
                            echo "<td>" . $student['email'] . "</td>";
                            $active = "Yes";
                            if ($student['activated'] == 0) {
                                $active = "No";
                            }
                            $verified = "Yes";
                            if ($student['verified'] == 0) {
                                $verified = "No";
                            }
                            echo "<td>" . $active . "</td>";
                            echo "<td>" . $verified . "</td>";
                            //echo "<td>" . "<button type=\"button\" onclick=\"location.href='editStudent.php?studentID=" . $student['idSTUDENT'] . "' \">Edit</button>" . "</td>";
                            echo "<td style=\"text-align:center;\">" . "<button class=\"btn btn-warning\" type=\"button\" onclick=\"window.open('editStudent.php?studentID=" . $student['idSTUDENT'] . "','_blank');\"><i class=\"fa fa-pencil-square-o\"></i>  Edit</button> &nbsp; <button class=\"btn btn-danger\" type=\"button\" onclick=\"window.open('deleteStudent.php?studentID=" . $student['idSTUDENT'] . "&nic=" . $student['nic'] . "','_blank');\"><i class=\"fa fa-trash-o\"></i>  Delete</button>" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                     <p style="text-align: center" ><b>All active students in KDUMOOC:</b></p>

                <table id="idTableActiveStudents" class="table table-bordered table-striped dataTable" role="grid">
                    <thead>
                        <tr role="row">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Registration No.</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>N.I.C. No.</th>
                            <th>E-Mail</th>
                            <th>Active</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $activeStudents = getActiveStudents($db);
                        foreach ($activeStudents as $student) {
                            echo "<tr>";
                            echo "<td>" . $student['first_name'] . "</td>";
                            echo "<td>" . $student['last_name'] . "</td>";
                            echo "<td>" . $student['registration_no'] . "</td>";
                            echo "<td>" . $student['gender'] . "</td>";
                            echo "<td>" . $student['dob'] . "</td>";
                            echo "<td>" . $student['nic'] . "</td>";
                            echo "<td>" . $student['email'] . "</td>";
                            $active = "Yes";
                            if ($student['activated'] == 0) {
                                $active = "No";
                            }
                            $verified = "Yes";
                            if ($student['verified'] == 0) {
                                $verified = "No";
                            }
                            echo "<td>" . $active . "</td>";
                            echo "<td>" . $verified . "</td>";
                            //echo "<td>" . "<button type=\"button\" onclick=\"location.href='editStudent.php?studentID=" . $student['idSTUDENT'] . "' \">Edit</button>" . "</td>";
                            echo "<td style=\"text-align:center;\">" . "<button class=\"btn btn-warning\" type=\"button\" onclick=\"window.open('editStudent.php?studentID=" . $student['idSTUDENT'] . "','_blank');\"><i class=\"fa fa-pencil-square-o\"></i>  Edit</button> &nbsp; <button class=\"btn btn-danger\" type=\"button\" onclick=\"window.open('deleteStudent.php?studentID=" . $student['idSTUDENT'] . "&nic=" . $student['nic'] . "','_blank');\"><i class=\"fa fa-trash-o\"></i>  Delete</button>" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.tab-content -->
    </div>

</div>
<footer class="footer">                    
    <p >&copy; KDUMOOC - 2015</p>
</footer>
<?php include 'footerGeneral.php'; ?>
</body>
</html>




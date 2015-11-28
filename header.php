<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/links.php';
include 'require/messages.php';
include 'require/functions.php';
include 'require/connection.php';
?>
<!DOCTYPE html>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="/kdumooc/images/templatemo_logo.png" width="150px" height="30px"/></a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#courses">Courses</a></li>                   
            </ul>

            <?php
            if (sessionExists()) {
                ?>  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo " " . getSessionVariables("username") ?> </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span><?php
                            echo " You are logged in as a ";
                            if (getSessionVariables("type") == "L") {
                                echo "Lecturer";
                            } else {
                                echo "Student";
                            }
                            ?> </a></li>
                </ul> <?php } else {
                            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="/kdumooc/signInMain.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                <?php
            }
            ?> 

        </div>
    </div>
</nav>

<?php
//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';
?>
<html>
    <!--
     *Yashmika Kuruppu
     * 09/15/2015
    -->
    <head>
    </head>

    <body>
        <div class="container">
       <p> I want to view details of </p>
       <a href="viewLect.php" target="blank">  <input type="button" id="lecturer" value="Lecturer" name="lecturer"></a>
       <a href="viewStu.php" target="blank"> <input type="button" id="student" value="Student" name="student"> </a>
       <a href="viewCourse.php" target="blank"> <input type="button" id="course" value="Courses" name="course"> </a>
        </div>
    </body>
</html>
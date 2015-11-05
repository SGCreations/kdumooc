<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';

$courseTitle = "Discrete Mathematics 2";

var_dump(doesCourseExist($courseTitle, $conn));

var_dump(doesUserExist('neranjake@gmail.com', 'neranjake@gmail.com', $conn));

var_dump(getAllStudents($db));
var_dump(loadStudentDetails(1, $db));
$val = loadStudentDetails(1, $db);
echo $val[0]['first_name'];
echo count(loadStudentDetails(1, $db));
?>

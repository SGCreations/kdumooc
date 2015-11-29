<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';
include 'require/messages.php';

$courseTitle = "Discrete Mathematics 2";

//var_dump(doesCourseExist($courseTitle, $conn));
//
//var_dump(doesUserExist('neranjake@gmail.com', 'neranjake@gmail.com', $conn));
//
//var_dump(getAllStudents($db));
//var_dump(loadStudentDetails(1, $db));
//$val = loadStudentDetails(1, $db);
//echo $val[0]['first_name'];
//echo count(loadStudentDetails(1, $db));
//echo "<h1>" . doesEmailExist('sinhalokaya@gmail.com',$conn) . "</h1>";
//session_start();
//echo $_SESSION["username"] . " " . $_SESSION["userID"] . " " . $_SESSION["type"];
//clearSession();

echo date("Y-m-d H:i:s");  
?>
<br/>
<div class="container">
<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <h4>Error!</h4>
    <p><?php echo "Your username and / or password is wrong. Please re-check!" ?></p>
</div>
</div>
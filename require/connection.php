<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "kdumooc";
// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$db_selected = mysqli_select_db($conn, 'kdumooc');
if (!$db_selected) {
    die ('Can\'t use kdumooc : ' . mysql_error());
}

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=kdumooc;host=127.0.0.1';
$user = 'root';
//$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    //echo "connected";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>

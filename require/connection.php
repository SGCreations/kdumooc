<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'config.php';

//$servername = "localhost";
//$username = "root";
//$password = "";
//$db_name = "kdumooc";
// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$db_selected = mysqli_select_db($conn, DB_NAME);
if (!$db_selected) {
    die('Can\'t use kdumooc : ' . mysql_error());
}

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
//echo $dsn;
$user = DB_USER;
$password = DB_PASSWORD;

try {
    $db = new PDO($dsn, $user, $password);
    //echo "connected";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

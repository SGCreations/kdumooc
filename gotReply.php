<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kdumooc');

$reply=$_POST['reply'];

$query = "INSERT INTO forumanswer VALUES () "; //values must filled
$result = mysql_query($query);
?>
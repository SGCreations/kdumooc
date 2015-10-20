<title>View Course</title>
<?php

//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';

//$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
//mysql_select_db('kdumooc');

$query = "SELECT no_of_students,category,duration,title FROM course"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);
echo "<div class=\"container\">";

echo "<table border=1 class=\"col-lg-12\">
		<tr>
		<th>Number of Students</th>
		<th>Category</th>
		<th>Duration</th>
		<th>Title</th>"; // start a table tag in the HTML

while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
    echo "<tr><td>" . $row['no_of_students'] . "</td>
				<td>" . $row['category'] . "</td><td>" . $row['duration'] . "</td>
				<td>" . $row['title'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($conn); //Make sure to close out the database connection
?>
<title>View Lecturer Details</title>
<?php

//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';

//$conn = mysqli_connect('localhost', 'root', ''); //The Blank string is the password
//mysqli_select_db($conn,'kdumooc');

$query = "SELECT first_name,last_name,qualifications,nic,gender,email FROM lecturer "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);
echo "<div class=\"container\">";
echo "<table border=1 class=\"col-lg-12\">
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Qualifications</th>
		<th>NIC</th>
		<th>Gender</th>
		<th>E-mail</th>
		</tr>"; // start a table tag in the HTML

while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
    echo "<tr><td>" . $row['first_name'] . "</td>
				<td>" . $row['last_name'] . "</td><td>" . $row['qualifications'] . "</td>
				<td>" . $row['nic'] . "</td>
				<td>" . $row['gender'] . "</td><td>" . $row['email'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table></div>"; //Close the table in HTML

mysqli_close($conn); //Make sure to close out the database connection
?>
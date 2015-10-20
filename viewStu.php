<title>View Student Details</title>
<?php

//Sidath 
//15 Sep 2015

include 'require/links.php';
include 'require/functions.php';
include 'require/connection.php';

//$connection = mysqli_connect('localhost', 'root', ''); //The Blank string is the password
//mysqli_select_db('kdumooc');

$query = "SELECT first_name,last_name,registration_no,dob,gender,nic,email FROM student"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);
echo "<div class=\"container\">";
echo "<table border=\"1\" class=\"col-lg-12\">
		<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>Registration Number</th>
		<th>DOB</th>
		<th>Gender</th>
		<th>NIC</th>
		<th>Email</th>
		"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['first_name'] . "</td>
				<td>" . $row['last_name'] . "</td><td>" . $row['registration_no'] . "</td>
				<td>" . $row['dob'] . "</td><td>" . $row['gender'] . "</td>
				<td>" . $row['nic'] . "</td><td>" . $row['email'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table></div>"; //Close the table in HTML

mysqli_close($conn); //Make sure to close out the database connection
?>
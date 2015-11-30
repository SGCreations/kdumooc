<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kdumooc');

//$question=$_POST['Question'];

/* $query1 = "INSERT INTO forumquestion VALUES (NULL, '$question' date("h:i:sa"), NULL, NULL, NULL, NULL) "; 
  $result1 = mysql_query($query1); */ // error

$query2 = "SELECT idFORUMQUESTION, Content, timestamp FROM forumquestion";
$result2 = mysql_query($query2);

echo "<table>
		<tr><td>Question Id</td>
		<td>Question</td>
		<td>Time posted</td></tr>
		";

$i = 0;
while ($row = mysql_fetch_array($result2)) {   //Creates a loop to loop through results
    echo "<td>" . $row['idFORUMQUESTION'] . "</td>
				<td>" . $row['Content'] . "<td><td>" . $row['timestamp'] . "</td>
				<td><a href='reply.php' target='blank'> Reply</a></td>
				";  //$row['index'] the index here is a field name
    $i++;
}
echo "</table>";
?>
<h2>Answers : </h2>
<?php
$query3 = "SELECT idFORUMANSWER, Content, timestamp FROM forumanswer WHERE FORUMQUESTION_idFORUMQUESTION=idFORUMQUESTION ";
$result3 = mysql_query($query3);

echo "<table>";
$i = 0;
while ($row = mysql_fetch_array($result2)) {   //Creates a loop to loop through results
    echo "<tr><td>" . $row['idFORUMANSWER'] . "</td><td>" . $row['Content'] . "<td><td>" . $row['timestamp'] . "</td></tr>";
    //$row['index'] the index here is a field name
    $i++;
//error in above
}
echo "</table>";
?>
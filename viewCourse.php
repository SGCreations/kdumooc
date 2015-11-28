<title>View Course</title>
<?php

//Sidath 
//15 Sep 2015
//As of now, the no. of answers available per question is set to 4.
//In this implementation, only MCQ type questions are concerned. 
//include 'require/links.php';
//include 'require/functions.php';
//include 'require/connection.php';
include 'header.php';

if ((!isset($_GET['courseID']) || !isset($_GET['token'])) || (sha1($_GET['courseID']) != $_GET['token'])) {
    header("Location:index.php");
}
else{
    $courseID = $_GET['courseID'];
    
}

//$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
//mysql_select_db('kdumooc');

$resultsOfCourse = getCourseDetails($courseID, $db)


?>

<div class="container">
    <div class="col-lg-9">
        <h1><?php echo $resultsOfCourse[0][2] ?></h1>
    </div>
    <div class="col-lg-3">
        hello2
    </div>
</div>

<?php include 'footer.php'; ?>

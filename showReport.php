<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'require/functions.php';
include 'require/links.php';
//include 'headerGeneral.php';
include 'header.php';
$resultset = tempReport($db);
?>
<!--<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 Bootstrap 3.3.4 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 FontAwesome 4.3.0 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 DATA TABLES 
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 Ionicons 2.0.0 
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
 Theme style 
<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
 KDUMOOC Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. 
<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
 iCheck 
<link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
 Morris chart 
<link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
 jvectormap 
<link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
 Date Picker 
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
 Daterange picker 
<link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
 bootstrap wysihtml5 - text editor 
<link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#idTableReport').DataTable();

    });
</script>
<title>
    Exam Report
</title>
<div class="container" >
    <center>
        <h4>Your last assignment attempted on 30 Nov 2015:</h4>
        <h5>Module: Basic Structures: Sets, Functions, Sequences, Sums, and Matrices</h5>
        <table id="idTableReport" class="table table-bordered table-striped dataTable" role="grid">

            <thead>
                <tr role="row">
                    <th>Question</th>
                    <th>Validity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($resultset as $result) {
                    echo "<tr>";
                    echo "<td><a href\"#\" target=\"new\">" . "Question" . " " . $count . "</a></td>";
                    if ($result['validity'] == "1") {
                        $value = "Correct";
                    } else {
                        $value = "Wrong";
                    }
                    echo "<td>" . $value . "</td>";
                    echo "</tr>";
                    $count++;
                }
                ?>
            </tbody>

        </table>
        <i>
        <h4>You have attempted <b>8</b> questions, got <b>3</b> correct and <b>5</b> wrong!</h4>
        <h4>Your pass rate is <b>37.5%</b>. You should improve...</h4></i>
    </center>
</div>
<?php
//include 'footerGeneral.php';
include 'footer.php';
?>
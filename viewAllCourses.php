<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'header.php';
?>
<style type="text/css">
    .disabled{
        /*font-size: 160%;*/
    }

    .newStyle{
        /*font-size: 160%;*/
    }
    img{
        float: right;
        margin: 0 0 5px 10px;
    }
    .centered{
        width: 100%;
        height:100%;
        top:0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: inline-block;
        padding-bottom: 10px;
    }
</style>
<div class="container">
    <center><h1>All Courses on KDUMOOC</h1></center>

</div>
<?php
try {

    // Find out how many items are in the table
    $total = $db->query('SELECT COUNT(*) FROM `course`')->fetchColumn();

    // How many items to list per page
    $limit = 3;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default' => 1, 'min_range' => 1,),)));

    // Calculate the offset for the query
    $offset = ($page - 1) * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? ' <button type="button" class="btn btn-default"> <a href="?page=1" class="newStyle" title="First page">First</a></button> <button type="button" class="btn btn-default">&nbsp;<a class="newStyle" href="?page=' . ($page - 1) . '" title="Previous page">Previous</a></button>&nbsp;' : ' <button type="button" class="btn btn-default"> <span class="disabled">First</span></button> <button type="button" class="btn btn-default"> <span class="disabled">Previous</span></button>&nbsp;';

    // The "forward" link
    $nextlink = ($page < $pages) ? ' <button type="button" class="btn btn-default"> <a class="newStyle" href="?page=' . ($page + 1) . '" title="Next page">Next</a></button> <button type="button" class="btn btn-default"> <a href="?page=' . $pages . '" title="Last page" class="newStyle">Last</a></button> ' : '&nbsp;<button type="button" class="btn btn-default"> <span class="disabled">Next</span></button> <button type="button" class="btn btn-default">&nbsp;<span class="disabled">Last</span></button>';
    ?>
    <div class="container"><center>
            <?php
            // Display the paging information
            echo '<div id="paging"  class="well well-sm"><h5>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </h5></div>';
            echo "</center>";
            // Prepare the paged query
            //$stmt = $db->prepare('SELECT * FROM `course` ORDER BY idCOURSE LIMIT :limit OFFSET :offset');
            $stmt = $db->prepare("SELECT `idCOURSE`,`category`,`duration`, `LECTURER_idLECTURER`,`title`, substring_index(`about`,' ',500) as short_desc FROM `course` ORDER BY `course`.`idCOURSE` ASC LIMIT :limit OFFSET :offset");
            // Bind the query params
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            // Do we have any results?
            if ($stmt->rowCount() > 0) {
                // Define how we want to fetch the results
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $iterator = new IteratorIterator($stmt);
                ?>

                <?php
                // Display the results
                foreach ($iterator as $row) {
                    //echo "<div class=\"container\">";
                   
                    echo '<div class=\'well well-lg centered\'>';
                    echo "<h4>" . $row['title'] . "</h4>";
                    //echo "<br>";
                    echo "<div class=\"label label-primary\" style=\"text-align:right\"> Duration: " . $row['duration'] . " weeks" . "</div>";
                    if (doesImageExist(COURSE_PIC_UPLOAD_URL . $row['idCOURSE'] . ".jpg")) {
                        $img_url = "<img  width=\"100px\"  height=\"100px\" src=\"" . COURSE_PIC_UPLOAD_URL . $row['idCOURSE'] . ".jpg\" />";
                    } else {
                        $img_url = "<img  width=\"100px\"  height=\"100px\" src=\"" . COURSE_PIC_UPLOAD_URL . "default.jpg\" />";
                    }
                    echo "<div style=\"text-align:justify;\"> <br/>" . $img_url . "<p>Description: " . $row['short_desc'] . "..." . "</p></div>";
                    //echo '<p>', $row['idCOURSE'], '</p>';
                    //echo "<img  width=\"100px\"  height=\"100px\" src=\"" . COURSE_PIC_UPLOAD_URL . $row['idCOURSE'] . ".jpg" . "\"/>";
                    echo "</div>";
                     echo "<hr>";
                }
            } else {
                echo '<p>No results could be displayed.</p>';
            }
            ?>
    </div>
    <?php
} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}
?>
<?php include 'footer.php'; ?>
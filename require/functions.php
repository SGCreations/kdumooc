<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function createAnswerArray($no_of_answers) {
    for($i=0;$i<$no_of_answers;$i++){
        
    }
}

function getModuleList($course_id, $conn){
    
    $sql = "SELECT module_name FROM `module` WHERE COURSE_idCOURSE='$course_id' AND deleted=0 ORDER BY module_name";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row_new[] = mysqli_fetch_array($result);
        var_dump($row_new);
        /*while ($row = $result->fetch_assoc()) {
           $password_return =  $row["password"] ;
        }
        if(md5($password)==$password_return){
            return true;
        }
        else{
            return false;
        }*/
    } else {
        return false;
    }
    $conn->close();
    
}
?>

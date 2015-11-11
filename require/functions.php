<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/connection.php';

function createAnswerArray($no_of_answers) {
    for ($i = 0; $i < $no_of_answers; $i++) {
        
    }
}

function getModuleList($course_id, $db) {
    $sql = "SELECT module_name FROM `module` WHERE COURSE_idCOURSE='$course_id' AND deleted=0 ORDER BY module_name";
    $sth = $db->prepare($sql);
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    //var_dump($result);

    return $result;
}

function doesUserExistLecturer($username, $email, $db) {
    if ($email == NULL) {
        $email = "";
    }
    if ($username == NULL) {
        $username = "";
    }
    $sql = "SELECT * FROM `lecturer` WHERE username='$username' or email='$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $db->close();
}

function doesUserExistStudent($username, $email, $db) {
    if ($email == NULL) {
        $email = "";
    }
    if ($username == NULL) {
        $username = "";
    }
    $sql = "SELECT * FROM `lecturer` WHERE username='$username' or email='$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $db->close();
}

function doesNICExist($nic, $db) {
    $sql = "SELECT * FROM `student` WHERE `nic` LIKE '$nic'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $db->close();
}

function doesCourseExist($courseTitle, $conn) {
    $sql = "SELECT * FROM `course` WHERE `title` LIKE '$courseTitle'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function doesModuleExist($moduleTitle, $conn) {
    $sql = "SELECT * FROM `module` WHERE `module_name` LIKE '$moduleTitle' AND `deleted` = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function doesEmailExist($email, $type, $conn) {
    if ($type == "L") {
        $sql = "SELECT * FROM `lecturer` WHERE email='$email'";
    } else {
        $sql = "SELECT * FROM `student` WHERE email='$email'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function getVerifiedLecturers($db) {
    $sql = "SELECT idLecturer, first_name, last_name FROM `lecturer` WHERE `deleted` = 0 AND `activated` = 1 AND `verified` = 1 ORDER BY idLecturer Asc";
    $sth = $db->prepare($sql);
    $sth->execute();
    /* Fetch all of the remaining rows in the result set */
    //print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    return $result;
}

function getActiveCourses($db) {
    $sql = "SELECT * FROM `course` WHERE `deleted` = 0 ORDER BY idCourse Asc";
    $sth = $db->prepare($sql);
    $sth->execute();
    /* Fetch all of the remaining rows in the result set */
    //print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    return $result;
}

function getAllStudents($db) {
    $sql = "SELECT * FROM `student` where `deleted`=0";
    $sth = $db->prepare($sql);
    $sth->execute();
    /* Fetch all of the remaining rows in the result set */
    //print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    return $result;
}

function getActiveStudents($db) {
    $sql = "SELECT * FROM `student` where `deleted`=0 AND `activated`=1";
    $sth = $db->prepare($sql);
    $sth->execute();
    /* Fetch all of the remaining rows in the result set */
    //print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    return $result;
}

function loadStudentDetails($studentID, $db) {
    $sql = "SELECT * FROM `student` where `idSTUDENT`=$studentID AND `deleted`=0";
    $sth = $db->prepare($sql);
    $sth->execute();
    /* Fetch all of the remaining rows in the result set */
    //print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    return $result;
}

function getLastStudentID($db) {
    $sql = "SELECT module_name FROM `module` WHERE COURSE_idCOURSE='$course_id' AND deleted=0 ORDER BY module_name";
    $sth = $db->prepare($sql);
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    //var_dump($result);

    return $result;
}

function validateUser($email, $password, $type, $conn) {
    if ($email == "") {
        return false;
    }
    if ($password == "") {
        return false;
    }
    if($type=="S"){
        $sql = "SELECT * FROM `student` WHERE email='$email' AND `activated`=true AND `deleted`=false";
    }else{
       $sql = "SELECT * FROM `lecturer` WHERE email='$email' AND `activated`=true AND `deleted`=false"; 
    }
    
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           $password_return =  $row["password"] ;
        }
        if(md5($password)==$password_return){
            return true;
        }
        else{
            return false;
        }
    } else {
        return false;
    }
    $conn->close();
}

?>

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
    $sql = "SELECT module_name FROM `module` WHERE COURSE_idCOURSE='$course_id' AND deleted=0 ORDER BY module_name asc";
    $sth = $db->prepare($sql);
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    //var_dump($result);

    return $result;
}

function getModuleDetails($course_id, $db) {
    $sql = "SELECT * FROM `module` WHERE COURSE_idCOURSE='$course_id' AND deleted=0 ORDER BY module_name asc";
    $sth = $db->prepare($sql);
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    //var_dump($result);

    return $result;
}

function echoHiddenField($name, $value) {
    echo "<input value=" . $value . " name=" . $name . " type=\"text\" style=\"display:none;\" />";
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

function getCorrectAnswer($i, $correct_answer) {
    if ($i == $correct_answer) {
        return 1;
    } else {
        return 0;
    }
}

function doesUserExistStudent($username, $email, $db) {
    if ($email == NULL) {
        $email = "";
    }
    if ($username == NULL) {
        $username = "";
    }
    $sql = "SELECT * FROM `student` WHERE username='$username' or email='$email'";
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
    $sql = "SELECT idLecturer, first_name, last_name FROM `lecturer` WHERE `deleted` = 0 AND `activated` = 1 AND `verified` = 1 ORDER BY first_name Asc";
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

function loadLecturerDetails($lecturerID, $db) {
    $sql = "SELECT * FROM `lecturer` where `idLECTURER`=$lecturerID AND `deleted`=0";
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
    if ($type == "S") {
        $sql = "SELECT * FROM `student` WHERE email='$email' AND `activated`=true AND `deleted`=false";
    } else {
        $sql = "SELECT * FROM `lecturer` WHERE email='$email' AND `activated`=true AND `deleted`=false";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $password_return = $row["password"];
        }
        if (md5($password) == $password_return) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    $conn->close();
}

function getUserIDByEmail($username, $type, $db) {
    if ($type == "L") {
        $sql = "SELECT idLECTURER FROM `lecturer` WHERE username='$username'";
    } else {
        $sql = "SELECT idSTUDENT FROM `student` WHERE username='$username'";
    }
    $sth = $db->prepare($sql);
    $sth->execute();

    $result = $sth->fetchAll();
    //var_dump($result);

    return $result;
}

function setSessionVariables($username, $return_id, $type) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["username"] = $username;
    if ($type == "L") {
        $_SESSION["userID"] = $return_id[0]['idLECTURER'];
    } else {
        $_SESSION["userID"] = $return_id[0]['idSTUDENT'];
    }
    $_SESSION["type"] = $type;
    //echo $_SESSION["username"] . " " . $_SESSION["userID"] . " " . $_SESSION["type"];
}

function sessionExists() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION["userID"])) {
        return false;
    } else {
        return true;
    }
}

function getSessionVariables($request) {
    if (!isset($_SESSION)) {
        session_start();
    }
    switch ($request) {
        case "userID":
            return $_SESSION["userID"];
            break;
        case "username":
            return $_SESSION["username"];
            break;
        case "type":
            return $_SESSION["type"];
            break;
        default:
            return "Variables undefined!";
    }
}

function clearSession() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["userID"]);
    unset($_SESSION["username"]);
    unset($_SESSION["type"]);
}

function getCourseDetails($courseID, $db) {
    $sql = "SELECT * FROM `course` WHERE idCOURSE=" . $courseID;
    $sth = $db->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();
    return $result;
}

function doesImageExist($filename){
    if(file_exists($filename)){
        return true;
    }
    else{
        return false;
    }
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'require/config.php';

function uploadImageStudentProfileImage($target_dir, $files, $redirect_path) {
    var_dump($files);
    echo $target_dir;
    //die();
    if ($target_dir == null) {
        //$target_dir = STUDENT_PROFILE_PIC_UPLOAD_URL;
        $target_dir = "images/student-profile-pics/";
    }
     echo $target_dir;
    $target_file = $target_dir . basename($files["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    $check = getimagesize($files["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check file size
    if ($files["fileToUpload"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $error = "Sorry, your file is too large.";
        header($redirect_path);
        die();
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        
// if everything is ok, try to upload file
    } else {
        echo "hello";
        
        if (move_uploaded_file($files["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($files["fileToUpload"]["name"]) . " has been uploaded.";
            die();
        } else {
            echo "Sorry, there was an error uploading your file.";
            die();
        }
    }
}

?>

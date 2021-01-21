<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../assets/includes/connect.php";
//upload.php


if ($_FILES["file"]["name"] != '') {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = rand(100, 999) . '.' . $ext;
    $location = '../uploads/company_logo/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    if ($conn -> query("SELECT * FROM company_details") -> num_rows == "null" ){
        $conn ->query("INSERT INTO `company_details`(`logo`) VALUES ('$name')");
//    echo '<img src="' . $location . '" height="150" width="225" class="img-thumbnail" />';
        echo "success";
    }else{
        $conn ->query("UPDATE `company_details` set logo = '$name'");
        echo "success";
    }

} else {
    echo "error";
}




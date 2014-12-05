<?php
/**
 * Created by PhpStorm.
 * User: Kunaal Jain
 * Date: 01-12-2014
 * Time: 15:51
 */

require_once("models/db-settings.php");



$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




// escape variables for security

$type=$_POST["type"];
$course_name=$_POST["course_name"];
$course_id=$_POST["course_id"];
$sql="INSERT INTO courses (cid,name,Type)
VALUES ('$course_id','$course_name','$type')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: account.php");


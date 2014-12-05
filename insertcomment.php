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

$courf = $_POST["input1"];
$instf = $_POST["input2"];
$stud_id=$_POST["stud_id"];
$prof_id=$_POST["prof_id"];
$course_id=$_POST["course_id"];
$sql="INSERT INTO comments (stud_id,prof_id,course_id,courf,instf)
VALUES ('$stud_id','$prof_id','$course_id','$courf','$instf')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: comment.php");


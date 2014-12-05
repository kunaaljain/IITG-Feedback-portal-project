<?php
/*
By Kunaal Jain
Copyrighted

*/
require_once("models/db-settings.php");



$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




// escape variables for security

$course_id=$_POST["cid"];
$prof_id=$_POST["prof_id"];
$stud_id=$_POST["stud_id"];
$sql="INSERT INTO studcourse (course_id,prof_id,student_id)
VALUES ('$course_id','$prof_id','$stud_id')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: account.php");


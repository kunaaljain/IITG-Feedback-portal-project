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
$weekNumber = date("W");
$baseweek= 40;
$name1 = $_POST["input0"];
$name2 = $_POST["input1"];
$name3 = $_POST["input2"];
$name4 = $_POST["input3"];
$name5 = $_POST["input4"];
$prof_id=$_POST["prof_id"];
$course_id=$_POST["course_id"];
$sql="INSERT INTO questionnaire (prof_id,course_id,topic,q1,q2,q3,q4)
VALUES ('$prof_id','$course_id','$name1','$name2','$name3','$name4','$name5')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: profquestionparent.php");


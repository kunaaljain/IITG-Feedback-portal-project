<?php
/**
 * Created by PhpStorm.
 * User: Kunaal Jain
 * Date: 27-Nov-14
 * Time: 1:54 PM
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
$name1 = $_POST["q1"];
$name2 = $_POST["q2"];
$name3 = $_POST["q3"];
$name4 = $_POST["q4"];
$name5 = $_POST["q5"];
$name6 = $_POST["q6"];
$name7 = $_POST["q7"];
$stud_id=$_POST["stud_id"];
$prof_id=$_POST["prof_id"];
$course_id=$_POST["course_id"];
$sql="INSERT INTO response (stud_id,prof_id,course_id,week_id,q1,q2,q3,q4,q5,q6,q7)
VALUES ('$stud_id','$prof_id','$course_id',$weekNumber-$baseweek,'$name1','$name2','$name3','$name4','$name5','$name6','$name7')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: feedparent.php");


<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">  
 
    <title>CSS3 Feature Table</title> 
    <style type="text/css">    

body
{
    margin: 0;
    padding: 0;
    background: white  no-repeat left top;
}

#main
{
    width: 60%;
    margin: 80px auto 0 auto;
    background: white;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    padding: 30px;
    border: 1px solid #adaa9f;
    -moz-box-shadow: 0 2px 2px #9c9c9c;
    -webkit-box-shadow: 0 2px 2px #9c9c9c;
}

/*Features table------------------------------------------------------------*/
.features-table
{
  width: 100%;
  margin: 0 auto;
  border-collapse: separate;
  border-spacing: 0;
  text-shadow: 0 1px 0 #fff;
  color: #2a2a2a;
  background: #fafafa;  
  background-image: -moz-linear-gradient(top, #fff, #eaeaea, #fff); /* Firefox 3.6 */
  background-image: -webkit-gradient(linear,center bottom,center top,from(#fff),color-stop(0.5, #eaeaea),to(#fff)); 
}

.features-table td
{
  height: 50px;
  line-height: 50px;
  padding: 0 20px;
  border-bottom: 1px solid #cdcdcd;
  box-shadow: 0 1px 0 white;
  -moz-box-shadow: 0 1px 0 white;
  -webkit-box-shadow: 0 1px 0 white;
  white-space: nowrap;
  text-align: center;
}

/*Body*/
.features-table tbody td
{
  text-align: center;
  font: bold 1em 'trebuchet MS', 'Lucida Sans', Arial;
  
  width: 150px;
}

.features-table tbody td:first-child
{
  width: auto;
  text-align: left;
  
}

.features-table td:nth-child(2)
{
  background: #efefef;
  background: rgba(144,144,144,0.15);
  border-right: 1px solid white;
}
.features-table td:nth-child(3)
{
  background : #FFFF99;
  
  border-right: 1px solid white;
}
.features-table td:nth-child(4)
{
  background: #e7f3d4;  
  background: rgba(184,243,85,0.3);
}

/*Header*/
.features-table thead td
{
  font: bold 1.3em 'trebuchet MS', 'Lucida Sans', Arial;  
  -moz-border-radius-topright: 10px;
  -moz-border-radius-topleft: 10px; 
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-top: 1px solid #eaeaea; 
}

.features-table thead td:first-child
{
  border-top: none;
}

/*Footer*/
.features-table tfoot td
{
  font: bold 1.4em Georgia;  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
  border-bottom: 1px solid #dadada;
}

.features-table tfoot td:first-child
{
  border-bottom: none;
}

.styled-button-5 {
    background-color:#ed8223;
    color:#fff;
    font-family:'Helvetica Neue',sans-serif;
    font-size:18px;
    line-height:30px;
    border-radius:20px;
    -webkit-border-radius:20px;
    -moz-border-radius:20px;
    border:0;
    text-shadow:#C17C3A 0 -1px 0;
    width:120px;
    height:32px;
    margin-top: 10px;
}                
.head1 {
    margin-bottom: 40px;
  font: bold 1.7em Georgia;  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  
}  
    </style> 
<?php
/*
By Kunaal Jain
Copyrighted

*/
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");

//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login_pg.php"); die(); }

$stud_id=$loggedInUser->user_id;
$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$baseweek= 40;
$weekNumber = date("W")-$baseweek;

$mq="SELECT *,studcourse.student_id AS studd FROM `studcourse` JOIN `courses` JOIN `uc_users` WHERE `student_id` =".$stud_id." AND courses.id=studcourse.course_id AND studcourse.prof_id=uc_users.id ";
$result=mysqli_query($con,$mq);
echo '<div id="main">';
echo '<section class ="head1">';
echo 'Submit the weekly feedback for the Course';
echo '</section>';
echo '<table class="features-table" margin-left:300;margin-top:100;>';
echo "<thead>
                    <tr>
                        <td>Course Number</td>
                        <td>Course Name</td>
                        <td>Instructor</td>
                        <td>Theory/Lab</td>
                        <td>Weekly Status</td>
                    </tr>
                </thead>";
while($row = mysqli_fetch_array($result)) {
    $mq1="SELECT * FROM `response` WHERE `stud_id`=".$row['student_id']." AND `course_id`=".$row['course_id']." AND `prof_id`=".$row['prof_id']." AND `week_id`=".$weekNumber;
    $result1=mysqli_query($con,$mq1);
    $num= mysqli_num_rows($result1);
    
    echo "<tr>";
    echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['display_name'] . "</td>";
    echo "<td>";
        if($row['Type']==1) echo "Theory";
    else echo "Lab";

    echo "</td>";
    if($num>0){ echo '<td><img src="images/check.png
        " width="24" height="24" alt="images/check"></td>';}
    else {
    echo "<td>  <form method='POST' action='feedback.php'>
    <input type='hidden' name='stud_id' value=".$row['student_id'].">
    <input type='hidden' name='course_id' value=".$row['course_id'].">
    <input type='hidden' name='prof_id' value=".$row['prof_id'].">
    <input type='submit' value='Submit' class='styled-button-5'> </form> </td>";}

    echo "</tr>";
}
echo '</table>';


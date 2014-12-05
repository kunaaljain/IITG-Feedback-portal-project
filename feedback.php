<!--
/*
By Kunaal Jain
Copyrighted

*/
-->

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
 width: 60%;
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
    background :url("images/t1.jpg");
  width: 5%;
  text-align: left;
  
}

.features-table td:nth-child(2)
{
  background :url("images/t1.jpg");
  width: 20%;
 
  border-right: 1px solid white;
}
.features-table td:nth-child(3)
{
     
    
  
  width: 60%;
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
.head2 {
    
  font: bold 1.3em Calibri ;
  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  margin-bottom: 40px;
  margin-top: 40px;
  
}    
    </style>
    <?php
/**
 * Created by PhpStorm.
 * User: Kunaal Jain
 * Date: 27-Nov-14
 * Time: 12:36 PM
 */
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");

//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login_pg.php"); die(); }


$stud_id=$_POST["stud_id"];
$course_id=$_POST["course_id"];
$prof_id = $_POST["prof_id"];

$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query2="SELECT * FROM `uc_users` WHERE id=".$stud_id;
$result=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result);
$stud_name=$row['display_name'];
$query2="SELECT * FROM `uc_users` WHERE id=".$prof_id;
$result=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result);
$prof_name=$row['display_name'];
$query2="SELECT * FROM `courses` WHERE id=".$course_id;
$result=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result);
$course_name=$row['cid'];
$course_desc=$row['name'];



mysqli_close($con);




?>

<link href="css/examples.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="jquery.barrating.js"></script>
<script type="text/javascript">

    $(function () {
        $('.example-g').barrating('show', {
            showSelectedRating:true,
            reverse:false
        });

    });
</script>


<form action="insert.php" method="POST">

<br>
</div >
<div>
    <input type="hidden" name="stud_id" value="<?php echo $stud_id?>">
    <input type="hidden" name="course_id" value="<?php echo $course_id?>">
    <input type="hidden" name="prof_id" value="<?php echo $prof_id?>">


<?php echo '<section class ="head2">';
echo "Hello ".$stud_name.", Please give feedback for ".$course_desc."(".$course_name.")"." which is taught by Professor ".$prof_name;
 '</section>';
?>
<div >Enter your choice *<br>
<table class="features-table">
	<tr>
		<td width="10%">1.</td>
		<td>Depth of the Knowledge of the subject</td>
		<td >
            <div class="input select rating-g">
                <select class="example-g" name="q1">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
		</td>
	</tr>
	<tr>
		<td width="10%">2</td>
		<td>Sincerity, Commitment, Regularity <br>and Punctuality</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q2">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
	<tr>
		<td width="10%">3</td>
		<td>Presentation Skills</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q3">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
	<tr>
		<td width="10%">4</td>
		<td>Syllabus Coverage</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q4">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
	<tr>
		<td width="10%">5</td>
		<td>Ability to Clarify doubts,<br> teaching with relevant examples</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q5">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
	<tr>
		<td width="10%">6</td>
		<td>Ability to relate the course <br>to real life situations</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q6">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
	<tr>
		<td width="10%">7</td>
		<td>Ability to generate interest</td>
        <td >
            <div class="input select rating-g">
                <select class="example-g" name="q7">
                    <option value="1">Strongly Disagree</option>
                    <option value="2">Disagree</option>
                    <option value="3">Neither Agree or Disagree</option>
                    <option value="4">Agree</option>
                    <option value="5">Strongly Agree</option>
                </select>
            </div>
        </td>
	</tr>
</table>
</div>
<p align="center">

<input type="submit" value="Submit" class='styled-button-5' />
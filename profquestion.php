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

echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>';

$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$baseweek= 40;
$weekNumber = date("W")-$baseweek;
$course_id=$_POST["course_id"];
$prof_id = $_POST["prof_id"];


$query2="SELECT * FROM `uc_users` WHERE id=".$prof_id;
$result=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result);
$prof_name=$row['display_name'];
$query2="SELECT * FROM `courses` WHERE id=".$course_id;
$result=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result);
$course_name=$row['cid'];
$course_desc=$row['name'];

?>

<form action="insertprofquestion.php" method="POST">
    <div ><br>
        <br>
    </div >
    <div>
        <input type="hidden" name="course_id" value="<?php echo $course_id?>">
        <input type="hidden" name="prof_id" value="<?php echo $prof_id?>">
        <div id="main"><?php echo '<section class ="head2">';
            echo "Hello ".$prof_name.", Please set questions for ".$course_desc."(".$course_name.")";
            echo '</section>';
            ?>
            <section class ="head1">
                Enter questions
            </section>
            <table class="features-table" margin-left:300;margin-top:100;>
                <tr>
                    <td>Topic</td>
                    <td><input type="text" value="Thermodynamics" name="input0" /></td>
                </tr>
                <tr>
                    <td>Question 1</td>
                    <td><input type="text" value="How much you understood this topic?" name="input1" /></td>
                </tr>
                <tr>
                    <td>Question 2</td>
                    <td><input type="text" value="Preparation level of instructor?" name="input2" /></td>
                </tr>
                <tr>
                    <td>Question 3</td>
                    <td><input type="text" value="Quality of lecture slides/content?" name="input3" /></td>
                </tr>
                <tr>
                    <td>Question 4</td>
                    <td><input type="text" value="Your views?" name="input4" /></td>
                </tr>
            </table></div>
        <p align="center">
            <input type="submit" value="Submit" class='styled-button-5' />
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
                    background: #25A6E1;
                    background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                    background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
                    background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                    background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                    background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                    background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
                    padding:8px 13px;
                    color:#fff;
                    font-family:'Helvetica Neue',sans-serif;
                    font-size:17px;
                    border-radius:4px;
                    -moz-border-radius:4px;
                    -webkit-border-radius:4px;margin-top: 10px;
                    border:1px solid #1A87B9
                }
                .head1 {
                    margin-bottom: 40px;
                    font: bold 1.7em Georgia;
                    -moz-border-radius-bottomright: 10px;
                    -moz-border-radius-bottomleft: 10px;

                }
                .head2 {

                    font: bold 1.3em Calibri;
                    -moz-border-radius-bottomright: 10px;
                    -moz-border-radius-bottomleft: 10px;
                    margin-bottom: 20px;

                }

            </style>
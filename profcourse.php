<?php
/*
By Kunaal Jain
Copyrighted

*/
?>
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
    margin-top: 70px;
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

         
.head1 {
   
  font: bold 1.3em Calibri;  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  
}   
.head2 {
   
  font: bold 1.5em Georgia;  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  
}      
              
    </style><?php
/**
 * Created by PhpStorm.
 * User: Kunaal Jain
 * Date: 30-11-2014
 * Time: 19:31
 */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");

//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login_pg.php"); die(); }

echo '<script src="js/jquery.min.js"></script>
    <script src="js/highcharts.js"></script>';

$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$baseweek= 40;
$weekNumber = date("W")-$baseweek;
$course_id=$_POST["course_id"];
$prof_id = $_POST["prof_id"];

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q1) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data1[]=$row['a'];
    else $data1[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q2) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data2[]=$row['a'];
    else $data2[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q3) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data3[]=$row['a'];
    else $data3[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q4) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data4[]=$row['a'];
    else $data4[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q5) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data5[]=$row['a'];
    else $data5[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q6) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data6[]=$row['a'];
    else $data6[]=0.0;

}

for($i=0;$i<=$weekNumber;$i++)
{
    $q1="SELECT AVG(q7) AS a FROM `response` WHERE `prof_id`=".$prof_id." AND `course_id`=".$course_id." AND `week_id`=".$i;
    $result=mysqli_query($con,$q1);
    $row = mysqli_fetch_array($result);
    if($row['a']>0) $data7[]=$row['a'];
    else $data7[]=0.0;

}
?>
<div id="container" style="float:left; width:75%; height:400px; margin-top: 50px"></div>
<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Weekly Stacked Ratings'
            },

            xAxis: {
                title: {
                    text: 'Week Number'
                }
            },

            yAxis: {
                min: 0,
                title: {
                    text: 'Total Ratings'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -70,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                name: 'Question 1',
                data: [<?php echo join($data1, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 2',
                data: [<?php echo join($data2, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 3',
                data: [<?php echo join($data3, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 4',
                data: [<?php echo join($data4, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 5',
                data: [<?php echo join($data5, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 6',
                data: [<?php echo join($data6, ',') ?>],
                pointStart: 1
            },{
                name: 'Question 7',
                data: [<?php echo join($data7, ',') ?>],
                pointStart: 1
            },]
        });
    });
</script>
<div id="main">
<section class ="head1"><br>
<section class ="head2">Questions :</section>
1.  Depth of the Knowledge of the subject .<br>  

2   Sincerity, Commitment, Regularity
and Punctuality     <br> 

3   Presentation Skills     <br> 

4   Syllabus Coverage   <br> 

5   Ability to Clarify doubts,
teaching with relevant examples     <br> 

6   Ability to relate the course
to real life situations     <br> 

7   Ability to generate interest<br> 
</section></div>

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
$topic = $_POST["topic"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ajax Add/Delete a Record with jQuery Fade In/Fade Out</title>
    <script src="js/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            //##### send add record Ajax request to response.php #########
            $("#FormSubmit").click(function (e) {
                e.preventDefault();
                if($("#contentText").val()==='')
                {
                    alert("Please enter some text!");
                    return false;
                }

                $("#FormSubmit").hide(); //hide submit button
                $("#LoadingImage").show(); //show loading image

                var myData = 'content_txt='+ $("#contentText").val(); //build a post data structure
                jQuery.ajax({
                    type: "POST", // HTTP method POST or GET
                    url: "response.php", //Where to make Ajax calls
                    dataType:"text", // Data type, HTML, json etc.
                    data:myData, //Form variables
                    success:function(response){
                        $("#responds").append(response);
                        $("#contentText").val(''); //empty text field on successful
                        $("#FormSubmit").show(); //show submit button
                        $("#LoadingImage").hide(); //hide loading image

                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        $("#FormSubmit").show(); //show submit button
                        $("#LoadingImage").hide(); //hide loading image
                        alert(thrownError);
                    }
                });
            });

            //##### Send delete Ajax request to response.php #########
            $("body").on("click", "#responds .del_button", function(e) {
                e.preventDefault();
                var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                var DbNumberID = clickedID[1]; //and get number from array
                var myData = 'recordToDelete='+ DbNumberID; //build a post data structure

                $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
                $(this).hide(); //hide currently clicked delete button

                jQuery.ajax({
                    type: "POST", // HTTP method POST or GET
                    url: "deletecomment.php", //Where to make Ajax calls
                    dataType:"text", // Data type, HTML, json etc.
                    data:myData, //Form variables
                    success:function(response){
                        //on success, hide  element user wants to delete.
                        $('#item_'+DbNumberID).fadeOut();
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        //On error, we alert user
                        alert(thrownError);
                    }
                });
            });

        });
    </script>
    <link href="css/ajaxcom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="content_wrapper">
    <ul id="responds">
        <?php
        //include db configuration file
        //echo $prof_id,$course_id,$topic;

        //MySQL query
        $q1="SELECT id,q1,q2,q3,q4 FROM qans WHERE prof_id=".$prof_id." AND course_id=".$course_id." AND Topic='".$topic."'";
        $result=mysqli_query($con,$q1);
        //echo $q1;

        //get all records from add_delete_record table
        while($row = mysqli_fetch_array($result))
        {
            echo '<li id="item_'.$row["id"].'">';
            echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
            echo '<img src="images/icon_del.gif" border="0" />';
            echo '</a></div>';
            echo $row["q1"].'</li>';
        }

        //close db connection
        $mysqli->close();
        ?>
    </ul>

</div>

</body>
</html>

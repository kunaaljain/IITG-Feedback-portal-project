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



$con=mysqli_connect('localhost','root','',"usercake");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_close($con);

?>

<form action="insertcourseprof.php" method="POST">
    <div ><br>
        <br>
    </div >
    <div>
        <div id="main"><?php echo '<section class ="head2">';
            echo '</section>';
            ?>
            <section class ="head1">
                Add new course professor
            </section>
            <table class="features-table" margin-left:300;margin-top:100;>
                <tr>
                    <td>Select Course ID</td>
                    <td>
                        <?php
                        $qu="SELECT DISTINCT cid,id FROM courses";
                        $con=mysqli_connect('localhost','root','',"usercake");
                        $result=mysqli_query($con,$qu);
                        echo "<select name='cid'>";
                        while($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.$row["id"].'">'.$row["cid"].'</option>';
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>Select Prof ID</td>
                    <td>
                        <?php
                        $qu="SELECT uc_users.id,uc_users.display_name,uc_user_permission_matches.permission_id FROM uc_users JOIN uc_user_permission_matches WHERE uc_users.id=uc_user_permission_matches.user_id AND uc_user_permission_matches.permission_id=3";
                        $con=mysqli_connect('localhost','root','',"usercake");
                        $result=mysqli_query($con,$qu);
                        echo "<select name='prof_id'>";
                        while($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.$row["id"].'">'.$row["display_name"].'</option>';
                        }
                        ?>

                    </td>
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
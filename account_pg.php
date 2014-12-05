<?php
/*
By Kunaal Jain
Copyrighted

*/
?>

<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">  
 
    <title>Home</title> 
    <style type="text/css"> .logo  {
   margin-top: 30px;
    height: 200px;
    left: -55px;
    float: left;
    position: left;
    top: -48px;
    width: 220px;
   z-index: 20;
} 
html {background: url(images/2.jpg) no-repeat ;  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
}


.head1 {
   margin-top: 50px;
   
  font: bold 1.9em Calibri;  
 
  
}   
#main
{
    margin-left: 500px;
    
}
</style>
<?php
/**
 * Created by PhpStorm.
 * User: Kunaal Jain
 * Date: 01-12-2014
 * Time: 07:04
 */
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");
?>
<div class="logo"><br><img src="images/arrow.png" alt="arrow" height="200px" width="200px"/></div>
<div id="main">
<section class ="head1"><br>

Welcome <?php echo $loggedInUser->displayname ?><br>
Choose the following options
</section></div>
<?php    
 /* CAT:Bar Chart */ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chart_demo";
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
 $result = mysqli_query($conn,"SELECT q1 FROM `weekly`");
$storeArray = Array();
while ($row = mysqli_fetch_array($result)) {
    $storeArray[] =  $row['q1'];  
}
 /* pChart library inclusions */ 
 include("class/pData.class.php"); 
 include("class/pDraw.class.php"); 
 include("class/pImage.class.php"); 

echo $storeArray[1];
 /* Create and populate the pData object */ 
 $MyData = new pData();   
 $MyData->loadPalette("palettes/blind.color",TRUE); 
 $MyData->addPoints(array($storeArray[1],$storeArray[2],$storeArray[3],$storeArray[4],$storeArray[0]),"Server A"); 
 $MyData->addPoints(array("week1","week2","week3","week5","week6"),"Weeks"); 
 $MyData->setSerieDescription("Weeks","Week"); 
 $MyData->setAbscissa("Weeks"); 

 /* Create the floating 0 data serie */ 
 $MyData->addPoints(array(60,80,20,40,40,50,90,30,100),"Floating 0"); 
 $MyData->setSerieDrawable("Floating 0",FALSE); 

 /* Create the pChart object */ 
 $myPicture = new pImage(700,230,$MyData); 

 /* Set the default font */ 
 $myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>10,"R"=>110,"G"=>110,"B"=>110)); 

 /* Write the title */ 
 $myPicture->drawText(10,13,"Net Income 2k8"); 

 /* Set the graphical area  */ 
 $myPicture->setGraphArea(50,30,680,180); 

 /* Draw the scale  */ 
 $AxisBoundaries = array(0=>array("Min"=>0,"Max"=>500)); 
 $myPicture->drawScale(array("InnerTickWidth"=>0,"OuterTickWidth"=>0,"Mode"=>SCALE_MODE_MANUAL,"ManualScale"=>$AxisBoundaries,"LabelRotation"=>45,"DrawXLines"=>FALSE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridTicks"=>0,"GridAlpha"=>30,"AxisAlpha"=>0));

 /* Turn on shadow computing */  
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

 /* Draw the chart */ 
 $settings = array("Floating0Serie"=>"Floating 0","Surrounding"=>10); 
 $myPicture->drawBarChart($settings); 

 /* Render the picture (choose the best way) */ 
 $myPicture->autoOutput("pictures/example.drawBarChart.span.png"); 
?>
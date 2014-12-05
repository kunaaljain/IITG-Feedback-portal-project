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
/*General styles*/
body
{
	margin: 0;
	padding: 0;
	background: white  no-repeat left top;
}

#main
{
	width: 960px;
	margin: 160px auto 0 auto;
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
  font: normal 12px Verdana, Arial, Helvetica;
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
	height:32px
}                
    </style> 

    <div id="main">
		<form action="#" method="post" enctype="application/x-www-form-urlencoded">
		<table class="features-table">
				<thead>
					<tr>
						<td>Course Number</td>
						<td>Course Name</td>
						<td>Instructor</td>
						<td>Theory/Lab</td>
						<td>Status</td>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>CS201</td>
						<td>Computer Science</td>
						<td>james bond</td>
						<td>Theory</td>
						<td><img src="images/check.png" width="16" height="16" alt="images/check"></td>			
					</tr>
					<tr>
						<td>CS221</td>
						<td>Digital Design</td>
						<td>batman</td>
						<td>Theory</td>
						<td><img src="images/check.png" width="16" height="16" alt="images/check"></td>			
					</tr>
					<tr>
						<td>CS202</td>
						<td>Data Structure</td>
						<td>superman</td>
						<td>Lab</td>
						<td><input type="submit" class="styled-button-5" value="Submit" /> </td>
					</tr>
					<tr>
						<td>MA201</td>
						<td>Maths</td>
						<td>spidey</td>
						<td>Theory</td>
						<td><img src="images/check.png" width="16" height="16" alt="images/check"></td>
					</tr>
				</tbody>
		</table>
		</form>
	</div>
 </body>
</html>
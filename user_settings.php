<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");
//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login_pg.php"); die(); }

if(!empty($_POST))
{
	$errors = array();
	$successes = array();
	$password = $_POST["password"];
	$password_new = $_POST["passwordc"];
	$password_confirm = $_POST["passwordcheck"];
	
	$errors = array();
	$email = $_POST["email"];
	
	//Perform some validation
	//Feel free to edit / change as required
	
	//Confirm the hashes match before updating a users password
	$entered_pass = generateHash($password,$loggedInUser->hash_pw);
	
	if (trim($password) == ""){
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}
	else if($entered_pass != $loggedInUser->hash_pw)
	{
		//No match
		$errors[] = lang("ACCOUNT_PASSWORD_INVALID");
	}	
	if($email != $loggedInUser->email)
	{
		if(trim($email) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
		}
		else if(!isValidEmail($email))
		{
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		else if(emailExists($email))
		{
			$errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));	
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			$loggedInUser->updateEmail($email);
			$successes[] = lang("ACCOUNT_EMAIL_UPDATED");
		}
	}
	
	if ($password_new != "" OR $password_confirm != "")
	{
		if(trim($password_new) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD");
		}
		else if(trim($password_confirm) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD");
		}
		else if(minMaxRange(8,50,$password_new))
		{	
			$errors[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50));
		}
		else if($password_new != $password_confirm)
		{
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			//Also prevent updating if someone attempts to update with the same password
			$entered_pass_new = generateHash($password_new,$loggedInUser->hash_pw);
			
			if($entered_pass_new == $loggedInUser->hash_pw)
			{
				//Don't update, this fool is trying to update with the same password Â¬Â¬
				$errors[] = lang("ACCOUNT_PASSWORD_NOTHING_TO_UPDATE");
			}
			else
			{
				//This function will create the new hash and update the hash_pw property.
				$loggedInUser->updatePassword($password_new);
				$successes[] = lang("ACCOUNT_PASSWORD_UPDATED");
			}
		}
	}
	if(count($errors) == 0 AND count($successes) == 0){
		$errors[] = lang("NOTHING_TO_UPDATE");
	}
}

echo '<div id="main">';
echo '<section class ="head1">';
echo 'Change your password';
echo '</section>';
echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);
echo '<section class ="head2">';
echo "
<div id='regbox'>
<form name='updateAccount' action='".$_SERVER['PHP_SELF']."' method='post'>
<p>
<label>Password:</label>
<input type='password' name='password' />
</p>
<p>
<label>Email:</label>
<input type='text' name='email' value='".$loggedInUser->email."' />
</p>
<p>
<label>New Pass:</label>
<input type='password' name='passwordc' />
</p>
<p>
<label>Confirm Pass:</label>
<input type='password' name='passwordcheck' />
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Update' class='styled-button-5' />
</p>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

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
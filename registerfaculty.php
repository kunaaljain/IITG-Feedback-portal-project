<?php
/*
By Kunaal Jain
Copyrighted
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("top.php");
require_once("left.php");

//Prevent the user visiting the logged in page if he/she is already logged in
//if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
	$displayname = trim($_POST["displayname"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	
	

	if(minMaxRange(5,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($username)){
		$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
	}
	if(minMaxRange(5,25,$displayname))
	{
		$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($displayname)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
        $permission_id=3;
		$user = new User($username,$displayname,$password,$email,$permission_id);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$user->userCakeAddUser())
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $user->success;
	}
}

//require_once("models/header.php");

echo '<div id="main">';
echo '<section class ="head1">';
echo 'Add a new faculty:';
echo '</section>';
echo "
<body>
<div id='left-nav'>";
//include("left-nav.php");
echo "
</div>

<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p>
<label>User Name:</label>
<input type='text' name='username' />
</p>
<p>
<label>Display Name:</label>
<input type='text' name='displayname' />
</p>
<p>
<label>Password:</label>
<input type='password' name='password' />
</p>
<p>
<label>Confirm:</label>
<input type='password' name='passwordc' />
</p>
<p>
<label>Email:</label>
<input type='text' name='email' />
</p>
<label>&nbsp;<br>
<input type='submit' value='Register' class='styled-button-5'/>
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
    
  font: bold 1.7em Calibri;  
  
  
}   
.head2 {
    
  font: bold 1.3em Calibri ;
  
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px; 
  margin-bottom: 40px;
  margin-top: 40px;
  
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
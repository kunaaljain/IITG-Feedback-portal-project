<?php
/*
By Kunaal Jain
Copyrighted

*/
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account_pg.php"); die(); }

//Forms posted
if(!empty($_POST))
{
    $errors = array();
    $username = sanitize(trim($_POST["username"]));
    $password = trim($_POST["password"]);

    //Perform some validation
    //Feel free to edit / change as required
    if($username == "")
    {
        $errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
    }
    if($password == "")
    {
        $errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
    }

    if(count($errors) == 0)
    {
        //A security note here, never tell the user which credential was incorrect
        if(!usernameExists($username))
        {
            $errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
        }
        else
        {
            $userdetails = fetchUserDetails($username);
            //See if the user's account is activated
            if($userdetails["active"]==0)
            {
                $errors[] = lang("ACCOUNT_INACTIVE");
            }
            else
            {
                //Hash the password and use the salt from the database to compare the password.
                $entered_pass = generateHash($password,$userdetails["password"]);

                if($entered_pass != $userdetails["password"])
                {
                    //Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
                    $errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
                }
                else
                {
                    //Passwords match! we're good to go'

                    //Construct a new logged in user object
                    //Transfer some db data to the session object
                    $loggedInUser = new loggedInUser();
                    $loggedInUser->email = $userdetails["email"];
                    $loggedInUser->user_id = $userdetails["id"];
                    $loggedInUser->hash_pw = $userdetails["password"];
                    $loggedInUser->title = $userdetails["title"];
                    $loggedInUser->displayname = $userdetails["display_name"];
                    $loggedInUser->username = $userdetails["user_name"];

                    //Update last sign in
                    $loggedInUser->updateLastSignIn();
                    $_SESSION["userCakeUser"] = $loggedInUser;

                    //Redirect to user account page
                    header("Location: account_pg.php");
                    die();
                }
            }
        }
    }
}


?>

<html>
 <head>
 
<div class="logo"><br><img src="images/logo.gif" alt="IITG LOGO" height="200px" width="200px"/></div><section class="heading"><br>INDIAN INSTITUTE OF TECHNOLOGY<br>Guwahati<br> Feedback Portal
</section>


 </head>
<div class="sample3">
    <div class="sea"></div>
</div><section class="login">

	<div class="titulo">Login</div>
    <link rel="stylesheet" type="text/css" href="login.css">
     <form name='login' action="<?php $_SERVER['PHP_SELF'] ?>" method='post'>
    	<input type="text" name='username' required title="Username required" placeholder="Username" data-icon="U">
        <input type="password" name='password' required title="Password required" placeholder="Password" data-icon="x">
        <br><br> <br><br>
         <input type='submit' value='Sign in' class='enviar' />
    </form>

</section>

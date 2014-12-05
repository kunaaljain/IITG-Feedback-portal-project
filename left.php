<?php
/*
By Kunaal Jain
Copyrighted

*/
require_once("models/config.php");
?>

<html>
<head>
   <link rel="stylesheet" href="left.css">

  
</head>


<div id='leftmenu'>
<ul>
    <li><a ><span>Welcome <?php echo $loggedInUser->displayname ?></span></a></li>
    <li><a href='account.php'>Account Home</a></li>


    <?php

    if ($loggedInUser->checkPermission(array(1))&&!$loggedInUser->checkPermission(array(2))){
    echo "
    <li><a href='feedparent.php'>Give Feedback</a></li>
    <li><a href='comment.php'>Give Comments</a></li>
    ";

    }

    if ($loggedInUser->checkPermission(array(2))){
    echo "
        <li><a href='registerfaculty.php'>Add new Faculty</a></li>
        <li><a href='registerstudent.php'>Add new student</a></li>
        <li><a href='addcourse.php'>Add new Course</a></li>
        <li><a href='addcourseprof.php'>Add new Course Faculty</a></li>
        <li><a href='addcoursestudent.php'>Add new Course Student</a></li>
       <!-- <li><a href='admin_configuration.php'>Admin Configuration</a></li>
        <li><a href='admin_users.php'>Admin Users</a></li>
        <li><a href='admin_permissions.php'>Admin Permissions</a></li>
        <li><a href='admin_pages.php'>Admin Pages</a></li> -->
        ";
    }

    if ($loggedInUser->checkPermission(array(3))&&!$loggedInUser->checkPermission(array(2))){
    echo "

        <li><a href='profparent.php'>View feedback</a></li>
        <li><a href='commentparent.php'>View comments</a></li>
        <li><a href='profquestionchild.php'>View feedback for questionnaires</a></li>
        <li><a href='profquestionparent.php'>Set new questionnaire</a></li>
        ";
    }

    ?>

    <li><a href='user_settings.php'>Change Password</a></li>
    <li><a href='logout.php'>Logout</a></li>

</ul>
</div>

</body>
<html>

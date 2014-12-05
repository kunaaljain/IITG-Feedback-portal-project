<?php
/*
By Kunaal Jain
Copyrighted
*/
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
header('location: login_pg.php');

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>UserCake</h1>
<h2>2.00</h2>
<div id='left-nav'>";
include("left-nav.php");

echo "
</div>
<div id='main'>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>

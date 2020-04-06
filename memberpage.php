//memberpage.php
<?php
SESSION_START();

/*
	if(!isset($_SESSION['LoginStatus']))

	or

	if($_SESSION['LoginStatus'])
*/
if(!$_SESSION['LoginStatus'])
{
	header("Location: default.php");
}

?>

<html>
<head>
<title>Member Page</titl>
</head>
<body>
	<h1>Welcome</h1>
	<p>You are on a member page</p>
	<p><a href="default.php">home</a></p>
</body>
</html>

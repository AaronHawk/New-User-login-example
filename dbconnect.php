// dbconnect.php
<?php

try
{
	$pdo = new PDO("mysql:host=localhost;dbname=wp_newuser_demo", 'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo("Good Database Connection<br>");

}
catch(PDOException $e)
{
	echo("***** Database Connection FAILED!!*****<br>");
}
	session_start();

?>

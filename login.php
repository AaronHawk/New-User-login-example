//login.php
<?php
require "dbconnect.php";

if(isset($_POST['usrName'])){

	$sql_stmt = 	"SELECT username, password " .
				"FROM tbl_user " .
				"WHERE username=:usrName";

	//prepare
	$sqlh = $pdo->prepare($sql_stmt);

	//sanitize
	$i_usrName = filter_var($_POST['usrName'],FILTER_SANITIZE_STRING);

	//bind parameters
	$sqlh->bindParam(":usrName", $i_usrName);

	//execute
	$sqlh->execute();

	$result = $sqlh->fetch();
	
	//demo purpose only
	echo($result['password']."<br><br>");

	//save the hashed password
	$hashedPassword = $result['password'];

	//verify the password
	if(password_verify($_POST['usrPwd'], $hashedPassword))
	{
		echo("Password is valid");

		//very important
		//it is the flag we check to see if they are legit
		
		$_SESSION['LoginStatus'] = true;

		//then redirect them to where they need to go
}
else
{
	//in production you would either redirect
	//give error message etc....
echo('<br>*** Username or Password is Invalid ***<br>');
	}

} //if isset

?>

<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="login.php">
		<table border="1">
			<tr>
				<td colspan="2">Login</td>
			</tr>
			<tr>
				<td>Username
				</td>
				<td><input type="text" name="usrName" value="" size="25">
				</td>
			</tr>
			<tr>
				<td>Password
				</td>
				<td><input type="password" name="usrPwd" value="" size="25">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td><input type="submit" value="Enter" name="Enter">
				</td>
			</tr>
		</table>
	</form>

	<p><a href="default.php">Home</a></p>
</body>
</html>

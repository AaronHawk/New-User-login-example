//NewUserRegistration.php
<?php
require "dbconnect.php";
$status_message = "";

if(isset($_POST['username']))
{
	//sql statement
	$sql_stmt = 	"INSERT INTO tbl_user " .
				"(firstname, " .
				"lastname, " .
				"username, " .
				"password) " .
				"VALUES " .
				"(:firstname, " .
				":lastname, " .
				":username, " .
				":password)";

	//prepare
	$sqlh = $pdo->prepare($sql_stmt);

//sanitize the input
$in_firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
$in_lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING); 
$in_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 
$in_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

//hash the password
$in_password = password_hash($in_password, PASSWORD_DEFAULT);  

//bind the parameters
$sqlh->bindparam(":firstname", $in_firstname);
$sqlh->bindparam(":lastname", $in_lastname);
$sqlh->bindparam(":username", $in_username);
$sqlh->bindparam(":password", $in_password);










try
{
	$sqlh->execute();
	$status_message = "User Successfully added";
	//in real you can use the header/location and go to different page
}
catch(PDOException $e)
{
	$status_message = "<br>Failed to add user<br>";
	echo($e->getMessage() . "<br>error code is ".
 $e->getCode() . "<br>");

	if($e->getCode() == 23000)
	{
	echo('<br> ******** user name"'.$_POST['username']
.'" already taken *******<br><br>');
}

	

}



}


?>

<?php echo($status_message); ?>

<div id="newuser">
<form method="POST" action="NewUserRegistration.php">
<table>
	<tbody>
		<tr>
			<td colspan="2">New User</td>
		</tr>
		<tr>
			<td>First Name
			</td>
			<td><input type="text" name="firstname" 
value="joe" size="25">
			</td>
		</tr>
		<tr>
			<td>Last Name
			</td>
			<td><input type="text" name="lastname" 
value="smith" size="25">
			</td>
		</tr>
		<tr>
			<td>User Name
			</td>
			<td><input type="text" name="username" 
value="jsmith" size="25" required>
			</td>
		</tr>
		<tr>
			<td>Password
			</td>
			<td><input type="password" name="password" 
value="hotdog" size="25">
			</td>
		</tr>
		<tr>
			<td>Confirm Password
			</td>
			<td><input type="password" name="password" 
value="hotdog" size="25">
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td><input type="submit" value="Enter" name="newuserenter">
			</td>
		</tr>
	</tbody>
</table>	
</form>

</div>

<br><br>
<a href="default.php">home</a>

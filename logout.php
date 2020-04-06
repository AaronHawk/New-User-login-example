//logout.php
<?php
	SESSION_START();

	//unset destroys the session variable
	//unset totally removes it
	UNSET($_SESSION['LoginStatus']);
	
	//redirect
	header("Location: default.php");
?>

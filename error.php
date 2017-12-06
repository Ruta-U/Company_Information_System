<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<link rel="icon" href="building.png">
</head>
<body style="background-color: yellowgreen; color: white; font-size: 35px">

	<h1>OOPS...</h1>
	<br>
	<div style="text-align: center"> Looks like you've got an error! :(
	<br>
<?php	
	if($_GET['error']=="sign")
	{	echo "This Account or Username already exists.
		<br>
		<br>
		<a href=\"Company.php\" style=\"text-decoration: none;color: gray\">Go Back</a>";
	}
	if($_GET['error']=="mt")
	{	echo "Please fill in all the details.
		<br>
		<br>
		<a href=\"Company.php\" style=\"text-decoration: none;color: gray\">Go Back</a>";
	}
	if($_GET['error']=="login")
	{	echo "You've entered a wrong Username/Password.
		<br>
		<br>
		<a href=\"Company.php\" style=\"text-decoration: none;color: gray\">Go Back</a>";
	}	
	if($_GET['error']=="upd")
		echo "There was a problem in updating your details.";
?>
	</div>

</body>
</html>

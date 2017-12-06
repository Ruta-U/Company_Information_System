<?php

	include('conn.php');	

	if(isset($_POST['submit']))
	{
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$error = "Username or Password is Invalid";
		}
	}

	$username=$_POST['username'];
	$password=$_POST['password'];


	$result = mysqli_query($conn,"SELECT * FROM login WHERE username='$username' AND password ='$password'"); 
	// die("Failed to query database ".mysql_error());
	
	$row = mysqli_num_rows($result);
	
	if($row==1) 
	{  
	header("Location:welcome.php?name=$username");
	}

	else {
	header("Location:error.php?error=login");
	}
?>

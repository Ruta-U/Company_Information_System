<?php 

include('conn.php');

if(isset($_POST['submit']))
{
 if(empty($_POST['username']) && empty($_POST['password']) && empty($_POST['usn']) && empty($_POST['email']) && empty($_POST['cgpa']) && empty($_POST['dept']) && empty($_POST['last_name']) && empty($_POST['first_name']))
 {
    	header("Location:error.php?error=mt");
 }
}

$USN = $Email = $username = $password = $cgpa = $dept = "";

$USN = $_POST['usn'];
$Email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cgpa = $_POST['cgpa'];
$dept = $_POST['dept'];
$lname = $_POST['last_name'];
$fname = $_POST['first_name'];



//TRIGGER 

$trig = " CREATE TRIGGER `trig` BEFORE INSERT ON `student_details` FOR EACH ROW set NEW.first_name = UPPER(NEW.first_name), NEW.last_name = UPPER(NEW.last_name)";
mysqli_query($trig,$conn);

$sql1 = "INSERT INTO `student_details` (`usn`, `first_name`, `last_name`, `dept`,`cgpa`,`username`, `password`) VALUES ('$USN', '$fname', '$lname', '$dept', '$cgpa', '$username', '$password')";


//STORED PROCEDURE
$sql = "call insert_login('$USN', '$username', '$password', '$Email')";


if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
	header("Location:login.php");
   // echo "New record created successfully";
} else {
	header("Location:error.php?error=sign");
 // echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

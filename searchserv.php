<?php
	include('conn.php');

if(isset($_POST['submit']))
{
 if(empty($_POST['USN']) || empty($_POST['cgpa']) || empty($_POST['dept']) || empty($_POST['last_name']) || empty($_POST['first_name']))
 {
    $error = "Data is Invalid";
 }
}
$USN = $cgpa = $dept = "";

$USN = $_POST['USN'];
$cgpa = $_POST['cgpa'];
$dept = $_POST['dept'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];

//TRIGGER
$trig = " CREATE TRIGGER `trig1` BEFORE UPDATE ON `student_details` FOR EACH ROW set NEW.first_name = UPPER(NEW.first_name), NEW.last_name = UPPER(NEW.last_name)";
mysqli_query($trig,$conn);

//STORED PROCEDURE
$sql = "call update_student('$USN', '$fname', '$lname', '$cgpa', '$dept')";

$fnam = mysqli_fetch_assoc(mysqli_query($conn,"SELECT first_name FROM student_details WHERE USN='$USN'")); 
$lnam = mysqli_fetch_assoc(mysqli_query($conn,"SELECT last_name FROM student_details WHERE USN='$USN'")); 
$fname = $fnam['first_name'];
$lname = $lnam['last_name'];

if($conn->query($sql) == TRUE) {
	header("Location:welcome.php?fn=$fname&ln=$lname");
} else {
	header("Location:error.php?error=upd");
//echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

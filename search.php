<!DOCTYPE html>
<html>
<head>
  <title>Edit Details</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="welcome.css">
  <link rel="icon" href="building.png">
  <style>
    #frm{
    width:37%;
    height:60%;
  }
  </style>
</head>
<body>
<div class="flex-container">

<?php
	include('conn.php');
	$fname = "";
	$lname = "";		
	if(isset($_GET['fn']) && isset($_GET['ln'])) {
		$fname = $_GET['fn'];
		$lname = $_GET['ln'];
		echo "<div class=\"log\">WELCOME &nbsp".$fname." ".$lname."!&nbsp|&nbsp<a href=\"Company.php\">LOG OUT</a></div> "; 
 
	}
	
echo "
<nav class=\"nav\">
<ul>
  <div class=\"titl\">
  <a href=\"Company.php\" style=\"color: black\">
  <li>COMPANY</li>
  <li>INFORMATION</li>
  <li>SYSTEM</li>
  </a>
  </div>
  <br>
  <br>
  <br>
  <hr>
  <li><a href=\"welcome.php?fn=$fname&ln=$lname\">Company Information</a></li>
  <hr>
  <li><a href=\"eligible.php?fn=$fname&ln=$lname\">Eligible Companies</a></li>
  <hr>
  <li><a href=\"search.php?fn=$fname&ln=$lname\">Edit Details</a></li>
  <hr>
</ul>
</nav> 
";
 $sql = "SELECT * FROM `student_details` where `first_name`='$fname'" ;
 $result = $conn->query( $sql );
echo "       
<div class=\"art\">
  <h1 style=\"color: yellowgreen\">Edit Details</h1>
<div id=\"frm\">

<form action=\"searchserv.php\" method=\"post\">
";
while( $row=mysqli_fetch_assoc($result)){ 
        echo "<table><tr><th>USN\t</th><td><input type=\"text\" id=\"USN\" name=\"USN\" value=\"".$row['USN']."\" readonly></td></tr>
	      <tr><th>First name\t</th><td><input type=\"text\" id=\"fname\" name=\"fname\" value=\"".$row['first_name']."\"></td></tr>
              <tr><th>Last name\t</th><td><input type=\"text\" id=\"lname\" name=\"lname\" value=\"".$row['last_name']."\"></td></tr>
              <tr><th>Department\t</th><td><select id=\"dept\" name=\"dept\"><option value=\"".$row['dept']."\">".$row['dept']."</option><option value=\"ECE\">ECE</option><option value=\"ISE\">ISE</option><option value=\"CSE\">CSE</option><option value=\"ME\">ME</option>
            </select></td></tr>
              <tr><th>CGPA\t</th><td><input type=\"text\" id=\"cgpa\" name=\"cgpa\" value=\"".$row['cgpa']." \"></td></tr></table>";
    }
    mysqli_free_result($result);

?>
<p>
<button type="submit" name="submit" id="bttn" value="Login" style="padding: 15px 28px 15px 28px"> Go </button>
</p>
<br>
</form>


</div>  
</div>
</div>


</body>
</html>

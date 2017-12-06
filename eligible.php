<!DOCTYPE html>
<html>
<head>
  <title>Eligible Companies</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="welcome.css">
  <link rel="icon" href="building.png">
</head>
<body>
<div class="flex-container">
<?php
	$fname = "";
	$lname = "";		
	if(isset($_GET['fn']) && isset($_GET['ln'])) {
		$fname = $_GET['fn'];
		$lname = $_GET['ln'];
		echo "<div class=\"log\">WELCOME &nbsp".$fname." ".$lname."!&nbsp|&nbsp<a href=\"Company.php\">LOG OUT</a></div> "; 
 
	}
?>	
<nav class="nav">
<ul>
  <div class="titl">
  <a href="Company.php" style="color: black">
  <li>COMPANY</li>
  <li>INFORMATION</li>
  <li>SYSTEM</li>
  </a>
  </div>
  <br>
  <br>
  <br>
  <hr>

<?php 
echo "<li><a href=\"welcome.php?fn=$fname&ln=$lname\">Company Information</a></li>
      <hr>
      <li><a href=\"eligible.php?fn=$fname&ln=$lname\">Eligible Companies</a></li>
      <hr>
      <li><a href=\"search.php?fn=$fname&ln=$lname\">Edit Details</a></li>"
?>

  <hr>
</ul>
</nav> 
<div class="art">
  <h1 style="color: yellowgreen">Eligible Companies</h1>
</div>
<div class="tab">
  <button class="tablinks" onclick="openC(event, 'company_contact')" id="defaultOpen">Company_Contact</button>
  <button class="tablinks" onclick="openC(event, 'company_details')">Company_Details</button>
  <button class="tablinks" onclick="openC(event, 'company_req')">Company_Requirements</button>
</div>

<div id="company_contact" class="tabcontent">
<div id="frm">
<table>
  <tr>
    <th>Company</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Website</th>
  </tr>
<?php
   include('conn.php');
   $de = mysqli_fetch_assoc(mysqli_query($conn,"SELECT dept FROM student_details WHERE first_name='$fname'")); 
   $d = $de['dept'];
   $a = "YES";
  $result = mysqli_query($conn,"SELECT c.`c_name`,c.`c_phn`,c.`address`,c.`website` FROM `company_contact` c, `student_details` s, `company_req` r WHERE s.`first_name`='$fname' AND c.`c_name`=r.`c_name` and r.`cutoff`<=s.`cgpa` and r.".$d."='$a'"); 

  while( $row=mysqli_fetch_assoc($result)){ 
        echo "<tr><td>" .$row['c_name']. "</td>
              <td>" .$row['c_phn']. "</td>
              <td>" .$row['address']. "</td>
              <td>" .$row['website']. "</td>
              </tr>";
    }
    mysqli_free_result($result);
?>

</table>
</div>  
</div>

<div id="company_details" class="tabcontent">
  <div id="frm">
<table>
  <tr>
    <th>Company</th>
    <th>Domain/Industry</th>
    <th>Type</th>
  </tr>

<?php
  include('conn.php');
   $de = mysqli_fetch_assoc(mysqli_query($conn,"SELECT dept FROM student_details WHERE first_name='$fname'")); 
   $d = $de['dept'];
   $a = "YES";   
$result = mysqli_query($conn,"SELECT c.`c_name`,c.`c_domain`,c.`c_type` FROM `company_details` c, `student_details` s, `company_req` r WHERE s.`first_name`='$fname' AND c.`c_name`=r.`c_name` and r.`cutoff`<=s.`cgpa`and r.".$d."='$a'"); 
  while( $row=mysqli_fetch_assoc($result)){ 
        echo "<tr><td>" .$row['c_name']. "</td>
              <td>" .$row['c_domain']. "</td>
              <td>" .$row['c_type']. "</td>
              </tr>";
    }
    mysqli_free_result($result);
?>

</table>
</div>  
</div>

<div id="company_req" class="tabcontent">
<div id="frm">
<table>
  <tr>
    <th>Company</th>
    <th>Cut-Off</th>
    <th>Tier</th>
    <th>ECE</th>
    <th>ISE</th>
    <th>CSE</th>
    <th>ME</th>
  </tr>

<?php
  include('conn.php');
   $de = mysqli_fetch_assoc(mysqli_query($conn,"SELECT dept FROM student_details WHERE first_name='$fname'")); 
   $d = $de['dept'];
   $a = "YES";
   $result = mysqli_query($conn,"SELECT r.`c_name`,r.`cutoff`,r.`tier`,r.`ece`,r.`ise`,r.`cse`,r.`me` FROM `company_req` r, `student_details` s  WHERE s.`first_name`='$fname' AND r.`c_name`=r.`c_name` and r.`cutoff`<=s.`cgpa` and r.".$d."='$a'"); 
  while( $row=mysqli_fetch_assoc($result)){ 
        echo "<tr><td>" .$row['c_name']. "</td>
              <td>" .$row['cutoff']. "</td>
              <td>" .$row['tier']. "</td>
              <td>" .$row['ece']. "</td>
              <td>" .$row['ise']. "</td>
              <td>" .$row['cse']. "</td>
              <td>" .$row['me']. "</td>
              </tr>";
    }
    mysqli_free_result($result);
?>

</table>
</div>  

</div>


</div>

<script>
function openC(evt, cName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="icon" href="building.png">
</head>
<body>
      <br>
      <h1>Company Information System</h1>
      <div id="frm" style="margin-top: 5%">
      <br>
       <form action="signupserv.php" method="post">
          <table style="text-align: left">
          <tr>
          <td>
              <label>USN:</label>
          </td>
          <td><input type="text" id="usn" name="usn"></td>
        </tr>
        <tr>
          <td>
              <label>First Name:</label>
          </td>
          <td><input type="text" id="first_name" name="first_name"></td>
        </tr>
        <tr>
          <td>
              <label>Last Name:</label>
          </td>
          <td><input type="text" id="last_name" name="last_name"></td>
        </tr>
        <tr>
          <td>
              <label>Email:</label>
          </td>
          <td><input type="text" id="email" name="email"></td>
        </tr>
        <tr>
          <td>
              <label>Department:</label>
          </td>
          <td><select id="dept" name="dept">
              <option value=""></option>
              <option value="ECE">ECE</option>
              <option value="ISE">ISE</option>
              <option value="CSE">CSE</option>
              <option value="ME">ME</option>
          </select></td>
        </tr>
        <tr>
          <td>
              <label>CGPA:</label>
          </td>
          <td>
              <input type="text" id="cgpa" name="cgpa">
          </td>
        </tr>
        <tr>
          <td>       
              <label>Username:</label>
          </td>
          <td>
              <input type="text" id="username" name="username">
          </td>
        </tr>
        <tr>
          <td>       
              <label>Password:</label>
          </td>
          <td>
              <input type="password" id="password" name="password">
          </td>
        </tr>
        </table>
          <br>
          <p>
              <input type="submit" name="submit" id="bttn" value="login" style="padding: 15px 28px 15px 28px">
          </p>
        </form>
              
      </div>

</body>
</html>

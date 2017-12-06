
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="icon" href="building.png">
</head>
<body>
      <br>
      <h1>Company Information System</h1>
      <div id="frm" >
       <form action="loginserv.php" method="post">
       <table style="text-align: left">
       <tr>
          <td>
              <label>Username:</label>
          </td>
          <td><input type="text" id="username" name="username">
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
          <br>
              <button type="submit" name="submit" id="bttn" value="Login" style="padding: 15px 28px 15px 28px"> Login </button>
          </p>
        </form>
              
      </div>



</body>
</html>

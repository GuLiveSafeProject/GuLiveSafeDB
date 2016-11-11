<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<center>
<h4>Login Form</h4>
<form action="login.php" method="post">
  Email Id<br>
  <input type="text" name="email" >
  <br>
  Password<br>
  <input type="text" name="password" >
  <br><br>
  <input type="submit" value="Submit">
</form>
<center>
</body>
</html>


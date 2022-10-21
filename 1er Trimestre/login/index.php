<?php
session_start(); 
echo $_SESSION["usuario"];
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
  </head>
  <body>
  <form method="post" action="login.php" name="login_inicio">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="usuario" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="contra" required />
    </div>
    <button type="submit" name="register" value="register">Register</button>
</form>
  </body>
</html>
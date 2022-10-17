<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
  </head>
  <body>
  <form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="register" value="register">Register</button>
</form>
  </body>
</html>
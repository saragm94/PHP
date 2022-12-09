<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<form method="post" action="login_check.php" name="login_inicio">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="usuario" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="contra" required />
    </div>
    <button type="submit" name="register" value="register">Enter</button>
</form>
<?php include'../inc/piedepagina.inc'?>
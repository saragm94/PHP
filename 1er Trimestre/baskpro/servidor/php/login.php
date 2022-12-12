<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<div class='d-flex aligns-items-center justify-content-center'>
    <table>
    <form method="post" action="login_check.php" name="login_inicio">
        <tr>
            <div class="form-element">
                <th><label>Username</label></th>
                <th><input type="text" name="usuario" required /></th>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <th><label>Password</label></th>
                <th><input type="password" name="contra" required /></th>
            </div>
        </tr>
        <tr>
            <th></th>
            <th><button type="submit" name="register" value="register">Enter</button><button type="submit" name="register" value="register" onclick=''>Register</button></th>
        </tr>
        </form>
    </table>
</div>
<?php include'../inc/piedepagina.inc'?>
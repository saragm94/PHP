<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<div class='d-flex aligns-items-center justify-content-center'>
        <table>
            <form method='post' action='admin/add_user.php' name='add_team' enctype='multipart/form-data'>
            <tr>
                <div class='form-element'>
                    <td><label>Username:</label></td>
                    <td><input type='text' name='username' required /></td>
                </div>     
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Password:</label></td>
                    <td><input type='password' name='pass' required /></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><button type='submit' name='register' value='register'>Add user</button></td>
            </tr>
            </form>
        </table>
    </div>
    <?php include'../inc/piedepagina.inc'?>
<?php include'../../inc/connect.inc'?>
<?php
function limpiar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    $username = limpiar($_POST['username']);
    $pass = limpiar($_POST['pass']);

    $pass = hash('sha256', $pass);

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = "INSERT INTO users (username, pass) VALUES 
    ('$username','$pass');";
    $conn->exec($res);
    header("location: ../login.php");
?>
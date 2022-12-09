<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<?php
$user = $_POST["usuario"];
$pass = $_POST["contra"];
$result='';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pass = hash('sha256', $pass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consult = $conn->query("SELECT * FROM users WHERE username like '$user' AND pass like '$pass'");
    while($fila = $consult -> fetch(PDO::FETCH_ASSOC))
    {
        $role = $fila['role'];
        $_SESSION['username'] = $fila['username'];
        $_SESSION['role'] = $fila['role'];
        header("Location:admin.php");
    }
}
?>
<?php include'../inc/connect.inc'?>
<?php
session_start();
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
        header("Location:admin.php");
    }
}
?>
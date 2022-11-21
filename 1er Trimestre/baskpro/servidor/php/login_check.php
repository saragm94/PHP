<?php
session_start();
$usuario = $_POST["usuario"];
$contra = $_POST["contra"];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    limpiar($_POST["usuario"], $_POST["contra"]);
}
function limpiar($usuario, $contra) 
{
    $usuario = trim($usuario);
    $usuario = stripslashes($usuario);
    $usuario = htmlspecialchars($usuario);

    $contra = trim($contra);
    $contra = stripslashes($contra);
    $contra = htmlspecialchars($contra);

    global $usuario;
    global $contra;

    $validos['sara']="1234";
    $validos['invitado'] = "12345";

    foreach ($validos as $key => $value)
    {
        if($key == $usuario && $value == $contra)
        {
            echo "usuario y contraseñas correctos </br>";
            $usuario_valido = $key;
            $contra_valida = $contra;
            $_SESSION['usuario']=$key;
            $_SESSION['contrasena']=$contra;
            header("Location:admin.php");
        }
    }
    
}
?>
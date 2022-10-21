<?php
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function comprobar()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre = test_input($_POST['nombre');
        $apellidos = test_input($_POST['apellidos']);
        $edad = test_input($_POST['edad']);
        $peso = test_input($_POST['peso']);
        $nombre = test_input($_POST['nombre']);
        $telefono = test_input($_POST['telefono']);
        $web = test_input($_POST['web']);
    }
}

?>
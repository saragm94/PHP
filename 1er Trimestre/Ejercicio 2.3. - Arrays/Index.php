<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>2.3 Arrays</title>
  </head>
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
                header("Location:menu.php");
            }
        }
    }
  ?>
  <body>
    <div>
      <form method="post" action="" name="login_inicio">
        <div class="form-element">
            <label>Username</label>
            <input type="text" name="usuario" required />
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="contra" required />
        </div>
        <button type="submit">Login</button>
        <button onclick="registrar()" >Register</button>
      </form>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario html - php</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $sueldo = $_POST['sueldo'];
    $ipc = $_POST['ipc'];
    $color = $_POST['color'];
    echo '<body bgcolor=" ' . $color . ' ">';
    echo "<div><h1>Bienvenid@</h1><p>Bienvenid@ <u>" . $nombre . $apellido ."</u></p><p>Este año tienes <u>" . $edad . "</u> años y dentro de 5 años tendrás <u>" . ($edad + 5) . "</u> años</p>";
    echo "<p>Tu sueldo es: <u>" . $sueldo . "</u> y tu sueldo el año que viene es de <u>" . ($sueldo+($sueldo*($ipc/100))) . "</u></p></div>"
    ?>
    </body>
</html>
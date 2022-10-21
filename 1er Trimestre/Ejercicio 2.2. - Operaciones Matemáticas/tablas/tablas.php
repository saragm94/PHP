<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tablas</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
    $num = $_POST['num'];
    $op = $_POST['op'];
    switch ($op)
    {
        case "una":
            echo '<h4>Tabla de multiplicar del ' . ($num) .' </h4>';
            for($i = 1; $i <= 10; $i++)
            {
                echo '<p>'.$num.' x '.$i.' = '$num*$i'</p>';
            }
            break;
        case "todas":
            for($j = 1; $j <= 10; $j++)
            {
                echo '<h4>Tabla de multiplicar del ' . ($j) .' </h4>';
                for($i = 1; $i <= 10; $i++)
                {
                    echo '<p>'.$j.' x '.$i.' = '$j*$i'</p>';
                }
            }
            echo '</br>';
            break;
    }
    ?>
    </body>
</html>
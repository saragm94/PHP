<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op = $_POST['op'];
    switch ($op)
    {
        case "sum":
            echo '<p>La suma es: ' . ($num1 + $num2) .' </p>';
            break;
        case "res":
            echo '<p>La resta es: ' . ($num1 - $num2) .' </p>';
            break;
        case "mul":
            echo '<p>La multiplicación es: ' . ($num1 * $num2) .' </p>';
            break;
        case "div":
            echo '<p>La división es: ' . ($num1 / $num2) .' </p>';
            break;
        case "resto":
            echo '<p>El resto es: ' . ($num1 % $num2) .' </p>';
            break;
    }
    ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Par o impar</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
    $numero = $_POST['numero'];
    if($numero%2==0)
    {
        echo '<p>El número es par</p>';
    }else{
        echo '<p>El número es impar</p>';
    }
    ?>
    </body>
</html>
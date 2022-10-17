<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
        $tope = $_POST["tope"];
        $array_pares = array();
        $i = 1;
        do
        {
            while($i <= $tope)
            {
                if($i%2==0)
                {
                    echo"<p>hola</p>";
                    $i++;
                }
            }
        }
    ?>
    </body>
</html>
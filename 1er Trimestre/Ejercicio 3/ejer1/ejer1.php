<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="css/stylephp.css">
  </head>
  <body>
    <?php 
        //Almacenar en un vector asociativo la cantidad de dias que tiene
        //cada mes del año. Luego accederlo por su nombre como subindice.
        $mes['enero']=31;
        $mes['febrero']=29;
        $mes['marzo']=31;
        $mes['abril']=30;
        $mes['mayo']=31;
        $mes['junio']=30;
        $mes['julio']=31;
        $mes['agosto']=31;
        $mes['septiembre']=30;
        $mes['octubre']=31;
        $mes['noviembre']=30;
        $mes['diciembre']=31;
        echo "Enero tiene:".$mes['enero']."<br>";
        echo "Agosto tiene:".$mes['agosto']."<br>";
        echo "Septiembre tiene:".$mes['septiembre']."<br>";
    ?>
    </body>
</html>
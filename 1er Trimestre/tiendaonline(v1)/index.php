<?php include'php/cabecera.inc'?>
<?php include'php/connect.inc'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
    mysqli_set_charset($connect, "utf8");
    $peticion = "select * from productos where existencias > 0";
    $resultado = mysqli_query($connect,$peticion);
    while($fila = mysqli_fetch_array($resultado))
    {
        echo "<h3>".$fila['nombre']."</h3>";
        echo "<p>".$fila['descripcion']."</p>";
        echo "<p>Precio: ".$fila['precio']."</p>";
        echo "</br>";
    }
?>
<?php include'php/piedepagina.inc'?>

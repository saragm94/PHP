<?php include'php/cabecera.inc'?>
<?php include'php/connect.inc'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conn->query("SELECT * FROM productos WHERE existencias > 0");
    while($fila = $resultado -> fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
        $img = $conn->query("SELECT imagen FROM imagenesproductos WHERE idproducto = $id group by idproducto");
        while($fila2 = $img -> fetch(PDO::FETCH_ASSOC))
        {
            echo "<div class='col'>
                <a href='php/producto.php?id='".$id."'class='text-decoration-mpme text-reset'>
                    <div class='card'>
                        <img src='photo/".$fila2['imagen']."'class='card-img-top' alt='photo/'".$fila2['imagen']."'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>".$fila['nombre']."</h5>
                            <p class='card-text'>".$fila['precio']."</p>
                        </div>
                        <div class='card-footer'>
                            <a href='php/producto.php?id='".$id."'class='text-decoration-mpme text-reset'>Comprar</a>
                        </div>
                    </div>
            </div>";
        }
    }
}catch(PDOException $e)
{
    echo $resultado."</br>". $e ->getMensage();
}
?>
<?php include'php/piedepagina.inc'?>

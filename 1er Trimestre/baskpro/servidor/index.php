<?php include'inc/cabecera.inc'?>
<?php include'inc/connect.inc'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
$resultado = '';
try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conn->query("SELECT * FROM teams");
    while($fila = $resultado -> fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
        //$img = $conn->query("SELECT imagen FROM imagenesproductos WHERE idproducto = $id group by idproducto");
        //while($fila2 = $img -> fetch(PDO::FETCH_ASSOC))
        //{
            echo "<div class='col'>
                <a href='php/teams.php?id=".$id."'class='text-decoration-mpme text-reset'>
                    <div class='card'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>".$fila['full_name']."</h5>
                            <p class='card-text'>".$fila['city']."</p>
                        </div>
                        <div class='card-footer'>
                            <a href='php/teams.php?id=".$id."'class='text-decoration-mpme text-reset'>Watch</a>
                        </div>
                    </div>
            </div>";
        //}
    }
}catch(PDOException $e)
{
    echo $resultado."</br>". $e ->getMessage();
}
?>
<?php include'inc/piedepagina.inc'?>
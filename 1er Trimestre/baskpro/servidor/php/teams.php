<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<link rel="stylesheet" href="../css/style.css">
<?php 
$resultado = '';
try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conn->query("SELECT * FROM teams where active = 1 ");
    echo"
    <div class='py-4'>
        <div class='container'>
            <div class='row hidden-md-up d-flex justify-content-center'>
    ";
    while($fila = $resultado -> fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
        $img = $conn->query("SELECT logo FROM teams WHERE id = $id");
        while($fila2 = $img -> fetch(PDO::FETCH_ASSOC))
        {
            echo "
                <div class='card mx-2 mt-2 col-12 col-md-3''>
                    <div class='card-block text-center'>
                        <img id='logo' src='../teams/".$fila2['logo']."'class='card-img-top mx-auto ' alt=''".$fila2['logo']."'>
                        <div class='card-body'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>".$fila['full_name']."</h5>
                                <p class='card-text'>".$fila['city']."</p>
                            </div>
                            <div class='card-footer text-center'>
                                <a href='../php/team.php?id=".$id."'class='text-decoration-mpme text-reset'>Details</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
    }
    echo"
            </div>
        </div>
    </div>";
}catch(PDOException $e)
{
    echo $resultado."</br>". $e ->getMessage();
}
?>
<?php include'../inc/piedepagina.inc'?>
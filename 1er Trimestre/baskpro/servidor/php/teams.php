<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php 
    $id = $_GET['id'];
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res = $conn->query("SELECT * FROM teams WHERE id=$id");
    while($fila = $res -> fetch(PDO::FETCH_ASSOC))
    {
        $img = $conn->query("SELECT logo FROM teams WHERE id = $id");
        while($fila2 = $img -> fetch(PDO::FETCH_ASSOC))
        {

            echo "<div class='col'>
                    <div class='card'>
                        <img id='logo' src='".$fila2['logo']."'class='card-img-top mx-auto ' alt=''".$fila2['logo']."'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>".$fila['full_name']." - ".$fila['abbreviation']."</h5>
                            <p class='card-text'>".$fila['city']." - ".$fila['state']."</p>
                            <p class='card-text'>".$fila['year_founded']."</p>
                        </div>
                    </div>
            </div>";
        }
    }    
?>
<?php include'../inc/piedepagina.inc'?>
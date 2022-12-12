<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<link rel="stylesheet" href="../css/style.css">
<?php 
$resultado = '';
try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conn->query("SELECT * FROM matches order by match_day desc ");
    echo"
    <div class='py-4'>
        <div class='container-fluid'>
    ";
    while($fila = $resultado -> fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
        $id_l = $fila['id_local_team'];
        $id_v = $fila['id_visit_team'];
        echo"
        <div class='row border d-flex justify-content-center text-center mt-5 mx-5'>";
            
            $local = $conn->query("SELECT * FROM teams inner join matches on matches.id_local_team = teams.id where teams.id like $id_l order by match_day desc limit 1");
            $visit = $conn->query("SELECT * FROM teams inner join matches on matches.id_visit_team = teams.id where teams.id like $id_v order by match_day desc limit 1");
            while($fila2 = $local -> fetch(PDO::FETCH_ASSOC))
            {
                $rank_l =  $conn->query("SELECT * FROM ranking WHERE id_team like $id_l");
                echo"
                <div class='col-lg-2 col-sm-4'>
                    <img id='logo' src='".$fila2['logo']."'class='card-img-top mx-auto ' alt=''".$fila2['logo']."'>
                    <p class='mt-2'>".$fila2['abbreviation']."</p>
                </div>";
            }
                echo"
                <div class='row col-2 col-md-4 col-lg-2 col-sm-4 align-self-center d-flex'>
                    <div class='col fs-1 align-self-center order-0'>".$fila['local_points']."</div>
                    <div class= 'col fs-1 align-self-center order-2 order-sm-1'>".$fila['visit_points']."</div>
                    <p class='align-self-center order-xs-1 order-2 d-none d-sm-block'>".$fila['match_day']."</p>
                </div>
                ";
            while($fila3 = $visit -> fetch(PDO::FETCH_ASSOC))
            {
                echo"
                <div class='col-lg-2 col-sm-4'>
                    <img id='logo' src='".$fila3['logo']."'class='card-img-top mx-auto ' alt=''".$fila3['logo']."'>
                    <p class='mt-2'>".$fila3['abbreviation']."</p>
                </div>
                ";
            }
            echo"
        </div>";
        $img = $conn->query("SELECT logo FROM teams WHERE id = $id");
        while($fila2 = $img -> fetch(PDO::FETCH_ASSOC))
        {
            
        }
    }
    
    echo"
        </div>
    </div>";
}catch(PDOException $e)
{
    echo $resultado."</br>". $e ->getMessage();
}
?>
<?php include'../inc/piedepagina.inc'?>
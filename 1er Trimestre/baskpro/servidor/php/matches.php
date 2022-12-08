<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<link rel="stylesheet" href="../css/style.css">
<?php 
$resultado = '';
try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conn->query("SELECT * FROM matches order by match_day desc");
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
                <div class='col-2 border'>
                    <img id='logo' src='".$fila2['logo']."'class='card-img-top mx-auto ' alt=''".$fila2['logo']."'>
                    <p class='mt-2'>".$fila2['abbreviation']."</p>
                </div>";
            }
                echo"
                <div class='row col-2 align-self-center'>
                    <div class='col border fs-1 align-self-center'>".$fila['local_points']."</div>
                    <div class= 'col border fs-1 align-self-center'>".$fila['visit_points']."</div>
                    <p class='align-self-center'>".$fila['match_day']."</p>
                </div>
                ";
            while($fila3 = $visit -> fetch(PDO::FETCH_ASSOC))
            {
                echo"
                <div class='col-2 border'>
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
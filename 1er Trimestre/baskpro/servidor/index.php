<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Basket League</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <header>

    </header>
    <!--NAV-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Basket League</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="php/matches.php">Matches</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="php/teams.php">Teams</a>
                    </li>
                    <!--<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Players</a>
                    </li>-->
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="php/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php include'inc/connect.inc'?>
<link rel="stylesheet" href="css/style.css">
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
                <div class='col-3 border align-center'>
                    <p><b>".$fila2['full_name']."</b></p>
                    <table class='table'>
                        <thead>
                            <th>Team</th>
                            <th>Victories</th>
                            <th>Loses</th>
                            <th>Total matches</th>
                            <th>Win %</th>
                        </thead>
                    </table>
                </div>
                <div class='col-2 border'>
                    <img id='logo' src='servidor/".$fila2['logo']."'class='card-img-top mx-auto ' alt=''".$fila2['logo']."'>
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
                    <img id='logo' src='servidor/".$fila3['logo']."'class='card-img-top mx-auto ' alt=''".$fila3['logo']."'>
                    <p class='mt-2'>".$fila3['abbreviation']."</p>
                </div>
                <div class='col-3 border'>
                    <p><b>".$fila3['full_name']."</b></p>
                    <table class='table'>
                        <thead>
                            <th>Team</th>
                            <th>Victories</th>
                            <th>Loses</th>
                            <th>Total matches</th>
                            <th>Win %</th>
                        </thead>
                    </table>
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
<?php include'inc/piedepagina.inc'?>
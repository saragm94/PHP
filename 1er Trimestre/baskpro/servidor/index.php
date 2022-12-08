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
                    <a class="nav-link active" aria-current="page" href="#">Matches</a>
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
        <div class='container'>
    ";
    while($fila = $resultado -> fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
        $local = $conn->query("SELECT * FROM teams inner join matches on matches.id_local_team = teams.id WHERE id = $id");
        $visit = $conn->query("SELECT * FROM teams inner join matches on matches.id_visit_team = teams.id WHERE id = $id");
        echo"
        <div class='row border d-flex justify-content-center text-center mt-5'>
            <div class='col-2 border align-center'>Local</div>
            <div class='col-8 border row'>";
            while($fila2 = $local -> fetch(PDO::FETCH_ASSOC))
            {
                echo"<div class='col-4 border'><b>".$fila2['full_name']."</b></div>";
            }
                echo"
                <div class='col-2 border'>".$fila['local_points']."</div>
                <div class='col-2 border'>".$fila['local_points']."</div>";
            while($fila3 = $visit -> fetch(PDO::FETCH_ASSOC))
            {
                echo"<div class='col-4 border'><b>".$fila3['full_name']."</b></div>";
            }
            echo"
            </div>
            <div class='col-2 border'>Visitante</div>
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
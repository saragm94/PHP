<?php include'session.inc'?>
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
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../php/matches.php">Matches</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../php/teams.php">Teams</a>
                    </li>
                    <?php
                        $username = $_SESSION["username"];
                        $role = $_SESSION["role"];
                        if(is_null($username))
                        {
                            echo"
                            <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='../php/login.php'>Login</a>
                            </li>";
                        }
                        if(!is_null($username))
                        {
                            $username = $_SESSION["username"];
                            $role = $_SESSION["role"];
                            echo"
                            <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='../php/close_session.php'>".$username."</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='../php/close_session.php'>Close session</a>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
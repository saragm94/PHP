<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<link rel="stylesheet" href="../css/style.css">
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
    //RANKING TABLE
        echo "<div class='row'>
                    <div class ='col d-flex justify-content-center'>
                        <div class='col-4 d-flex justify-content-center'>
                        <table class='table'>
                            <thead>
                                <tr>
                                <th scope='col'>Team</th>
                                <th scope='col'>Victories</th>
                                <th scope='col'>Loses</th>
                                <th scope='col'>Total matches</th>
                                <th scope='col'>Win %</th>
                                </tr>
                            </thead>
                            
                            <tbody>";
                            $res2 = $conn->query("SELECT teams.full_name, victory, lose, total_matches, ranking.id, percentage 
                            FROM ranking 
                            inner join teams on teams.id = ranking.id_team 
                            inner join leagues on leagues.id = teams.league 
                            where leagues.id like ".$fila['league']." 
                            ORDER BY `percentage` desc ");
                            while($fila3 = $res2 -> fetch(PDO::FETCH_ASSOC))
                            {
                                if($fila3['id'] == $fila['id'])
                                {
                                    echo"
                                    <tr style='background-color:rgba(75, 192, 192,0.3)'>";
                                }
                                if($fila3['id'] != $fila['id'])
                                {
                                    echo"<tr>";
                                }
                                echo"
                                        <th scope='row'>".$fila3['full_name']."</th>
                                        <td>".$fila3['victory']."</td>
                                        <td>".$fila3['lose']."</td>
                                        <td>".$fila3['total_matches']."</td>
                                        <td>".$fila3['percentage']."%</td>
                                    </tr>";
                            }
                            echo"
                            </tbody>
                            </table>
                        </div>
                    </div> 
                    <div class ='col-6 d-flex justify-content-center'>
                        <div class='container'>
                            <canvas id='points_chart' style='max-width:500px max-heigth:300px'></canvas>
                            <script>
                                var x_local_points= [];
                                var x_visit_points = [];
                                var y_dates = []; 
                                var puntos_arr = [];";
                            $local_t = $conn->query("SELECT * FROM matches WHERE id_local_team = $id");
                            while($local_p = $local_t->fetch(PDO::FETCH_ASSOC))
                            {
                                echo"x_local_points.push(".$local_p['local_points'].");";
                            }

                            $visit_t = $conn->query("SELECT * FROM matches WHERE id_visit_team = $id");
                            while($visit_p = $visit_t->fetch(PDO::FETCH_ASSOC))
                            {
                                echo"x_visit_points.push(".$visit_p['visit_points'].");";
                            }
                            $dates_m = $conn->query("SELECT day(matches.match_day), month(matches.match_day) FROM matches WHERE id_visit_team = $id or id_local_team = $id");
                            while($day_m = $dates_m->fetch(PDO::FETCH_ASSOC))
                            {
                                
                                $date_temp = $day_m['month(matches.match_day)'];
                                echo"y_dates.push(".$date_temp.");";

                            }
                            /*PUNTOS EN TOTAL   datasets: [data_local, data_visit]*/
                            $puntos = $conn->query("SELECT * FROM matches WHERE id_local_team = $id or id_visit_team = $id");
                            while($puntos_r = $puntos->fetch(PDO::FETCH_ASSOC))
                            {
                                echo"puntos_arr.push(".$puntos_r['local_points'].");";
                            }
                            echo"                        
                                var data_local =
                                {
                                    label: 'Local points',
                                    data: x_local_points,
                                    lineTension: 0,
                                    fill: false,
                                    backgroundColor: 'rgba(0,0,255,1.0)',
                                    borderColor: 'rgba(0,0,255,0.1)',
                                };

                                var data_visit =
                                {
                                    label: 'Visit points',
                                    data: x_visit_points,
                                    lineTension: 0,
                                    fill: false,
                                    backgroundColor: 'rgba(75, 192, 192,1.0)',
                                    borderColor: 'rgba(75, 192, 192,0.3)',
                                };

                                var datas = 
                                {
                                    labels: y_dates,
                                    datasets: [data_local]
                                };

                                var chartOptions = {
                                    legend: {
                                    display: true,
                                    position: 'bottom',
                                    labels: 
                                    {
                                        boxWidth: 80,
                                        fontColor: 'black'
                                    },
                                    scales: 
                                    {
                                        yAxes: [{ticks: {}}],
                                    }
                                    }
                                };


                                var lineChart = new Chart('points_chart', 
                                {
                                    type: 'line',
                                    data: datas,
                                    options: chartOptions,
                                });
                            </script>
                            <div class='col d-flex justify-content-center'>
                                <div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
                                    <div class='carousel-inner'>";
                                    $res_i = $conn->query("SELECT * FROM team_images WHERE id_team = '$id'");
                                    while($fila_i = $res_i->fetch(PDO::FETCH_ASSOC))
                                    {
                                        echo"
                                        <div class='carousel-item active'>
                                        <img src='".$fila_i['image']."' class='d-block w-100' alt='".$fila_i['image']."'>
                                        </div>";
                                    }
                                    echo"
                                    </div>
                                    <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Previous</span>
                                    </button>
                                    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
                                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
    }
?>
<!--https://www.chartjs.org/docs/latest/samples/line/multi-axis.html-->
<?php include'../inc/piedepagina.inc'?>
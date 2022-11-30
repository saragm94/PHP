<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
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
        echo "<div class='row'>
                    <div class ='col d-flex justify-content-center'>
                        <div class='col d-flex justify-content-center'>C</div>
                        <div class='col d-flex justify-content-center'>D</div>
                    </div> 
                    <div class ='col d-flex justify-content-center'>
                    <canvas id='points_chart' style='max-width:600px'></canvas>
                        <script>
                            var x_local_points= [];
                            var y_local_dates = [7,8,8,9,9,9,10,11,14,14,15];

                            var x_visit_points = [];
                            var y_visit_dates = [7,8,8,9,9,9,10,11,14,14,15];
                        ";  
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
                        echo"
                            console.log(x_local_points);
                            console.log(x_visit_points);
                            
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
                                labels: y_visit_dates,
                                datasets: [data_local, data_visit]
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
                                options: chartOptions
                            });
                        </script>
                    </div>
            </div>";
    }
?>
<!--https://www.chartjs.org/docs/latest/samples/line/multi-axis.html-->
<?php include'../inc/piedepagina.inc'?>
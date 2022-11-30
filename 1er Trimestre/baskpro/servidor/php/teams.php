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
                        ";  
                        $local_t = $conn->query("SELECT * FROM matches WHERE id_local_team = $id");
                        while($local_p = $local_t->fetch(PDO::FETCH_ASSOC))
                        {

                        }; 
                        echo"
                            var x_points = [40,50,60,70,80,900,100,110,120,130,140];

                            var x_ local_points= [50,60,70,80,90,100,110,120,130,140,150];
                            var y_local_dates = [7,8,8,9,9,9,10,11,14,14,15];

                            var x_visit_points = [50,60,70,80,90,100,110,120,130,140,150];
                            var y_visit_dates = [7,8,8,9,9,9,10,11,14,14,15];

                            new Chart('points_chart', {
                            type: 'line',
                            data: {
                                labels: x_local_points,
                                datasets: [{
                                fill: false,
                                lineTension: null,
                                backgroundColor: 'rgba(0,0,255,1.0)',
                                borderColor: 'rgba(0,0,255,0.1)',
                                data: y_local_dates
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                yAxes: [{ticks: {min: 6, max:16}}],
                                }
                            }
                            });
                        </script>
                    </div>
            </div>";
    }
?>
<!--https://www.chartjs.org/docs/latest/samples/line/multi-axis.html-->
<?php include'../inc/piedepagina.inc'?>
<?php include'../../inc/connect.inc'?>
<?php
    $id = $_POST['team_update'];
    $full_name = $_POST['full_name'];
    $abbreviation = $_POST['abbreviation'];
    $nickname = $_POST['nickname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $year_founded = $_POST['year_founded'];
    $modality = $_POST['modality'];

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = "UPDATE teams SET
    full_name = '$full_name', 
    abbreviation = '$abbreviation',
    nickname = '$nickname',
    city = '$city',
    year_founded = '$year_founded',
    modality = '$modality'
    WHERE id = '$id';";

    $conn->exec($res);

        $id_team = $conn ->query("SELECT * FROM teams ORDER BY id DESC LIMIT 1");
        while($fila = $id_team->fetch(PDO::FETCH_ASSOC))
        {
            $id = $fila['id'];
        }
        if ($_FILES['logo']['type'] == "image/jpeg" || $_FILES['logo']['type'] == "image/jpg" || $_FILES['logo']['type'] == "image/png")
        {
            $rute = '../../img/teams';
            $rute_tmp = $_FILES['logo']['tmp_name'];
            $image_name = $_FILES['logo']['name'];
            $rute_dest = $rute.'/'.$image_name;
            if(move_uploaded_file($rute_tmp,$rute_dest))
            {
                $res2 = "UPDATE teams SET logo = '$rute_dest' WHERE id = $id";
                $conn->exec($res2);
            }
            else{
                echo"Error al subir la imagen</br>";
            }
        }
    header("location: ../../index.php");
?>
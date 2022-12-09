<?php include'../../inc/connect.inc'?>
<?php include'../../inc/session.inc'?>
<?php
    $id = $_POST['team_image_id'];

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id_team = $conn ->query("SELECT * FROM teams WHERE id = '$id'");
    while($fila = $id_team->fetch(PDO::FETCH_ASSOC))
    {
        $id = $fila['id'];
    }
    if ($_FILES['new_image']['type'] == "image/jpeg" || $_FILES['new_image']['type'] == "image/jpg" || $_FILES['new_image']['type'] == "image/png")
    {
        $rute = '../../img/teams_images';
        $rute_tmp = $_FILES['logo']['tmp_name'];
        $image_name = $_FILES['logo']['name'];
        $rute_dest = $rute.'/'.$image_name;
        if(move_uploaded_file($rute_tmp,$rute_dest))
        {
            $res2 = "INSERT INTO teams_images(`id_team`, `image`) VALUES ('$id','$rute_dest')";
            $conn->exec($res2);
        }
        else{
            echo"Error al subir la imagen</br>";
        }
    }
    header("location: ../../index.php");
?>
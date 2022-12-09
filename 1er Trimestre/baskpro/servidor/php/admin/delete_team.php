<?php include'../../inc/connect.inc'?>
<?php
    $delete_id = $_POST['team_delete'];
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $del = "UPDATE teams SET active = 0 WHERE id = $delete_id";
    $conn->exec($del);
    header("location: ../../index.php");
?>
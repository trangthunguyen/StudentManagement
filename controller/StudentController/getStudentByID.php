<?php
    include 'C:\xampp\htdocs\ptitweb/dbhelper.php';
    $id = $_POST['id'];
    $sql = "select * from user where id='$id'";
    $query = execute($sql);
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
?>

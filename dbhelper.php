<?php
require_once('config.php');

function execute($sql) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function executeResult($sql) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    $resultset = mysqli_query($conn, $sql) or die( mysqli_error($conn));
    $list = [];
    while($row = mysqli_fetch_array($resultset, 1)){
        $list[] = $row;
    }
    mysqli_close($conn);
    return $list;
}
?>
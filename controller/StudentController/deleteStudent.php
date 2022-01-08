<?php 
    include '../../dbhelper.php';
    $id = $_POST['id'];

    $sql = 'delete from user where id = '.$id;
    $query = execute($sql);

    if($query){
        return "Xóa thành công!";
    }
    else{
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>
<?php
    include '../dbhelper.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = $sql = "select * from admin where username = '$username' and password = '$password' ";
    
    $result = execute($sql);
    
    if (mysqli_num_rows($result) == 0) {
        header("Location: ../login.php?error=Sai tên tài khoản hoặc mật khẩu!");
        exit();
    } else {
        $data = mysqli_fetch_array($result);
        session_start();
        $_SESSION["userID"] = $data['id'];
        $_SESSION["name"] = $data['name'];
        header("Location: ../view/dashboard.php");
    }
?>
<?php 
    include 'C:\xampp\htdocs\ptitweb/dbhelper.php';
    $name = $gender = $studentID = $classID = $phone = $email = $address = $photo = '';

    $target_dir = '../upload/';
    $target_file = $target_dir . basename($_FILES["modalFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES["modalFile"]["size"] > 500000) {
        echo "file quá lớn";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "xin hãy chọn ảnh";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Không thể upload";
    } 
    else {
        if (move_uploaded_file($_FILES["modalFile"]["tmp_name"], $target_file)) {
            echo "file " . htmlspecialchars(basename($_FILES["modalFile"]["name"])) . " đã được upload.";
        } else {
            echo "Không thể upload";
        }
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $studentID = $_POST['studentID'];
    $classID = $_POST['classID'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $photo = $target_file;

    $sql = "update user set name='$name', studentID='$studentID', classID='$classID', gender='$gender', email='$email', phone='$phone', address='$address', photo='$photo' where id = '$id'";
    $query = execute($sql);

    if($query){
        return "Cập nhật thành công!";
    }
    else{
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>
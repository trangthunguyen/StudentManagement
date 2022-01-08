<?php
    if(!empty($_POST)){
        $s_name = $s_gender = $s_studentID = $s_classID = $s_phone = $s_email = $s_address = $s_photo = '';

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

        if(isset($_POST['name'])){
            $s_name = $_POST['name'];
        }
        if(isset($_POST['gender'])){
            $s_gender = $_POST['gender'];
        }
        if(isset($_POST['studentID'])){
            $s_studentID = $_POST['studentID'];
        }
        if(isset($_POST['classID'])){
            $s_classID = $_POST['classID'];
        }
        if(isset($_POST['phone'])){
            $s_phone = $_POST['phone'];
        }
        if(isset($_POST['email'])){
            $s_email = $_POST['email'];
        }
        if(isset($_POST['address'])){
            $s_address = $_POST['address'];
        }

        $s_photo = $target_file;

        include 'C:\xampp\htdocs\ptitweb/dbhelper.php';
        $sql = "INSERT INTO user (name, studentID, classID, gender, email, phone, address, photo) VALUES ('$s_name', '$s_studentID', '$s_classID', '$s_gender', '$s_email', '$s_phone', '$s_address', '$s_photo')";
        $query = execute($sql);

        header("Location: /ptitweb/view/student-list.php");
    }
?>
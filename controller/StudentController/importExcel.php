<?php
    include '../../dbhelper.php';
    include '../../core/PHPExcel.php';

     if(isset($_POST['btnGui'])){
        $file=$_FILES['excel']['tmp_name'];
        
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        $objReader->setReadDataOnly(true);
        $objExcel = $objReader->load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        for($row=2; $row<=$highestRow; $row++) {
            $s_name = $sheetData[$row]['A'];
            $s_studentID = $sheetData[$row]['B'];
            $s_classID = $sheetData[$row]['C'];
            $s_gender = $sheetData[$row]['D'];
            $s_email = $sheetData[$row]['E'];
            $s_phone = $sheetData[$row]['F'];
            $s_address = $sheetData[$row]['G'];
            $s_photo = $sheetData[$row]['H'];

            $sql = "INSERT INTO user (name, studentID, classID, gender, email, phone, address, photo) VALUES ('$s_name', '$s_studentID', '$s_classID', '$s_gender', '$s_email', '$s_phone', '$s_address', '$s_photo')";
            $query = execute($sql);
        }
        header("Location: /ptitweb/view/student-list.php");
    }
?>
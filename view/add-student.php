<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THÊM SINH VIÊN</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://localhost:80/ptitweb/assets/css/style.css">
</head>
<body>
    <div class="wrap"> 
        <!-- HEADER -->
        <div class="wrap"> 
        <!-- HEADER -->
        <?php include_once("../layout/header.php");?>
        <div class="row">
            <div class="col-3">
                <?php include_once("../layout/sidebar.php");?>
            </div>

            <!-- CONTENT -->
            <div class="col">
                <div class="mt-3 p-4 shadow-sm bg-white" id="content">
                    <div class="fs-3 fw-bold" style="color: #d30000;">Thêm sinh viên mới</div>
                    <hr>
                    <form action="../controller/StudentController/add-student.php" method="post" enctype="multipart/form-data" class="row g-3" id="formAddStudent">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle img-thumbnail mt-5 mb-2 modalPic" id="modalImg" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                
                                <div class="photo-input">
                                    <input type="file" class="form-control-file" name="modalFile" id="modalFile" onchange="upImg(this)" style="display:none"/>
                                    <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('modalFile').click()">Chọn ảnh</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 border-right">
                            <div class="px-3">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <label class="labels mb-2">Họ tên:</label>
                                        <input type="text" class="form-control" name="name" id="name"></div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels me-2">Giới tính:  </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="Nam">
                                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
                                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                            </div>
                                    </div>
                                    <div class="col-md-6 my-2"><label class="labels mb-2">Mã sinh viên:</label><input type="text" class="form-control" name="studentID" id="studentID"></div>
                                    <div class="col-md-6 my-2"><label class="labels mb-2">Lớp:</label><input type="text" class="form-control" name="classID" id="classID"></div>
                                    <div class="col-md-6 my-2"><label class="labels mb-2">Email:</label><input type="email" class="form-control" name="email" id="email"></div>
                                    <div class="col-md-6 my-2"><label class="labels mb-2">Số điện thoại:</label><input type="number" class="form-control" name="phone" id="phone"></div>
                                    <div class="col-md-12 my-2"><label class="labels mb-2">Địa chỉ:</label><input type="text" class="form-control" name="address" id="address"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-secondary mx-3" onclick="reset()">ĐẶT LẠI</button>
                                <button type="submit" class="btn btn-success">LƯU</button>
                            </div>
                        </div>
                      </form>

                      <script>
                            function reset() {
                                $("#modalImg").attr('src', 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg');
                                $("#name").val('');
                                $("#gender").val('');
                                $("#studentID").val('');
                                $("#classID").val('');
                                $("#email").val('');
                                $("#address").val('');
                                $("#phone").val('');
                            }
                      </script>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/student.js"></script>
</body>
</html>
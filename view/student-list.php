<?php
    require_once('../dbhelper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="http://localhost:80/ptitweb/assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
</head>
<body>
    <div class="wrap"> 
        <!-- HEADER -->
        <?php include_once("../layout/header.php");?>
        <div class="row">
            <div class="col-3">
                <?php include_once("../layout/sidebar.php");?>
            </div>

            <!-- CONTENT -->
            <div class="col">
                <div class="container">
                    <div class="table-wrapper mt-3 shadow-sm">
                        <div class="row">
                            <div class="col-6">
                                <p class="fs-2 fw-bold text-dark mb-4">Danh sách sinh viên</p>
                            </div>
                            <div class="col-6">
                                <form class="mt-3 d-flex justify-content-end" action="../controller/StudentController/importExcel.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="excel" id="excel" class="form-control-file"/>
                                    <button class="btn btn-sm btn-success mx-1" type="submit" name="btnGui">NHẬP EXCEL</button>
                                </form>
                                <div class="d-flex justify-content-end">
                                    <form action="" method="get">
                                        <div class="input-group mt-3">
                                            <input type="text" name="searchTxt" class="form-control search-input" placeholder="Tìm kiếm..." aria-label="Timkiem" aria-describedby="btnSearch">
                                            <button class="btn btn-outline-danger search-btn" type="submit" id="btnSearch"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Mã SV</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['searchTxt']) && $_GET['searchTxt'] != '') {
                                    $sql = 'select * from user where name like "%' . $_GET['searchTxt'] . '%" or studentID like "%' . $_GET['searchTxt'] . '%"';
                                } 
                                else {
                                    $sql = 'select * from user';
                                }
                                $studentList = executeResult($sql);

                                foreach($studentList as $std) {
                                    echo '<tr>
                                    <th scope="row">
                                        <img src="'.$std['photo'].'" alt="" class="avatar rounded-circle shadow-sm">
                                    </th>
                                    <td class="user-detail">
                                        '.$std['name'].'
                                    </td>
                                    <td>'.$std['studentID'].'</td>
                                    <td>'.$std['classID'].'</td>
                                    <td>'.$std['email'].'</td>
                                    <td>'.$std['phone'].'</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <i class="fas fa-edit mr-3" onclick="editStudent('.$std['id'].')"></i>
                                            <i class="fas fa-trash-alt" onclick="deleteStudent('.$std['id'].')"></i>
                                        </div>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                          </table>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SỬA THÔNG TIN SINH VIÊN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="formUpdateStudent" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="container bg-white">
                                    <div class="row">
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
                                                    <input type="text" name="id" id="modalID" style="display: none;">
                                                    <div class="col-md-12 my-2">
                                                        <label class="labels mb-2">Họ tên:</label>
                                                        <input type="text" class="form-control" id="modalName" name="name" value=""></div>
                                                    <div class="col-md-12 my-2">
                                                        <label class="labels me-2">Giới tính:  </label>
                                                        <input type="text" class="form-control" id="modalGender" name="gender" value=""></div>
                                                    </div>
                                                    <div class="col-md-6 my-2"><label class="labels mb-2">Mã sinh viên:</label><input type="text" class="form-control" id="modalStudentID" name="studentID"></div>
                                                    <div class="col-md-6 my-2"><label class="labels mb-2">Lớp:</label><input type="text" class="form-control" id="modalClassID" name="classID"></div>
                                                    <div class="col-md-6 my-2"><label class="labels mb-2">Email:</label><input type="email" class="form-control" id="modalEmail" name="email"></div>
                                                    <div class="col-md-6 my-2"><label class="labels mb-2">Số điện thoại:</label><input type="number" class="form-control" id="modalPhone" name="phone"></div>
                                                    <div class="col-md-12 my-2"><label class="labels mb-2">Địa chỉ:</label><input type="text" class="form-control" id="modalAddress" name="address"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HỦY</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateStudent()">LƯU</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/student.js"></script>
</body>
</html>
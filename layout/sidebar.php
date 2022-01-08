<nav id="sidebar" class="col-12 col-lg-2 p-0" style="background: #000000">
    <div class="profile pt-5 d-flex justify-content-center border-bottom">
        <div class="flex-column">
            <img class="img-fluid avatar" src="http://localhost:80/ptitweb/assets/img/student1.jpg" alt="">
            <p class="fs-6 text-white fw-bold mt-3">
                <?php
                    // echo $_SESSION["name"]; 
                ?>
                Trang Thu
            </p>
        </div>
    </div>

    <div id="menu" class="collapse d-lg-block">
        <ul class="nav nav-pills flex-column px-2">
            <li class="nav-item">
                <a class="nav-link" 
                        href="dashboard.php">
                    <i class="fas fa-chart-pie"></i>
                    Tổng quan
                </a>
            </li>
            <li class="nav-item mt-3">
                <span class="fs-6 fw-light ms-3">SINH VIÊN</span>
            </li> 
            <li class="nav-item">
                <a class="nav-link" 
                    href="add-student.php">
                    <i class="far fa-circle nav-icon"></i>
                    Thêm sinh viên
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" 
                    href="student-list.php">
                    <i class="fa fa-cubes fa-fw"></i>
                    Danh sách sinh viên
                </a>
            </li>

            <li class="nav-item mt-3">
                <span class="fs-6 fw-light ms-3">MÔN HỌC</span>
            </li> 
            <li class="nav-item">
                <a class="nav-link" 
                    href="add-student.php">
                    <i class="far fa-circle nav-icon"></i>
                    Thêm môn học
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" 
                        href="#">
                        <i class="fa fa-cubes fa-fw"></i>
                    Danh sách môn học
                </a>
            </li>
            
            <li class="nav-header border-bottom mt-4"></li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#profile">
                    <span>
                        <i class="far fa-user"></i>
                        Tài khoản
                    </span>
                    <i class="fas fa-angle-left"></i>
                </a>
                <div id="profile" class="collapse">
                    <ul class="nav nav-pills flex-column p-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="far fa-sign-out-alt"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
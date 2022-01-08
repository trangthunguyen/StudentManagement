<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost:80/ptitweb/assets/css/login.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="d-flex justify-content-center h-100">
		<div class="card pt-4">
			<div class="card-header">
				<h3 class="text-red">ĐĂNG NHẬP</h3>
			</div>
			<div class="card-body">
				<form action="controller/loginController.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password">
					</div>
					<div class="row py-2">
						<?php if (isset($_GET['error'])) { ?>
							<p class="text-danger">
								<?php echo $_GET['error']; ?></p>
						<?php } ?>
					</div>
					<div class="form-group">
						<input type="submit" value="Đăng nhập" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer py-4">
				<div class="d-flex justify-content-center links">
					Bạn không có tài khoản?<a href="#">Đăng ký</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
		require('dbConnection.php');
		session_start();
		if(isset($_SESSION["email"]))
		{
			session_destroy();
		}
        if (isset($_POST['submit'])) {
          $email = $_POST['email'];
          $password = md5($_POST['password']);

          $query = "SELECT name FROM user 
                    WHERE email = '$email' and password = '$password'";
          $result = mysqli_query($con,$query);
          $user = mysqli_fetch_assoc($result);
          if ($user == null ) {
            echo "sai email hoac password";
          }else{ 
          // dang nhap dung
          // B1 tao session
		  $_SESSION["name"] = $name;
		  $_SESSION["email"] = $email;
          // B2 chuyen huong sang trang admin
		  header("location:account.php?q=1");
            die();
          }
        }
      ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">Đăng nhập vào </h5><h4 style="font-family: Noto Sans;">Thi trắc nghiệm online</h4></center><br>
							<form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nhập email của bạn:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Nhập mật khẩu:
										<a href="javascript:void(0)" class="pull-right">quên mật khẩu?</a>
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">đăng nhập</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">bạn chưa có tài khoản?</span> <a href="register.php">đăng ký</a> ở đây...
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>
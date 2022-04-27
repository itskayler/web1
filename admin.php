<?php
		require('dbConnection.php');
		session_start();
		if(isset($_SESSION["email"]))
		{
			session_destroy();
		}
        if (isset($_POST['submit'])) {
          $email = $_POST['uname'];
          $password = $_POST['password'];

          $query = "SELECT email FROM admin 
                    WHERE email = '$email' and password = '$password'";
          $result = mysqli_query($con,$query);
          $user = mysqli_fetch_assoc($result);
          if ($user == null ) {
            echo "sai email hoac password";
          }else{ 
          // dang nhap dung
          // B1 tao session
          $_SESSION["name"] = 'Admin';
          $_SESSION["key"] ='sunny7785068889';
          $_SESSION["email"] = $email;
          // B2 chuyen huong sang trang admin
		  header("location:dash.php?q=1");
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
		<title>Admin Login | Online Quiz System</title>
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
						<center> <h5 style="font-family: Noto Sans;">Đăng nhập  </h5><h4 style="font-family: Noto Sans;">Admin Page</h4></center><br>
							<form method="post" action="admin.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nhập email:</label>
									<input type="email" name="uname" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">nhập mật khẩu:
										<a href="javascript:void(0)" class="pull-right">Quên mật khẩu?</a>
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Đăng nhập</button>
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
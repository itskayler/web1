<?php
	include("dbConnection.php");
	ob_start();
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name= ucwords(strtolower($name));
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$college = $_POST['college'];
		$mob = $_POST['mob'];
		$password = $_POST['password'];
		$name = stripslashes($name);
		$name = addslashes($name);
		$name = ucwords(strtolower($name));
		$gender = stripslashes($gender);
		$gender = addslashes($gender);
		$email = stripslashes($email);
		
		$college = stripslashes($college);
		$college = addslashes($college);
		$mob = stripslashes($mob);
		$mob = addslashes($mob);
		
		$password = stripslashes($password);
		$password = addslashes($password);
		$password = md5($password);
		
		$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");		
		if($q3)
		{
		session_start();
		$_SESSION["email"] = $email;
		$_SESSION["name"] = $name;
		
		header("location:account.php?q=1");
		}
		else
		{
		header("location:index.php?q7=Email Already Registered!!!");
		}
		ob_end_flush();
	}
?>

<!DOCTYPE html>
<html>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("college must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>
	<head>
	<h1 style ="text-align:center;color:#fff"> Đăng ký thi trắc nghiệm online</h1><br>
	<br>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Thi trắc nghiệm online</title>
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
	<div class="row" >
	
<div class="col-md-4"></div>

<div class="col-md-4 panel">
  
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>



<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Nhập họ tên" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Chọn giới tính" class="form-control input-md" >
   <option value="Male">Giới tính</option>
  <option value="Nam">Nam</option>
  <option value="Nữ">Nữ</option> </select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Nhập tên trường" class="form-control input-md" type="text">
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Nhập email" class="form-control input-md" type="email">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Nhập số điện thoại" class="form-control input-md" type="number">
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Nhập mật khẩu" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Xác nhận mật khẩu" class="form-control input-md" type="password">
    
  </div>
  <?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" > 
   <center> <input type="submit" class="sub" value="Đăng ký" class="btn btn-primary"/></center>
  </div>
</div>
</div>


		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>
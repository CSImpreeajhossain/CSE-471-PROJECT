<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
	$username= $_POST['uname'];
	$password= $_POST['pass'];

	$error = array();
	if(empty($username)){
		$error['admin'] = "Enter Username";
	}else if(empty($password)){
		$error['admin'] = "Enter Password";
	}
	if (count($error)==0){
		$query= "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connect,$query);

		if(mysqli_num_rows($result)==1){
			echo "<script>alert('You have login as admin')</script>";
			$_SESSION['admin'] = $username;
			header("Location: admin/index.php");
			exit();

		}else{
			echo "<script>alert('Invalid Username or Password')</script>";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Admin Login Page</title>
</head>
<body style="background-image: url(image/hospital.jfif);background-repeat: no-repeat; background-size: cover;">
	<?php
	include("include/header.php");
	?>
	<div style="margin-top: 25px;"></div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-5 container-fluid bg-dark text-light p-5">
					<img src="image/adminlogin.png" class="col-md-12" style="width: 100%;height: 50%;">
					<form method="post" class="my-2">
							<div class="alert alert-danger">
								<?php
								if(isset($error['admin'])){
									$sh = $error['admin'];
									$show = "<h2 class='alert alert-danger'>$sh</h2>";
								}else{
									$show = "";
								}
								echo $show;
								?>
							</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">			
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control">
						</div>
						<input type="submit" name="login" class="btn btn-success my-2" value="Login">
				</div>
				<div class="col-md-3"></div>
			</div>	
		</div>
	</div>

</body>
</html>
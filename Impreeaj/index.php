
<!DOCTYPE html>
<html>
<head>
	<title>DAS Home page</title>
</head>
<body>
	<?php 
		include("include/header.php");

	?>
<div style="margin-top: 40px ;"></div>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3 mx-1 shadow">
				<img src="image/info.jfif" style="width: 100% ;height: 75%;">
				<h5 class="text-center">click on the button for more information</h5>
				<a href="#">
					<button class="btn btn-success" style="margin-left: 28%;">More Information</button>
				</a>
			</div>
			<div class="col-md-4 mx-1 shadow">
				<img src="image/patient.jfif" style="width: 100%;height: 74%;">
				<h5 class="text-center">Create Account so that we can take good care of you.</h5>
				<a href="account.php">
					<button class="btn btn-success" style="margin-left: 35%;">Create an Account</button>
				</a>
			</div>	
			<div class="col-md-4 mx-1 shadow">
				<img src="image/doctor.jpg" style="width: 100%;height: 80%;">

				<h5 class="text-center">We are employing doctors</h5>
				<a href="apply.php">
					<button class="btn btn-success" style="margin-left: 35%;">Apply Now!</button>
				</a>

			</div>
		</div>	
	</div>
</div>

</body>
</html>
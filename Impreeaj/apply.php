<?php 

include("include/connection.php");

if(isset($_POST['apply'])){
	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$spec = $_POST['speciality'];
	$avail = $_POST['availability'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];

	$error = array();

	if(empty($firstname)){
		$error['apply']="Enter Firstname" ;
	}else if (empty($surname)){
		$error['apply']="Enter Surname" ;
	}else if(empty($username)){
		$error['apply']="Enter Username" ;
	}else if(empty($email)){
		$error['apply']="Enter Email Address" ;
//	}else if(empty($gender=="")){
//		$error['apply']="Select Your Gender" ;

//	}
	}else if(empty($phone)){
		$error['apply']="Enter Phone Number" ;
//	}else if(empty($country=="")){
//		$error['apply']="Select Country" ;
//	}
	}else if(empty($address)){
		$error['apply']="Enter Address" ;
	}else if(empty($spec)){
		$error['apply']="Enter Speciality" ;
	}else if(empty($avail)){
		$error['apply']="Enter Availability" ;
	}else if(empty($password)){
		$error['apply']="Enter Password"; 
	}else if(empty($confirm_password =$password)){
		$error['apply']="Password do not match !"; 
	}

	if (count($error) == 0) {

		$query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,address,password,salary,data_reg,status,profile,speciality,availability) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$address','$password','0',NOW(),'Pending','doctor.jpg','$spec','$avail')";

		$result = mysqli_query($connect,$query);
		if($result){

			echo "<script>alert('You have Successfully Applied')</script>";

			header("Location: doctorlogin.php");

		}else{

			echo "<script>alert('Application failed !')</script>";

		}

	}

}


if(isset($error['apply'])){
	$s = $error['apply'];
	$show = "<h5 class= 'text_center alert alert-danger'>$s</h5>";
}else{
	$show = "";

}

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply Now !!!</title>
</head>
<body style="background-image: url(image/doctor2.jfif); background-size: cover;
	background-repeat: no-repeat;">

        <?php 
        include("include/header.php");
         ?>	

        <div class="container-fluid">
        	<div class="col-md-12">
        		<div class="row">
        			<div class="col-md-3"></div>
        			<div class="col-md-6 container-fluid bg-dark text-light p-5 my-3">
        				<h5 class="text-center">Apply Now !!!</h5>
    						<div>
    							<?php
    							echo $show;
    							 ?>
    						</div>
    					<form method="post">
    						<div class="form-group">
    							<label>Firstname</label>
    							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST
    							['fname']; ?>">
    						</div>

    						<div class="form-group">
    							<label>Surname</label>
    							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
    						</div>

    						<div class="form-group">
    							<label>Username</label>
    							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
    						</div>

    						<div class="form-group">
    							<label>Email</label>
    							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
    						</div>

    						<div class="form-group">
    							<label>Gender</label><br>
	    						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
								<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
	  							<input type="radio" name="gender" <?php if (isset($gender) && $gender=="others") echo "checked";?> value="others">Others  	  							
    						</div>


    						<div class="form-group">
    							<label>Phone</label>
    							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
    						</div>


    						<div class="form-group">
    							<label>Address</label>
    							<input type="text" name="address" class="form-control" autocomplete="off" placeholder="Enter Address"
    							value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
    						</div>
    						<div class="form-group">
    							<label>Speciality</label>
    							<input type="text" name="speciality" class="form-control" autocomplete="off" placeholder="Enter Speciality"
    							value="<?php if(isset($_POST['spec'])) echo $_POST['spec']; ?>">
    						</div>     						
    						<div class="form-group">
    							<label>Availability</label>
    							<input type="text" name="availability" class="form-control" autocomplete="off" placeholder="Enter Speciality"
    							value="<?php if(isset($_POST['avail'])) echo $_POST['avail']; ?>">
    						</div>
    						<div class="form-group">
    							<label>Time</label><br>
	    						<input type="radio" name="time" <?php if (isset($avail) && $avail=="08:00-10:30 am") echo "checked";?> value="08:00-10:30 am">08:00-10:30 am
								<input type="radio" name="time" <?php if (isset($avail) && $avail=="3:30-06:00 pm") echo "checked";?> value="3:30-06:00 pm">3:30-06:00 pm
	  							<input type="radio" name="time" <?php if (isset($avail) && $avail=="08:00-11:00 pm") echo "checked";?> value="08:00-11:00 pm">08:00-11:00 pm  	  							
    						</div> 
    						<div class="form-group">
    							<label>Password</label>
    							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
    						</div>

    						<div class="form-group">
    							<label>Confirm Password</label>
    							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
    						</div>

    						<input type="submit" name="apply" value="Apply Now" class="btn btn-success my-2">
    						<p>I already have an account<a href="doctorlogin.php" class="mx-2">Click Here</a></p>

    					</form>

        			</div>
        			<div class="col-md-3"></div>
        		</div>
        	</div>
        </div> 

</body>
</html>
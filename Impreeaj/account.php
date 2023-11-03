<?php

  include("include/connection.php");

  if (isset($_POST['create'])) {
	  $fname = $_POST['fname' ]; 
	  $sname = $_POST[ 'sname'];
	  $uname = $_POST[ 'uname'];
      $email = $_POST['email'];
	  $phone = $_POST[ 'phone' ]; 
	  $gender = $_POST[ 'gender']; 
	  $country = $_POST['country']; 
	  $password = $_POST['pass'];
	  $con_pass = $_POST['con_pass']; 

	  $error = array();

	  if (empty($fname)) {
	       $error['ac'] = "Enter Firstname";
	    } else if(empty($sname)){
			$error['ac']="Enter Surename";
	    } else if(empty($uname)){
			$error['ac']="Enter Username";
	    } else if(empty($email)){
			$error['ac']="Enter Email";
	    } else if(empty($phone)){
			$error['ac']="Enter Phone Number";
		} else if($gender==" "){
			$error['ac']="Select Your Gender";
	    } else if($Country==" "){
			$error['ac']="Select Your Country";
	    }else if(empty($password)){
	 		$error['ac'] = "Enter Password";
        }else if($con_pass != $password){ 
            $error['ac'] = "Both password do not match";
		}

		if (count($error)==0) { 
			$query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country, password, date_reg, profile) VALUES('$fname', '$sname', '$uname', '$email','$phone', '$gender', '$country', '$password' ,NOW(), 'patient.jpg')";
			
			$res = mysqli_query($connect, $query);  
			
			if($res) { 
				header ("Location:patientlogin.php"); 
			} else{
				echo "<script>alert('failed')</script>";
			}
		}
	}

?>

<!DOCTYPE html> 
<html> 
<head> 
	<title>Create Account</title>
</head>
<body style="background-image: url(image/p.jfif);background-repeat: no-repeat;
			background-size: cover;"> 
			<?php
			   include("include/header.php");
			?>
		  	<div class="container-fluid"> 
				<div class="col-md-12"> 
					<div class="row"> 
						<div class="col-md-3"></div> 
						<div class="col-md-6 container-fluid bg-dark text-light my-5" style="margin-left: 5%;">
						 <h5 class="text-center text-info my-2">Create Account</h5>
							<form method="post">
								<div class="form-group">
									 <label>Firstname</label>
									<input type="text" name="fname" class="form-control"autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"> 
								</div>
									

									<div class="form-group">
									<label>Surname</label>
									<input type="text" name="sname" class="form-control"autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>"> 
								</div>

									<div class="form-group">
									<label>Username</label>
									<input type="text" name="uname" class="form-control"autocomplete="off" placeholder="Enter Userame" <?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>> 
								</div>

									<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control"autocomplete="off" placeholder="Enter Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> 
								</div>

								    <div class="form-group">
									<label>Phone No.</label>
									<input type="Number" name="phone" class="form-control"autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"> 
								</div>

								<div class="form-group">
	    							<label>Gender</label><br>
		    						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
									<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
		  							<input type="radio" name="gender" <?php if (isset($gender) && $gender=="others") echo "checked";?> value="others">Others  	  							
    							</div> 

								<div class="form-group">
									<label>Country</label><br>
		    						<input type="radio" name="country" <?php if (isset($country) && $country=="Bangladesh") echo "checked";?> value="Bangladesh">Bangladesh
									<input type="radio" name="country" <?php if (isset($country) && $country=="India") echo "checked";?> value="India">India
		  							<input type="radio" name="country" <?php if (isset($country) && $country=="others") echo "checked";?> value="others">Others  	  							
								</div>
								<div class="from-group">
									<label>Password</label>
									<input type="password" name="pass" class="from-control" autocomplete="off" placeholder="Enter Password">
								</div>

								<div class="from-group">
									<label>Confirm Password</label>
									<input type="password" name="con_pass" class="from-control" autocomplete="off" placeholder="Confirm Password">
								</div>
								<input type="submit" name="create" value="Create Account" class="btn btn-info">
								<p> Already have an account<a href="patientlogin.php" class="mx-2">Click Here</a></p>

							</form> 
						</div>
					    </div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</body>		
</html>
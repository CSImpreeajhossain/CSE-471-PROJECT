<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Booking List</title>
</head>
	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-30px;">
					<?php 
						include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">Booking List</h5>
					<?php
						$pat = $_SESSION['patient'];
					  	$sel= mysqli_query($connect,"SELECT * FROM income WHERE patient='$pat'");
					  	$row=mysqli_fetch_array($sel);
					  	$username=$pat;
					  	$res1 = 0;
if (isset($_POST['books'])) {
  $date = $_POST['dates'];
  $sym = $_POST['sym'];
  if (!empty($sym)) {
    $query = "INSERT INTO booking_list(doctors_name,username, appointment_date, symptoms, date_booked) VALUES('$username', '$doctors_name', '$date', '$sym')";
    $res = mysqli_query($connect, $query);
    $res1 = mysqli_num_rows($res);
  }
}

$output = "";
$output .= "
<table class='table table-bordered'>
  <tr>
    <th class='text-center'>Username</th>
    <th class='text-center'>Doctor's Name</th>
    <th class='text-center'>Appointment Date</th>
    <th class='text-center'>Symptoms</th>
    <th class='text-center'>Date Booked</th>
  </tr>
";

if ($res1 < 1) {
  $output .= "
    <tr>
      <td colspan='5' class='text-center'>You have no bookings yet</td>
    </tr>
  ";
} else {
  while ($row = mysqli_fetch_array($res1)) {
    $output .= "
      <tr>
        <td class='text-center'>" . $row['username'] . "</td>
        <td class='text-center'>" . $row['doctors_name'] . "</td>
        <td class='text-center'>" . $row['appointment_date'] . "</td>
        <td class='text-center'>" . $row['symptoms'] . "</td>
        <td class='text-center'>" . $row['date_booked'] . "</td>
      </tr>
    ";
  }
}

$output .= "
</table>
";
echo $output;
				?>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>
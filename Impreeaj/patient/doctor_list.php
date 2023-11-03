<?php
session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Doctors List</title>
</head>
<body>
<?php 
include("../include/header.php");
include("../include/connection.php") ;
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
				<h5 class="text-center my-2">Doctors List</h5>
				<?php
					$query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";
					$res = mysqli_query($connect,$query);

					$output = "";
$output .="
	<table class='table table-bordered'>
		<tr>
			<th class='text-center'>Doctor's Name</th>
			<th class='text-center'>Gender</th>
			<th class='text-center'>Phone</th>
			<th class='text-center'>Fees</th>
			<th class='text-center'>Available</th>
			<th class='text-center'>Speciality</th>
			<th class='text-center'>Book</th> 
		</tr>

";
if(mysqli_num_rows($res)<1){
	$output .= "
		<tr>
		<td colspan = '10' class='text-center'>Doctors are not available at this moment. Please Wait.</td>
		</tr>
	";
}
while ($row = mysqli_fetch_array($res)) {
	$output .="
		<tr>
			<td class='text-center'>".$row['username']."</td>
			<td class='text-center'>".$row['gender']."</td>
			<td class='text-center'>".$row['phone']."</td>
			<td class='text-center'>".$row['salary']."</td>
			<td class='text-center'>".$row['availability']."</td>
			<td class='text-center'>".$row['speciality']."</td>
			<td>
				<a href='book.php?id=".$row['id']."'>
				<button class='btn btn-info text-center'>Book</button>
			</td>
		";			
}
	$output .="
		</tr>
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
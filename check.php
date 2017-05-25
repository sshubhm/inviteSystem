<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		p{
			text-align: center;
		}
	</style>
</head>
<body style="margin: 0px">

<?php
error_reporting(E_ERROR);

include "connect.php";
session_start();
$login = $_SESSION['login'];
if($login == 1){
	$id = $_GET['id'];
		$sql = "SELECT * FROM list WHERE code = '".$id."'";
		if(!mysqli_query($conn, $sql)){
						echo "Error: ".mysqli_error($conn);

		}	
		$result = mysqli_query($conn, $sql);
		if($result->num_rows==1){
				$row = mysqli_fetch_assoc($result);
				$name = $row['Name'];
				$rno = $row['rollno'];
				$branch = $row['Branch'];
				echo "<p>Name: ".$name."</p><br><p>Roll No: ".$rno."</p><br><p>Branch: ".$branch."</p>";
				if($row['status']=="Entry Confirmed"){
					echo "<p><b>Entry Confirmed</b></p>";
					date_default_timezone_set('Asia/Kolkata');

					$t = date('Y-d-m H:i:s');

					$sql1 = "UPDATE list SET status='Entered', tim = '".$t."' WHERE code = '".$id."'";
					mysqli_query($conn,$sql1);
				}
				else{

					echo "<p><b>Already Entered at : ".$row['tim']."</b></p>";
				}
}
else{
					echo "<p><b>Record Does not exits</b></p>";
				}
			}
			

else{
	echo "<script type='text/javascript'> document.location = 'error.php'; </script>";

}



?>
</body>
</html>

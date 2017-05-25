<!DOCTYPE html>
<html>
<head>
	<title>View</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		table, td, th, tr{
			border-collapse: collapse;
			border: 1px solid black;
		}
	</style>
</head>
<body>
<form action="" method="POST">
	Enter Roll NO:<br>
	<input type="text" name="rollno"><br>
	<input type="submit" name="submit" value="submit">	
</form>

<?php
include "connect.php";

	if(isset($_POST['submit'])){
		$rollno = $_POST['rollno'];
		$sql1 = "DELETE FROM list WHERE rollno='".$rollno."'";
		$result1 = mysqli_query($conn, $sql1);
		unset($_POST['submit']);
	}


?>
<?php


$sql = "SELECT * FROM list";
$result = mysqli_query($conn, $sql);

if($result->num_rows>0){
	echo "<table><tr><th>Enrollment Number</th><th>Name</th><th>Branch</tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row['rollno'],"</td><td>".$row['Name']."</td><td>".$row['Branch']."</td></tr>";
	}
	echo "</table>";
}



?>
</body>
</html>
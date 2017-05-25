<!DOCTYPE html>
<html>
<head>
	<title>Get Your Ticket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
if(!isset($_POST['submit']))
echo '<form action="" method="POST">Enter Unique Code:<br><input type="text" name="code"><br><br><input type="submit" name="submit"></form>'

	
	


?>
<?php
include "connect.php";
	if(isset($_POST['submit'])){
		$code = $_POST['code'];
		$sql = "SELECT * FROM list WHERE code='".$code."'";
		if(!mysqli_query($conn, $sql)){
			echo "Error: ".mysqli_error($conn);
		}
		else{
			echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=www.nowbharat.com/shubhm/check.php?id=".$code."&choe=UTF-8'>";
		}
	}

?>
</body>
</html>
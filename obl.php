<?php
include "connect.php";
session_start();
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = 'SELECT * FROM admin WHERE password = "'.$password.'" AND username = "'.$username.'"';
		$result = $conn->query($sql);
		if(mysqli_query($conn, $sql)){

		if($result->num_rows==1){
			echo "Done";
			$_SESSION['login'] = 1;
				echo "<script type='text/javascript'> document.location = 'check.php'; </script>";
			}

		
		else{
			echo " incorrect";
		}}
		else{
			echo "Error: ".mysqli_error($conn);
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
			<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		form,p{
			text-align: center;
		}
	</style>
</head>
<body style="margin: 0px">

<form action="" method="POST">
	<input type="text" name="username"><br>
	<input type="password" name="password"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>
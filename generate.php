<?php
include "connect.php";
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
session_start();

$login = $_SESSION['login'];
if($login == 1){
		
}
else{
	echo "<script type='text/javascript'> document.location = 'error.php'; </script>";

}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Generate</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		form,p{
			text-align: center;
		}
	</style>
</head>
<body style="margin: 0px">
<p>To view/manage data <a href="http://www.nowbharat.com/shubhm/view.php">Click Here</a>
<form action="" method="POST">
	Enrollment Number:<br>
	<input type="text" name="rollno" required><br><br>
	Name:<br>
	<input type="text" name="name" required><br><br>
	Branch:<br>
	<input type="text" name="branch" required><br><br>
	<input type="submit" name="submit">
</form>
<p><?php
	if(isset($_POST['submit'])){
	$no = generateRandomString(25);
	$rollno = $_POST['rollno'];

	$sql = "INSERT INTO list(rollno, Name, Branch, status, code) VALUES('".$rollno."','".$_POST['name']."','".$_POST['branch']."', 'Entry Confirmed', '".$no."')";
	if(!mysqli_query($conn, $sql)){
		echo "Error: ".mysqli_error($conn);
	}
	else{
			
			echo $_POST['name']." successfuly added";
			echo "<br><br>";
			echo "<p><b>Our senior students have been great companions and friends. As they stand on the threshold of their new lives, let’s get together one last time over dance, music and memories.</p><p>Do come at 4 pm 12th of may.</p><p>Venue GTBIT.</p><p>please carry your ID card/library card with you.</p><p>Visit this link to get your tickets for farewell.</p><br>";
			echo "<p>https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=www.nowbharat.com/shubhm/check.php?id=".$no."&choe=UTF-8</b></p><br><br>";
		}
		unset($_POST['submit']);
}

$sql0 = "SELECT COUNT(*) c FROM list";
	$res1 = mysqli_query($conn, $sql0);
	$row = mysqli_fetch_assoc($res1);
	echo "<p>number of records : ".$row['c']."</p><br>";




?></p>

</body>
</html>
<?php
$servername = "localhost";
$username = "shubham018";
$password = "shubham";
$db = "farewell";
$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




?>
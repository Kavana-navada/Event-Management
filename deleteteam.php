<?php

// Include database configuration file
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'ignite';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$teamname = $_GET['deleteteamname'];


$str = "DELETE FROM semaphore WHERE TeamName = '$teamname'";
$conn->query($str);
echo "<script>alert('deleted sucessefully');</script>";
echo "<script>window.location.href='viewreg.php';</script>";

?>
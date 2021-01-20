<?php 
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_error()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
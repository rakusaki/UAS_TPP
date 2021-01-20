<?php
	include "../lib/conf.php";
	session_start();
	session_destroy();

	echo "<script> alert('Anda berhasil LogOut'); window.location = '$admin_url';</script>";
?>
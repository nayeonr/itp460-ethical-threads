<?php
	session_start();
	$_SESSION['logged_in'] = false;
	session_destroy();

	header("Location: ../ft-home-a/home.php"); // Redirect to the home page
	exit();
?>
<?php
	session_start();
	session_unset();
	session_destroy();

	header("Location: ../ft-home-a/home.php"); // Redirect to the home page
	exit();
?>
<?php
	session_start();
	session_unset();
	session_destroy();

	header("Location: ../docs/ft-home-a/home.php"); // Redirect to the home page
	exit();
?>
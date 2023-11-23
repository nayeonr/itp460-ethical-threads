<?php

	require '../ft-login-N/config.php';

	// LOGIN PHP
	// check if user has already logged in
	if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true )
	{
		// logged in
		// redirect to profile page
		header('Location: ../ft-profilepage-S/ft-profilepage-S.html');
		exit();
	} 
	else
	{
		// not logged in

		// if there was form submission
		if ( isset($_POST['Lemail']) && isset($_POST['Lpassword']) )
		{
			session_start();
	
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			// check for errors
			if ( $mysqli->connect_errno ) {
				echo $mysqli->connect_error;
				exit();
			}

			$Lemail = $_POST['Lemail'];
			$Lemail = $mysqli->escape_string($Lemail);

			$Lpassword = $_POST['Lpassword'];
					// 	hash(ALG, input)
			$Lpassword = hash('sha256', $Lpassword);

			$sql_users = "SELECT *
						FROM users
						WHERE email = '$Lemail'
								AND password = '$Lpassword';
						";

			$results_users = $mysqli->query($sql_users);

			// check for errors
			if ( !$results_users ) {
				echo $mysqli->error();
				$mysqli->close();
				exit();
			}

			$mysqli->close();

			if ( trim($_POST['Lemail']) == "" || trim($_POST['Lpassword']) == "" )
			{
				// no/missing credentials
				$error = "please enter both email and password.";
			}
			else if ( $results_users->num_rows > 0 )
			{
				// valid credentials

				// set session variables
				$_SESSION['logged_in'] = true;

				// redirect to profile page
				header('Location: ../ft-profilepage-S/ft-profilepage-S.html');
			}
			else
			{
				// wrong credentials
				$error = "try again. email and/or password is invalid.";
			}
		} 
	}

	// SIGNUP PHP
	// check for empty field
	if ( !isset($_POST['fullname']) || trim($_POST['fullname'] == '') ||
		 !isset($_POST['Semail']) || trim($_POST['Semail'] == '') ||
		 !isset($_POST['Spassword']) || trim($_POST['Spassword'] == '') ||
		 !isset($_POST['Spassword2']) || trim($_POST['Spassword2'] == '') )
	{
		
	}
	else
	{
		// all fields are filled out

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		// check for errors
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		$name = $_POST['fullname'];
		$name = $mysqli->escape_string($name);

		$Semail = $_POST['Semail'];
		$Semail = $mysqli->escape_string($Semail);

		$Spassword = $_POST['Spassword'];
		$Spassword2 = $_POST['Spassword2'];

		$sql_users = "SELECT *
					FROM users
					WHERE email = '$Semail';
					";

		$results_users = $mysqli->query($sql_users);

		// check for errors
		if ( !$results_users ) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		if ( $results_users->num_rows > 0 ) {
			// email is taken
			$error = "be more original. email is already registered.";
		}
		else {
			// valid email
			if ( $Spassword != $Spassword2 ) {
				// passwords do not match
				$error = "passwords do not match.";
			} else {
				// passwords match

				// 	hash(ALG, INPUT)
				$Spassword = hash('sha256', $Spassword);
				
				$sql = "INSERT INTO users (name, email, password)
						VALUES ('$name', '$Semail', '$Spassword');";

				$results = $mysqli->query($sql);

				if ( !$results ) {
					echo $mysqli->error;
					$mysqli->close();
					exit();
				}
			}
		}

		$mysqli->close();
	}
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav Bar</title>

    <link href="../global_css.css" rel="stylesheet"/>
    <link href="../ft-login-N/login.css" rel="stylesheet"/>
    <link href="../ft-login-N/signup.css" rel="stylesheet"/>
    
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Quicksand&display=swap');

		body {
			margin: 0;
			padding: 0;
		}
		
		#nav {
			display: flex;
			align-items: center;
			height: 50px;
			background-color: #BE8F69;
		}

		#logo {
			height: 40px;
			width: auto;
			margin-left: 10px;
		}

		#search {
			height: 20px;
		}

		.nav-menu {
			display: flex;
			margin-left: auto;
			font-family: "Quicksand", "Arial", sans-serif;
		}

		.nav-menu li
		{
			list-style: none;
			padding: 25px;
		}

		a {
			text-decoration: none;
			color: #F7F6F2;
		} 
		/* moved everything from here and up to the global_css.css */

		.overlay {
			display: none;
			position: fixed;
     		top: 0;
      		left: 0;
      		width: 100%;
      		height: 100%;
     		background:rgba(67, 63, 66, 0.5);
			margin: 0px auto;
     	}

     	#login-everything {
     		box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
     	}

     	#signup-everything {
     		box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
     	}
	</style>
</head>

<body>
	<!-- NAV w/ LOGIN/SIGNUP POP UP -->
	<nav>
		<div id="nav">
			<a href="../ft-home-a/home.html"><img src="../ft-navbar-N/logo.png" alt="Ethical Threads Logo" id="logo"></a>
			<ul class="nav-menu">
				<li><a href="../ft-discover-N/discover.html">Discover</a></li>
				<li><a href="../ft-about-pg-b/about-page.html">About</a></li>
				<li><a href="../ft-login-N/login.php" id="open-login">Login</a></li>
				<li><a href=""><img src="../ft-navbar-N/magnify.png" alt="Search" id="search"></a></li>
			</ul> <!-- .nav-menu -->
		</div> <!-- #nav -->
	</nav>

		<!-- POPUPS -->
	<div id="overlay1" class="overlay">
	
	<form action="login.php" method="POST">
	
	<div>
		<?php
			if ( isset($error) ) { 
				echo $error;
			}
		?>
	</div>

	<div id="login-everything">
		<img src="../ft-login-N/exit.png" alt="exit" id="close-login">

		<div id="login">
			<h2 class="login-headers">Login</h2>
			<hr>
			<p>Login to save brands and items to your favorites
			<br>so that you never lose them!</p>
			<div class="responses">
				<div id="email-header" class="response-headers">Email</div>
				<input
					type="text"
               		name="Lemail"
                	id="Lemail-id"
                	class="inputs"
            	/>

            	<div id="password-header" class="response-headers">Password</div>
				<input
					type="text"
               		name="Lpassword"
                	id="Lpassword-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <div id="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    class="keep-id"
                  />
                  Keep me logged in
            </div> <!-- #keep-login -->

            <div id="next-btn">
            	<button id="next-text" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->
		</div> <!-- #login -->

		</form>
		
		<div id="signup">
			<hr>
			<h2 class="login-headers">Don't have an account?</h2>
			<p>It costs nothing to set up an
			<br>Ethical Threads account!</p>

			<div id="signup-btn">
            	<button id="joinus" type="submit"><a href="../ft-navbar-N/navbar.html#overlay2" id="joinus-text">
            		Sign Up
            	</a></button>
            </div> <!-- #signup-btn -->

		</div> <!-- #signup -->
	</div> <!-- #login-everything -->
	</div> <!-- .overlay -->


	<div id="overlay2" class="overlay">

	<form action="signup.php" method="POST">
		<?php if ( isset($error) && trim($error) != '' ) : ?>
			<?php echo $error; ?>
		<?php else : ?>
			<?php echo $name; ?> was succesfully registered!
		<?php endif; ?>

	<div id="signup-everything">
		<a href="../ft-home-a/home.html"><img src="../ft-login-N/exit.png" alt="exit" id="close-signup"></a>
		
		<div id="signup">
			<h2 class="login-headers">Sign Up</h2>
			<hr>
			<p>It costs nothing to set up an
			<br>Ethical Threads account!</p>
			<div class="responses">
				<div id="name-header" class="response-headers">Name</div>
				<input
					type="text"
               		name="fullname"
                	id="fullname-id"
                	class="inputs"
            	/>

				<div id="email-header" class="response-headers">Email</div>
				<input
					type="text"
               		name="Semail"
                	id="Semail-id"
                	class="inputs"
            	/>

            	<div id="password-header" class="response-headers">Password</div>
				<input
					type="text"
               		name="Spassword"
                	id="Spassword-id"
                	class="inputs"
            	/>

            	<div id="password2-header" class="response-headers">Confirm Password</div>
				<input
					type="text"
               		name="Spassword2"
                	id="Spassword2-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <div id="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    class="keep-id"
                    value="yes"
                  />
                 <label for="keep-id"> Keep me logged in</label>
            </div> <!-- #keep-login -->

            <div class="next-btn">
            	<button id="next-text" class="next-profile" type="submit">Next</button>
            </div> <!-- .next-btn -->
		</div> <!-- #signup -->

		</form>

		<p>By creating an account, you agree to the Ethical Threads
		<br>terms of use and privacy policy.</p>
		
	</div> <!-- #signup-everything -->
	</div> <!-- .overlay -->

	<script>
			/* LOGIN POPUP */
		document.querySelector('#open-login').onclick = function(event) {
			event.preventDefault();
			document.querySelector('.overlay').style.display = 'flex';
		};

		document.querySelector('#close-login').onclick = function(event) {
			event.preventDefault();
			document.querySelector('.overlay').style.display = 'none';
		};

			/* SIGNUP POPUP */
		document.querySelector('#joinus').onclick = function(event) {
			event.preventDefault();
			document.querySelector('#overlay1').style.display = 'none';
			document.querySelector('#overlay2').style.display = 'flex';
		}

		document.querySelector('#close-signup').onclick = function(event) {
			event.preventDefault();
			document.querySelector('#overlay2').style.display = 'none';
			document.querySelector('.overlay').style.display = 'none';
		};

		document.querySelector('.next-btn').onclick = function() {
			var user_name = document.getElementById('fullname-id').value;
			var user_Lemail = document.getElementById('Lemail-id').value;
			var user_Semail = document.getElementById('Semail-id').value;
			var user_Lpassword = document.getElementById('Lpassword-id').value;
			var user_Spassword = document.getElementById('Spassword-id').value;
			var user_Spassword2 = document.getElementById('Spassword2-id').value;

			if ( user_name === '' || user_Lemail === '' || user_Semail === '' || user_Lpassword === '' || user_Spassword === '' || user_Spassword2 === '' ) {
				alert('Please fill out all required fields.');
				return false;
			}
		}
	</script>
</body>

</html>
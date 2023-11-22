<?php
	
	require '../ft-login-N/config.php';

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
		if ( isset($_POST['email']) && isset($_POST['password']) )
		{
			session_start();
	
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			// check for errors
			if ( $mysqli->connect_errno ) {
				echo $mysqli->connect_error;
				exit();
			}

			$email = $_POST['email'];
			$email = $mysqli->escape_string($email);

			$password = $_POST['password'];
					// 	hash(ALG, input)
			$password = hash('sha256', $password);

			$sql_users = "SELECT *
						FROM users
						WHERE email = '$email'
								AND password = '$password';
						";

			$results_users = $mysqli->query($sql_users);

			// check for errors
			if ( !$results_users ) {
				echo $mysqli->error();
				$mysqli->close();
				exit();
			}

			$mysqli->close();

			if ( trim($_POST['email']) == "" || trim($_POST['password']) == "" )
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
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Popup</title>
    
    <link href="../ft-login-N/login.css" rel="stylesheet"/>
    <link href="../ft-login-N/signup.css" rel="stylesheet"/>
</head>

<body>
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
               		name="email"
                	id="email-id"
                	class="inputs"
            	/>

            	<div id="password-header" class="response-headers">Password</div>
				<input
					type="text"
               		name="password"
                	id="password-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <div id="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    id="keep-id"
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
            	<button id="joinus" class="login-buttons" type="submit"><a href="../ft-navbar-N/navbar.html#overlay2" id="joinus-text">
            		Sign Up
            	</a></button>
            </div> <!-- #signup-btn -->

		</div> <!-- #signup -->
	</div> <!-- #login-everything -->
	</div> <!-- .overlay -->

	<script>
		document.querySelector('#next-btn').onclick = function() {
			var user_email = document.getElementById('email-id').value;
			var user_password = document.getElementById('password-id').value;

			if ( user_email === '' || user_password === '' ) {
				alert('Please fill out all required fields.');
				return false;
			}
		}
	</script>
</body>

</html>
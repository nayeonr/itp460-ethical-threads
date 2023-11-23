<?php

	session_start();
	require '../ft-login-N/config.php';

	// check for empty field
	if ( !isset($_POST['fullname']) || trim($_POST['fullname'] == '') ||
		 !isset($_POST['email']) || trim($_POST['email'] == '') ||
		 !isset($_POST['password']) || trim($_POST['password'] == '') ||
		 !isset($_POST['password2']) || trim($_POST['password2'] == '') )
	{
		$error = "please fill out all required fields.";
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

		$email = $_POST['email'];
		$email = $mysqli->escape_string($email);

		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		$sql_users = "SELECT *
					FROM users
					WHERE email = '$email';
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
			if ( $password != $password2 ) {
				// passwords do not match
				$error = "passwords do not match.";
			} else {
				// passwords match

				// 	hash(ALG, INPUT)
				$password = hash('sha256', $password);
				
				$sql = "INSERT INTO users (name, email, password)
						VALUES ('$name', '$email', '$password');";

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
    <title>Sign Up Popup</title>
    
    <link href="../global_css.css" rel="stylesheet"/>
    <link href="../ft-login-N/login.css" rel="stylesheet"/>
    <link href="../ft-login-N/signup.css" rel="stylesheet"/>
</head>

<body>
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
				<label for="fullname-id">
					<div id="name-header" class="response-headers">Name<span class="text-danger">*</span></div>
				</label>
				<input
					type="text"
               		name="fullname"
                	id="fullname-id"
                	class="inputs"
            	/>

            	<label for="email-id">
					<div id="email-header" class="response-headers">Email<span class="text-danger">*</span></div>
				</label>
				<input
					type="text"
               		name="email"
                	id="email-id"
                	class="inputs"
            	/>

            	<label for="password-id">
            		<div id="password-header" class="response-headers">Password<span class="text-danger">*</span></div>
           		</label>
				<input
					type="text"
               		name="password"
                	id="password-id"
                	class="inputs"
            	/>

            	<label for="password2-id">
            		<div id="password2-header" class="response-headers">Confirm Password<span class="text-danger">*</span></div>
            	</label>
				<input
					type="text"
               		name="password2"
                	id="password2-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <div id="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    id="keep-id"
                    value="yes"
                  />
                  <label for="keep-id">Keep me logged in</label>
            </div> <!-- #keep-login -->

            <!-- <?php if ( isset($error) && trim($error) != '' ) : ?>
            	<div class="text-danger">
            		<?php echo $error; ?>
            	</div>
            <?php else : ?>
            	Welcome to Ethical Threads!
            <?php endif; ?> -->

            <div id="next-btn">
            	<button id="next-text" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->
		</div> <!-- #signup -->

		</form>

		<p>By creating an account, you agree to the Ethical Threads
		<br>terms of use and privacy policy.</p>
		
	</div> <!-- #signup-everything -->
	</div> <!-- .overlay -->

	<script>
		document.querySelector('form').onsubmit = function() {
			var user_name = document.getElementById('fullname-id').value;
			var user_email = document.getElementById('email-id').value;
			var user_password = document.getElementById('password-id').value;
			var user_password2 = document.getElementById('password2-id').value;

			if ( user_name === '' || user_email === '' || user_password === '' || user_password2 === '' ) {
				alert('Please fill out all required fields.');
				return false;
			}
		}
	</script>
</body>

</html>
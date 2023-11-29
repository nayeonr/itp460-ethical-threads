<?php
	
	//require '../ft-login-N/config.php';
	//session_start();

	// all fields are filled out
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

			$sql_Susers = "SELECT *
						FROM users
						WHERE email = '$Semail';
						";

			$results_Susers = $mysqli->query($sql_Susers);

			// check for errors
			if ( !$results_Susers ) {
				echo $mysqli->error;
				$mysqli->close();
				exit();
			}

			if ( $results_Susers->num_rows > 0 ) {
				// email is taken
				$Serror = "Be more original. Email is already registered.";
			}
			else {
				// valid email
				if ( $Spassword != $Spassword2 ) {
					// passwords do not match
					$Serror = "Passwords do not match.";
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

					$Serror = "$name was successfully registered!";
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
    <!-- <link href="../ft-login-N/login.css" rel="stylesheet"/> -->
    <link href="../ft-login-N/signup.css" rel="stylesheet"/>
</head>

<body>
	<div id="overlay2" class="overlay">

	<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">

	<div id="signup-everything">
		<a href="../ft-home-a/home.php"><img src="../ft-login-N/exit.png" alt="exit" id="close-signup"></a>
		
		<div id="signup">

			<h2 class="login-headers">Sign Up</h2>
			<!-- <hr class="signup-hr"> -->
			<p class="signup-p">It costs nothing to set up an
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

            	<label for="Semail-id">
					<div id="Semail-header" class="response-headers">Email<span class="text-danger">*</span></div>
				</label>
				<input
					type="text"
               		name="Semail"
                	id="Semail-id"
                	class="inputs"
            	/>

            	<label for="Spassword-id">
            		<div id="Spassword-header" class="response-headers">Password<span class="text-danger">*</span></div>
           		</label>
				<input
					type="text"
               		name="Spassword"
                	id="Spassword-id"
                	class="inputs"
            	/>

            	<label for="Spassword2-id">
            		<div id="Spassword2-header" class="response-headers">Confirm Password<span class="text-danger">*</span></div>
            	</label>
				<input
					type="text"
               		name="Spassword2"
                	id="Spassword2-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <!-- <div class="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    id="keep-id"
                    class="keep-class"
                    value="yes"
                  />
                  <label for="keep-id">Keep me logged in</label>
            </div> #keep-login -->

            <div id="Snext-btn" class="next-btn">
            	<button id="next-text2" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->

            <p class="signup-p">By creating an account, you agree to the Ethical Threads
			<br>terms of use and privacy policy.</p>
		</div> <!-- #signup -->

		</form>
		
	</div> <!-- #signup-everything -->
	</div> <!-- .overlay -->

	<div>
		<?php
			if ( isset($Serror) && trim($Serror) != '' ) { 
				echo "<script>alert('$Serror');</script>";
			}
		?>
	</div>

	<script>

		document.querySelector('#Snext-btn').onclick = function() {
			var user_name = document.getElementById('fullname-id').value;
			var user_Semail = document.getElementById('Semail-id').value;
			var user_Spassword = document.getElementById('Spassword-id').value;
			var user_Spassword2 = document.getElementById('Spassword2-id').value;

			if ( user_name === '' || user_Semail === '' || user_Spassword === '' || user_Spassword2 === '' ) {
				alert('Please fill out all required fields.');
				return false;
			}
		}
	</script>
</body>

</html>
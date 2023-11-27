<?php
	if (session_status() == PHP_SESSION_NONE) {
    		session_start();
	}
	require '../ft-login-N/config.php';

	$_SESSION['logged_in'] = false;

	// check if user has already logged in
	if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true )
	{
		$_SESSION['logged_in'] = true;
		// logged in
		// redirect to profile page
		//header('Location: ../ft-profilepage-s/ft-profilepage-S.php');
		exit();
	} 
	else
	{
		// not logged in

		// if there was form submission
		if ( isset($_POST['Lemail']) && isset($_POST['Lpassword']) )
		{
			/*if (session_status() == PHP_SESSION_NONE) {
    			session_start();
			}*/
	
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

			$sql_Lusers = "SELECT *, users.name AS name
						FROM users
						WHERE email = '$Lemail'
								AND password = '$Lpassword';
						";

			$results_Lusers = $mysqli->query($sql_Lusers);

			// check for errors
			if ( !$results_Lusers ) {
				echo $mysqli->error();
				$mysqli->close();
				exit();
			}

			$mysqli->close();

			if ( trim($_POST['Lemail']) == "" || trim($_POST['Lpassword']) == "" )
			{
				// no/missing credentials
				$Lerror = "Please enter both email and password.";
			}
			else if ( $results_Lusers->num_rows > 0 )
			{
				$user = $results_Lusers->fetch_assoc();
				// valid credentials

				// set session variables
				$_SESSION['logged_in'] = true;

				// store user's name
				$_SESSION['user_name'] = $user['name'];

				// redirect to profile page
				header('Location: ../ft-profilepage-s/ft-profilepage-S.php');
				exit();
			}
			else
			{
				// wrong credentials
				$Lerror = "Invalid credentials.";
			}
		} 
	}
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Threads</title>
    
    <link href="../global_css.css" rel="stylesheet"/>
    <link href="../ft-login-N/login.css" rel="stylesheet"/>
   <!-- <link href="../ft-login-N/signup.css" rel="stylesheet"/> -->

    <style>
    	#overlay1 {
			display: none;
			position: fixed;
     		top: 0;
      		left: 0;
      		width: 100%;
      		height: 100%;
     		background:rgba(67, 63, 66, 0.5);

     		align-items: center;
     		justify-content: center;
			margin: 0px auto;
     	}
    </style>
</head>

<body>
		<!-- POPUPS -->
	<div id="overlay1" class="overlay">

	<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">

	<div id="login-everything">
		<img src="../ft-login-N/exit.png" alt="exit" id="close-login">

		<div id="login">
			<h2 class="login-headers">Login</h2>
			<hr class="login-hr1">
			<p class="login-p">Login to save brands and items to your favorites
			<br>so that you never lose them!</p>
			<div class="responses">
				<div id="Lemail-header" class="response-headers">Email</div>
				<input
					type="text"
               		name="Lemail"
                	id="Lemail-id"
                	class="inputs"
            	/>

            	<div id="Lpassword-header" class="response-headers">Password</div>
				<input
					type="text"
               		name="Lpassword"
                	id="Lpassword-id"
                	class="inputs"
            	/>
            </div> <!-- .responses -->

            <!-- <div class="keep-login">
            	<input
                    type="checkbox"
                    name="keep"
                    id="keep-id"
                    class="keep-class"
                  />
                  Keep me logged in
            </div> .keep-login -->

            <div id="Lnext-btn" class="next-btn">
            	<button id="next-text1" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->
		</div> <!-- #login -->

		</form>
		
		<div id="signup">
			<hr class="login-hr">
			<h2 class="login-headers">Don't have an account?</h2>
			<p class="login-p">It costs nothing to set up an
			<br>Ethical Threads account!</p>

			<div id="signup-btn">
            	<button id="joinus" class="login-buttons" type="submit"><a href="../ft-navbar-N/navbar.php#overlay2" id="joinus-text">
            		Sign Up
            	</a></button>
            </div> <!-- #signup-btn -->

		</div> <!-- #signup -->
	</div> <!-- #login-everything -->
	</div> <!-- .overlay -->

	<div>
		<?php
			if ( isset($Lerror) && trim($Lerror) != '' ) { 
				echo "<script>alert('$Lerror');</script>";
			}
		?>
	</div>

	<script>
		document.querySelector('#Lnext-btn').onclick = function(event) {
			var user_Lemail = document.getElementById('Lemail-id').value;
			var user_Lpassword = document.getElementById('Lpassword-id').value;

			if ( user_Lemail === '' || user_Lpassword === '' ) {
				alert('Please enter both email and password.');
				return false;
			}
		}
	</script>
</body>

</html>
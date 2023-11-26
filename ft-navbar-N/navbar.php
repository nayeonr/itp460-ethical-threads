<?php
	session_start();

	require '../ft-login-N/config.php';

	//$_SESSION['logged_in'] = false;
	require '../ft-login-N/login.php';
	require '../ft-login-N/signup.php';

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../global_css.css" rel="stylesheet"/>
    <link href="../ft-login-N/login.css" rel="stylesheet"/>
    <link href="../ft-login-N/signup.css" rel="stylesheet"/>

    <title>Nav Bar</title>
    
    <style>
		.overlay {
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
			<a href="../ft-home-a/home.php"><img src="../ft-navbar-N/logo.png" alt="Ethical Threads Logo" id="logo"></a>
			<ul class="nav-menu">
				<li><a href="../ft-discover-N/discover.php">Discover</a></li>
				<li><a href="../ft-about-pg-b/about-page.php">About</a></li>
				<!-- if logged in, show Profile button -->
					<?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ) : ?>
						<li>
							<a href="../ft-login-N/login.php" id="open-login">Profile<?php echo $row['name']; ?></a>
						</li>
					<?php else : ?>
						<li><a href="../ft-login-N/login.php" id="open-login">Login</a></li>
					<?php endif; ?>
				<!--<li><a href="../ft-login-N/login.php" id="open-login">Login</a></li> -->
				<li><a><img src="../ft-navbar-N/magnify.png" alt="Search" id="search"></a></li>
			</ul> <!-- .nav-menu -->
		</div> <!-- #nav -->
	</nav>

		<!-- POPUPS -->
	<div id="overlay1" class="overlay">

	<form method="POST" id="login-form">

	<div id="login-everything">
		<img src="../ft-login-N/exit.png" alt="exit" id="close-login">

		<div id="login">
			<h2 class="login-headers">Login</h2>
			<hr>
			<p>Login to save brands and items to your favorites
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

            <div class="keep-login">
            	<input
                    type="checkbox"
                    name="Lkeep"
                    id="Lkeep-id"
                    class="keep-class"
                  />
                  Keep me logged in
            </div> <!-- #keep-login -->

            <div id="Lnext-btn" class="next-btn">
            	<button id="next-text1" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->
		</div> <!-- #login -->

		</form>
		
		<div id="signup">
			<hr>
			<h2 class="login-headers">Don't have an account?</h2>
			<p>It costs nothing to set up an
			<br>Ethical Threads account!</p>

			<div id="signup-btn">
            	<button id="joinus" class="login-buttons" type="submit"><a href="../ft-navbar-N/navbar.php#overlay2" id="joinus-text">
            		Sign Up
            	</a></button>
            </div> <!-- #signup-btn -->

		</div> <!-- #signup -->
	</div> <!-- #login-everything -->
	</div> <!-- #overlay1 .overlay -->


	<div id="overlay2" class="overlay">

	<form method="POST" id="signup-form">

	<div id="signup-everything">
		<a href="../ft-home-a/home.php"><img src="../ft-login-N/exit.png" alt="exit" id="close-signup"></a>
		
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

            <div class="keep-login">
            	<input
                    type="checkbox"
                    name="Skeep"
                    id="Skeep-id"
                    class="keep-class"
                    value="yes"
                  />
                  <label for="keep-id">Keep me logged in</label>
            </div> <!-- #keep-login -->

            <div id="Snext-btn" class="next-btn">
            	<button id="next-text2" class="login-buttons" type="submit">Next</button>
            </div> <!-- #next-btn -->
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

			/* LOGIN ERROR */
		document.querySelector('#Lnext-btn').onclick = function() {

			document.querySelector('#login-form').action = window.location.href;

			var user_Lemail = document.getElementById('Lemail-id').value;
			var user_Lpassword = document.getElementById('Lpassword-id').value;

			if ( user_Lemail === '' || user_Lpassword === '' ) {
				alert('Please enter both email and password.');
				return false;
			}
		}

			/* SIGNUP ERROR */
		document.querySelector('#Snext-btn').onclick = function() {

			document.querySelector('#signup-form').action = window.location.href;

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
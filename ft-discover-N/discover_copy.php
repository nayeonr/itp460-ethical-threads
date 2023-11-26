<?php
	/*session_start();

	require '../ft-login-N/config.php';

	$_SESSION['logged_in'] = false;
	require '../ft-login-N/login.php';
	require '../ft-login-N/signup.php'; */
	require '../ft-navbar-N/navbar.php';
	require '../db_config.php';
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Page</title>

    <link href="../global_css.css" rel="stylesheet"/>

    <style>

		.discover-headers {
			padding-left: 35px;
			padding-bottom: 0;
			margin-bottom: 0;
			font-family: "Quicksand", "Arial", sans-serif;
			color: #433F42;
		}

		.row {
			display: flex;
			align-items: center;
			margin: 0px auto;
		}

		#discover img {
			width: 300px;
			margin: 0px auto;
		}

		img:hover
		{
			transform: scale(1.05);
			border-radius: 15px;
			box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
		}

		.captions {
			font-family: "Open Sans", "Arial", sans-serif;
			color: #433F42;
			display: flex;
			width: 300px;
			margin: 0px auto;
		}

		.captions > a {
			color: #433F42;
		}
	</style>
</head>

<body>
	<!-- DISCOVER -->
	<div id="discover">
		<h1 class="discover-headers">Discover more brands to love</h1>

		<h2 class="discover-headers">Sustainable Threads of the Week</h2>
		
		<div id="row1" class="row">
			<img src="../ft-discover-N/img/village-thrive.png" alt="rat boi">
			<img src="../ft-discover-N/img/ethletic.png" alt="Allbirds">
			<img src="../ft-discover-N/img/daria-day.png" alt="Daria Day">
			<img src="../ft-discover-N/img/mary-young.png" alt="MARY YOUNG">
		</div> <!-- #row1 -->

		<div id="captions1" class="row">
			<div id="caption1" class="captions">
				rat boi
			</div> <!-- #caption1 -->
			
			<div id="caption2" class="captions">
				Allbirds
			</div> <!-- #caption2 -->
			
			<div id="caption3" class="captions">
				Daria Day
			</div> <!-- #caption3 -->

			<div id="caption4" class="captions">
				MARY YOUNG
			</div> <!-- #caption4 -->
		</div> <!-- #captions1 -->

		<h2 class="discover-headers">Black-Owned of the Week</h2>
		<div id="row2" class="row">
			<img src="../ft-discover-N/img/mien.png" alt="Mien">
			<img src="../ft-discover-N/img/logan-hollowell.png" alt="Logan Hollowell">
			<img src="../ft-discover-N/img/hiptipico.png" alt="Hiptipico" href="../ft-brand-pg-b/brand-page.html">
			<img src="../ft-discover-N/img/mien.png" alt="Mien">
		</div> <!-- #row2 -->

		<div id="caption5" class="row">
			<div id="caption5" class="captions">
				Nubian Skin
			</div> <!-- #caption5 -->
			
			<div id="caption6" class="captions">
				CISE
			</div> <!-- #caption6 -->
			
			<div id="caption7" class="captions">
				Jolie Noir
			</div> <!-- #caption7 -->

			<div id="caption8" class="captions">
				Cherry Blossom Intimates
			</div> <!-- #caption8 -->
		</div> <!-- #captions2 -->

		<h2 class="discover-headers">Latiné-Owned of the Week</h2>
		<div id="row3" class="row">
			<img src="../ft-discover-N/img/mien.png" alt="Mien">
			<img src="../ft-discover-N/img/valani.png" alt="Valani">
			<img src="../ft-discover-N/img/hiptipico.png" alt="Hiptipico" href="../ft-brand-pg-b/brand-page.html">
			<img src="../ft-discover-N/img/valani.png" alt="Valani">
		</div> <!-- #row2 -->

		<div id="captions3" class="row">
			<div id="caption9" class="captions">
				JZD
			</div> <!-- #caption9 -->
			
			<div id="caption10" class="captions">
				Flaca Creations
			</div> <!-- #caption10 -->

			<div id="caption11" class="captions">
				<a href="../ft-brand-pg-b/brand-page.html">Hiptipico</a>
			</div> <!-- #caption11 -->

			<div id="caption12" class="captions">
				Poplinen
			</div> <!-- #caption12 -->
		</div> <!-- #captions3 -->

	</div> <!-- #discover -->

	<div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div> <!-- .footer -->

    <script>
		
	</script>
</body>

</html>
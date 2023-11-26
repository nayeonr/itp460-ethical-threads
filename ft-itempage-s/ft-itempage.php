<!-- item page -->
<?php	
		//itp 304 lecture 6, php mysqli
		echo "<pre>";
		var_dump($_GET);
		echo "</pre>";

		$host = "304.itpwebdev.com";
		$user = "ethreads";
		$pass = "460uscitp";
		$db = "ethreads_brands_db";
	
	$mysqli = new mysqli($host, $user, $pass, $db);

	if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql = "SELECT *
		FROM items
    LEFT JOIN brands
   		ON items.brand_id = brands.brand_id;"

	$mysqli->close();

?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Item Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="
		sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../global_css.css">
    <link rel="stylesheet" href="../ft-login-N/login.css">
    <link rel="stylesheet" href="../ft-login-N/signup.css">
  </head>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Pixelify+Sans:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap');

  

	h2 {
	    font-family: "Quicksand", "Arial", sans-serif;
	    color: #433F42;
	    font-size: 24px;
	}

	.block-1 {
		display: flex;
		padding-left: 125px;
	}

	.block-2 {
		display: flex;
		padding-left: 225px;
		margin-bottom: 5%;
	}

	.item-preview {
		margin-right: 70px;
		margin-top: 120px;
		margin-left: 100px;
		margin-bottom: 50px;
		width: 500px;
		height: 500px;
		border-radius: 2px;
	}

	.item-preview img {
		width: 500px;
		height: 500px;
		border-radius: 2px;
	}

	.item-text{
		margin-right: 120px;
		margin-top: 80px;
		margin-bottom: 50px;
		padding: 2%;
		width: 450px;
		height: 450px;
		border-radius: 2px;
	}

	.discover-item{

		padding-right: 2%;
		margin-top: 2%;
		margin-bottom: 2%;
		margin-right: 2.2%;
		width: 220px;
		height: 220px;
		border-radius: 5px;
	}

	#discover-heading {
		margin-left: 225px;
	}

	.discover-item img {
		width: 220px;
		height: 220px;
		border-radius: 5px;
	}

	#brand-logo {
		width: 25px;
		height: 25px;
		border-radius: 20px;
		margin-top: 3%;
		margin-bottom: -1%;
	}

	#item-name {
		font-size: 48px;
		margin-top: 0px;
		margin-bottom: 2%;
	}

	#seller-name {
		font-size: 24px;
	}

	#price {
		font-size: 24px;
	}

	#description {
		font-size: 18px;
		font-weight: lighter;
	}

	#discover-item-name{
		font-size: 18px;
		font-weight: bold;
		padding-top: 2%;
		margin-top: 2%;
	}

</style>

</head>
<body>

  <div id="nav">
                <a href="../ft-home-a/home.html"><img src="../ft-navbar-N/logo.png" alt="Ethical Threads Logo" id="logo"></a>
                <ul class="nav-menu">
                    <li><a href="../ft-discover-N/discover.html">Discover</a></li>
                    <li><a href="../ft-about-pg-b/about-page.html">About</a></li>
                    <li><a href="../ft-login-N/login.html">Login</a></li>
                    <li><a href=""><img src="../ft-navbar-N/magnify.png" alt="Search" id="search"></a></li>
                </ul> <!-- .nav-menu -->
            </div> 


<div class="block-1">
	<?php while ($row = $results->fetch_assoc()) : ?>
		<div class="item-preview">
			<img src="<?php echo $row['item_image']; ?>" id="clothing-img">
		</div>

		<div class="item-text">	
				<h1 id="item-name"> <?php echo $row['item_name']; ?></h1>
				
				<h2 id="seller-name"> <?php echo $row['brand_name']; ?></h2>

				<p id="price"> <?php echo $row['item_price']; ?> </p>

				<p id="description"> <?php echo $row['item_description']; ?> </p>

				<div class="tag">
					<p> <?php echo $row['brand_filter']; ?> </p>
				</div>
		<?php endwhile; ?>

		</div>
</div>

<h1 id="discover-heading"> More by </h1>
<div class="block-2">
	<div class="discover-item">
		<img src= />
		<p id="discover-item-name"> </p>
	</div>

	<div class="discover-item">
		<img src= />
		<p id="discover-item-name"> </p>
	</div>

	<div class="discover-item">
		<img src= />
		<p id="discover-item-name"> </p>
	</div>

	<div class="discover-item">
		<img src= />
		<p id="discover-item-name"> </p>
	</div>
</div>


<div class="footer">
      <span id="copyright"> © Ethical Threads </span>
</div>

<script>

		// /* LOGIN POPUP */
		// document.querySelector('#open-login').onclick = function(event) {
		// 	event.preventDefault();
		// 	document.querySelector('.overlay').style.display = 'flex';
		// };

		// document.querySelector('#close-login').onclick = function(event) {
		// 	event.preventDefault();
		// 	document.querySelector('.overlay').style.display = 'none';
		// };

		// 	/* SIGNUP POPUP */
		// document.querySelector('#joinus').onclick = function(event) {
		// 	event.preventDefault();
		// 	document.querySelector('#overlay1').style.display = 'none';
		// 	document.querySelector('#overlay2').style.display = 'flex';
		// }

		// document.querySelector('#close-signup').onclick = function(event) {
		// 	event.preventDefault();
		// 	document.querySelector('#overlay2').style.display = 'none';
		// 	document.querySelector('.overlay').style.display = 'none';
		// };


</script>

</body>
</html>
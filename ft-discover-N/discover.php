<?php
	
	require '../ft-navbar-N/navbar.php';
	require '../db_config.php';

	$mysqli = new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);

	// check for errors
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

	$mysqli->set_charset('utf8');

	// retrieve results for Sustainable brands from brands DB
	$sql_sustainable = "SELECT brands.brand_id, brands.brand_name, brands.header_image
                    	FROM brands
                    	LEFT JOIN filtered_brands
                    		ON brands.brand_id = filtered_brands.brand_id
                  		LEFT JOIN filters
                  			ON filtered_brands.filter_id = filters.filter_id
                    	WHERE filters.filter_id = 7
                    	AND brands.header_image != '';";

	$results_sustainable = $mysqli->query($sql_sustainable);

		// check for errors
	if (!$results_sustainable) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }

    $discover_sustainable = array();
    while ($row = $results_sustainable->fetch_assoc()) {
        $discover_sustainable[] = $row;
    }

	// retrieve results for Black-owned brands from brands DB
	$sql_black = "SELECT brands.brand_id, brands.brand_name, brands.header_image
                    FROM brands
                    LEFT JOIN filtered_brands
                    	ON brands.brand_id = filtered_brands.brand_id
                    LEFT JOIN filters
                    	ON filtered_brands.filter_id = filters.filter_id
                    WHERE filters.filter_id = 2
                    AND brands.header_image != '';";

	$results_black = $mysqli->query($sql_black);
	
		// check for errors
	if (!$results_black) {
	    echo $mysqli->error;
	    $mysqli->close();
	    exit();
	}

	$discover_black = array();
	while ($row = $results_black->fetch_assoc()) {
	    $discover_black[] = $row;
	}

	// retrieve results for Latiné-owned brands from brands DB
	$sql_latine = "SELECT brands.brand_id, brands.brand_name, brands.header_image
                    FROM brands
                    LEFT JOIN filtered_brands
                    	ON brands.brand_id = filtered_brands.brand_id
                    LEFT JOIN filters
                    	ON filtered_brands.filter_id = filters.filter_id
                    WHERE filters.filter_id = 3
                    AND brands.header_image != '';";

	$results_latine = $mysqli->query($sql_latine);
	
		// check for errors
	if (!$results_latine) {
	    echo $mysqli->error;
	    $mysqli->close();
	    exit();
	}

	$discover_latine = array();
	while ($row = $results_latine->fetch_assoc()) {
	    $discover_latine[] = $row;
	}

	$mysqli->close();

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Page</title>

    <link href="../global_css.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../ft-login-N/signup.css">
    <link rel="stylesheet" href="../ft-login-N/login.css">

    <style>
    	#logo {
    		margin-top: 5px;
    	}
    	

    	.discover-headers {
			padding-left: 35px;
			padding-bottom: 0;
			margin-bottom: 10px;
			align-items: left;
		}

		h1 {
    		font-size: 40px;
    	}

		.image-container {
			display: inline-block;
			padding-left: 15px;
		}

		.image-wrapper {
		    margin: 20px;
		    margin-top: 0;
		    margin-bottom: 0;
		    width: 300px;
		    height: 300px;
		    overflow: hidden;
		}

		/*.image-wrapper {
			height: 300px;
			margin: 0;
			padding: 0;
		    border-radius: 15px;
		}*/

		.image-wrapper:hover
		{
			transform: scale(1.05);
			box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
			border-radius: 15px;
		}

		.image-wrapper img {
		    width: 100%;
		    height: 300px;
		    object-fit: cover;
		    object-position: center;
		    border-radius: 15px;
		}

		.captions {
		    display: flex;
		    margin: 10px;
		    padding-left: 10px;
		    font-weight: 1000;
		}
    </style>
</head>

<body>
	<!-- DISCOVER -->
	<div id="discover">
		<h1 class="discover-headers">Discover More Brands to Love</h1>

        <h2 class="discover-headers">Sustainable Threads of the Week</h2>
        <div id="row1" class="rows">
            <?php foreach (array_slice($discover_sustainable, 1, 5) as $brand) { ?>
                <div class="image-container">
                	<div class="image-wrapper">
                    	<a href="../ft-brand-pg-b/brand-page.php?brand_id=<?php echo $brand['brand_id']; ?>"><img src="<?php echo $brand['header_image']; ?>" alt="<?php echo htmlspecialchars($brand['brand_name']); ?>"></a>
                    </div>
		            <div class="captions"><?php echo htmlspecialchars($brand['brand_name']); ?></div>
                </div>
            <?php } ?>
        </div>

        <h2 class="discover-headers">Black-Owned of the Week</h2>
		<div id="row2" class="rows">
		    <?php foreach (array_slice($discover_black, 0, 4) as $brand) { ?>
		        <div class="image-container">
		        	<div class="image-wrapper">
		            	<a href="../ft-brand-pg-b/brand-page.php?brand_id=<?php echo $brand['brand_id']; ?>"><img src="<?php echo $brand['header_image']; ?>" alt="<?php echo htmlspecialchars($brand['brand_name']); ?>"></a>
		            </div>
		            <div class="captions"><?php echo htmlspecialchars($brand['brand_name']); ?></div>
		        </div>
		    <?php } ?>
		</div>

		<h2 class="discover-headers">Latiné-Owned of the Week</h2>
		<div id="row3" class="rows">
		    <?php foreach (array_slice($discover_latine, 0, 4) as $brand) { ?>
		        <div class="image-container">
		        	<div class="image-wrapper">
		            	<a href="../ft-brand-pg-b/brand-page.php?brand_id=<?php echo $brand['brand_id']; ?>"><img src="<?php echo $brand['header_image']; ?>" alt="<?php echo htmlspecialchars($brand['brand_name']); ?>"></a>
		        	</div>
		            <div class="captions"><?php echo htmlspecialchars($brand['brand_name']); ?></div>
		        </div>
		    <?php } ?>
		</div>

	</div> <!-- #discover -->

	<div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div> <!-- .footer -->

    <script>
		
	</script>
</body>

</html>
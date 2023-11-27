<?php
    require '../ft-navbar-N/navbar.php';
    //post to bria's page (brand information if a user clicks an image) post id to bria's page through on click
    //bria would get information from home page regarding brand to input into about the brand
    require '../db_config.php';

    $mysqli = new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);

    if ($mysqli -> connect_errno) {
		echo $mysqli -> connect_error;
		// Terminate PHP script
		exit();
	}
    
    $sql_filter = "SELECT * FROM filters";

    $results_filters = $mysqli->query( $sql_filter );

    // Check for SQL Errors.
    if ( !$results_filters ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    }

    $sql_brands = "SELECT * FROM brands";

    $results_brands = $mysqli->query( $sql_brands );

    // Check for SQL Errors.
    if ( !$results_brands ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    }

    $sql_itemtype = "SELECT * FROM item_type";

    $results_itemtype = $mysqli->query( $sql_itemtype );

    // Check for SQL Errors.
    if ( !$results_itemtype ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    }

    $mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Threads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../global_css.css">
    <link rel="stylesheet" href="../ft-login-N/signup.css">
    <link rel="stylesheet" href="../ft-login-N/login.css"> 
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Pixelify+Sans:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap');
    .nav-menu {
        margin-top: 15px;
    }
    label{
        color: #433F42;
        font-family: Quicksand; 
        font-size: 15px;
    }
    /* #searchtype{
        color: #F7F6F2;
        font-size: 15px;
        font-family: Quicksand;
        background: #82A7A6; 
        border-radius: 15px; 
        border: none;
        text-align: center;
        box-shadow: none;  
    } */
    .banner {
        background-image: url('../ft-home-a/img/mainhero.jpg');
        /* background-repeat: no-repeat; */
        /* width:100%; */
        /* height: 100%; */
        /* background: #664c8f; */
        height: auto;
        background-position: center;
        background-size: cover;
        padding: 100px 100px;
    }
    .title {
        color: #F7F6F2;
        font-size: 80px;
        font-family: Quicksand;
        font-weight: 700;
        word-wrap: break-word;
        padding-top: 50px;
        text-shadow: 2px 2px 8px #000000;
    }
    .bannerdesc {
        color: #F7F6F2;
        font-family: Quicksand;
        font-weight: 500;
        text-shadow: 2px 2px 5px #000000;
    }
    .learn {
        /* width: 171px; 
        height: 54px;  */
        background: #82A7A6; 
        border-radius: 15px;
        /* border: 2px solid #82A7A6; */
        font-size: 15px;
        font-family: Quicksand;
        color: #F7F6F2;
        margin-top: 150px;
        margin-left: 75px;
    }
    .learn:hover {
        /* width: 171px; 
        height: 54px;  */
        background: darkcyan; 
        border-radius: 15px;
        /* border: 2px solid #82A7A6; */
        font-size: 15px;
        font-family: Quicksand;
        color: #F7F6F2;
        margin-top: 150px;
        margin-left: 75px;
    }
    .search {
        margin: 100px; 
    }
    .searchbut {
        background: #82A7A6; 
        border-radius: 15px;
        /* border: 2px solid #82A7A6; */
        font-size: 15px;
        font-family: Quicksand;
        color: #F7F6F2;
    }
    .searchbut:hover {
        background: darkcyan;
        color: #F7F6F2; 
        border-radius: 15px;
        font-size: 15px;
        font-family: Quicksand;
    }
    /* .round {
        border-radius: 15px;
        font-size: 15px;
        font-family: Quicksand;
    }
    .clickedsearchbut {
        border-radius: 0px 15px 0px 0px;
        margin-left: -10px;
    }
    .clickedround {
        border-radius: 15px 0px 0px 0px;
    }
    .searchline{
        margin-top:10px;
    } */
    /* #popdown{
        display: none;
        background-color: #DDBA9F; 
        border-radius: 0px 0px 15px 15px;
        font-size: 15px;
        font-family: Quicksand;
        color: #433F42;
    }
    li {
        display: inline;
        /* font-size: 18px; 
        margin-right: 15px;
        color: #433F42;
    }
    h6 {
        margin-left: 15px;
        color: #433F42;
    }
    #filters {
        display: inline;
        /* font-size: 20px;
        margin-left: 15px;
        color: #433F42;
    }
    .selected-filter {
        background-color: #92BCC5;
        border-radius: 20px;
        padding-right: 15px;
        padding-left: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
        color: #F7F6F2;
    }
    .filter-div {
        margin-top: 20px;
    }*/
    .discoverlocal {
        background-color: #DDBA9F;
        padding: 25px;
        margin-top: 25px;
    }
    .sectionheader {
        color: black;
        font-family: Quicksand;
        font-weight: 500;
        margin-bottom: 25px;
    }
    .discoverlocal1 {
        background-color: #DDBA9F;
        margin-top: 50px;
        padding: 25px;
    }
    .card {
        background-color: #DDBA9F;
        border-color: #DDBA9F;
    }
    .card-title {
        font-family: Quicksand;
        text-align: left;
        margin-left: 10px;
    }
    .homepic{
        color: #433F42;
    }
    .homepic:hover{
        color: #82A7A6;
    }
    .toggle{
        margin-bottom: 10px;
    }
    .popular{
        padding-bottom: 25px;
    }
    .rowspace{
        margin-top: 10px;
    }
</style>
</head>
    <body>
        <!-- <nav>
            <div id="nav">
                <a href="../ft-home-a/home.html"><img src="../ft-navbar-N/logo.png" alt="Ethical Threads Logo" id="logo"></a>
                <ul class="nav-menu">
                    <li><a href="../ft-discover-N/discover.php">Discover</a></li>
                    <li><a href="../ft-about-pg-b/about-page.php">About</a></li>
                    <li><a href="../ft-login-N/login.php" id="open-login">Login</a></li>
                    <li><a href=""><img src="../ft-navbar-N/magnify.png" alt="Search" id="search"></a></li>
                </ul> 
            </div> 
        </nav> -->

        <div class="banner">
            <div class="row">
                <div class="col-10">
                    <h1 class="title">Ethical Threads</h1>
                    <h4 class="bannerdesc">Empowering communities, one conscious choice at a time</h5>
                </div>
                <div class="col-2">
                    <button type="button" class="btn learn"><a href="../ft-about-pg-b/about-page.php">Learn More</a></button>
                </div>
            </div>   
        </div>

        <div class="search">
            <div class="row">
                <div class="col">
                    <h4 class="sectionheader">Search For Products</h4>
                </div>
            </div>
            <div class="row searchline">
                <div class="col"> 
                    <form action="../ft-productresult-C/product-results-pg.php" method="GET">
                        <div class="form-group row">
                            <label for="filter-id" class="col-sm-3 col-form-label text-sm-right">Type of Brand:</label>
                            <div class="col-sm-9">
                                <select name="filter_id" id="filter-id" class="form-control">
                                    <option value="" selected>-- All --</option>

                                    <?php while ( $row = $results_filters->fetch_assoc() ) : ?>
                                    <option value="<?php echo $row['filter_id']; ?>">
                                        <?php echo $row['filter_name']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div> <!-- .form-group -->
                        
                        <div class="form-group row rowspace">
                            <label for="itemtype-id" class="col-sm-3 col-form-label text-sm-right">Item Type:</label>
                            <div class="col-sm-9">
                                <select name="item_type_id" id="itemtype-id" class="form-control">
                                    <option value="" selected>-- All --</option>

                                    <?php while ( $row = $results_itemtype->fetch_assoc() ) : ?>
                                    <option value="<?php echo $row['item_type_id']; ?>">
                                        <?php echo $row['item_type']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div> <!-- .form-group -->
                        
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 mt-2">
                                <button type="submit" class="btn searchbut">Search</button>
                            </div>
                        </div> <!-- .form-group -->
                    </form>
                </div>
            </div>
        </div>   

        <!-- <div class="search">
            <div class="row">
                <div class="col">
                    <label for="searchby">Search By:</label>
                    <select name="searchtype" id="searchtype" onChange="toggleSearchBar()">
                        <option value="brand">Brand</option>
                        <option value="product">Product</option>
                    </select>
                </div>
            </div>
            <div class="row searchline">
                <div class="col"> 
                    <form>
                        <div class="d-flex">
                        <input class="form-control me-2 round" id="searchPlaceholder" type="search" placeholder="Search Brands You Love" onClick="searchDropdown()">
                        <button class="btn searchbut" id="shape" type="submit">Search</button>
                        </div>
                        <div class="col flex-column" id="popdown">
                        <div class="row filters">
                            <div class="col filter-div">
                                <h6 id="filters">Filters</h6> -->
                                <!-- <ul>
                                    <li>Black Owned</li>
                                    <li class="selected-filter">Women Owned</li>
                                    <li> Eco Friendly </li>
                                    <li class="selected-filter"> Mission Oriented </li>
                                    <li>Local</li>
                                </ul> -->
                                <!-- <select name="filter_id" id="filter-id" class="form-control">
                                    <option value="" selected>-- All --</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <h6> Popular Brands </h6>
                        </div>
                        <div class="row justify-content-center popular">
                            <div class="col-4 text-center">
                                <img src="../ft-home-a/img/brand1.png">
                            </div>
                            <div class="col-4 text-center">
                                <img src="../ft-home-a/img/brand2.png">
                            </div>
                            <div class="col-4 text-center">
                                <img src="../ft-home-a/img/brand3.png">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div> -->
        <!-- </div>    -->

        <div class="discoverlocal">
            <h4 class="sectionheader">Browse Ethical Businesses</h4>
            <div class="row justify-content-center gx-2 gy-4">
                <div class="col text-center">
                    <a href="../ft-brand-pg-b/brand-page.php?brand_id=46">
                        <img src="../ft-home-a/img/brand1.png">
                    </a>
                </div>
                <div class="col text-center">
                    <a href="../ft-brand-pg-b/brand-page.php?brand_id=10">
                        <img src="../ft-home-a/img/brand2.png">
                    </a>
                </div>
                <div class="col text-center">
                    <a href="../ft-brand-pg-b/brand-page.php?brand_id=44">
                        <img src="../ft-home-a/img/brand3.png">
                    </a>
                </div>
                <div class="col text-center">
                    <a href="../ft-brand-pg-b/brand-page.php?brand_id=23">
                        <img src="../ft-home-a/img/brand4.png">
                    </a>
                  </div>
            </div>
        </div>

        <div class="discoverlocal1">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <div class="card">
                        <img class="card-img" src="../ft-home-a/img/discover1.png" alt="discover">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><a class="homepic" href="../ft-productresult-C/product-results-pg.php?filter_id=3">Shop Latiné Owned Businesses</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <div class="card">
                        <img class="card-img" src="../ft-home-a/img/discover2.png" alt="discover">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><a class="homepic" href="../ft-productresult-C/product-results-pg.php?filter_id=7&item_type_id=4">Shop Sustainable Winter Outerwear</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <span id="copyright"> © Ethical Threads </span>
        </div>

        <script>
            // function toggleSearchBar() {
            //     const searchType = document.getElementById('searchtype').value;
            //     const placeholderValue = document.getElementById('searchPlaceholder').value;
            //     if (searchType === 'brand') {
            //         searchPlaceholder.placeholder = 'Search Brands You Love';
            //     } else if (searchType === 'product') {
            //         searchPlaceholder.placeholder = 'Search Products You Love';
            //     }
            // }

            // function searchDropdown(){
            //     document.getElementById('popdown').style.display = "block";
            //     const searchInput = document.getElementById('searchPlaceholder');
            //     const buttonShape = document.getElementById('shape');
            //     buttonShape.classList.add('clickedsearchbut');
            //     searchInput.classList.add('clickedround');
            // }

            // window.onclick = function(event) {
            //     const dropdown = document.getElementById('popdown');
            //     const searchInput = document.getElementById('searchPlaceholder');
            //     const buttonShape = document.getElementById('shape');
            //     if (!event.target.matches('.searchbut') && !event.target.matches('.round') && !event.target.closest('#popdown')) {
            //         dropdown.style.display = 'none';
            //         buttonShape.classList.remove('clickedsearchbut');
            //         searchInput.classList.remove('clickedround');
            //     }
            // };

        </script>
    </body>
</html>

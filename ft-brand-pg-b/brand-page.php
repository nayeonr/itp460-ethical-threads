<?php
  // Navbar import
	require '../ft-navbar-N/navbar.php';

  // Establish mySQL connection
  $host = "304.itpwebdev.com";
	$user = "ethreads";
	$pass = "460uscitp";
	$db = "ethreads_brands_db";
  $mysqli = new mysqli($host, $user, $pass, $db);

  // Check for any connection errors
  if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

  // For any strange characters
  $mysqli->set_charset('utf8');

  // Get brand_id from url
  $brand_id = $_GET['brand_id'];
  // echo "<hr>$brand_id</hr>";

  // Retrieve results from the DB

  // Retrieve brand data EXECEPT for items and filters
  $sql_brand_data = "SELECT brands.brand_name AS brand_name, brands.brand_description AS brand_description, brands.website AS website, brands.instagram AS instagram, brands.price_range AS price, brands.header_image
  FROM brands
      LEFT JOIN filtered_brands
        ON brands.brand_id = filtered_brands.brand_id
      LEFT JOIN filters
        ON filtered_brands.filter_id = filters.filter_id
      WHERE filtered_brands.brand_id = $brand_id;";

  $brand_data_results = $mysqli->query($sql_brand_data);

  if ( !$brand_data_results ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

  // No need for a loop, because this SQL statement will return at most 1 record
  $brand_data_row = $brand_data_results->fetch_assoc();

  // Retrieve JUST associated FILTERS for that brand
  $sql_brand_filters = "SELECT filter_name AS filters
  FROM brands
    LEFT JOIN filtered_brands
      ON brands.brand_id = filtered_brands.brand_id
    LEFT JOIN filters
      ON filtered_brands.filter_id = filters.filter_id
    WHERE brands.brand_id = 21;";

  $brand_filters_results = $mysqli->query($sql_brand_filters);

  if ( !$brand_filters_results ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }
      
  // Retrieve brand data JUST for ITEMS from that brand
  $sql_brand_items = "SELECT items.item_name AS item_name, items.item_image AS item_image
  FROM items
    LEFT JOIN brands
      ON items.brand_id = brands.brand_id
    WHERE items.brand_id = $brand_id;";

  $brand_items_results = $mysqli->query($sql_brand_items);

  if ( !$brand_items_results ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

  // Close MySQL connection
	$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About the Brand</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../global_css.css" />
    <link rel="stylesheet" href="../ft-login-N/signup.css">
    <link rel="stylesheet" href="../ft-login-N/login.css">
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Pixelify+Sans:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap");
    body {
      font-family: Open Sans;
      color: #433f42;
      background-color: #f6f5f0;
      margin: 0;
      padding: 0;
      align-items: center;
    } 
    .container-lg {
      margin-top: 20px;
    }
    .container {
      margin-bottom: 40px;
    }
    .content-box-header {
      font-size: 32px;
      font-family: Quicksand;
      padding-bottom: 15px;
      font-weight: 500;
    }
    .content-p {
      margin-left: 18px;
      font-weight: 500;
    }
    .product-img {
      width: 230px;
      border-radius: 15px;
    }
    .row {
      margin-left: 20px;
      align-items: top;
    }
    .col {
      margin-left: 2px;
    }
    .item-box {
      width: 65%;
    }
    .item-name {
      margin-top: 10px;
      font-weight: 500;
      font-size: medium;
    }
    #hero-section-title {
      color: #f6f5f0;
      font-family: Quicksand;
      font-weight: 500;
      margin-bottom: 10px;
      font-size: 55px;
      text-shadow: 2px 2px 8px #000000;
    }
    #hero-section-b {
      font-family: Quicksand;
      background-color: #82a7a6;
      color: #f6f5f0;
      border: none;
      border-radius: 15px;
      padding: 6px;
      padding-right: 15px;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
      padding-left: 15px;
    }
    #hero-section-b:hover {
      background-color: darkcyan;
      cursor: pointer;
    }
    .icon-img {
      width: 150px;
    }

    /* hero section css from:
        getting background img + overlay in place - https://htmlcssfreebies.com/bootstrap-5-hero-section-component/
        getting overall template/arrangment of elements - https://getbootstrap.com/docs/5.3/examples/heroes/
    */
    .mb-6 {
      margin-bottom: 4.5rem !important;
    }
    .mb-7 {
      margin-bottom: 6rem !important;
    }
    .mb-8 {
      margin-bottom: 7.5rem !important;
    }
    .mb-9 {
      margin-bottom: 9rem !important;
    }
    .mb-10 {
      margin-bottom: 10.5rem !important;
    }
    .py-6 {
      padding-top: 4.5rem !important;
      padding-bottom: 4.5rem !important;
    }
    .py-7 {
      padding-top: 6rem !important;
      padding-bottom: 6rem !important;
    }
    .py-8 {
      padding-top: 7.5rem !important;
      padding-bottom: 7.5rem !important;
    }
    .py-9 {
      padding-top: 9rem !important;
      padding-bottom: 9rem !important;
    }
    .py-10 {
      padding-top: 10.5rem !important;
      padding-bottom: 10.5rem !important;
    }
    .hcf-bp-center {
      background-position: center !important;
    }
    .hcf-bs-cover {
      background-size: cover !important;
    }
    @media (min-width: 576px) {
      .mb-sm-6 {
        margin-bottom: 4.5rem !important;
      }
      .mb-sm-7 {
        margin-bottom: 6rem !important;
      }
      .mb-sm-8 {
        margin-bottom: 7.5rem !important;
      }
      .mb-sm-9 {
        margin-bottom: 9rem !important;
      }
      .mb-sm-10 {
        margin-bottom: 10.5rem !important;
      }
      .py-sm-6 {
        padding-top: 4.5rem !important;
        padding-bottom: 4.5rem !important;
      }
      .py-sm-7 {
        padding-top: 6rem !important;
        padding-bottom: 6rem !important;
      }
      .py-sm-8 {
        padding-top: 7.5rem !important;
        padding-bottom: 7.5rem !important;
      }
      .py-sm-9 {
        padding-top: 9rem !important;
        padding-bottom: 9rem !important;
      }
      .py-sm-10 {
        padding-top: 10.5rem !important;
        padding-bottom: 10.5rem !important;
      }
    }
    @media (min-width: 768px) {
      .mb-md-6 {
        margin-bottom: 4.5rem !important;
      }
      .mb-md-7 {
        margin-bottom: 6rem !important;
      }
      .mb-md-8 {
        margin-bottom: 7.5rem !important;
      }
      .mb-md-9 {
        margin-bottom: 9rem !important;
      }
      .mb-md-10 {
        margin-bottom: 10.5rem !important;
      }
      .py-md-6 {
        padding-top: 4.5rem !important;
        padding-bottom: 4.5rem !important;
      }
      .py-md-7 {
        padding-top: 6rem !important;
        padding-bottom: 6rem !important;
      }
      .py-md-8 {
        padding-top: 7.5rem !important;
        padding-bottom: 7.5rem !important;
      }
      .py-md-9 {
        padding-top: 9rem !important;
        padding-bottom: 9rem !important;
      }
      .py-md-10 {
        padding-top: 10.5rem !important;
        padding-bottom: 10.5rem !important;
      }
    }
    @media (min-width: 992px) {
      .mb-lg-6 {
        margin-bottom: 4.5rem !important;
      }
      .mb-lg-7 {
        margin-bottom: 6rem !important;
      }
      .mb-lg-8 {
        margin-bottom: 7.5rem !important;
      }
      .mb-lg-9 {
        margin-bottom: 9rem !important;
      }
      .mb-lg-10 {
        margin-bottom: 10.5rem !important;
      }
      .py-lg-6 {
        padding-top: 4.5rem !important;
        padding-bottom: 4.5rem !important;
      }
      .py-lg-7 {
        padding-top: 6rem !important;
        padding-bottom: 6rem !important;
      }
      .py-lg-8 {
        padding-top: 7.5rem !important;
        padding-bottom: 7.5rem !important;
      }
      .py-lg-9 {
        padding-top: 9rem !important;
        padding-bottom: 9rem !important;
      }
      .py-lg-10 {
        padding-top: 10.5rem !important;
        padding-bottom: 10.5rem !important;
      }
    }
    @media (min-width: 1200px) {
      .mb-xl-6 {
        margin-bottom: 4.5rem !important;
      }
      .mb-xl-7 {
        margin-bottom: 6rem !important;
      }
      .mb-xl-8 {
        margin-bottom: 7.5rem !important;
      }
      .mb-xl-9 {
        margin-bottom: 9rem !important;
      }
      .mb-xl-10 {
        margin-bottom: 10.5rem !important;
      }
      .py-xl-6 {
        padding-top: 4.5rem !important;
        padding-bottom: 4.5rem !important;
      }
      .py-xl-7 {
        padding-top: 6rem !important;
        padding-bottom: 6rem !important;
      }
      .py-xl-8 {
        padding-top: 7.5rem !important;
        padding-bottom: 7.5rem !important;
      }
      .py-xl-9 {
        padding-top: 9rem !important;
        padding-bottom: 9rem !important;
      }
      .py-xl-10 {
        padding-top: 10.5rem !important;
        padding-bottom: 10.5rem !important;
      }
    }
    @media (min-width: 1400px) {
      .mb-xxl-6 {
        margin-bottom: 4.5rem !important;
      }
      .mb-xxl-7 {
        margin-bottom: 6rem !important;
      }
      .mb-xxl-8 {
        margin-bottom: 7.5rem !important;
      }
      .mb-xxl-9 {
        margin-bottom: 9rem !important;
      }
      .mb-xxl-10 {
        margin-bottom: 10.5rem !important;
      }
      .py-xxl-6 {
        padding-top: 4.5rem !important;
        padding-bottom: 4.5rem !important;
      }
      .py-xxl-7 {
        padding-top: 6rem !important;
        padding-bottom: 6rem !important;
      }
      .py-xxl-8 {
        padding-top: 7.5rem !important;
        padding-bottom: 7.5rem !important;
      }
      .py-xxl-9 {
        padding-top: 9rem !important;
        padding-bottom: 9rem !important;
      }
      .py-xxl-10 {
        padding-top: 10.5rem !important;
        padding-bottom: 10.5rem !important;
      }
    }
    /* .hcf-overlay {
      --hcf-overlay-opacity: 0.5;
      --hcf-overlay-bg-color: var(--bs-black-rgb);
      position: relative;
    }
    .hcf-overlay::after {
      display: block;
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: rgba(
        var(--hcf-overlay-bg-color),
        var(--hcf-overlay-opacity)
      );
      z-index: 0;
    }
    .hcf-overlay > * {
      position: relative;
      z-index: 1;
    }
    .hcf-transform {
      transform: scale3d(1, 1, 1);
      transform-style: preserve-3d;
      transition: all 0.5s;
    } */
    /* end external hero section css code */

    #sm-icon {
      position: absolute;
      right: 10px;
      top: 280px;
      cursor: pointer;
    }
    .nav-menu{
      margin-top: 12px;
    }
  </style>
  <body>
    <section
      class="px-5 py-6 hcf-bp-center hcf-bs-cover hcf-overlay hcf-transform"
      style="background-image: url('brand-pg-imgs/threads.webp'); height: 300px"
    >
      <div class="px-4 py-0 my-3 text-center">
        <div id="hero-section-title" class="display-5"><?php echo $brand_data_row['brand_name']; ?></div>
        <div class="col-lg-6 mx-auto">
          <a
            href="<?php echo $brand_data_row['website']; ?>"
            target="_blank"
            rel="noopener noreferrer"
            ><button type="button" id="hero-section-b" class="btn">
              Visit Brand Website
            </button></a
          >
        </div>
          <!-- Might have to include if else statement for php if there is no instgram link -->
        <a
          href="<?php echo $brand_data_row['instagram']; ?>"
          target="_blank"
          rel="noopener noreferrer"
          ><img
            class="d-block mx-auto mb-4"
            id="sm-icon"
            src="brand-pg-imgs/insta-icon.png"
            alt="Instagram icon"
        /></a>
      </div>
    </section>
    <div class="container-lg">
      <div class="container">
        <div class="content-box-header">At a Glance</div>
        <p class="content-p">
          Cost range:
          <span style="color: #82a7a6; font-weight: 600">
          <?php echo $brand_data_row['price']; ?>
         </span>
          <br />
        </p>
        <p class="content-p">
          Has products with the following tags: &nbsp;&nbsp;
        </p>
        <div style="margin-left: 18px">

          <?php while ( $brand_filters_row = $brand_filters_results->fetch_assoc() ) : ?>
            <span class="tag"><?php echo $brand_filters_row['filters']; ?></span>
          <?php endwhile; ?>

        </div>
      </div>
      <div class="container">
        <div class="content-box-header">Top Sellers</div>
        <div class="row gx-2 gy-4">
        
            <?php while ($brand_items_row = $brand_items_results->fetch_assoc() ) : ?>
              <div class="col">
                <div class="item-box">
                  <img
                    class="product-img"
                    src="<?php echo $brand_items_row['item_image']; ?>"
                    alt="<?php echo $brand_items_row['item_name']; ?>"
                  />
                  <br />
                  <div class="item-name"><?php echo $brand_items_row['item_name']; ?></div>
              </div>
            </div>
            <?php endwhile; ?>
            
        </div>
      </div>
      <div class="container">
        <div class="content-box-header">About the Brand</div>
        <p class="content-p">
        <?php echo $brand_data_row['brand_description']; ?>
        </p>
      </div>
      <br />
    </div>
    <div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div>
    <!-- .footer -->
  </body>
</html>

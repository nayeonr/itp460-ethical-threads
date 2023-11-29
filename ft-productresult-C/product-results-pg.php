<?php
  require '../ft-navbar-N/navbar.php';
  // require '../db_config.php';
  $host = "304.itpwebdev.com";
	$user = "ethreads";
	$pass = "460uscitp";
	$db = "ethreads_brands_db";
  $mysqli = new mysqli($host, $user, $pass, $db);
  //  $mysqli = new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);


// <!-- check for connection errors  -->
 if ($mysqli->connect_errno){
  echo $mysqli->connect_error;
  exit();
} 

$mysqli->set_charset('utf8');
//  <!-- submit sql statement  -->

// $sql_title = "SELECT filter_name FROM filters WHERE filter_id = $filter_id";
// $results_title = $mysqli->query( $sql_title );

   // Check for SQL Errors.
    // if ( !$results_title ) {
    // echo $mysqli->error;
    // $mysqli->close();
    // exit();
    // }


 $sql_filter = "SELECT * FROM filters;";

 $results_filters = $mysqli->query( $sql_filter );

  // Check for SQL Errors.
    if ( !$results_filters ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    }


  $filters_row = $results_filters->fetch_assoc();


   $sql_itemtype = "SELECT * FROM item_type;";

    $results_itemtype = $mysqli->query( $sql_itemtype );

    // Check for SQL Errors.
    if ( !$results_itemtype ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    }


$sql = "SELECT DISTINCT items.item_name AS name, items.item_price AS price, items.item_image AS image, filters.filter_name AS filters, items.item_type_id, item_id, brands.brand_id
FROM items
    LEFT JOIN brands
      ON items.brand_id = brands.brand_id
    LEFT JOIN filtered_brands
      ON brands.brand_id = filtered_brands.brand_id
    LEFT JOIN filters
      ON filtered_brands.filter_id = filters.filter_id       
    WHERE 1= 1";  

  if ( isset($_GET['filter_id']) && trim($_GET['filter_id']) != '' ) {
		$filter_id = $_GET['filter_id'];
    $sql = $sql . " AND filters.filter_id = $filter_id";
	}

  if ( isset($_GET['item_type_id']) && trim($_GET['item_type_id']) != '' ) {
		$itemtypeid = $_GET['item_type_id'];
    $sql = $sql . " AND items.item_type_id = $itemtypeid";
	}

	$sql = $sql . ";";



// 	$sql = "SELECT items.item_image AS image, items.item_name AS name, items.item_price AS price, filters.filter_name AS Filters
//   FROM items 
//   LEFT JOIN brands ON brands.brand_id = items.brand_id 
//   LEFT JOIN filtered_brands ON filtered_brands.brand_id = brands.brand_id LEFT JOIN filters ON filters.filter_id = filtered_brands.filter_id;
// ";

// echo $sql;


	// if ( isset($_GET['filter_id']) && trim($_GET['filter_id']) == '' ) {
	// 	$sql_all_filers = "SELECT * FROM filters ;"
	// }

  // echo $filter_id;



	// echo "<hr>$sql<hr>";

	$results = $mysqli->query($sql);

	// Check for SQL errors.
	if ($results == false) {
		echo $results->error;
		$mysqli->close();
		exit();
	}

	// 3. Close the DB connection.
	$mysqli->close();

	// 4. Display the results.

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Product Result</title>
    
    <link href="../global_css.css" rel="stylesheet" />
    <link href="../ft-login-N/signup.php" rel="stylesheet" />
    <link href="../ft-login-N/login.php" rel="stylesheet" />
    <link href="../ft-productresult-C/style-product-result.css" rel="stylesheet" />

    <style>
        #logo {
            margin-top: 5px;
        }
        
        .products:hover
        {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
            border-radius: 15px;
        }

        #number-results {
          text-align: right;
          padding-right: 10%;
        }

        .container {
          grid-template-columns: 1fr 1fr 1fr 1fr; 
          grid-template-rows: 1fr;
          margin-left: 2%;
          margin-right: 5%;
        }

        /* .filter-heading {
          display: inline;
        } */
        /* .flexbox {
           display: flex; 
          flex-wrap: wrap;
          justify-content: space-between;
        } */

        /* .expanding-element {
          flex: 1 0 48%;
        }
     */
        .form-control {
          font-size: 1rem;
          border-radius: 5px;
          width: 10%;
        }

        form {
          text-align: left;
          margin-left: 5%;
        }

        .item-search {
          margin-top: 10px;
        }

        .footer {
          position: fixed;
          bottom: 0; 
          left: 0; 
          width: 100%;
        }
      
    </style>

    <body>
        <header>
            <h4 id="search-results"><strong>Search Results For</strong></h4>
            <h1> Clothing</h1>
          
              <!-- Clothing By Latiné Brands -->
        </header>
        <main>
            <!-- <div id="tag-div">
            <p class="not-center">Related:</p>
            <ul>
                <li class="related-items">Black Crop Vests</li>
                <li class="related-items">Cute Knitted Vests</li>
                <li class="related-items">Summer Crop Vests</li>
                <li class="related-items">Metallic Crop Vests</li>
            </ul>
            </div> -->

           <div id="number-results"> Showing <?php echo $results->num_rows; ?> result(s)</div>
<div>
<div class="flexbox">
  <div class="filters expanding-element">
<h3 class="filter-heading">Filter By:</h3>
</div>
  <!-- <div id="list1" class="dropdown-check-list" tabindex="100"> -->
      <!-- <span class="anchor">Type of Brand</span> -->
      <form action="product-results-pg.php" method="GET">
        <div class="form-group row">
          <label for="filter-id" class="col-sm-3 col-form-label text-sm-right">Type of Brand:</label>
            <div class="col-sm-9">
                <select name="filter_id" id="filter-id" class="form-control">
                  <option value="" selected>-- All --</option>
                <!-- PHP TO POPULATE RESULT OPTIONS  -->
                <?php while ( $row = $results_filters->fetch_assoc() ) : ?>
                      <option value="<?php echo $row['filter_id']; ?>">
                          <?php echo $row['filter_name']; ?>
                      </option>
                      <?php endwhile; ?>
                </select>
              </div>
        </div>    <!-- brand types/ filters -->
        
              <!--  ITEM TYPE -->
        <div class="form-group row rowspace item-form">
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
                  <button type="submit" class="btn searchbut item-search">Search</button>
              </div>
          </div> <!-- .form-group -->
        </form>
        </div>
        </div>
        </div>
  

<div class="container">   <!--for filters and products -->  
    </script>
 
        <!-- <h4 class="minority">Price</h4> -->
        <!-- <div id="list2" class="dropdown-check-list" tabindex="100">
      <span id="price-span" class="anchor">Price</span>
      <ul class="items price-pad">
        <li><input type="checkbox" />$0-$25</li>
        <li><input type="checkbox" />$25-$50</li>
        <li><input type="checkbox" />$50-$100</li>
        <li><input type="checkbox" />$100-$150</li>
      </ul>
    </div> -->
    <!-- <div class="expanding-element"></div> -->
       
    <?php while($row = $results->fetch_assoc()) : ?>
<figure>
  <a class="link" href="../ft-itempage-s/ft-itempage.php?item_id=<?php echo $row["item_id"] ?>&brand_id=<?php echo $row["brand_id"] ?>">
    <img class="products" src="<?php echo $row["image"]; ?>" alt="<?php echo $row ["name"]; ?>" />
    </a>

    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.php?item_id=<?php echo $row["item_id"] ?>&brand_id=<?php echo $row["brand_id"] ?>"><?php echo $row['name'];?><br>$<?php echo $row['price'];?></a></figcaption>

   
</figure>
<?php endwhile; ?>
    


    <!-- <figure>
    <img class="products hover-class" src="https://shopjzd.com/cdn/shop/files/KarenLoza_SeptiembreSept-21_800x.heic?v=1697045073" alt="Latina Power Baby Tees" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Latina Power Baby Tees<br>$38</a></figcaption> -->
    <!-- https://shopjzd.com/products/pre-order-latina-power-baby-tees?_pos=3&_sid=2f917d6ab&_ss=r -->
    <!-- </figure> -->

</div>
</div>
<!-- footer -->
        <div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div>
        <!-- <footer>Ethical Threads. Sign up for our Newsletter</footer> -->

    </main>


    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
        // women owned
           $(document).ready(function () {
        // Add change event listener to the select element
        $('#filter-id').on('change', function () {
            // Check if the selected value is '1' (women-owned)
            if ($(this).val() == '1') {
                // Display an alert
                alert("This feature will be coming soon! Thanks for the wait :)");
            }
        });
    });
      // aaapi owned
      $(document).ready(function () {
        // Add change event listener to the select element
        $('#filter-id').on('change', function () {
            // Check if the selected value is '1' (women-owned)
            if ($(this).val() == '4') {
                // Display an alert
                alert("This feature will be coming soon! Thanks for the wait :)");
            }
        });
    });

       // aaapi owned
      $(document).ready(function () {
        // Add change event listener to the select element
        $('#filter-id').on('change', function () {
            // Check if the selected value is '1' (women-owned)
            if ($(this).val() == '5') {
                // Display an alert
                alert("This feature will be coming soon! Thanks for the wait :)");
            }
        });
    });

     // lgbtq owned
      $(document).ready(function () {
        // Add change event listener to the select element
        $('#filter-id').on('change', function () {
            // Check if the selected value is '1' (women-owned)
            if ($(this).val() == '5') {
                // Display an alert
                alert("This feature will be coming soon! Thanks for the wait :)");
            }
        });
    });

    // indigenous owned
      $(document).ready(function () {
        // Add change event listener to the select element
        $('#filter-id').on('change', function () {
            // Check if the selected value is '1' (women-owned)
            if ($(this).val() == '6') {
                // Display an alert
                alert("This feature will be coming soon! Thanks for the wait :)");
            }
        });
    });






//       // Assume numRows is the dynamically calculated number of rows
// let numRows = $results.length;

// // Get the .filters element
// let filtersElement = document.querySelector('.filters');

// // Add or remove the 'expanded' class based on the calculated number of rows
// if (numRows > 2) {
//   filtersElement.classList.add('expanded');
// } else {
//   filtersElement.classList.remove('expanded');
// }




        // drop down option for minority
      var checkList = document.getElementById("list1");
      checkList.getElementsByClassName("anchor")[0].onclick = function (evt) {
        if (checkList.classList.contains("visible"))
          checkList.classList.remove("visible");
        else checkList.classList.add("visible");
      };


        //drop down option for price
        var checkList2 = document.getElementById("list2");
      checkList2.getElementsByClassName("anchor")[0].onclick = function (evt) {
        if (checkList2.classList.contains("visible"))
          checkList2.classList.remove("visible");
        else checkList2.classList.add("visible");
      };


    //    aapi owned
      function keepCheckboxUnchecked() {
            // Display an alert
            alert("This feature will be coming soon! Thanks for the wait :)");


             // Set the checked property to false to keep the checkbox unchecked
            document.getElementById("myCheckbox").checked = false;
        }
    // ;gntq owned
    function keepCheckboxUn() {
            // Display an alert
            alert("This feature will be coming soon! Thanks for the wait :)");


             // Set the checked property to false to keep the checkbox unchecked
            document.getElementById("lgbtq").checked = false;
        }


    //indi owned
    function keepCheckbox() {
            // Display an alert
            alert("This feature will be coming soon! Thanks for the wait :)");


             // Set the checked property to false to keep the checkbox unchecked
            document.getElementById("indi").checked = false;
        }


    //women owned
    function keepCheck() {
            // Display an alert
            alert("This feature will be coming soon! Thanks for the wait :)");


             // Set the checked property to false to keep the checkbox unchecked
            document.getElementById("wom").checked = false;
        }

    //hover functioning - 1st item 
     // Access the element using document.querySelector
        var element = document.querySelector('#myElement');

        // Add event listener for mouseenter
        element.addEventListener('mouseenter', function() {
            // Add a class to apply the hover effect
            element.classList.add('hovered');
        });

        // Add event listener for mouseleave
        element.addEventListener('mouseleave', function() {
            // Remove the class to revert the styling changes
            element.classList.remove('hovered');
        });

        //to repeat for all other images 
        var images = document.querySelectorAll('.hover-class');

        // Add event listeners for each image
        images.forEach(function(image) {
            // Add event listener for mouseenter
            image.addEventListener('mouseenter', function() {
                // Add a class to apply the hover effect
                image.classList.add('hovered');
            });

            // Add event listener for mouseleave
            image.addEventListener('mouseleave', function() {
                // Remove the class to revert the styling changes
                image.classList.remove('hovered');
            });
        });



    </script>

    </body>
</html>
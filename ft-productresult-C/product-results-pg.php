<?php

  require '../ft-navbar-N/navbar.php';
  // require '../db_config.php';
  $host = "304.itpwebdev.com";
	$user = "ethreads";
	$pass = "460uscitp";
	$db = "ethreads_brands_db";
  $mysqli = new mysqli($host, $user, $pass, $db);



// <!-- check for connection errors  -->
 if ($mysqli->connect_erno){
  echo $mysqli->connect_error;
  exit();
} 

//  <!-- submit sql statement  -->
 // Get filter_id from url
  // $filter_id = $_GET['filter_id'];
  // echo "<hr>$filter_id</hr>";

 // Get item_type_id from url
  // $item_type_id= $_GET['item_type_id'];
  // echo "<hr>$item_type_id</hr>";



// var_dump($_GET);

// $itemtypeid = $_GET["item_type_id"];
// $filter_id= $_GET["filter_id"];


	

$sql = "SELECT DISTINCT items.item_name AS name, items.item_price AS price, items.item_image AS image, filters.filter_name AS filters
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

    <body>

        <header>
            <h4 id="search-results"><strong>Search Results For</strong></h4>
            <h1> Clothing By:<?php echo $row["name"]; ?></h1>
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

            Showing <?php echo $results->num_rows; ?> result(s).

<h3 class="filter-heading">Filter By:</h3>
<div class="container">   <!--for filters and products -->
    <div class="filters">
        <!-- <h4 class="minority">Minority Owned</h4> -->
         <div id="list1" class="dropdown-check-list" tabindex="100">
      <span class="anchor">Type of Brand</span>
      <ul class="items filter-pad">
        <li><input type="checkbox" />Black-owned</li>
        <li><input type="checkbox" />Latiné-owned</li>
        <li><input type="checkbox" />Sustainable</li>
        <li><input class="coming-soon mycheckbox" type="checkbox" id="myCheckbox" onclick="keepCheckboxUnchecked()"/>AAPI-owned</li>
        <li><input class="coming-soon1" type="checkbox" id="lgbtq" onclick="keepCheckboxUn()" />LGBTQ+-owned</li>
        <li><input class="coming-soon2" type="checkbox" id="indi" onclick="keepCheckbox()"/>Indigenous-owned</li>
        <li><input class="coming-soon3" type="checkbox" id="wom" onclick="keepCheck()" />Women-owned</li>
      </ul>
    </div>


 
        <!-- <h4 class="minority">Price</h4> -->
        <div id="list2" class="dropdown-check-list" tabindex="100">
      <span id="price-span" class="anchor">Price</span>
      <ul class="items price-pad">
        <li><input type="checkbox" />$0-$25</li>
        <li><input type="checkbox" />$25-$50</li>
        <li><input type="checkbox" />$50-$100</li>
        <li><input type="checkbox" />$100-$150</li>
      </ul>
    </div>
    <div class="expanding-element"></div>
       
    </div>

    <?php while($row = $results->fetch_assoc()) : ?>
<figure>
    <img class="products" src="<?php echo $row["image"]; ?>" alt="<?php echo $row ["name"]; ?>" />

    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.php?item_id=<?php echo $row["item_id"] ?>&brand_id=<?php echo $row["brand_id"] ?>"><?php echo $row['name'];?><br><?php echo $row['price'];?></a></figcaption>

   
</figure>
<?php endwhile; ?>
    


    
    
    <!-- <img id="myElement" class="products" src="https://hijadetumadre.com/cdn/shop/products/LATINA-ENOUGH_0001_IMG_3018.jpg?v=1666018017" alt="Latina Enough Hoodie" /> -->
    <!-- Latina Enough Hoodie<br>$65</a></figcaption> -->
   
    <!-- https://hijadetumadre.com/collections/tops-bottomd/products/latina-enough-hoodie -->
    


    <figure>
    <img class="products hover-class" src="https://shopjzd.com/cdn/shop/products/LatinaMagicSweatshirt_800x.jpg?v=1622761940" alt="Latina Magic Sweatshirt" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Latina Magic Sweatshirt<br>$58</a></figcaption>
    <!-- https://shopjzd.com/collections/sweatshirts/products/latina-magic-sweatshirt-pre-order -->
    </figure>


    <figure>
    <img class="products hover-class" src="https://www.poplinen.co/cdn/shop/products/NinLinenPant02_1200x.png?v=1661222611" alt="Nin Linen Pant - Ivory" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Nin Linen Pant - Ivory<br>$88</a></figcaption>
    <!-- https://www.poplinen.co/products/nin-linen-pant -->
    </figure>


    <figure>
    <img class="products hover-class" src="https://hijadetumadre.com/cdn/shop/products/make-jefa-moves-2.jpg?v=1580419832" alt="Make Jefa Moves T-shirt" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Make Jefa Moves T-shirt<br>$42</a></figcaption>
    <!-- https://hijadetumadre.com/collections/tops-bottomd/products/make-jefa-moves-t-shirt -->
    </figure>
   
   <figure>
    <img class="products hover-class" src="https://www.poplinen.co/cdn/shop/products/KannikaLineShirt06_1c237685-7bad-46f7-a7df-c9ee5572e39c_1200x.png?v=1663065753" alt="Kannika Shirt - Olive" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Kannika Shirt - Olive<br>$50</a></figcaption>
    <!-- https://www.poplinen.co/products/kannika-shirt-olive?_pos=1&_sid=c556a6c8d&_ss=r -->
    </figure>


    <figure>
    <img class="products hover-class" src="https://shopjzd.com/cdn/shop/files/KarenLoza_SeptiembreSept-21_800x.heic?v=1697045073" alt="Latina Power Baby Tees" />
    <figcaption><a class="link" href="../ft-itempage-s/ft-itempage.html">Latina Power Baby Tees<br>$38</a></figcaption>
    <!-- https://shopjzd.com/products/pre-order-latina-power-baby-tees?_pos=3&_sid=2f917d6ab&_ss=r -->
    </figure>

</div>

<!-- footer -->
        <div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div>


       
        <!-- <footer>Ethical Threads. Sign up for our Newsletter</footer> -->




    </main>


    <!-- javascript -->
      <script>
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




    // Function to change the CSS of the image
        // document.querySelector(".products").onmouseenter = function changeImageStyle() {
        //     // Access the image element
        //     var image = document.getElementById('myImage');

    
        //     image.style.width = '500px';  // Set a new width
        //     image.style.border = '2px solid red';  // Change the border color
           
        //    //this workeddd 
        // }




    // document.querySelector(".products").onmouseenter = function(){
    //     // alert("testing");
    //     var image = ocument.getElementById('myImage');
    //      image.style.width = '500px';

    // };

    </script>

    </body>
</html>

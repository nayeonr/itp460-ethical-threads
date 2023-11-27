<?php
  require '../ft-navbar-N/navbar.php';
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link href="../global_css.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../ft-login-N/signup.css">
    <link rel="stylesheet" href="../ft-login-N/login.css">

    <title>Profile Page</title>

</head>

    <style>
      .nav-menu {
        margin-top: 15px;
      }

      .profile {
        color: #433f42;
        padding: 25px;
      }

      #pfp {
        width: 40px;
        height: 40px;
        border-radius: 20px;
      }

      #profile-bio {
        margin-left: 60px;
        margin-bottom: 0px;
      }

      #est {
        margin-left: 60px;
        font-weight: lighter;
        font-style: italic;
        margin-top: 1%;
      }

      .section {
        border: solid;
        border-color: #be8f69;
        border-radius: 15px;
        margin-bottom: 15px;
        padding: 10px;
        margin-top: 0;
      }

      .section-title {
        margin-left: 15px;
      }

      .item-saved {
        margin: 0px auto;
        display: inline-block;
        margin: 19px;
        margin-top: 0;
        margin-bottom: 0;
      }

      img {
        border-radius: 15px;
      }

      img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
      }

      .item-saved img {
        width: 300px;
        height: 300px;
        border-radius: 15px;
      }

      #bookmarks-title{
        font-weight: bold;
        padding-left: 15px;
      }

      /*.pagination {
        padding-top: 120px;
        padding-left: 430px;
        position: relative;
        font-size: 18px;
      } */

      p {
        font-weight: 1000;
        margin: 0;
        margin-top: 15px;
        padding: 0;
      }

      .profile-seller {
        margin: 0;
      }

      .logout {
        position: relative;
        bottom: 5px;
        padding: 5px;
      }

      .logout:hover {
        background-color: darkcyan;
        cursor: pointer;
      }


  </style>
  <body>
    <div class="profile">
      <h1 id="profile-intro">
        <img src="../ft-profilepage-s/img/hello-kitty-pfp.jpeg" id="pfp">
          <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        <button type="button" class="logout"><a href="../ft-login-N/logout.php">Logout</a></button>
      </h1>
      <p id="profile-bio">Insert fun biography here!</p>
      <p id="est"> Member since Nov. 2023 </p>


      <hr> 

      <!-- hard coding here -->
      <h2 id="bookmarks-title">Bookmarks</h2>

        <div class="bookmarks">

          <h2 class="section-title">my favorite shirts<span class="details"> | 4 items </h2>
          <!-- on title click, see more -->
          <div class="section">

            <div class="item-saved" onclick="nuhUh1()">
              <img src="../ft-profilepage-s/img/pretty-ugly-fitted-tee.png">
              <p class="profile-description"> Pretty Ugly Fitted Tee </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved" onclick="nuhUh2()">
              <img src="../ft-profilepage-s/img/bad-apple-knit-top.png">
              <p class="profile-description"> Bad Apple Knit Top </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved" onclick="nuhUh3()">
              <img src="../ft-profilepage-s/img/chrom-sun-crop-top.png">
              <p class="profile-description"> Chrom Sun Crop Top </p>
              <p class="profile-seller"> Abakada </p>
            </div>

            <div class="item-saved" onclick="nuhUh4()">
              <img src="../ft-profilepage-s/img/grapiko-aspin-tee.png">
              <p class="profile-description"> Aspin Tee </p>
              <p class="profile-seller"> Grapiko </p>
            </div>

          </div> <!-- .section -->

          <h2 class="section-title"> fun patterns <span class="details"> | 3 items </h2>
          <div class="section">

            <div class="item-saved" onclick="nuhUh5()">
              <img src="../ft-profilepage-s/img/frog-argyle-sweatshirt.png">
              <p class="profile-description"> Frog Arygle Sweatshirt</p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved" onclick="nuhUh6()">
              <img src="../ft-profilepage-s/img/thanks-a-bunch-button-up-smock.png">
              <p class="profile-description"> Thanks a Bunch Smock </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved" onclick="nuhUh7()">
              <img src="../ft-profilepage-s/img/no-regrats-roll-neck-knitted-jumper.png">
              <p class="profile-description"> No Regrats Roll Neck Knitted Jumper </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

          </div> <!-- .section -->

        </div> <!-- .bookmarks -->

    </div> <!-- .profile -->

     <div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div>

    <script>
        function nuhUh1 () {
          alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh2 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh3 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh4 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh5 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh6 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
        function nuhUh7 () {
           alert("This item is hard-coded just for demonstration! Typically, clicking on this item should redirect you to its Item page.");
        }
    </script>

  </body>
  </html>
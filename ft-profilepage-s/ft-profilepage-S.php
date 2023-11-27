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
        display: flex;
        margin: 15px;
        padding: 15px;
        margin-top: 0;
      }

      .section-title {
        margin-left: 2%;
      }

      .item-saved {
        /*margin-right: 20px;*/
        margin: 0px auto;
      }

      img {
        border-radius: 15px;
      }

      img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(67, 63, 66, 0.5);
        border-radius: 15px;
      }

      .item-saved img {
        width: 250px;
        height: 250px;
        border-radius: 15px;
      }

      #bookmarks-title{
        font-weight: bold;
        padding-left: 2%;
      }

      #details {
        font-weight: lighter;

      }

      .pagination {
        padding-top: 120px;
        padding-left: 430px;
        position: relative;
        font-size: 18px;
      }

      .profile-description {
        font-weight: 500;
        margin: 0;
        padding: 0;
      }

      .profile-seller {
        margin: 0;
        padding: 0;
         font-weight: 500;
      }

      p {
         font-weight: 500;
      }

      .logout > a {
        color: #433f42;
      }


  </style>
  <body>
    <div class="profile">
      <h1><img src="../ft-profilepage-s/img/hello-kitty-pfp.jpeg" id="pfp">
      <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
      <p id="profile-bio">Insert fun biography here!</p>
      <p id="est"> Member since Nov. 2023 </p>

      <div class="logout"><a href="../ft-login-N/logout.php">Logout</a></div>

      <hr> 

      <!-- hard coding here -->
      <h2 id="bookmarks-title">Bookmarks</h2>

        <div class="bookmarks">

          <h2 class="section-title">my favorite shirts<span id="details"> | 5 items </h2>
          <!-- on title click, see more -->
          <div class="section">

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/pretty-ugly-fitted-tee.png">
              <p class="profile-description"> Pretty Ugly Fitted Tee </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/bad-apple-knit-top.png">
              <p class="profile-description"> Bad Apple Knit Top </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/chrom-sun-crop-top.png">
              <p class="profile-description"> Chrom Sun Crop Top </p>
              <p class="profile-seller"> Abakada </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/grapiko-aspin-tee.png">
              <p class="profile-description">Grapiko Aspin Tee </p>
              <p class="profile-seller"> Abakada </p>
            </div>

            
            <div class="item-saved">
              <img src="../ft-profilepage-s/img/missing-you-tshirt.png">
              <p class="profile-description"> Missing You T-Shirt </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

          </div> <!-- .section -->

          <h2 class="section-title"> fun patterns <span id="details"> | 3 items </h2>
          <div class="section">

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/frog-argyle-sweatshirt.png">
              <p class="profile-description"> Frog Arygle Sweatshirt</p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/thanks-a-bunch-button-up-smock.png">
              <p class="profile-description"> Thanks a Bunch Smock </p>
              <p class="profile-seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
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

  </body>
  </html>
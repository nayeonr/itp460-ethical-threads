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
  /*    padding: 2%; 
      }

      .bookmarks {
  /*      background-color: blueviolet;*/
      }

      .item-saved {
        margin-right: 20px;
      }

      .item-saved img {
      width: 200px;
      height: 200px;
      border-radius: 5px;
      }

      #pfp {
        width: 40px;
        height: 40px;
        border-radius: 20px;
      }

      #bio {
        margin-left: 60px;
        margin-bottom: 0px;
      }

      #est{
        margin-left: 60px;
        font-weight: lighter;
        font-style: italic;
        margin-top: 1%;
      }

      .section {
        border: solid;
        border-color: black;
        display: flex;
        margin: 2%;
        padding: 2%;
        margin-top: 0;
        margin-right: 12.5%;
      }

      #section-title {
        margin-left: 2%;
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

      #description {
        font-weight: bolder;
        padding-top: 2%;
        margin-top: 2%;
        width: 200px;
      }

      .logout {
        color: #433f42;
      }


  </style>
  <body>
    <div class="profile">
      <h1> <img src="../ft-profilepage-s/img/hello-kitty-pfp.jpeg" id="pfp"> @Ethicalthreadsuser32 </h1>
      <p id="bio"> I love fun fashion! </p>
      <p id="est"> Member since Nov. 2023 </p>

      <hr> 

      <h2 id="bookmarks-title">Bookmarks</h2>

        <div class="bookmarks">

          <h2 id="section-title">my favorite shirts<span id="details"> | 20 items </h2>
          <!-- on title click, see more -->
          <div class="section">

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/pretty-ugly-fitted-tee.png">
              <p id="description"> Pretty Ugly Fitted Tee </p>
              <p id="seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/bad-apple-knit-top.png">
              <p id="description"> Bad Apple Knit Top </p>
              <p id="seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/chrom-sun-crop-top.png">
              <p id="description"> Chrom Sun Crop Top </p>
              <p id="seller"> Abakada </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/grapiko-aspin-tee.png">
              <p id="description"> Grapiko Aspin Tee </p>
              <p id="seller"> Abakada </p>
            </div>

            
            <div class="item-saved">
              <img src="../ft-profilepage-s/img/missing-you-tshirt.png">
              <p id="description"> Missing You T-Shirt </p>
              <p id="seller"> Silly Oaf </p>
            </div>

          </div>

          <h2 id="section-title"> fun patterns <span id="details"> | 3 items </h2>
          <div class="section">

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/frog-argyle-sweatshirt.png">
              <p id="description"> Frog Arygle Sweatshirt</p>
              <p id="seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/thanks-a-bunch-button-up-smock.png">
              <p id="description"> Thanks a Bunch Smock </p>
              <p id="seller"> Silly Oaf </p>
            </div>

            <div class="item-saved">
              <img src="../ft-profilepage-s/img/no-regrats-roll-neck-knitted-jumper.png">
              <p id="description"> No Regrats Roll Neck Knitted Jumper </p>
              <p id="seller"> Silly Oaf </p>
            </div>
          </div>

        </div>

      <div class="logout"><a href="../ft-login-N/logout.php">Logout</a></div>

    </div>

     <div class="footer">
      <span id="copyright"> © Ethical Threads </span>
    </div>

  </body>
  </html>
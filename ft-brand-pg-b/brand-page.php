<?php
	require '../ft-navbar-N/navbar.php';
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
    <link href="../global_css.css" rel="stylesheet" />
    <link rel="stylesheet" href="../ft-login-N/signup.css">
    <link rel="stylesheet" href="../ft-login-N/login.css">
  </head>
  <style>
    /* @import url("https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Pixelify+Sans:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap");
    body {
      font-family: Open Sans;
      color: #433f42;
      background-color: #f6f5f0;
      margin: 0;
      padding: 0;
      align-items: center;
    }
    .hero-section {
      background-image: url("threads.webp");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 300px;
      opacity: 50%;
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
      font-family: Open Sans;
      font-weight: 400;
      margin-bottom: 10px;
      font-size: 55px;
    }
    #hero-section-b {
      font-family: Quicksand;
      background-color: #82a7a6;
      color: #f6f5f0;
      border: none;
      border-radius: 15px;
      padding: 6px;
      padding-right: 15px;
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
    /* .mb-6 {
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
    .hcf-overlay {
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
    }
    /* end external hero section css code */

    #sm-icon {
      position: absolute;
      right: 0px;
      top: 140px;
      cursor: pointer;
    }
    .nav-menu{
      margin-top: 15px;
    } */
  </style>
  <body>
    <section
      class="px-5 py-6 hcf-bp-center hcf-bs-cover hcf-overlay hcf-transform"
      style="background-image: url('brand-pg-imgs/threads.webp'); height: 300px"
    >
      <div class="px-4 py-0 my-3 text-center">
        <div id="hero-section-title" class="display-5">HIPTIPICO</div>
        <div class="col-lg-6 mx-auto">
          <a
            href="https://www.hiptipico.com/"
            target="_blank"
            rel="noopener noreferrer"
            ><button type="button" id="hero-section-b" class="btn">
              Visit Brand Website
            </button></a
          >
        </div>
        <a
          href="https://www.instagram.com/hiptipico/"
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
          <span style="color: #82a7a6; font-weight: 600"> $$ - $$$ </span>
          <br />
        </p>
        <p class="content-p">
          Has products with the following tags: &nbsp;&nbsp;
        </p>
        <div style="margin-left: 18px">
          <span class="tag">Ethical</span>
          <span class="tag">Handmade</span>
          <span class="tag">Sustainable</span>
        </div>
      </div>
      <div class="container">
        <div class="content-box-header">Top Sellers</div>
        <div class="row gx-2 gy-4">
          <div class="col">
            <div class="item-box">
              <img
                class="product-img"
                src="brand-pg-imgs/nueva-luna-strap.webp"
                alt="La Nueva Luna Strap"
              />
              <br />
              <div class="item-name">La Nueva Luna Strap</div>
            </div>
          </div>
          <div class="col">
            <div class="item-box">
              <img
                class="product-img"
                src="brand-pg-imgs/tocoyal-hair.png"
                alt="Tocoyal Fringe Hair Wrap (Turquoise)"
              />
              <br />
              <div class="item-name">Tocoyal Fringe Hair Wrap (Turquoise)</div>
            </div>
          </div>
          <div class="col">
            <div class="item-box">
              <img
                class="product-img"
                src="brand-pg-imgs/vegan-vintage-floral-strap.png"
                alt="Vegan Vintage Floral Strap"
              />
              <br />
              <div class="item-name">Vegan Vintage Floral Strap</div>
            </div>
          </div>
        </div>
        <!-- <br>
            <button id="shop-more-b">Shop More From This Brand</button> -->
      </div>
      <div class="container">
        <div class="content-box-header">About the Brand</div>
        <p class="content-p">
          Hiptipico is an ethical fashion brand based in Panajachel, Guatemala
          showcasing indigenous Maya artisans and their handmade creations.
          Every Hiptipico item is thoughtfully handcrafted by local artists,
          using high-quality sustainable materials.
        </p>
        <p class="content-p">
          The name Hiptipico came from the local saying, “tipico,” which
          describes the traditional clothing worn by the indigenous people here
          in Guatemala. Incorporating this local context into our name and using
          it as the basis of our brand reflects our dedication to preserving
          indigenous culture and creating dignified job opportunities through
          the promotion of this traditional art form.
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

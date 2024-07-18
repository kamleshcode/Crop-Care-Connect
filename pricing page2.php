<html>

<head>
  <style>
    <title>Pricing-page-CropCareConnect</title>
    @import url(https://fonts.googleapis.com/css?family=Josefin+Sans:400,300,300italic,400italic,600,700,600italic,700italic);

    body {
      font-family: "Josefin Sans", sans-serif;
      line-height: 1;
      padding: 20px;
      height: 100%;
      background: #eee;
    }

    .demo-title {
      text-align: center;
      font-size: 3rem;
      margin-bottom: 50px;
    }

    .pricing-table {
      display: table;
      width: 100%;
    }

    .pricing-table .pricing-option {
      width: 28%;
      height: 400px;
      background: white;
      float: left;
      padding: 2%;
      text-align: center;
      transition: all 0.3s ease-in-out;
    }

    .pricing-table .pricing-option:nth-child(even) {
      margin: 0 2%;
    }

    .pricing-table .pricing-option:hover {
      cursor: pointer;
      box-shadow: 0px 2px 30px rgba(0, 0, 0, 0.3);
      transform: scale(1.04);
    }

    .pricing-table .pricing-option:hover i,
    .pricing-table .pricing-option:hover h1,
    .pricing-table .pricing-option:hover span,
    .pricing-table .pricing-option:hover b {
      color: forestgreen;
    }

    .pricing-table .pricing-option:hover .front {
      opacity: 0;
      visibility: hidden;
    }

    .pricing-table .pricing-option:hover .back {
      opacity: 1 !important;
      visibility: visible !important;
    }

    .pricing-table .pricing-option:hover .back a.button {
      transform: translateY(0px) !important;
    }

    .pricing-table .pricing-option hr {
      border: none;
      border-bottom: 1px solid #F0F0F0;
    }

    .pricing-table .pricing-option i {
      font-size: 3rem;
      color: #D8D8D8;
      transition: all 0.3s ease-in-out;
    }

    .pricing-table .pricing-option h1 {
      margin: 10px 0;
      color: #212121;
      transition: all 0.3s ease-in-out;
    }

    .pricing-table .pricing-option p {
      color: #999;
      padding: 0 10px;
      line-height: 1.3;
    }

    .pricing-table .pricing-option .price {
      position: relative;
    }

    .pricing-table .pricing-option .price .front span.price {
      font-size: 2rem;
      text-transform: uppercase;
      margin-top: 20px;
      display: block;
      font-weight: 700;
      position: relative;
    }

    .pricing-table .pricing-option .price .front span.price b {
      position: absolute;
      font-size: 1rem;
      margin-left: 2px;
      font-weight: 600;
    }

    .pricing-table .pricing-option .price .back {
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease-in-out;
    }

    .pricing-table .pricing-option .price .back a.button {
      background: forestgreen;
      padding: 15px 20px;
      display: inline-block;
      text-decoration: none;
      color: white;
      position: absolute;
      font-size: 13px;
      top: -5px;
      left: 0;
      right: 0;
      width: 150px;
      margin: auto;
      text-transform: uppercase;
      transform: translateY(20px);
      transition: all 0.3s ease-in-out;
    }

    .pricing-table .pricing-option .price .back a.button:hover {
      background: green;
    }

    @media screen and (max-width: 600px) {
      .pricing-table .pricing-option {
        padding: 5%;
        width: 90%;
      }

      .pricing-table .pricing-option:nth-child(even) {
        margin: 30px 0 !important;
      }
    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>

<body>
  <h1 class="demo-title">Pricing</h1>

  <div class="pricing-table">
    <div class="pricing-option">
      <i class="material-icons">important_devices</i>
      <h1>for Own Use</h1>
      <br>
      <br>
      <hr>
      <ul>
        <li>2 Devices and sensors</li>
        <br>
        <li>Customisable code script for sensor usage</li>
        <br>
        <li>24 hours customer support and 1 Month Warranty on product</li>
      </ul>
      <hr />
      <div class="price">
        <div class="front">
          <span class="price">35.99 <b>$</b></span>
        </div>
        <div class="back">
          <a href="#" class="button">Purchase now</a>
        </div>
      </div>
    </div>

    <div class="pricing-option">
      <i class="material-icons">perm_identity</i>
      <h1>Small Business</h1>
      <br>
      <br>
      <hr />
      <hr>
      <ul>
        <li>7 Devices and sensors</li>
        <br>
        <li>Customisable code script for sensor usage</li>
        <br>
        <li>24 hours customer support and 2 Month Warranty on product</li>
      </ul>
      <hr />
      <hr />
      <div class="price">
        <div class="front">
          <span class="price">70.99 <b>$</b></span>
        </div>
        <div class="back">
          <a href="#" class="button">Purchase now</a>
        </div>
      </div>
    </div>

    <div class="pricing-option">
      <i class="material-icons">art_track</i>
      <h1>Enterprise</h1>
      <br>
      <br>
      <hr>
      <ul>
        <li>20 Devices and sensors</li>
        <br>
        <li>Customisable code script for sensor usage</li>
        <br>
        <li>24 hours customer support and 3 Month Warranty on product</li>
      </ul>
      <hr />
      <div class="price">
        <div class="front">
          <span class="price">200.99 <b>$</b></span>
        </div>
        <div class="back">
          <a href="#" class="button">Purchase now</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
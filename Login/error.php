<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>CropCareConnect</title>
  <link rel="icon" type="image/jpg" href="images/123.jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url("images/overlay.png"), url("../images/bg.jpg")center/cover no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .welcome-container {
    background: rgba(255, 255, 255, 0.32);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(9.3px);
    -webkit-backdrop-filter: blur(9.3px);
    border: 1px solid rgba(255, 255, 255, 1);
    text-align: center;
    color: #fff;
    width: 700px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 10px;
    clip-path: polygon(5% 0%, 100% 0%, 95% 100%, 0% 100%);
    animation: fadeIn 1s ease-out;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
  }

  h1 {
    font-size: 3em;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    animation: moveUp 0.8s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @keyframes moveUp {
    from {
      transform: translateY(20px);
      opacity: 0;
    }

    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .button-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
  }

  .button {
    padding: 15px 25px;
    font-size: 1.2em;
    text-decoration: none;
    color: white;
    background: black;
    border: none;
    border-radius: 5px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 10px;
    cursor: pointer;
  }

  .button:hover {
    font-weight: 700;
    text-decoration: underline;
    transform: scale(1.05);
    color: black;
    border: 1px solid black;
    background: yellowgreen;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
  }

  p {
    font-weight: 600;
    color: skyblue;
    font-size: larger;
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 2em;
    }

    .button {
      font-size: 1em;
      padding: 10px 20px;
    }
  }
</style>

<body>
  <div class="welcome-container" data-aos="zoom-in" class="div" data-aos-duration="1000">
    <h2>ERROR</h2>
    <p>
      <?php

      if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
        echo $_SESSION['message'];
      } else {
        header("Location: ../index.php");
      }
      ?>
    </p><br />

    <br>
    <a href="../index.php" class="button special">Retry</a>
    <br>
    <?php $_SESSION['message'] = ""; ?>
  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
      if (disclaimer) {
        disclaimer.remove();
      }
    });
  </script>
</body>

</html>
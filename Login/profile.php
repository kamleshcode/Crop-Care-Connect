<?php
session_start();


if ($_SESSION['logged_in'] != 1) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
} else {

  $email = $_SESSION['Email'];
  $name = $_SESSION['Name'];
  $user = $_SESSION['Username'];
  $mobile = $_SESSION['Mobile'];
  $active = $_SESSION['Active'];
}
?>

<!DOCTYPE html>
<html>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url("images/overlay.png"), url("../images/welcome.jpg")center/cover no-repeat;
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
    height: 450px;
    background: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 10px;
    animation: fadeIn 1s ease-out;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
  }

  h1 {
    font-family: auto;
    font-size: 4em;
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
    color: skyblue;
    font-size: larger;
  }

  .p1 {
    font-family: auto;
    color: white;
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

<head>
  <title>CropCareConnect</title>

  <link rel="icon" type="image/jpg" href="images/123.jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <div class="welcome-container" data-aos="zoom-in" class="div" data-aos-duration="1000">
    <h1>WELCOME</h1>
    <p>
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
      ?>
    </p>
    <p class="p1"> Welcome to our Agriculture Hub, where farmers like you cultivate success! Explore a bountiful
      marketplace to showcase and sell your premium crops. Join our community dedicated to fostering growth, sharing
      expertise, and reaping the rewards of your hard work. Let's sow the seeds of prosperity together!
    </p>
    <h2>
      <?php echo $name; ?>
    </h2>
    <p>
      <?= $email ?>
    </p>

    <?php if ($_SESSION['Category'] == 1): ?>

      <div class="button-container">
        <a href=../profileView.php class="button special">My Profile</a>
        <a href="logout.php" class="button special">LOG OUT</a>
      </div>

    <?php else: ?>

      <div class="button-container">
        <a href=../profileViewbuyer.php class="button special">Profile</a>

        <a href="../shop.php?n=1" name="catSearch" class="button special">Digital Market</a>
        <a href="logout.php" class="button special">LOG OUT</a>
      </div>
    <?php endif; ?>
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
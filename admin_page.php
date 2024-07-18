<?php

@include 'db.php';

session_start();

$aid = $_SESSION['aid'];
if (!isset($_SESSION['aid'])) {         // condition Check: if session is not set. 
   header('location: test.php');   // if not set the user is sendback to login page.
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" type="image/jpg" href="images/123.jpg">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="dashboard">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="2000">dashboard</h1>

      <div class="box-container">

         <div class="box" data-aos="fade-down-right" class="div" data-aos-duration="2000">
            <?php
            $total_pendings = 0;
            $select_pendings = "SELECT * FROM `orders` WHERE payment_status = 'pending';";
            $result = mysqli_query($conn, $select_pendings);
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  ;
                  $total_pendings += $row['total_price'];
               }
            }
            ;
            ?>
            <h3>
               <?= $total_pendings; ?>/-
            </h3>
            <p>total pendings</p>
            <a href="admin_orders.php" class="btn">see orders</a>
         </div>

         <div class="box" data-aos="zoom-in-down" class="div" data-aos-duration="2000">
            <?php
            $total_completed = 0;
            $select_completed = "SELECT * FROM `orders` WHERE payment_status = 'completed';";
            $result = mysqli_query($conn, $select_completed);
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  $total_completed += $row['total_price'];
               }
            }
            ;
            ?>
            <h3>
               <?= $total_completed; ?>/-
            </h3>
            <p>completed orders</p>
            <a href="admin_orders.php" class="btn">see orders</a>
         </div>

         <div class="box" data-aos="zoom-in-down" class="div" data-aos-duration="2000">
            <?php
            $select_orders = "SELECT * FROM `orders`";
            $result = mysqli_query($conn, $select_orders);
            $number_of_orders = mysqli_num_rows($result);
            ?>
            <h3>
               <?= $number_of_orders; ?>
            </h3>
            <p>orders placed</p>
            <a href="admin_orders.php" class="btn">see orders</a>
         </div>

         <div class="box" data-aos="fade-down-left" class="div" data-aos-duration="2000">
            <?php
            $select_users = "SELECT * FROM  `fproduct`";
            $result = mysqli_query($conn, $select_users);
            $number_of_users = mysqli_num_rows($result);
            ?>
            <h3>
               <?= $number_of_users; ?>
            </h3>
            <p>products added</p>
            <a href="admin_products.php" class="btn">see products</a>
         </div>

         <div class="box" data-aos="fade-up-right" class="div" data-aos-duration="2000">
            <?php
            $select_accounts = "SELECT * FROM   `buyer`";
            $result = mysqli_query($conn, $select_accounts);
            $number_of_accounts = mysqli_num_rows($result);
            ?>
            <h3>
               <?= $number_of_accounts; ?>
            </h3>
            <p>total accounts of buyers</p>
            <a href="admin_usersbuyer.php" class="btn">see accounts</a>
         </div>

         <div class="box" data-aos="fade-up-left" class="div" data-aos-duration="2000">
            <?php
            $select_users = "SELECT * FROM   `buyer`";
            $result = mysqli_query($conn, $select_users);
            $number_of_users = mysqli_num_rows($result);
            $select_users1 = "SELECT * FROM   `farmer`";
            $result1 = mysqli_query($conn, $select_users1);
            $number_of_users1 = mysqli_num_rows($result1);
            ?>
            <h3>
               <?= $number_of_users + $number_of_users1; ?>
            </h3>
            <p>total users</p>
            <a href="admin_users.php" class="btn">see accounts</a>
         </div>

         <div class="box" data-aos="fade-up-left" class="div" data-aos-duration="2000">
            <br>
            <p>Farmer-user Activity</p>
            <br>
            <a href="dashboardfarmer.php" class="btn">see activity</a>
         </div>
         <div class="box" data-aos="fade-up-left" class="div" data-aos-duration="2000">
            <br>
            <p>Buyer-user Activity</p>
            <br>
            <a href="dashboardbuyer.php" class="btn">see activity</a>
         </div>





      </div>

   </section>












   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
   <script src="storescript.js"></script>
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
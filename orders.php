<?php

@include 'db.php';

session_start();

$bid = $_SESSION['bid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylestore.css">
   <link rel="icon" type="image/jpg" href="images/123.jpg">

</head>

<body>

   <?php include 'headerstore.php'; ?>

   <section class="placed-orders">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="1000">placed orders</h1>

      <div class="box-container">

         <?php
         $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE bid='$bid'") or die('query failed');
         if (mysqli_num_rows($select_orders) > 0) {
            while ($row = mysqli_fetch_assoc($select_orders)) {
               ?>
               <div class="box" data-aos="zoom-in-up" class="div" data-aos-duration="1000">
                  <p> placed on : <span>
                        <?= $row['placed_on']; ?>
                     </span> </p>
                  <p> name : <span>
                        <?= $row['name']; ?>
                     </span> </p>
                  <p> number : <span>
                        <?= $row['number']; ?>
                     </span> </p>
                  <p> email : <span>
                        <?= $row['email']; ?>
                     </span> </p>
                  <p> address : <span>
                        <?= $row['address']; ?>
                     </span> </p>
                  <p> payment method : <span>
                        <?= $row['method']; ?>
                     </span> </p>
                  <p> your orders : <span>
                        <?= $row['total_products']; ?>
                     </span> </p>
                  <p> total price : <span>$
                        <?= $row['total_price']; ?>/-
                     </span> </p>
                  <p> payment status : <span
                        style="color:<?php if ($row['payment_status'] == 'pending') {
                           echo 'red';
                        } else {
                           echo 'green';
                        }
                        ; ?>">
                        <?= $row['payment_status']; ?>
                     </span> </p>
               </div>
               <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>

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
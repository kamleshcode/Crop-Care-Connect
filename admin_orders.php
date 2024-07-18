<?php

@include 'db.php';
session_start();
$aid = $_SESSION['aid'];


if (isset($_POST['update_order'])) {

   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);
   $update_orders = "UPDATE `orders` SET payment_status = '$update_payment' WHERE id ='$order_id'";
   $result = mysqli_query($conn, $update_orders);
   if ($result) {
      $message[] = 'payment has been updated!';
   }
}
;

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_orders = "DELETE FROM `orders` WHERE id ='$delete_id'";
   $result = mysqli_query($conn, $delete_orders);
   if ($result) {
      header('location:admin_orders.php');
   }
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
   <title>orders-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="placed-orders">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="2000">placed orders</h1>

      <div class="box-container">

         <?php
         $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
         if (mysqli_num_rows($select_orders) > 0) {
            while ($row = mysqli_fetch_assoc($select_orders)) {
               ?>
               <div class="box" data-aos="zoom-in-up" class="div" data-aos-duration="1000">
                  <p> buyer id : <span>
                        <?php echo $row['bid']; ?>
                     </span> </p>
                  <p> placed on : <span>
                        <?php echo $row['placed_on']; ?>
                     </span> </p>
                  <p> name : <span>
                        <?php echo $row['name']; ?>
                     </span> </p>
                  <p> email : <span>
                        <?php echo $row['email']; ?>
                     </span> </p>
                  <p> number : <span>
                        <?php echo $row['number']; ?>
                     </span> </p>
                  <p> address : <span>
                        <?php echo $row['address']; ?>
                     </span> </p>
                  <p> total products : <span>
                        <?php echo $row['total_products']; ?>
                     </span> </p>
                  <p> total price : <span>$
                        <?php echo $row['total_price']; ?>/-
                     </span> </p>
                  <p> payment method : <span>
                        <?php echo $row['method']; ?>
                     </span> </p>
                  <form action="" method="POST">
                     <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                     <select name="update_payment" class="drop-down">
                        <option value="" selected disabled>
                           <?php echo $row['payment_status']; ?>
                        </option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                     </select>
                     <div class="flex-btn">
                        <input type="submit" name="update_order" class="option-btn" value="update">
                        <a href="admin_orders.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                           onclick="return confirm('delete this order?');">delete</a>
                     </div>
                  </form>
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
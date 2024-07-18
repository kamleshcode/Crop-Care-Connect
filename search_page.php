<?php

@include 'db.php';

session_start();

$bid = $_SESSION['bid'];



if (isset($_POST['add_to_cart'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $product = $_POST['product'];
   $product = filter_var($product, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $pimage = $_POST['pimage'];
   $pimage = filter_var($pimage, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);
   $check_cart_numbers = "SELECT * FROM `cart` WHERE product ='$product' AND bid ='$bid';";
   $result = mysqli_query($conn, $check_cart_numbers);
   if (mysqli_num_rows($result) > 0) {
      $message[] = 'already added to cart!';
   } else {
      $insert_cart = "INSERT INTO `cart` (bid, pid, product, price, quantity, image) VALUES('$bid','$pid','$product','$price','$p_qty','$pimage')";
      $result = mysqli_query($conn, $insert_cart);
      if ($result) {
         $message[] = 'added to cart!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" type="image/jpg" href="images/123.jpg">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylestore.css">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

   <?php include 'headerstore.php'; ?>

   <section class="search-form" data-aos="fade-down" class="div" data-aos-duration="1000">

      <form action="" method="POST">
         <input type="text" class="box" name="search_box" placeholder="search products...">
         <input type="submit" name="search_btn" value="search" class="btn">
      </form>

   </section>

   <?php



   ?>

   <section class="products" style="padding-top: 0; min-height:100vh;">

      <div class="box-container">

         <?php
         if (isset($_POST['search_btn'])) {
            $search_box = $_POST['search_box'];
            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_products = "SELECT * FROM `fproduct` WHERE product LIKE '%{$search_box}%' OR grade LIKE '%{$search_box}' OR pcat LIKE '%{$search_box}%'";
            $result = mysqli_query($conn, $select_products);
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <form action="" class="box" method="POST" data-aos="zoom-in-up" class="div" data-aos-duration="1000">
                     <div class="price">$<span>
                           <?php echo $row['price']; ?>
                        </span>/-</div>
                     <a href="view_page.php?pid=<?php echo $row['pid']; ?>" class="fas fa-eye"></a>
                     <img src="ProductPic/<?php echo $row['pimage']; ?>" alt="">
                     <div class="name">
                        <?php echo $row['product']; ?>
                     </div>
                     <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                     <input type="hidden" name="product" value="<?php echo $row['product']; ?>">
                     <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                     <input type="hidden" name="pimage" value="<?php echo $row['pimage']; ?>">
                     <input type="number" min="1" value="1" name="p_qty" class="qty">
                     <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                  </form>
                  <?php
               }
            } else {
               echo '<p class="empty">no result found!</p>';
            }

         }
         ;
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
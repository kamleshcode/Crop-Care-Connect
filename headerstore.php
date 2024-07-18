<?php

$bid = $_SESSION['bid'];
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <div class="flex">


      <nav class="navbar" data-aos="flip-up" class="div" data-aos-duration="1000">
         <a href="index.php">home</a>
         <a href="shop.php">shop</a>
         <a href="orders.php">orders</a>
         <a href="Login/logout.php">Logout</a>

      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <?php
         $count_cart_items = mysqli_query($conn, "SELECT * FROM `cart`  WHERE bid = '$bid' ") or die('query failed');
         ?>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(
               <?php echo mysqli_num_rows($count_cart_items); ?>)
            </span></a>
      </div>



   </div>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>

</header>
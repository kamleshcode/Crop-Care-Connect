<?php

$aid = $_SESSION['aid'];
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message" data-aos="zoom-out-up" class="div" data-aos-duration="1500">
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

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <a href="Login/logout.php" class="delete-btn">logout</a>

      </div>

   </div>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>

</header>
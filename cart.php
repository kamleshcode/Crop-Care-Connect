<?php

@include 'db.php';

session_start();

$bid = $_SESSION['bid'];

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_cart_item = mysqli_query($conn, "DELETE FROM `cart` WHERE pid='$delete_id'") or die('query failed');
   header('location:cart.php');
}

if (isset($_GET['delete_all'])) {

   $delete_cart_item = mysqli_query($conn, "DELETE FROM `cart` WHERE bid='$bid'") or die('query failed');
   header('location:cart.php');
}

if (isset($_POST['update_qty'])) {
   $cart_id = $_POST['cart_id'];
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);
   $update_qty = mysqli_query($conn, "UPDATE `cart` SET quantity='$p_qty' WHERE id='$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" type="image/jpg" href="images/123.jpg">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylestore.css">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

   <?php include 'headerstore.php'; ?>

   <section class="shopping-cart">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="1000">products added</h1>

      <div class="box-container">

         <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE bid='$bid'") or die('query failed');
         if (mysqli_num_rows($select_cart) > 0) {
            while ($row = mysqli_fetch_assoc($select_cart)) {
               ?>
               <form action="" method="POST" class="box" data-aos="zoom-in-up" class="div" data-aos-duration="1000">
                  <a href="cart.php?delete=<?php echo $row['pid']; ?>" class="fas fa-times"
                     onclick="return confirm('delete this from cart?');"></a>
                  <a href="view_page.php?pid=<?php echo $row['pid']; ?>" class="fas fa-eye"></a>
                  <img src="ProductPic/<?php echo $row['pimage']; ?>" alt="">
                  <div class="name">
                     <?php echo $row['product']; ?> &nbsp;&nbsp;
                     <?php echo $row['grade']; ?>
                     <br>
                  </div>
                  <div class="price">
                     <?php echo $row['price']; ?>/-
                  </div>
                  <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                  <div class="flex-btn">
                     <input type="number" min="1" value="<?php echo $row['quantity']; ?>" class="qty" name="p_qty">
                     <input type="submit" value="update" name="update_qty" class="option-btn">
                  </div>
                  <div class="sub-total"> sub total : <span>$
                        <?= $sub_total = ($row['price'] * $row['quantity']); ?>/-
                     </span> </div>
               </form>
               <?php
               $grand_total += $sub_total;
            }
         } else {
            echo '<p class="empty">your cart is empty</p>';
         }
         ?>
      </div>

      <div class="cart-total" data-aos="zoom-in-up" class="div" data-aos-duration="1500">
         <p>grand total : <span>
               <?= $grand_total; ?>/-
            </span></p>
         <a href="shop.php" class="option-btn">continue shopping</a>
         <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a>
         <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
      </div>

   </section>







   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>

   <script src="js/script.js"></script>
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
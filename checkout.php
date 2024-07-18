<?php

@include 'db.php';

session_start();

$bid = $_SESSION['bid'];

if (!isset($_SESSION['bid'])) {         // condition Check: if session is not set. 
   header('location: test.php');   // if not set the user is sendback to login page.
}

if (isset($_POST['order'])) {
   $pid = $_POST['pid'];
   $fid = $_POST['fid'];
   $grade = $_POST['grade'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = 'flat no. ' . $_POST['flat'] . ' ' . $_POST['city'] . ' ' . $_POST['state'] . ' ' . $_POST['country'] . '';
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';
   $cart_query = "SELECT * FROM  `cart` WHERE bid='$bid';";
   $result = mysqli_query($conn, $cart_query);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $cart_products[] = $row['product'] . ' ( ' . $row['quantity'] . ' )';
         $sub_total = ($row['price'] * $row['quantity']);
         $cart_total += $sub_total;
      }
      ;
   }
   ;

   $total_products = implode(', ', $cart_products);
   $order_query = "SELECT * FROM `orders` WHERE name ='$name' AND number ='$number' AND email ='$email' AND method ='$method' AND address ='$address' AND total_products ='$total_products' AND total_price = '$cart_total'";

   $result = mysqli_query($conn, $order_query);
   if ($cart_total == 0) {
      $message[] = 'your cart is empty';
   } elseif (mysqli_num_rows($result) > 0) {
      $message[] = 'order placed already!';
   } else {
      $bid = $_SESSION['bid'];
      $sql = "INSERT INTO orders (bid, fid, pid,grade, name, number, email, method, address, total_products, total_price)
			   VALUES ('$bid','$fid','$pid','$grade','$name','$number','$email','$method','$address','$total_products','$cart_total')";
      $result1 = mysqli_query($conn, $sql);
      if ($result1) {
         $message[] = 'processing....';
      }

      $delete_product = "DELETE FROM fproduct WHERE pid='$pid';";
      $result2 = mysqli_query($conn, $delete_product);

      $delete_cart = "DELETE FROM cart WHERE bid='$bid';";
      $result = mysqli_query($conn, $delete_cart);
      if ($result) {
         $message[] = 'order placed successfully!';
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
   <title>checkout-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylestore.css">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

   <?php include 'headerstore.php'; ?>

   <section class="display-orders" data-aos="fade-down" class="div" data-aos-duration="1000">

      <?php
      $cart_grand_total = 0;
      $select_cart_items = "SELECT * FROM  `cart` WHERE bid='$bid';";
      $result = mysqli_query($conn, $select_cart_items);

      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
            $cart_total_price = ($row['price'] * $row['quantity']);
            $cart_grand_total += $cart_total_price;
            ?>
            <p>
               <?= $row['product']; ?> <span>(
                  <?= '' . $row['price'] . '/- x ' . $row['quantity']; ?>)
               </span>
            </p>
            <?php
         }
      } else {
         echo '<p class="empty">your cart is empty!</p>';
      }
      ?>
      <div class="grand-total" data-aos="fade-down" class="div" data-aos-duration="1500">grand total : <span>
            <?= $cart_grand_total; ?>/-
         </span></div>
   </section>

   <section class="checkout-orders">

      <form action="" method="POST" data-aos="zoom-in-up" class="div" data-aos-duration="1000"
         onsubmit="return validateform()">
         <?php $select = mysqli_query($conn, "SELECT fid FROM `cart` WHERE bid = '$bid'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>
         <input type="hidden" name="fid" class="box" value="<?php echo $_SESSION['fid']; ?>">
         <?php $select = mysqli_query($conn, "SELECT pid FROM `cart` WHERE bid = '$bid'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>

         <input type="hidden" name="pid" class="box" value="<?php echo $_SESSION['pid']; ?>">
         <?php $select = mysqli_query($conn, "SELECT grade FROM `cart` WHERE bid = '$bid'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>
         <input type="hidden" name="grade" class="box" value="<?php echo $_SESSION['grade']; ?>">


         <h3>place your order</h3>
         <?php $select = mysqli_query($conn, "SELECT * FROM `buyer` WHERE bid = '$bid'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>

         <div class="flex">
            <div class="inputBox">
               <span>your name :</span>
               <input type="text" name="name" placeholder="enter your name" class="box"
                  value="<?php echo $_SESSION['bname']; ?>" required>
            </div>
            <div class="inputBox">
               <span>your number :</span>
               <input type="number" name="number" placeholder="enter your number" maxlength="10" name="mobile"
                  min="0000000000" minlength="10" class="box" value="<?php echo $_SESSION['bmobile']; ?>" required>
            </div>
            <div class="inputBox">
               <span>your email :</span>
               <input type="email" name="email" placeholder="enter your email" class="box"
                  value="<?php echo $_SESSION['bemail']; ?>" required>
            </div>
            <div class="inputBox">
               <span>payment method :</span>
               <select name="method" class="box" required>
                  <option value="cash on delivery">cash on delivery</option>
               </select>
            </div>
            <div class="inputBox">
               <span>address line 01 :</span>
               <input type="text" name="flat" placeholder="e.g. flat number" class="box" required>
            </div>

            <div class="inputBox">
               <span>city :</span>
               <input type="text" name="city" placeholder="e.g. mumbai" class="box" required>
            </div>
            <div class="inputBox">
               <span>state :</span>
               <input type="text" name="state" placeholder="e.g. maharashtra" class="box" required>
            </div>
            <div class="inputBox">
               <span>country :</span>
               <input type="text" name="country" placeholder="e.g. India" class="box" required>
            </div>
            <div class="inputBox">
               <span>pin code :</span>
               <input type="number" maxlength="6" min="000000" minlength="6" name="pincode" placeholder="e.g. 123456"
                  class="box" required>
            </div>
         </div>

         <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1) ? '' : 'disabled'; ?>"
            value="place order">

      </form>

   </section>

   <script>
      function validateform() {
         var pin_code = document.myform.pin_code.value;
         if (pin_code ==000000) {
            alert("pincode can't be blank");
            return false;
         }
      }  
   </script>


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
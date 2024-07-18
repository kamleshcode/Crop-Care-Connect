<?php

@include 'db.php';

session_start();

$fid = $_SESSION['fid'];

if (!isset($fid)) {
   header('location:test.php');
}
;

if (isset($_POST['update_product'])) {

   $pid = $_POST['pid'];
   $product = $_POST['product'];
   $product = filter_var($product, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $pcat = $_POST['pcat'];
   $pcatcat = filter_var($pcat, FILTER_SANITIZE_STRING);
   $grade = $_POST['grade-type'];

   $grade = filter_var($grade, FILTER_SANITIZE_STRING);
   $pinfo = $_POST['pinfo'];
   $pinfo = filter_var($pinfo, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'ProductPic/' . $image;
   $old_image = $_POST['old_image'];
   $sql = "UPDATE fproduct SET product ='$product', pcat='$pcat', grade='$grade', pinfo='$pinfo', price='$price' where pid='$pid';";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      $_SESSION['message'] = " product updatedd  Please login to see the changes!";
      header("Location: uploadProduct.php");
   }
   if (!empty($image)) {
      if ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $sql = "UPDATE fproduct SET  pimage='$image' WHERE pid='$pid';";
         $result = mysqli_query($conn, $sql);

         if ($result) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $_SESSION['message'] = " product Image updatedd  Please login to see the changes!";
            header("Location: uploadProduct.php");
         }
      }
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
   <title>update products- CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>

<body>


   <section class="update-product">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="1000">update product</h1>

      <?php
      $update_id = $_GET['update'];
      $select_products = mysqli_query($conn, "SELECT * FROM `fproduct`where pid= $update_id") or die('query failed');

      if (mysqli_num_rows($select_products) > 0) {
         while ($row = mysqli_fetch_assoc($select_products)) {
            ?>
            <form action="" method="post" enctype="multipart/form-data" data-aos="zoom-in-up" class="div"
               data-aos-duration="1000">
               <input type="hidden" name="old_image" value="<?php echo $row['pimage']; ?>">
               <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
               <img src="ProductPic/<?php echo $row['pimage']; ?>" alt="">
               <input type="text" name="product" placeholder="enter product name" required class="box" value="">
               <input type="text" name="price" min="0" placeholder="enter product price" required class="box" value="">
               <select name="pcat" class="box" placeholder="Select category" required>
                  <option selected disabled>Select category</option>
                  <option value="vegitables">vegitables</option>
                  <option value="fruits">fruits</option>
                  <option value="grains">grains</option>
               </select>
               <div class="inputBox">
                  <select name="grade-type" class="box" required>
                     <option value="" selected disabled>select category of Grading</option>
                     <option value="grade-3">Grade-3 (class-2)</option>
                     <option value="grade-2">Grade-2 (class-1)</option>
                     <option value="grade-1">Grade-1 (Extra-class)</option>
                  </select>
                  <br>
                  <br>
                  <button
                     onclick="location.href='https://www.coolingindia.in/advantages-of-fruits-vegetables-grading/#:~:text=Every%20country%20has%20set%20their,Class%20I%20and%20Class%20II.';"
                     style="width:280px; background-color:f6f6f6;color:blue;border-radius:0.5rem;font-size:1.8rem;border:black;height:45px;">For
                     more info Of Food Grade</button>

               </div>
               <textarea name="pinfo" required placeholder="enter product details" class="box" cols="30" rows="10"></textarea>
               <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
               <div class="flex-btn">
                  <input type="submit" class="btn" value="update product" name="update_product">
                  <a href="uploadProduct.php" class="option-btn">go back</a>
               </div>
            </form>
            <?php
         }
      } else {
         echo '<p class="empty">no products found!</p>';
      }
      ?>

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
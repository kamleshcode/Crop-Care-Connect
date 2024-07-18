<?php

@include 'db.php';

session_start();

$aid = $_SESSION['aid'];

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_products = "DELETE FROM `buyer` WHERE bid='$delete_id';";
   $result = mysqli_query($conn, $delete_products);
   $delete = "DELETE FROM `orders` WHERE bid='$delete_id';";
   $result1 = mysqli_query($conn, $delete);
   if ($result && $result1) {
      header('location:admin_users.php');
   }
}
if (isset($_GET['delete1'])) {

   $delete_id = $_GET['delete1'];
   $delete_products = "DELETE FROM `farmer` WHERE fid='$delete_id';";
   $delete = "DELETE FROM `fproduct` WHERE fid='$delete_id';";
   $result = mysqli_query($conn, $delete_products);
   $result1 = mysqli_query($conn, $delete);
   if ($result && $result1) {
      header('location:admin_users.php');
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
   <title>users-CropCareConnect</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="user-accounts">

      <h1 class="title" data-aos="fade-down" class="div" data-aos-duration="1500">user accounts</h1>

      <div class="box-container" data-aos="zoom-in" class="div" data-aos-duration="1500">

         <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `buyer`") or die('query failed');
         while ($row = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box" style="<?php if ($row['bid'] == $bid) {
               echo 'display:none';
            }
            ; ?>">
               <img src="images/<?= $row['picExt']; ?>" alt="">
               <p> user id : <span>
                     <?= $row['bid']; ?>
                  </span></p>
               <p> username : <span>
                     <?= $row['bname']; ?>
                  </span></p>
               <p> email : <span>
                     <?= $row['bemail']; ?>
                  </span></p>
               <P> user type: <span> Buyer </span></p>
               <a href="admin_users.php?delete=<?php echo $row['bid']; ?>" class="delete-btn"
                  onclick="return confirm('delete this user?');">delete</a>
            </div>
            <?php
         }
         ?>
         <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `farmer`") or die('query failed');
         while ($row = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box" style="<?php if ($row['fid'] == $fid) {
               echo 'display:none';
            }
            ; ?>">
               <img src="images/<?= $row['picExt']; ?>" alt="">
               <p> user id : <span>
                     <?= $row['fid']; ?>
                  </span></p>
               <p> username : <span>
                     <?= $row['fname']; ?>
                  </span></p>
               <p> email : <span>
                     <?= $row['femail']; ?>
                  </span></p>
               <p> User type: <span> Farmer </span></p>
               <a href="admin_users.php?delete1=<?php echo $row['fid']; ?>" class="delete-btn"
                  onclick="return confirm('delete this user?');">delete</a>
            </div>
            <?php
         }
         ?>
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
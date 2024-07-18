<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateform()">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Username</label>
            <input type="text" name="fname" placeholder="User-name" required>
          </div>
          </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="loginchat.php">Login now</a></div>

      <div class="link"><button> <a href="index.php">
            <center><b>Back to Home</b></center>
          </a> </button></div>
    </section>
  </div>
  <script>
    function validateform() {
      var password = document.myform.password.value;
      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }
    }  
  </script>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
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
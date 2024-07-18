<?php
session_start();

$fid = $_SESSION['fid'];
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fid = $_POST['fid'];
	$fid = dataFilter($_POST['fid']);
	$fusername = $_POST['fusername'];
	$fusername= dataFilter($_POST['fusername']);
	$productType = $_POST['type'];
	$grade = $_POST['grade-type'];
	$productName = dataFilter($_POST['product']);
	$productInfo = $_POST['pinfo'];
	$productPrice = dataFilter($_POST['price']);
	$sql = "INSERT INTO fproduct (fid,fusername, product, pcat,grade, pinfo, price)
			   VALUES ('$fid','$fusername','$productName', '$productType','$grade', '$productInfo', '$productPrice')";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		$_SESSION['message'] = "Unable to upload Product !!!";
		header("Location: Login/error.php");
	} else {
		$_SESSION['message'] = "successfull !!!";
		header('location:uploadProduct.php');
	}

	$pic = $_FILES['productPic'];
	$picName = $pic['name'];
	$picTmpName = $pic['tmp_name'];
	$picSize = $pic['size'];
	$picError = $pic['error'];
	$picType = $pic['type'];
	$picExt = explode('.', $picName);
	$picActualExt = strtolower(end($picExt));
	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($picActualExt, $allowed)) {
		if ($picError === 0) {
			$_SESSION['productPicId'] = $_SESSION['id'];
			$picNameNew = $productName . $_SESSION['productPicId'] . "." . $picActualExt;
			$_SESSION['productPicName'] = $picNameNew;
			$_SESSION['productPicExt'] = $picActualExt;
			$picDestination = "ProductPic/" . $picNameNew;
			move_uploaded_file($picTmpName, $picDestination);
			$sql = "UPDATE fproduct SET picStatus=1, pimage='$picNameNew' WHERE product='$productName';";

			$result = mysqli_query($conn, $sql);
			if ($result) {

				$_SESSION['message'] = "Product Image Uploaded successfully !!!";
				header("Location: uploadProduct.php");
			} else {
				//die("bad");
				$_SESSION['message'] = "There was an error in uploading your product Image! Please Try again!";
				header("Location: Login/error.php");
			}
		} else {
			$_SESSION['message'] = "There was an error in uploading your product image! Please Try again!";
			header("Location: Login/error.php");
		}
	} else {
		$_SESSION['message'] = "You cannot upload files with this extension!!!";
		header("Location: Login/error.php");
	}
}
if (isset($_GET['delete'])) {

	$delete_id = $_GET['delete'];
	$sql = "DELETE FROM fproduct WHERE pid='$delete_id';";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('location:uploadProduct.php');
	}
}



function dataFilter($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CropCareConnect/title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="icon" type="image/jpg" href="images/123.jpg">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap\js\bootstrap.min.js"></script>
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>products</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="admin_style.css">

	<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	<link rel="icon" type="image/jpg" href="images/123.jpg">

</head>

<body>

	<body>


		<section class="add-products" data-aos="zoom-in-down" class="div" data-aos-duration="1000">

			<h1 class="title" style="color:black;">add new product</h1>

			<form action="uploadProduct.php" method="POST" enctype="multipart/form-data">
				<div class="flex">
					<div class="inputBox">
						<input type="hidden" name="fusername" class="box" value="<?php echo $_SESSION['fusername']; ?>">
						<input type="hidden" name="fid" class="box" value="<?php echo $_SESSION['fid']; ?>">
						<input type="text" name="product" class="box" required placeholder="enter product name">
						<select name="type" class="box" required>
							<option value="" selected disabled>select category</option>
							<option value="vegitables">vegitables</option>
							<option value="fruits">fruits</option>
							<option value="grains">grains</option>
						</select>
					</div>
					<div class="inputBox">
							<select name="grade-type" class="box" required>
							<option value="" selected disabled>select category of Grading</option>
							<option value="grade-3">Grade-3 (class-2)</option>
							<option value="grade-2">Grade-2 (class-1)</option>
							<option value="grade-1">Grade-1 (Extra-class)</option>
						</select>
						<br>
						<br>
						<button onclick="location.href='https://www.coolingindia.in/advantages-of-fruits-vegetables-grading/#:~:text=Every%20country%20has%20set%20their,Class%20I%20and%20Class%20II.';" style="width:280px; background-color:f6f6f6;color:blue;border-radius:0.5rem;font-size:1.8rem;border:black;height:45px;">For more info Of Food Grade</button>
				
					</div>
						<input type="text" name="price" class="box" required
							placeholder="enter product price with weight">
						<input type="file" name="productPic" required class="box"
							accept="image/jpg, image/jpeg, image/png">
					
				</div>
				<textarea name="pinfo" class="box" required placeholder="enter product details" cols="30"
					rows="10"></textarea>
				<input type="submit" class="btn" value="add product" name="add_product">
			</form>

		</section>
		<section class="show-products">

			<h1 class="title" data-aos="fade-up" class="div" data-aos-duration="1500">products added</h1>

			<div class="box-container" data-aos="zoom-in-up" class="div" data-aos-duration="1500">

				<?php
				$show_products = mysqli_query($conn, "SELECT * FROM `fproduct`where fid='$fid'") or die('query failed');

				if (mysqli_num_rows($show_products) > 0) {
					while ($row = mysqli_fetch_assoc($show_products)) {
						?>



						<div class="box">
							<div class="price">
								<?php echo $row['price']; ?>/-
							</div>
							<img src="ProductPic/<?php echo $row['pimage']; ?>" alt="">
							<div class="name">
								<?php echo $row['product']; ?>
							</div>
							<div class="cat">
								<?php echo $row['pcat']; ?>
							</div>
							<div class="details">
								<?php echo $row['pinfo']; ?>
							</div>
							<div class="details">
								<?php echo $row['grade']; ?>
							</div>
							<div class="flex-btn">

								<a href="farmer_update_product.php?update=<?php echo $row['pid']; ?>"
									class="option-btn">update</a>
								<a href="uploadProduct.php?delete=<?php echo $row['pid']; ?>" class="delete-btn"
									onclick="return confirm('delete this product?');">delete</a>
							</div>
						</div>
						<?php
					}
				} else {
					echo '<p class="empty">now products added yet!</p>';
				}
				?>
			</div>

		</section>

		<script src="storescript.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
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
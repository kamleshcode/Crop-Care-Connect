<?php require "db.php";


$errors = array();
?>
<?php
if (isset($_POST['check-farmer'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM farmer WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['femail'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE farmer SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: test.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

if (isset($_POST['check-buyer'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM buyer WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['bemail'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE buyer SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: test.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        input[type=submit]:hover {
            color: white;
            font-weight: 700;
            background: black;

        }
    </style>

    <meta charset="UTF-8">
    <title>Code Verification-CropCareConnect</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylecode.css">
    <link rel="icon" type="image/jpg" href="images/123.jpg">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <div class="container">
        <div class="row" data-aos="zoom-in" class="div" data-aos-duration="2000">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <div class="form-group">
                        <?php
                        if (isset($_SESSION['info'])) {
                            ?>
                            <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>

                        <br>

                        <div class="form-group">
                            <input class="form-control" type="number" name="otp" placeholder="Enter verification code"
                                required>
                        </div>
                        <div class="form-group">
                            <br>
                            <input class="form-control button" type="submit" name="check-farmer"
                                value="Submit as Farmer">
                            <br>
                            <input class="form-control button" type="submit" name="check-buyer" value="Submit as buyer">
                        </div>
                </form>
            </div>
        </div>
    </div>
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
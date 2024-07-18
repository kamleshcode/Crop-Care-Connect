<?php
session_start();
require "db.php";

$errors = array();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = dataFilter($_POST['category']);
    $_SESSION['Category'] = $category;
}
if (isset($_POST['change-password'])) {
    if ($category == 1) {
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['pass']);
        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        } else {
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE farmer SET code = $code, fpassword = '$encpass' WHERE femail = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if ($run_query) {
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: test.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    } else if ($category == 0) {
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['pass']);
        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        } else {
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE buyer SET code = $code, bpassword = '$encpass' WHERE bemail = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if ($run_query) {
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: test.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
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
    <link rel="icon" type="image/jpg" href="images/123.jpg">

    <meta charset="UTF-8">
    <title>Create a New Password-CropCareConnect</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylecode.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .input-box {
            width: 290px;
            max-width: 98%;
            position: relative;
        }

        input-box input {
            width: 100%;
            height: 60px;
            padding: 0 20px;
            border: 1px solid #ccc;
            outline: none;
            color: #fff;
            background: transparent;
        }

        #message {
            padding: 15px;
            position: absolute;
            button: -30px;
            color: #fff;
            font-size: 15px;
            display: none;
        }

        ::placeholder {
            font-size: 15px;
        }

        .ins-2 {
            padding: 5px;
            margin: 10px;
            /* border-color: rgb(0, 172, 230); */
            display: inline-block;
            border-radius: 16px;
            width: 80%;
            text-align: center;
            margin-top: -20px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" data-aos="zoom-in" class="div" data-aos-duration="1000">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <br>
                    <?php
                    if (isset($_SESSION['info'])) {
                        ?>
                        <div class="alert alert-success text-center">
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
                    <div class="form-group">
                        <div class="input-box">
                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Create new password" required>
                            <p id="message" class="ins-2">Password is <span id="strength"></span></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="pass" placeholder="Confirm your password"
                            required>
                    </div>
                    <b>Category : </b>
                    &nbsp;&nbsp;&nbsp; <input type="radio" id="farmer" name="category" value="1" checked>
                    <label for="farmer">Farmer</label>
                    &nbsp;&nbsp;&nbsp; <input type="radio" id="buyer" name="category" value="0">
                    <label for="buyer">Buyer</label>
                    <br>
                    <br>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var pass = document.getElementById("password");
        var msg = document.getElementById("message");
        var str = document.getElementById("strength");

        pass.addEventListener('input', () => {
            if (pass.value.length > 0) {
                msg.style.display = "block";
            }
            else {
                msg.style.display = "none";
            }
            if (pass.value.length < 4) {
                str.innerHTML = "weak";
                pass.style.borderColor = "#ff5925";
                msg.style.color = "#ff5925";
            }
            else if (pass.value.length >= 4 && pass.value.length < 8) {
                str.innerHTML = "medium";
                pass.style.borderColor = "#8B8000";
                msg.style.color = "#8B8000";
            }
            else if (pass.value.length >= 8) {
                str.innerHTML = "strong";
                pass.style.borderColor = "#26d730";
                msg.style.color = "#26d730";
            }
        })

    </script>
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
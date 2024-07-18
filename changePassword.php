<?php

session_start();


include("db.php");
if (isset($_POST['register'])) {
    $id = $_SESSION['id'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['pass']);

    $query = "select * from farmer where femail = '$email'";
    $run_query = mysqli_query($conn, $query);
    $count_rows = mysqli_num_rows($run_query);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";

    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    if (strcmp($password, $pass) == 0) {
        if ($count_rows != 0) {
            $update_query = "update farmer set fpassword = '$encryption' 
                                    where fid= '$id'";

            $run_query = mysqli_query($conn, $update_query);

            echo "<script>alert('Password Updated Successfully');</script>";
            echo "<script>window.open('test.php','_self')</script>";
        } else if ($count_rows == 0) {
            $update_query = "update buyer set bpassword = '$encryption' 
            where bid = '$id'";

            $run_query = mysqli_query($conn, $update_query);

            echo "<script>alert('Password Updated Successfully');</script>";
            echo "<script>window.open('test.php','_self')</script>";
        } else {

            echo "<script>alert('Please enter valid');</script>";
            echo "<script>window.open('test.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Please Enter Valid Details');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password-CropCareConnect</title>
    
<link rel="icon" type="image/jpg" href="images/123.jpg">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: lightblue;
            background-size: cover;
            background-position: center;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .box {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1.5px solid black;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 50px auto;
            max-width: 500px;
            filter: drop-shadow(1px 1px black);
            border-radius: 5px;
        }

        h3 {
            margin-left: 110px;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        .inp,
        .ins {
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid black;
            background-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type=submit] {
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid black;
            background-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            color: black;
            cursor: pointer;
        }

        .inp:focus,
        .ins:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(255, 255, 255, 0.2);
        }

        .input-box {
            position: relative;
        }

        #message {
            position: absolute;
            top: 100%;
            left: 0;
            padding: 5px 10px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            margin-top: -50px;
            display: none;
        }
    </style>

</head>

<body>


    <div class="box">
        <form action="Profile/changePass.php" method="post">
            <h3>CHANGE PASSWORD</h3>

            <br>
            <input type="email" class="inp" name="email" placeholder="Email-address" required><br>
            <div class="input-box">
                <input type="password" name="password" class="ins" id="password" placeholder="Password" required><br>
                <p id="message" class="ins-2">Password is <span id="strength"></span></p>
                <br>
            </div>

            <input type="password" class="inp" name="pass" placeholder="Confirm Password" required><br><br>
            <span style=" display:block;  margin-bottom: .75em; "></span>
            <br>
            <input type="submit" name="register" value="Update Password">
        </form>
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
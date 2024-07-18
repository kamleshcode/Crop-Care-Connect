<?php session_start(); ?>
<html>

<head>
    <style>
    .toast {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    .toast-hidden {
        opacity: 0;
    }
    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" type="image/jpg" href="images/123.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <title>Signup & Register page-CropCareConnect</title>
    <link rel="stylesheet" href="magicscroll/magicscroll.css" />
    <script src="magicscroll/magicscroll.js"></script>
    <link rel="stylesheet" href="testcss.css" />

</head>

<body>

    <main>
        <div class="box animate">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form method='POST' action="Login/login.php" class="sign-in-form" autocomplete="off">
                        <h1>Sign in</h1>
                        <h3>Not registred yet?</h3>
                        <a href="#" class="toggle">Sign up</a>
                        <div class="actual-form">
                            <input type="email" name="email" id="email" value="" placeholder="email address" required />
                            <input type="password" name="pass" id="pass" value="" placeholder="Password" required />
                            <br>
                            <br>
                            <b>Category : </b>
                            <div class='py'>
                                <input type="radio" class="option-input radio" id="farmer" name="category" value="1"
                                    checked />
                                <b>Farmer</b>
                                <br>
                                <input type="radio" class="option-input radio" id="buyer" name="category" value="0" />
                                <b>Buyer</b>
                                <br>
                                <input type="radio" class="option-input radio" id="admin" name="category" value="3" />
                                <b>Admin</b>
                            </div>
                            <br>
                            <a href="forgot-password.php">Forgot your password?</a>
                            <br>
                            <input type="submit" id="myForm" value="Login">
                        </div>

                        <div id="toastContainer"></div>
                    </form>

                    <form method='POST' action="Login/signUp.php" autocomplete="off" class="sign-up-form"
                        onsubmit="return matchpass()">

                        <div class="heading">
                            <h3>Create Account</h3>
                            <h5>Already have an account?</h5>
                            &nbsp;&nbsp;&nbsp;<a href="#" class="toggle">Sign in</a>
                        </div>
                        <br>

                        <div class="actual-form">
                            <input type="text" name="name" id="name" minlength="4" autocomplete="off" value=""
                                placeholder="Name" required />
                            <input type="text" name="uname" id="uname" value="" placeholder="User-Name" required />
                            <input type="number" maxlength="10" name="mobile" min="0000000000" minlength="10"
                                autocomplete="off" min="1" max="9999999999" oninput="maxLengthCheck(this)" id="mobile"
                                value="" placeholder="Mobile number" required />
                            <input type="email" name="email" id="email" value="" autocomplete="off" placeholder="Email"
                                required />
                            <div class="input-box">
                                <input type="password" name="password" id="password" value="" placeholder="Password"
                                    required />
                                <p id="message" class="ins-2">Password is <span id="strength"></span></p>
                            </div>
                            <input type="password" name="pass" id="pass" value="" placeholder="Confirm Password"
                                required />
                            <input type="text" name="addr" id="addr" value="" placeholder="City" required />
                            <br>
                            <br>
                            <b>Category : </b>
                            <div class='py'>
                                <input type="radio" class="option-input radio" id="farmer" name="category" value="1"
                                    checked />
                                <b>Farmer</b>
                                <br>
                                <input type="radio" class="option-input radio" id="buyer" name="category" value="0" />
                                <b>Buyer</b>
                                <br>
                            </div>
                            <br>
                            <input type="submit" value="Submit" name="submit" class="special" />
                        </div>
                    </form>
                </div>
                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="img/img-4.png" class="image img-1 show" alt="" />
                        <img src="./img/image2.png" class="image img-2" alt="" />
                        <img src="img/img-5.png" class="image img-3" alt="" />
                        <img src="./img/image3.png" class="image img-4" alt="" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Create your own account</h2>
                                <h2>Customize as you like</h2>
                                <h2>Invite others to chat </h2>
                                <h2>start your farm business sales </h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                            <span data-value="4"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>-->
    <script>
    // Function to show toast notification
    function showToast(message) {
        const toastContainer = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        toastContainer.appendChild(toast);

        setTimeout(function() {
            toast.classList.add('toast-hidden');
            setTimeout(function() {
                toastContainer.removeChild(toast);
            }, 1000);
        }, 3000);
    }

    // Event listener for form submission
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        showToast('Successfully logged in !!!');

    });
    </script>
    <script type="text/javascript">
    function matchpass() {
        var firstpassword = document.f1.password.value;
        var secondpassword = document.f1.password2.value;

        if (firstpassword == secondpassword) {
            return true;
        } else {
            alert("password must be same!");
            return false;
        }
    }
    </script>
    <script>
    function maxLengthCheck(object) {
        if (object.value.length > object.max.length)
            object.value = object.value.slice(0, object.max.length)
    }
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
    <script>
    var pass = document.getElementById("password");
    var msg = document.getElementById("message");
    var str = document.getElementById("strength");

    pass.addEventListener('input', () => {
        if (pass.value.length > 0) {
            msg.style.display = "block";
        } else {
            msg.style.display = "none";
        }
        if (pass.value.length < 4) {
            str.innerHTML = "weak";
            pass.style.borderColor = "#ff5925";
            msg.style.color = "#ff5925";
        } else if (pass.value.length >= 4 && pass.value.length < 8) {
            str.innerHTML = "medium";
            pass.style.borderColor = "#8B8000";
            msg.style.color = "#8B8000";
        } else if (pass.value.length >= 8) {
            str.innerHTML = "strong";
            pass.style.borderColor = "#26d730";
            msg.style.color = "#26d730";
        }
    })
    </script>


    <script src="testscript.js"></script>
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
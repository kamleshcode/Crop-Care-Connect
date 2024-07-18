<?php

include 'db.php';
session_start();
$bid = $_SESSION['bid'];
if (!isset($_SESSION['bid'])) {         // condition Check: if session is not set. 
    header('location: test.php');   // if not set the user is sendback to login page.
}

if (isset($_POST['update'])) {
    echo ("successs....");
    header('location: http://127.0.0.1:5000');
}
?>
<!-- this is the markup. you can change the details (your own name, your own avatar etc.) but don’t change the basic structure! -->
<html>

<head>
    <title>Profile-page-CropCareConnect</title>
    <link rel="icon" type="image/jpg" href="images/123.jpg">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

        html {
            height: 100%;
        }

        body {
            background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)) ,url('https://img.freepik.com/free-photo/green-leaf-texture-leaf-texture-background_501050-120.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1708473600&semt=ais');
            position: fixed;
            padding: 0px;
            margin: 0px;
            width: 100%;
            background-position:center;
            height: 100%;
            font: normal 14px/1.618em "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        body:after {
            content: "";
            background-position: center center;
            background-repeat: no-repeat;
            position: fixed;
            width: 100%;
            height: 100vmin;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        body:before {
            content: "";
            height: 0px;
            padding: 0px;
            border: 110em solid #313440;
            position: absolute;
            left: 50%;
            top: 100%;
            z-index: 2;
            display: block;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-animation: puff_portrait 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                borderRadius 0.2s 2.3s linear forwards;
            animation: puff_portrait 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                borderRadius 0.2s 2.3s linear forwards;
        }

        h1,
        h2 {
            font-weight: 400;
            margin: 0px 0px 5px 0px;
        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-weight: 700;
            font-size: 16px;
        }

        p {
            margin: 0px;
        }

        .profile-card {
            background: #ffb300;
            width: 800px;
            height: 75vh;
            position: relative;
            left: 50%;
            top: 50%;
            z-index: 2;
            overflow: hidden;
            opacity: 0;
            margin-top: 70px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16),
                0px 3px 6px rgba(0, 0, 0, 0.23);
            box-shadow: 10px 13px 6px rgba(0, 0, 0, 0.16),
                10px 13px 6px rgba(0, 0, 0, 0.23);
            -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards,
                moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
                materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
            animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards,
                moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
                materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
        }

        .profile-card header {
            width: 400px;
            height: 280px;
            padding: 40px 20px 30px 20px;
            display: inline-block;
            float: left;
            border-right: 2px dashed #eeeeee;
            background: #ffffff;
            color: #000000;
            margin-top: 50px;
            opacity: 0;
            text-align: center;
            -webkit-animation: moveIn 1s 3.1s ease forwards;
            animation: moveIn 1s 3.1s ease forwards;
        }

        .profile-card header h1 {
            color: #ff5722;
        }

        .profile-card header a {
            display: inline-block;
            text-align: center;
            position: relative;
            margin: 25px 30px;
        }

        .profile-card header a:after {
            position: absolute;
            content: "";
            bottom: 3px;
            right: 3px;
            width: 20px;
            height: 20px;
            border: 4px solid #ffffff;
            -webkit-transform: scale(0);
            transform: scale(0);
            background: green;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            -webkit-animation: scaleIn 0.3s 3.5s ease forwards;
            animation: scaleIn 0.3s 3.5s ease forwards;
        }

        .profile-card header a>img {
            width: 120px;
            height: 120px;
            background-color: #1d89e6;
            object-position: center;
            max-width: 100%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -webkit-transition: -webkit-box-shadow 0.3s ease;
            transition: box-shadow 0.3s ease;
            -webkit-box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
            box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
        }

        .profile-card header a:hover>img {
            -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-card .profile-bio {
            width: 175px;
            height: 180px;
            display: inline-block;
            float: right;
            padding: 50px 20px 30px 20px;
            background: #ffffff;
            color: #333333;
            margin-top: 50px;
            text-align: center;
            opacity: 0;
            -webkit-animation: moveIn 1s 3.1s ease forwards;
            animation: moveIn 1s 3.1s ease forwards;
        }

        .profile-social-links {
            width: 218px;
            display: inline-block;
            float: right;
            margin: 0px;
            padding: 15px 20px;
            background: #ffffff;
            margin-top: 50px;
            text-align: center;
            opacity: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-animation: moveIn 1s 3.1s ease forwards;
            animation: moveIn 1s 3.1s ease forwards;
        }

        .button-88 {
            height: 45px;
            width: 220px;
            margin-top: 20px;
            margin-left: 21px;
            display: flex;
            align-items: center;
            font-family: inherit;
            font-weight: 500;
            font-size: 16px;
            padding: 0.7em 1.4em 0.7em 1.1em;
            color: white;
            background: #ad5389;
            background: linear-gradient(0deg, rgba(20, 167, 62, 1) 0%, rgba(102, 247, 113, 1) 100%);
            border: none;
            box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
            letter-spacing: 0.05em;
            border-radius: 20em;
            cursor: pointer;
            justify-content: center;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-88:hover {
            box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
        }

        .button-88:active {
            box-shadow: 0 0.3em 1em -0.5em #14a73e98;
        }

        .button-89 {
            justify-content: center;
            height: 45px;
            width: 200px;
            margin-top: 40px;
            margin-left: 110%;
            display: flex;
            align-items: center;
            font-family: inherit;
            font-weight: 500;
            font-size: 16px;
            padding: 0.7em 1.4em 0.7em 1.1em;
            color: white;
            background: pinkred;
            background: radial-gradient(972.6px at 10% 20%, rgb(243, 0, 75) 0%, rgb(255, 93, 75) 90%);
            ;
            border: none;
            box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
            letter-spacing: 0.05em;
            border-radius: 20em;
            cursor: pointer;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-89:hover {
            box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
        }

        .button-89:active {
            box-shadow: 0 0.3em 1em -0.5em #14a73e98;
        }




        .profile-social-links li {
            list-style: none;
            margin: -5px 0px 0px 0px;
            padding: 0px;
            float: left;
            width: 33.3%;
            text-align: center;
        }

        .profile-social-links li a {
            display: inline-block;
            position: relative;
            -webkit-border-radius: 50%;
            width: 130px;
            height: 30px;
            padding-top: 6px;
            font-size: small;
            color: black;

        }

        .profile-social-links li a img {
            position: relative;
            z-index: 1;
        }

        .profile-social-links li a:before {
            display: block;
            content: "";
            background: rgba(0, 0, 0, 0.3);
            position: absolute;
            left: 0px;
            top: 0px;
            width: 36px;
            height: 36px;
            opacity: 1;
            -webkit-transition: transform 0.4s ease, opacity 1s ease-out;
            transition: transform 0.4s ease, opacity 1s ease-out;
            -webkit-transform: scale3d(0, 0, 1);
            transform: scale3d(0, 0, 1);
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }


        title {
            color: black;
        }


        .profile-social-links li a:hover:before {
            -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-social-links li a img,
        .profile-social-links li a svg {
            width: 130px;
        }

        @media screen and (min-aspect-ratio: 4/3) {
            body {
                background-size: 100% auto;
            }

            body:before {
                width: 0px;
            }

            @-webkit-keyframes puff {
                0% {
                    top: 100%;
                    width: 0px;
                    padding-bottom: 0px;
                }

                100% {
                    top: 50%;
                    width: 100%;
                    padding-bottom: 100%;
                }
            }

            @keyframes puff {
                0% {
                    top: 100%;
                    width: 0px;
                    padding-bottom: 0px;
                }

                100% {
                    top: 50%;
                    width: 100%;
                    padding-bottom: 100%;
                }
            }
        }

        @media screen and (min-height: 480px) {
            .profile-card {
                -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                    moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards,
                    moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
                    materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
                animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                    moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards,
                    moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
                    materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
            }

            .profile-card header {
                width: auto;
                height: auto;
                padding: 30px 20px;
                display: block;
                float: none;
                border-right: none;
            }

            .profile-card .profile-bio {
                width: auto;
                height: auto;
                padding: 15px 20px 30px 20px;
                display: block;
                float: none;
            }

            .profile-social-links {
                width: 100%;
                display: block;
                float: none;
            }
        }

        @media screen and (min-aspect-ratio: 4/3) {
            body {
                background-size: 100% auto;
            }

            body:before {
                width: 0px;
                -webkit-animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                    borderRadius 0.2s 2.3s linear forwards;
                animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
                    borderRadius 0.2s 2.3s linear forwards;
            }
        }

        @-webkit-keyframes init {
            0% {
                width: 0px;
                height: 0px;
            }

            100% {
                width: 56px;
                height: 56px;
                margin-top: 0px;
                opacity: 1;
            }
        }

        @keyframes init {
            0% {
                width: 0px;
                height: 0px;
            }

            100% {
                width: 56px;
                height: 56px;
                margin-top: 0px;
                opacity: 1;
            }
        }

        @-webkit-keyframes puff_portrait {
            0% {
                top: 100%;
                height: 0px;
                padding: 0px;
            }

            100% {
                top: 50%;
                height: 100%;
                padding: 0px 100%;
            }
        }

        @keyframes puff_portrait {
            0% {
                top: 100%;
                height: 0px;
                padding: 0px;
            }

            100% {
                top: 50%;
                height: 100%;
                padding: 0px 100%;
            }
        }

        @-webkit-keyframes puff_landscape {
            0% {
                top: 100%;
                width: 0px;
                padding-bottom: 0px;
            }

            100% {
                top: 50%;
                width: 100%;
                padding-bottom: 100%;
            }
        }

        @keyframes puff_landscape {
            0% {
                top: 100%;
                width: 0px;
                padding-bottom: 0px;
            }

            100% {
                top: 50%;
                width: 100%;
                padding-bottom: 100%;
            }
        }

        @-webkit-keyframes borderRadius {
            0% {
                -webkit-border-radius: 50%;
            }

            100% {
                -webkit-border-radius: 0px;
            }
        }

        @keyframes borderRadius {
            0% {
                -webkit-border-radius: 50%;
            }

            100% {
                border-radius: 0px;
            }
        }

        @-webkit-keyframes moveDown {
            0% {
                top: 50%;
            }

            50% {
                top: 40%;
            }

            100% {
                top: 100%;
            }
        }

        @keyframes moveDown {
            0% {
                top: 50%;
            }

            50% {
                top: 40%;
            }

            100% {
                top: 100%;
            }
        }

        @-webkit-keyframes moveUp {
            0% {
                background: #ffb300;
                top: 100%;
            }

            50% {
                top: 40%;
            }

            100% {
                top: 50%;
                background: #e0e0e0;
            }
        }

        @keyframes moveUp {
            0% {
                background: #ffb300;
                top: 100%;
            }

            50% {
                top: 40%;
            }

            100% {
                top: 50%;
                background: #e0e0e0;
            }
        }

        @-webkit-keyframes materia_landscape {
            0% {
                background: #e0e0e0;
            }

            50% {
                -webkit-border-radius: 4px;
            }

            100% {
                width: 800px;
                height: 75vh;
                background: #ffffff;
                -webkit-border-radius: 4px;
            }
        }

        @keyframes materia_landscape {
            0% {
                background: #e0e0e0;
            }

            50% {
                border-radius: 4px;
            }

            100% {
                width: 800px;
                height: 75vh;
                background: #ffffff;
                border-radius: 4px;
            }
        }

        @-webkit-keyframes materia_portrait {
            0% {
                background: #e0e0e0;
            }

            50% {
                -webkit-border-radius: 4px;
            }

            100% {
                width: 800px;
                height: 75vh;
                background: #ffffff;
                -webkit-border-radius: 4px;
            }
        }

        @keyframes materia_portrait {
            0% {
                background: #e0e0e0;
            }

            50% {
                border-radius: 4px;
            }

            100% {
                width: 800px;
                height: 75vh;
                background: #ffffff;
                border-radius: 4px;
            }
        }

        @-webkit-keyframes moveIn {
            0% {
                margin-top: 50px;
                opacity: 0;
            }

            100% {
                opacity: 1;
                margin-top: -20px;
            }
        }

        @keyframes moveIn {
            0% {
                margin-top: 50px;
                opacity: 0;
            }

            100% {
                opacity: 1;
                margin-top: -20px;
            }
        }

        @-webkit-keyframes scaleIn {
            0% {
                -webkit-transform: scale(0);
            }

            100% {
                -webkit-transform: scale(1);
            }
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @-webkit-keyframes ripple {
            0% {
                transform: scale3d(0, 0, 0);
            }

            50%,
            100% {
                -webkit-transform: scale3d(1, 1, 1);
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes ripple {
            0% {
                transform: scale3d(0, 0, 0);
            }

            50%,
            100% {
                transform: scale3d(1, 1, 1);
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <aside class="profile-card">
        <header>
            <!-- here’s the avatar -->
            <a href="/">
                <?php

                $select = mysqli_query($conn, "SELECT * FROM `buyer` WHERE bid = '$bid'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $_SESSION = mysqli_fetch_assoc($select);
                }
                if ($_SESSION['picExt'] == '') {
                    echo '<img src="images/default-avatar.png">';
                } else {
                    echo '<img src="images/' . $_SESSION['picExt'] . '">';
                }
                ?>
            </a>

            <!-- the username -->
            <h1>
                <?php echo $_SESSION['bname']; ?>
            </h1>

            <!-- and role or location -->
            <h2>Email-id :-
                <?php echo $_SESSION['bemail']; ?>
            </h2>
            <h2>Mobile-no :-
                <?php echo $_SESSION['bmobile']; ?>
            </h2>



        </header>

        <!-- bit of a bio; who are you? -->
        <div class="profile-bio">

        </div>

        <!-- some social links to show off -->
        <ul class="profile-social-links">
            <!-- twitter - el clásico  -->
            <li>
            <button class="button-88" role="button" onclick="location.href='http://localhost/farmtech-master/shop.php';">Buy-Products-Now</button>

            </li>

            <!-- envato – use this one to link to your marketplace profile -->
            <li>
            <button class="button-88" role="button" onclick="location.href='http://localhost/farmtech-master/update_profilebuyer.php';">Update-Profile</button>

            </li>
            <li>
            <button class="button-88" role="button" onclick="location.href='http://localhost/farmtech-master/changePassword.php';">Change-Password of Account</button>

            </li>
            <!-- codepen - your codepen profile-->
            <li>
            <button class="button-89" role="button" onclick="location.href='http://localhost/farmtech-master/Login/logout.php';">Logout</button>

            </li>

            <!-- add or remove social profiles as you see fit -->
        </ul>
    </aside>
</body>

</html>
<!-- that’s all folks! -->
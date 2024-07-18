<?php 
include 'db.php';
session_start();
$fid = $_SESSION['fid'];

if (!isset($_SESSION['fid'])) {         // condition Check: if session is not set. 
    header('location: test.php');   // if not set the user is sendback to login page.
}
?>
<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/jpg" href="images/123.jpg">

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Disease Detection-CropCareConnect</title>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://imgs.search.brave.com/VuKor5q3IIzWgIkYNGXKPfTRlZWkaXaavXhA2QM0pzo/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMudW5zcGxhc2gu/Y29tL3Bob3RvLTE2/MTk3MTk4MjY4OTQt/ODlkNmM0ZmQ1NzM5/P3E9ODAmdz0xMDAw/JmF1dG89Zm9ybWF0/JmZpdD1jcm9wJml4/bGliPXJiLTQuMC4z/Jml4aWQ9TTN3eE1q/QTNmREI4TUh4elpX/RnlZMmg4Tm54OFkz/SnZjSE44Wlc1OE1I/eDhNSHg4ZkRBPQ);
    background-repeat: no-repeat;
    font-family: 'Arial', sans-serif;
    background-size: cover;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
        }

        h1 {
            text-align: center;
            color: black;
            margin-bottom: 30px;
            font-size: 2em;
        }

        form {
            background: rgba( 255, 255, 255, 0.4 );
box-shadow: 0 8px 32px 0 rgba( 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
            filter: drop-shadow(2px 4px 6px black);
             padding: 40px;
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        label {
            display: block;
            margin-bottom: 20px;
            color: black;
            font-size: 1.2em;
            text-align: left;
        }

        input[type="file"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: inherit;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1.2em;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <form action="detect_disease.php" method="post" enctype="multipart/form-data">
    <h1>Crop Disease Detection</h1>
   
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <br>
        <input type="submit" value="Detect Disease">
    </form>
  
</body>
</html>

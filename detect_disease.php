<?php 
include 'db.php';
session_start();
$fid = $_SESSION['fid'];

if (!isset($_SESSION['fid'])) {         // condition Check: if session is not set. 
    header('location: test.php');   // if not set the user is sendback to login page.
}
?>
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

        .container {
            background: rgba( 255, 255, 255, 0.4 );
box-shadow: 0 8px 32px 0 rgba( 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
            filter: drop-shadow(2px 4px 6px black);
           
            animation: fadeIn 1s ease-in-out;
            width: 600px;
            text-align: center;
            height: 600px;
               }

        h1 {
            color: inherit;
        }

        .result {
            font-size: 18px;
            margin-top: 10px;
        }

        .error {
            color: #ff0000;
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 20px;
        }
        .predicted-class {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .result-container {
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .confidence {
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        .error-message {
            color: #e74c3c;
            font-size: 18px;
        }
        .treatment {
            padding-top: 20px;
            font-weight: 800;
            font-size: 16px;
            font-style: italic;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Crop Disease Detection Result</h1>
        <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "CropDisease/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

        $pythonScript = "script.py";
        $imagePath = realpath($targetFile);
        $escapedImagePath = escapeshellarg($imagePath);
        $command = "python $pythonScript $escapedImagePath 2>&1"; // Capture both STDOUT and STDERR

        $output = shell_exec($command);

        // Process Python script output
        $outputLines = explode("\n", $output);
        $predictedClass = null;
        $confidence = null;

        foreach ($outputLines as $line) {
            if (strpos($line, 'Predicted class') !== false) {
                $predictedClass = trim(str_replace('Predicted class:', '', $line));
            } elseif (strpos($line, 'Confidence') !== false) {
                $confidence = trim(str_replace('Confidence:', '', $line));
            }
        }

        echo "<div class='result-container'>";

        if ($predictedClass !== null && $confidence !== null) {
            echo "<p class='predicted-class'>Predicted class: $predictedClass</p>";
            echo "<p class='confidence'>Confidence: $confidence</p>";
            echo "<img src='$targetFile'></img><br>";

            // Get treatment information based on the predicted class
            $treatment = getTreatmentInformation($predictedClass);

            if ($treatment) {
                echo "<p class='treatment'>Treatment: $treatment</p>";
            } else {
                echo "<p class='treatment'>No specific treatment information available.</p>";
            }
        } else {
            echo "<p class='error-message'>The image might not match any known classes or there was an error during prediction.<br>
             Please Upload valid image.</p>";
        }

        echo "</div>";
    } else {
        echo "<p class='error-message'>Error uploading the image.</p>";
    }
}
?>

</div>
</body>

</html>

<?php
// Function to get treatment information based on the predicted class
function getTreatmentInformation($predictedClass)
{
// Define an associative array with treatment information
$treatments = [
    'Apple__Apple_scab' => 'Prune and destroy infected branches. Apply fungicides.',
    'Apple__Black_rot' => 'Prune and destroy infected branches. Apply fungicides.',
    'Apple__Cedar_apple_rust' => 'Prune and destroy infected branches. Apply fungicides.',
    'Apple__healthy' => 'No specific treatment needed. Maintain regular care.',
    'Blueberry__healthy' => 'No specific treatment needed. Maintain regular care.',
    'cherry_(including_sour)__healthy' => 'No specific treatment needed. Maintain regular care.',
    'cherry_(including_sour)__Powdery_mildew' => 'Apply fungicides and maintain proper ventilation.',
    'Corn_(maize)___Cercospora_leaf_spot Gray_leaf_spot' => 'Use resistant varieties and apply fungicides.',
    'Corn_(maize)___Common_rust_' => 'Apply fungicides and plant resistant varieties.',
    'Corn_(maize)___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Corn_(maize)___Northern_Leaf_Blight' => 'Use resistant varieties and apply fungicides.',
    'Grape___Black_rot' => 'Prune and destroy infected plant parts. Apply fungicides.',
    'Grape___Esca_(Black_Measles)' => 'Prune and destroy infected plant parts. Apply fungicides.',
    'Grape___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Grape___Leaf_blight_(Isariopsis_Leaf_Spot)' => 'Apply fungicides and maintain proper vine spacing.',
    'Orange___Haunglongbing_(Citrus_greening)' => 'There is no cure for HLB. Manage infected trees and control citrus psyllids.',
    'Peach___Bacterial_spot' => 'Apply copper-based fungicides and prune infected branches.',
    'Peach___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Pepper,_bell___Bacterial_spot' => 'Apply copper-based fungicides and manage plant spacing.',
    'Pepper,_bell___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Potato___Early_blight' => 'Apply fungicides and practice crop rotation.',
    'Potato___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Potato___Late_blight' => 'Apply fungicides, avoid overhead irrigation, and practice crop rotation.',
    'Raspberry___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Soybean___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Squash___Powdery_mildew' => 'Apply fungicides and maintain proper plant spacing.',
    'Strawberry___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Strawberry___Leaf_scorch' => 'Apply fungicides and practice good irrigation practices.',
    'Tomato___Bacterial_spot' => 'Apply copper-based fungicides and manage plant spacing.',
    'Tomato___Early_blight' => 'Apply fungicides and practice crop rotation.',
    'Tomato___healthy' => 'No specific treatment needed. Maintain regular care.',
    'Tomato___Late_blight' => 'Apply fungicides, avoid overhead irrigation, and practice crop rotation.',
    'Tomato___Leaf_Mold' => 'Prune and remove affected leaves. Apply fungicides.',
    'Tomato___Septoria_leaf_spot' => 'Apply fungicides and practice good plant hygiene.',
    'Tomato___Spider_mites Two-spotted_spider_mite' => 'Use insecticidal soap and maintain proper humidity.',
    'Tomato___Target_Spot' => 'Apply fungicides and practice good plant hygiene.',
    'Tomato___Tomato_mosaic_virus' => 'Remove and destroy infected plants. Control insect vectors.',
    'Tomato___Tomato_Yellow_Leaf_Curl_Virus' => 'Control whiteflies and use resistant tomato varieties.',
];
// Check if the predicted class exists in the array
if (array_key_exists($predictedClass, $treatments)) {
return $treatments[$predictedClass];
} else {
return 'No specific treatment information available.';
}
}
?>
<?php
session_start();

require '../db.php';


if (isset($_POST['register'])) {
    $email = dataFilter($_POST['email']);
    $currPass = $_POST['pass'];
    $newPass = $_POST['password'];
    $conNewPass = $_POST['pass'];
    $newHash = dataFilter(md5(rand(0, 1000)));
}

$sql = "SELECT * FROM farmer WHERE femail='$email'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);


if ($num_rows == 0) {
    $sql = "SELECT * FROM buyer WHERE bemail='$email'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $_SESSION['message'] = "Invalid User Credentials!";
        header("location: error.php");
    } else {
        $User = $result->fetch_assoc();

        //        if(password_verify($_POST['pass'], $email['password']))
        //   {
        if ($newPass == $conNewPass) {
            $conNewPass = dataFilter(password_hash($_POST['pass'], PASSWORD_BCRYPT));
            $currHash = $_SESSION['bhash'];
            $sql = "UPDATE buyer SET bpassword='$conNewPass', bhash='$newHash' WHERE bemail='$email';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['message'] = "Password changed Successfully!";
                header("location: ../Login/success.php");
            } else {
                $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
                header("location: ../Login/error.php");
            }
        }
    }
}
//}
else {
    $User = $result->fetch_assoc();

    //if(password_verify($_POST['pass'], $email['password']))
    //{
    if ($newPass == $conNewPass) {
        $conNewPass = dataFilter(password_hash($_POST['pass'], PASSWORD_BCRYPT));
        $currHash = $_SESSION['fhash'];
        $sql = "UPDATE farmer SET fpassword='$conNewPass', fhash='$newHash' WHERE femail='$email';";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Password changed Successfully!";
            header("location: ../Login/success.php");
        } else {
            $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
            header("location: ../Login/error.php");
        }
    }
}
// else
//{/
//  $_SESSION['message'] = "Invalid current User Credentials!";
//header("location: ../Login/error.php");
//}
//}

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
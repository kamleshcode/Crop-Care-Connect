<?php
session_start();

$email = dataFilter($_POST['email']);
$pass = $_POST['pass'];
$category = dataFilter($_POST['category']);

require '../db.php';

if ($category == 1) {
    $_SESSION['fid'] = $row['fid'];
    $sql = "SELECT * FROM farmer WHERE femail='$email'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    } else {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['fpassword'])) {
            $_SESSION['id'] = $User['fid'];
            $_SESSION['Hash'] = $User['fhash'];
            $_SESSION['Password'] = $User['fpassword'];
            $_SESSION['Email'] = $User['femail'];
            $_SESSION['Name'] = $User['fname'];
            $_SESSION['Username'] = $User['fusername'];
            $_SESSION['Mobile'] = $User['fmobile'];
            $_SESSION['Addr'] = $User['faddress'];
            $_SESSION['Active'] = $User['factive'];
            $_SESSION['status'] = $User['status'];
            $_SESSION['picStatus'] = $User['picStatus'];
            $_SESSION['picExt'] = $User['picExt'];
            $_SESSION['logged_in'] = true;
            $_SESSION['fid'] = $User['fid'];
            $_SESSION['Category'] = 1;
            $_SESSION['Rating'] = 0;

            if ($_SESSION['status'] == "verified") {
                $time = time() + 10;
                $res = mysqli_query($conn, "update farmer set last_login=$time where femail='$email'");


                if ($_SESSION['picStatus'] == 0) {
                    $_SESSION['picId'] = 0;
                    $_SESSION['picName'] = "profile0.png";
                } else {
                    $_SESSION['picId'] = $_SESSION['id'];
                    $_SESSION['picName'] = "profile" . $_SESSION['picId'] . "." . $_SESSION['picExt'];
                }
                //echo $_SESSION['Email']."  ".$_SESSION['Name'];
                echo "Successfully logged in !!";
                header("location: ../Profile2.php");
            } else {
                $sql = "DELETE FROM farmer WHERE femail='$email';";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['message'] = "Account is not verified yet! Please Sign-up again and verify your email.";
                    header("location:error.php");
                }
            }
        } else {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");

        }
    }
} else if ($category == 0) {

    $_SESSION['bid'] = $row['bid'];
    $sql = "SELECT * FROM buyer WHERE bemail='$email'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    } else {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['bpassword'])) {
            $_SESSION['id'] = $User['bid'];
            $_SESSION['Hash'] = $User['bhash'];
            $_SESSION['Password'] = $User['bpassword'];
            $_SESSION['Email'] = $User['bemail'];
            $_SESSION['Name'] = $User['bname'];
            $_SESSION['Username'] = $User['busername'];
            $_SESSION['Mobile'] = $User['bmobile'];
            $_SESSION['Addr'] = $User['baddress'];
            $_SESSION['Active'] = $User['bactive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['status'] = $User['status'];
            $_SESSION['bid'] = $User['bid'];
            $_SESSION['Category'] = 0;

            if ($_SESSION['status'] == "verified") {
                $time = time() + 10;
                $res = mysqli_query($conn, "update buyer set last_login=$time where bemail='$email'");


                //echo $_SESSION['Email']."  ".$_SESSION['Name'];
                header("location: ../Profileb.php");
            } else {
                $sql = "DELETE FROM buyer WHERE bemail='$email';";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['message'] = "Account is not verified yet! Please Sign-up again and verify your email.";
                    header("location:error.php");
                }
            }
        } else {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
        }
    }
} else if ($category == 3) {
    $_SESSION['aid'] = $row['aid'];
    $sql = "SELECT * FROM `admin` WHERE aemail='$email'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    } else {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['apassword'])) {
            $_SESSION['id'] = $User['aid'];
            $_SESSION['Hash'] = $User['ahash'];
            $_SESSION['Password'] = $User['apassword'];
            $_SESSION['Email'] = $User['aemail'];
            $_SESSION['Name'] = $User['aname'];
            $_SESSION['Username'] = $User['ausername'];
            $_SESSION['Mobile'] = $User['amobile'];
            $_SESSION['Addr'] = $User['aaddress'];
            $_SESSION['Active'] = $User['aactive'];
            $_SESSION['picStatus'] = $User['picStatus'];
            $_SESSION['picExt'] = $User['picExt'];
            $_SESSION['logged_in'] = true;

            $_SESSION['aid'] = $User['aid'];
            $_SESSION['Category'] = 3;
            $_SESSION['Rating'] = 0;

            if ($_SESSION['picStatus'] == 0) {
                $_SESSION['picId'] = 0;
                $_SESSION['picName'] = "profile0.png";
            } else {
                $_SESSION['picId'] = $_SESSION['id'];
                $_SESSION['picName'] = "profile" . $_SESSION['picId'] . "." . $_SESSION['picExt'];
            }
            //echo $_SESSION['Email']."  ".$_SESSION['Name'];
            header("location: ../admin_page.php");
        } else {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
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
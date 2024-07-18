<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\farmtech-master\mail\Exception.php';
require 'C:\xampp\htdocs\farmtech-master\mail\PHPMailer.php';
require 'C:\xampp\htdocs\farmtech-master\mail\SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = dataFilter($_POST['name']);
    $mobile = dataFilter($_POST['mobile']);
    $user = dataFilter($_POST['uname']);
    $email = dataFilter($_POST['email']);
    $pass = dataFilter(password_hash($_POST['pass'], PASSWORD_BCRYPT));
    $hash = dataFilter(md5(rand(0, 1000)));
    $category = dataFilter($_POST['category']);
    $addr = dataFilter($_POST['addr']);

    $_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Password'] = $pass;
    $_SESSION['Username'] = $user;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['Category'] = $category;
    $_SESSION['Hash'] = $hash;
    $_SESSION['Addr'] = $addr;
    $_SESSION['Rating'] = 0;
}


require '../db.php';

$length = strlen($mobile);

if ($length != 10) {
    $_SESSION['message'] = "Invalid Mobile Number !!!";
    header("location: error.php");
    die();
}

if ($category == 1) {
    $sql = "SELECT * FROM farmer WHERE femail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM farmer WHERE femail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    } else {
        $code = rand(999999, 111111);
        $status = "notverified";
        $sql = "INSERT INTO farmer (fname, fusername, fpassword, fhash, fmobile, femail, faddress,code,status)
    			VALUES ('$name','$user','$pass','$hash','$mobile','$email','$addr','$code','$status')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $_SESSION['picStatus'] = 0;
            // $_SESSION['picExt'] = png;

            $sql = "SELECT * FROM farmer WHERE femail='$email'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['fid'];

            if ($_SESSION['picStatus'] == 0) {
                $_SESSION['picId'] = 0;
                $_SESSION['picName'] = "profile0.png";
            } else {
                $_SESSION['picId'] = $_SESSION['id'];
                $_SESSION['picName'] = "profile" . $_SESSION['picId'] . "." . $_SESSION['picExt'];
            }

            $_SESSION['message'] =

                "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $to = $email;
            $subject = "Account Verification";

            $sender = "From: maniarkrish2004@gmail.com";
            $msg = "
            Hello '$user',

Thank you for signing up!

Please put this code to activate your account:
             
             <b>Verification code = </b>" . $code;

             function smtp_mailer($to, $subject, $msg)
             {
                 $mail = new PHPMailer;
                 $mail->isSMTP();
                 $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                 $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                 $mail->Port = 587; // TLS only
                 $mail->SMTPSecure = 'tls'; // ssl is deprecated
                 $mail->SMTPAuth = true;
                 $mail->Username = 'maniarkrish2004@gmail.com'; // email
                 $mail->Password = 'umgh zkia tytq ffuv'; // password
                 $mail->setFrom('maniarkrish2004@gmail.com', 'CropCareConnect'); // From email and name
                 $mail->addAddress($to); // to email and name
                 $mail->Subject = $subject;
                 $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                 $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                 $mail->SMTPOptions = array(
                     'ssl' => array(
                         'verify_peer' => false,
                         'verify_peer_name' => false,
                         'allow_self_signed' => true
                     )
                 );
                 if (!$mail->send()) {
                     echo "Mailer Error: " . $mail->ErrorInfo;
                 } else {
                     $info = "We've sent a passwrod reset otp to your email - $to";
                     $_SESSION['info'] = $info;
                     $_SESSION['email'] = $to;
                     header('location: ../user-otp.php');
                     echo "Message sent!";
                 }
             }
             header('location:../user-otp.php');

             echo smtp_mailer($to, $subject, $msg);

         } else {
             $errors['db-error'] = "Something went wrong!";
         }
    }
} else {
    $sql = "SELECT * FROM buyer WHERE bemail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM buyer WHERE bemail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    } else {
        $code = rand(999999, 111111);
        $status = "notverified";
        $sql = "INSERT INTO buyer(bname, busername, bpassword, bhash, bmobile, bemail, baddress,code,status)
    			VALUES ('$name','$user','$pass','$hash','$mobile','$email','$addr','$code','$status')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $_SESSION['picStatus'] = 0;
            // $_SESSION['picExt'] = png;

            $sql = "SELECT * FROM buyer WHERE bemail='$email'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['bid'];

            if ($_SESSION['picStatus'] == 0) {
                $_SESSION['picId'] = 0;
                $_SESSION['picName'] = "profile0.png";
            } else {
                $_SESSION['picId'] = $_SESSION['id'];
                $_SESSION['picName'] = "profile" . $_SESSION['picId'] . "." . $_SESSION['picExt'];
            }

            $_SESSION['message'] =

                "Confirmation code has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $to = $email;
            $subject = "Account Verification";

            $sender = "From: maniarkrish2004@gmail.com";
            $msg = "
            Hello '$user',
<br>
                Thank you for signing up!
<br>
        Please put this code to activate your account:
    <br>         
             <b>Verification code = </b>" . $code;


             function smtp_mailer($to, $subject, $msg)
             {
                 $mail = new PHPMailer;
                 $mail->isSMTP();
                 $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                 $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                 $mail->Port = 587; // TLS only
                 $mail->SMTPSecure = 'tls'; // ssl is deprecated
                 $mail->SMTPAuth = true;
                 $mail->Username = 'maniarkrish2004@gmail.com'; // email
                 $mail->Password = 'umgh zkia tytq ffuv'; // password
                 $mail->setFrom('maniarkrish2004@gmail.com', 'CropCareConnect'); // From email and name
                 $mail->addAddress($to); // to email and name
                 $mail->Subject = $subject;
                 $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                 $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                 $mail->SMTPOptions = array(
                     'ssl' => array(
                         'verify_peer' => false,
                         'verify_peer_name' => false,
                         'allow_self_signed' => true
                     )
                 );
                 if (!$mail->send()) {
                     echo "Mailer Error: " . $mail->ErrorInfo;
                 } else {
                     $info = "We've sent a passwrod reset otp to your email - $to";
                     $_SESSION['info'] = $info;
                     $_SESSION['email'] = $to;
                     header('location: ../user-otp.php');
                     echo "Message sent!";
                 }
             }
             header('location:../user-otp.php');

             echo smtp_mailer($to, $subject, $msg);

         } else {
             $errors['db-error'] = "Something went wrong!";
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
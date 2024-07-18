<?php
session_start();
include('database.inc.php');
$bid=$_SESSION['bid'];
$time=time()+10;
$res=mysqli_query($con,"update buyer set last_login=$time where bid=$bid");
?>
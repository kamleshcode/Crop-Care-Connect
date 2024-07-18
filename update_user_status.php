<?php
session_start();
include('database.inc.php');
$fid=$_SESSION['fid'];
$time=time()+10;
$res=mysqli_query($con,"update farmer set last_login=$time where fid=$fid");
?>
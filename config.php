<?php
$hostname = "localhost";
$username = "id21441093_krish09";
$password = "Krish@2004";
$dbname = "id21441093_farmtech";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
?>
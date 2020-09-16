<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tus_draw_material";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>
<?php
require_once"koneksivar.php";

$conn = new mysqli($DBServer, $DBsalespromo, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_salespromo_ERROR);
}


?>


<?php
session_start(); // เริ่มเซสชัน
?>

<h1>Hi</h1>

<?php 
$e = $_SESSION['email'];
echo $e;
?>

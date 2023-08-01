<?php
$host = "localhost"; // หาก MySQL Server อยู่ที่เครื่องเดียวกับเว็บไซต์ใช้ "localhost"
$username = "root"; // เช่น "root"
$password = ""; // รหัสผ่าน MySQL
$database = "snk_Data"; // ชื่อฐานข้อมูล

// ทำการเชื่อมต่อกับ MySQL
$conn = mysqli_connect($host, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}
?>
<?php
session_start(); // เริ่มเซสชันหากยังไม่เริ่ม
session_unset(); // ล้างค่าตัวแปร session ทั้งหมด
session_destroy(); // ทำลายเซสชันทั้งหมด
?>
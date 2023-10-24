<?php
session_start(); 
include "../controller/connect.php";

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']); // อันที่จะใช้ในการป้อนฐานข้อมูล
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // ดำเนินการแสดงข้อมูลผู้ใช้ที่ตรงกับชื่อผู้ใช้และรหัสผ่าน
    $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['tel'] = $row['tel'];

        header("Location: ./index.php");
        exit;
    } else {
        // ไม่พบผู้ใช้ที่ตรงกับชื่อผู้ใช้และรหัสผ่าน
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

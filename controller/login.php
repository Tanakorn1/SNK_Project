<?php
if(isset($_POST['submit'])){
    $username =  $_POST['username']; // อันที่จะใช้ในการป้อนฐานข้อมูล
    $password =  $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];

        $_SESSION['picture'] = $row['picture'];
        // สร้างและบันทึกเวลาเข้าสู่ระบบ
        $_SESSION['login_time'] = time();

        header("Location: ?page=home");
        exit;
    } else {
        // ไม่พบผู้ใช้ที่ตรงกับชื่อผู้ใช้และรหัสผ่าน
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

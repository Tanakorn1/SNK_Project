<?php
if(isset($_POST['submit'])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    
    // อัปโหลดรูปภาพ
    $picture = $_FILES['picture']['name'];
    $picture_tmp = $_FILES['picture']['tmp_name'];
    $picture_path = "./public/imgnews/" . $picture;

if (move_uploaded_file($picture_tmp, $picture_path)) {
    // ดึงชื่อไฟล์เท่านั้นจากเส้นทางเต็มของไฟล์
    $picture_name = pathinfo($picture, PATHINFO_BASENAME);

    // เตรียมคำสั่ง SQL สำหรับ INSERT ข้อมูล
    $sql = "INSERT INTO news (title, description, picture) VALUES ('$title', '$description', '$picture_name')";

    // ทำการ INSERT ข้อมูล
        if (mysqli_query($conn, $sql)) {
            echo "บันทึกข้อมูลข่าวสารเรียบร้อยแล้ว!";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
    }
}
?>


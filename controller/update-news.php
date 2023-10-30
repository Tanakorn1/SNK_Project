<?php
if(isset($_POST['submit'])){

    $title = $_POST["title"];
    $description = $_POST["description"];
    // echo $description;
    $news_id = $_POST['news_id'];

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        // อัปโหลดรูปภาพ
        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];
        $picture_path = "./public/imgnews/" . $picture;

        if (move_uploaded_file($picture_tmp, $picture_path)) {
            // ดึงชื่อไฟล์เท่านั้นจากเส้นทางเต็มของไฟล์
            $picture_name = pathinfo($picture, PATHINFO_BASENAME);

            // เตรียมคำสั่ง SQL สำหรับอัปเดตข้อมูล
            $sql = "UPDATE news SET title='$title', description='$description', picture='$picture_name' WHERE news_id=$news_id";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
        }
    } else {
        // ถ้าไม่มีการอัปโหลดรูปภาพ
        $sql = "UPDATE news SET title='$title', description='$description' WHERE news_id=$news_id";
    }

    // ทำการอัปเดตข้อมูล
    if (mysqli_query($conn, $sql)) {
        echo "อัปเดตข้อมูลข่าวสารเรียบร้อยแล้ว!";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . mysqli_error($conn);
    }

}

?>
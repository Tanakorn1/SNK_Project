<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข่าวสาร</title>
    <!-- เรียกใช้ Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div style="padding: 0 0 0 85px;">
        <a style="margin-top: 20px; width: 200px;" href="datanews.php" class="btn btn-primary">กลับ</a>
    </div>
    <?php
    include '../controller/connect.php';
// ตรวจสอบว่ามีค่า newsfeed_id ที่ส่งมาหรือไม่
if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];

    // ทำคำสั่ง SQL และดึงข้อมูลโดยใช้ newsfeed_id
    $sql = "SELECT * FROM news WHERE news_id = $news_id";
    $result = mysqli_query($conn, $sql);

    // ตรวจสอบว่ามีข้อมูลที่ดึงออกมาหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageURL = '../public/imgnews/'.$row['picture'];
        // แสดงข้อมูลที่ดึงมา
        echo '<div class="container">';
        echo '<div class="card shadow">';
        echo '<div class="card-body">'; // เพิ่ม text-center เพื่อจัดให้เนื้อหาอยู่กึ่งกลาง

        echo '<h1 class="text-center">' . $row['title'] . '</h1><br>';
        ?>
    <div class="text-center">
        <img src="<?php //echo $imageURL ?>" alt="" width="40%" height="auto">
    </div>
    <!-- ปรับ width เป็น 50% และ height เป็น auto -->

    <?php
        echo '<br><p>' . $row['description'] . '</p>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'ไม่พบข้อมูลที่ตรงกับ news_id ที่ระบุ';
    }
} else {
    echo 'ไม่ระบุค่า news_id';
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
</body>

</html>
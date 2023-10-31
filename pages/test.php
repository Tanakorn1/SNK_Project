<?php
include "./component/navbar.php";
?>

<body class="bodyt">
    <div class="contentCN">
    <!-- <div class="container mt-5"> -->

        <?php
        if (isset($_GET['news_id'])) {
            $news_id = $_GET['news_id'];

            // ทำคำสั่ง SQL และดึงข้อมูลโดยใช้ newsfeed_id
            $sql = "SELECT * FROM news WHERE news_id = $news_id";
            $result = mysqli_query($conn, $sql);

            // ตรวจสอบว่ามีข้อมูลที่ดึงออกมาหรือไม่
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $imageURL = '../public/imgnews/' . $row['picture'];
                // แสดงข้อมูลที่ดึงมา
                echo '<div class="container">';
                echo '<div class="card shadow">';
                echo '<div class="card-body">'; // เพิ่ม text-center เพื่อจัดให้เนื้อหาอยู่กึ่งกลาง

                echo '<h1 class="text-center">' . $row['title'] . '</h1><br>';
        ?>
                <div class="text-center">
                    <img src="<?php //echo $imageURL 
                                ?>" alt="" width="40%" height="auto">
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

        ?>
        <!-- <div style="padding: 0 0 0 85px;">
        <a style="margin-top: 20px; width: 200px;" href="?page=home" class="btn btn-primary">กลับ</a>
    </div> -->
    <!-- </div> -->
    </div>
</body>

</html>
<?php
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
?>
<?php
include "./component/navbar.php";
?>

<body class="bodyt">
    <div class="content">
        <div class="card bg-light text-dark">
        
            <div class="container mt-5">
                <h1>ข้อมูลข่าว</h1>
                <?php

    $sql = "SELECT * FROM news";

    // ทำการส่งคำสั่ง SQL
    $result = mysqli_query($conn, $sql);

    // ตรวจสอบว่ามีข้อมูลข่าวหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $count = 0; // นับรายการ
        while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0) {
                // เปิดแถวใหม่
                echo '<div class="row">';
            }
    
            $imageURL = './public/imgnews/' . $row['picture'];
            ?>
                <div class="col-md-3 zoom">
                    <div class="card-deck">
                        <div class="card news-card">
                            <!-- เพิ่ม class "news-card" เพื่อใช้สไตล์ขนาดของการแสดงข่าวสาร -->
                            <img style="padding: 10px; width: 255px; height: 180px;" class="card-img-top news-image"
                                src="<?php echo $imageURL ?>" alt="Card image cap">

                            <!-- เพิ่ม class "news-image" เพื่อใช้สไตล์ขนาดของรูปภาพ -->

                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="wrapper"></div>
                                    <b>
                                        <a href="?page=detail&news_id=<?php echo $row['news_id']; ?>"
                                            style="text-decoration: none; color: black; font-size: 16px;">
                                            <?php echo $row['title']; ?>
                                        </a>

                                    </b>
                                </h5>
                            </div>
                            <div style="text-align: center;">
                                <a type="button" class="btn btn-success text-white"
                                    href="?page=detail&news_id=<?php echo $row['news_id']; ?>">
                                    <i class="flaticon-up-arrow"></i> More Details
                                </a>
                                <a href="?page=edit-news&news_id=<?php echo $row['news_id']; ?>" type="button"
                                    class="btn btn-warning text-white">
                                    <i class="far fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            $count++;
    
            if ($count % 3 == 0) {
                // ปิดแถว
                echo '</div>';
            }
        }
    
        // ตรวจสอบว่าครบแถวหรือยัง
        if ($count % 3 !== 0) {
            // ปิดแถวเมื่อไม่ครบ 3 รายการในแถวสุดท้าย
            echo '</div>';
        }
    } else {
        echo "ไม่มีข้อมูลข่าว";
    }
    ?>
            </div>


            <!-- เรียกใช้ Bootstrap JavaScript และ jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>


</body>
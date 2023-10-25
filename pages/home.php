<?php
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
?>
<?php
include "./component/navbar.php";
?>

<body class="bodyt">
    <div class="contentnews">
        <div class="card bg-light text-dark">
            <h1>ข้อมูลข่าว</h1>
        </div>
    </div>
    <div class="content">
        <div class="card bg-light text-dark">

            <div class="container mt-5">

                <?php

                $sql = "SELECT * FROM news";

                // ทำการส่งคำสั่ง SQL
                $result = mysqli_query($conn, $sql);

                // ตรวจสอบว่ามีข้อมูลข่าวหรือไม่
                if (mysqli_num_rows($result) > 0) {
                    $count = 0; // นับรายการ
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imageURL = './public/imgnews/' . $row['picture'];
                        
                        // Check if the count is a multiple of 3
                        if ($count % 3 === 0) {
                            echo '</div><div class="row" style="padding: 10px;">';
                        }
                        ?>
                <div class="col-md-4">
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
                    }
                } else {
                    echo "ไม่มีข้อมูลข่าว";
                }
                ?>
            </div>
        </div>
    </div>
</body>
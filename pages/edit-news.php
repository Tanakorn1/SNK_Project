<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เรียกใช้ Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../public/img/logo.png">
    <!-- Summernote cdn -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <title>ข่าวสาร</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>กรอกข้อมูลข่าวสาร</h1>
            </div>
            <div class="card-body">
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
                } else {
                    echo 'ไม่พบข้อมูลที่ตรงกับ news_id ที่ระบุ';
                }
                } else {
                    echo 'ไม่ระบุค่า news_id';
                }
                
                // ปิดการเชื่อมต่อฐานข้อมูล
                // mysqli_close($conn);
                ?>
                <form method="post" action="../controller/update-news.php" enctype="multipart/form-data">
                    <input type="hidden" name="news_id" value="<?php echo $row['news_id']; ?>">
                    <div class="form-group">
                        <label for="title">ชื่อเรื่อง:</label>
                        <input type="text" id="title" name="title" class="form-control" required
                            value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="picture">รูปเดิม:</label><br>
                        <img src="<?php echo $imageURL; ?>" alt="" style="padding: 10px; width: 255px; height: 180px;"
                            class="card-img-top news-image">
                        <input type="file" id="picture" name="picture" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">รายละเอียด:</label>
                        <textarea id="description" name="description" class="form-control" required
                            value="<?php echo $row['description']; ?>"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                    <a href="datanews.php" class="btn btn-primary">กลับ</a>
                </form>
            </div>
        </div>
    </div>

    <!-- เรียกใช้ Bootstrap JavaScript และ jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $('#description').summernote({
        placeholder: 'เพิ่มข้อมูลลงที่นี่',
        tabsize: 2,
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']], // เพิ่ม 'file' ที่นี่
            ['view', ['fullscreen', 'codeview', 'help']]
        ]

    });
    </script>
</body>

</html>
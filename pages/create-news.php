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
                <?php  include "./controller/create-news.php";?>
                <form method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">ชื่อเรื่อง:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="picture">รูป:</label>
                        <input type="file" id="picture" name="picture" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">รายละเอียด:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    <a href="?page=home" class="btn btn-primary">ดูข้อมูล</a>
                </form>
            </div>
        </div>
    </div>

   
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
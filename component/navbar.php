<?php
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>


<body>
    <div class="sidebar" id="sidebar">
        <a class="brand-link">
            <span class="brand-text font-weight-light" style="font-size: 30px;">
                <img src="./public/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
                    style="width: 20%;">
                Slot Nankai</span>
            <hr class="horizontal-line">
        </a>

        <div class="info">
            <a class="d-block">
                <img src="./public/img/user.png" alt="" style="width: 20%;" class="brand-image img-circle elevation-3">
                <?php echo $fname.' '.$lname ?> </a>
        </div>



            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" style="padding-left: 30px;">
                    <li class="nav-header">Data</li>
                    <li class="nav-item">
                        <a href="?page=home" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=video" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>VideoTest</p>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a href="../newsfeed/newsfeed.php" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>data3</p>
                        </a>
                    </li>
                    <li class="nav-header">Account</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="logout()">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log Out</p>
                        </a>

                    </li>
                </ul>
            </nav>

    </div>


    <div id="content">
        <nav class="main-header navbar navbar-expand  navbar-light">
            <ul class="navbar-nav" style="padding-left: 70%;">
                <li class="nav-item">
                    <a style="font-size: 20px;" ><?php echo $fname, " ", $lname; ?></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto ">
                <li class="nav-item d-md-block d-none">
                    <a class="nav-link" id="realtime-clock"></a>
                </li>
            </ul>
        </nav>
    </div>


    <script>
    function updateRealTimeClock() {
        const realtimeClockElement = document.getElementById('realtime-clock');

        setInterval(() => {
            const currentTime = new Date();
            const hours = currentTime.getHours().toString().padStart(2, '0');
            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
            const seconds = currentTime.getSeconds().toString().padStart(2, '0');
            realtimeClockElement.textContent = ` ${hours}:${minutes}:${seconds}`;
        }, 1000); // อัปเดตทุก 1 วินาที
    }


    updateRealTimeClock();
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <script>
    function logout() {
        Swal.fire({
            icon: "warning",
            title: "Are you sure?",
            text: "Do you want to Log Out?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('./controller/logout.php')
                    .then(response => response.text())
                    .then(data => {
                        window.location.href = "?page=login";
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    }
    </script>
</body>

</html>
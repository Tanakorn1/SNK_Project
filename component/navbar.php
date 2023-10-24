<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    </head>
    

    <body>
        <div class="sidebar" id="sidebar">
            <div class="sidebar_a ">

               <h1 class="text-white no-underline">Slot Nankai</h1>
            </div>
        </div>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mx-2 d-flex align-items-center">
                        <li class="nav-item ml-1">
                            <h3><?php echo $Fname, " ", $Lname; ?></h3>
                        </li>
                    </ul>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2"></ul>
                        <ul class="navbar-nav d-flex align-items-center">
                            <li class="nav-item" id="nav-item">
                            <h5 id="elapsed-time" style="color:red;" ></h5>
                            </li>
                            <li class="nav-item" id="nav-item">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                        </ul>
                    </div>
                </div>
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
            realtimeClockElement.textContent = `RealTime: ${hours}:${minutes}:${seconds}`;
        }, 1000); // อัปเดตทุก 1 วินาที
    }

    // Function to update and display elapsed time
    function updateElapsedTime() {
        const elapsedTimeElement = document.getElementById('elapsed-time');
        
        setInterval(() => {
            if (<?php echo isset($_SESSION['login_time']) ? 'true' : 'false'; ?>) {
                const loginTime = new Date(<?php echo isset($_SESSION['login_time']) ? $_SESSION['login_time'] * 1000 : '0'; // Multiply by 1000 to convert to milliseconds ?>);
                const currentTime = new Date();
                const elapsedTimeMilliseconds = currentTime - loginTime;
                const elapsedTimeHours = Math.floor(elapsedTimeMilliseconds / (1000 * 60 * 60));
                const elapsedTimeMinutes = Math.floor((elapsedTimeMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
                const elapsedTimeSeconds = Math.floor((elapsedTimeMilliseconds % (1000 * 60)) / 1000);
                elapsedTimeElement.textContent = `เวลาที่เข้าใช้: ${elapsedTimeHours.toString().padStart(2, '0')}:${elapsedTimeMinutes.toString().padStart(2, '0')}:${elapsedTimeSeconds.toString().padStart(2, '0')}`;
            }
        }, 1000); // อัปเดตทุก 1 วินาที
    }

    // Call the functions to update and display the login time, RealTime clock, and elapsed time
    updateRealTimeClock();
    updateElapsedTime();
</script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
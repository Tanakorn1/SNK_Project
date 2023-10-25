<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./public/Css/login.css">
</head>

<body>
    <div id="background-container">
        <!-- The background image will be applied to this container -->
    </div>
    <br><br><br><br><br><br><br>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
            <?php
                            include "./controller/login.php";
                        ?>
            <form method="post" class="form">
                <label for="username" style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input id="username" class="form-content" type="username" name="username" autocomplete="on" required />
                <div class="form-border"></div>
                <label for="password" style="padding-top:22px">&nbsp;Password
                </label>
                <input id="password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
                <a href="#">
                    <legend id="forgot-pass">Forgot password?</legend>
                </a>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
                <a href="#" id="signup">Don't have account yet?</a>
            </form>
        </div>
    </div>
</body>

</html>
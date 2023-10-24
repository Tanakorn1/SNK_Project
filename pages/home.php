<?php
$Fname = $_SESSION['Fname'];
$Lname = $_SESSION['Lname'];
?>
<?php
include "./component/navbar.php";
?>
<body class="bodyt">
    <div class="content">
    <div class="card bg-light text-dark">
    <div class="card-body">
    <h1>Hi</h1>
        <h2><?php echo $Fname, " ", $Lname; ?></h2>
    </div>
</div>

      
</body>

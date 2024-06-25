<?php 
session_start();
    include("../../config/functions.php");
$user_id = $_GET["user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Document</title>
</head>

<header>
    <nav>
        <ul>
            <li><a href="../index.php">Տեսականի</a></li>
            <li><a href="done.php">կատրած պատվերներ </a></li>
            <li><a href="wait.php">կատարման ենթակա պատվերներ</a></li>
            <li><a href="addProduct.php">Ավելացնել նոր ապրանք</a></li>
        </ul>
    </nav>
    <a href="../../actions/logoutAction.php" class="logout">
        <i class=" fa-solid fa-right-from-bracket"></i>
    </a>
</header>
<link rel="stylesheet" href="../css/user.css">

<body>
    <section>
        <?php
    $sql = "SELECT * FROM `users` WHERE User_ID= $user_id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
        ?>


        <div class="card">
            <div class="row">
                <b> Name:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Name']; ?>
            </div>
            <hr>
            <div class="row">
                <b>Surname:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Surname']; ?>
            </div>
            <hr>
            <div class="row">
                <b>Email:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['email']; ?>
            </div>
            <hr>
            <div class="row">
                <b>Phone:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Phone']; ?>
            </div>
            <hr>
            <div class="row">
                <b>Address:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Address']; ?>
            </div>
            <hr>
            <div class="row">
                <b>Gender:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Gender']; ?>
            </div>
            <hr>
        </div>



    </section>
</body>

</html>
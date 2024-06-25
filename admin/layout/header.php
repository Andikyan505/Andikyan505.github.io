<?php
session_start();
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
    <title>Document</title>
</head>

<header>
    <div class="logo">
        <a href="../">
            <img src="../../images/logo2.png" alt="">
        </a>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Տեսականի</a></li>
            <li><a href="pages/done.php">կատրած պատվերներ </a></li>
            <li><a href="pages/wait.php">կատարման ենթակա պատվերներ</a></li>
        </ul>
    </nav>
    <a href="../../actions/logoutAction.php">
        <i class=" fa-solid fa-right-from-bracket"></i>
    </a>
</header>
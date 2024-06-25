<?php
include ("../../config/config.php");
session_start();
$user_id = $_SESSION["user_id"];
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
    <link rel="stylesheet" href="../css/done.css">

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


<body>

    <table class="table" border="1" cellspasing="0">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Assortment id</th>
                <th scope="col">User id</th>
                <th scope="col">Count</th>
                <th scope="col">Basket id</th>
                <th scope="col">Ordered</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $sql = "SELECT * FROM `admin_basket` WHERE ordered=false ORDER BY User_ID ";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['Admin_Basket_ID']; ?></td>
                <td><a
                        href="product.php?product_id=<?=$row['Assortment_ID'] ?>"><?php echo $row['Assortment_ID']; ?></a>
                </td>
                <td>
                    <a href="user.php?user_id=<?=$row['User_ID'] ?>"><?php echo $row['User_ID']; ?></a>
                </td>
                <td><?php echo $row['Count']; ?></td>
                <td><?php echo $row['Basket_ID']; ?></td>
                <td><a
                        href="../action/waitToDoneAction.php?id=<?=$row['Admin_Basket_ID'] ?>"><?php echo $row['Ordered']; ?></a>
                </td>

            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>
</body>

</html>
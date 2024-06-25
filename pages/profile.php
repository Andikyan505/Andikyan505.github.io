<?php 
include ("../config/config.php");
include("../layout/header.php") ;     
$user_id = $_SESSION["user_id"];

?>
<link rel="stylesheet" href="../css/profile.css">

<body>

    <?php  $sql = "SELECT * FROM `users` WHERE User_ID= $user_id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result); $sql = "SELECT * FROM `users` WHERE User_ID= $user_id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);?>
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
        <div class="row Button_row">
            <a href="../pages/editProfile.php" class="Button Button-edit">Edit</a>

            <a href=" ../actions/logoutAction.php" class="Button Button-logout">Logout</a>
        </div>

    </div>
</body>
<?php
include("../layout/footer.php");
?>

</html>
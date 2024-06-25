<?php include("../layout/header.php") ?>
<link rel="stylesheet" href="../css/logi.css">
<section>
    <form action="../actions/loginAction.php" method="post">
        <a href="registration.php">
            <p>Registration</p>
        </a>
        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        <span class="errors"><?php echo $_SESSION["error"]["email"]?></span>
        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        <span class="errors"><?php echo $_SESSION["error"]["password"]?></span>
        <button type="submit" value="Sign in" class="btn btn-success btn-lg btn-block">Sign In</button>

    </form>
</section>

<?php
include("../layout/footer.php");

unset($_SESSION['error']); 

?>
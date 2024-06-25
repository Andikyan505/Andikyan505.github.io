<?php include("../layout/header.php") ?>
<link rel="stylesheet" href="../css/regist.css">
<style>

</style>
<section>
    <form action="../actions/registrationAction.php" method="post">
        <a href="login.php">
            <p>Sign In</p>
        </a>

        <input type="text" class="form-control" name="firstname"
            value="<?php echo $_SESSION['registration']['firstname']; ?>" placeholder="First Name"
            required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["firstname"]?></span>

        <input type="text" class="form-control" name="lastname"
            value="<?php echo $_SESSION['registration']['lastname']; ?>" placeholder="Last Name" required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["lastname"]?></span>

        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['registration']['email']; ?>"
            placeholder="Email" required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["email"]?></span>

        <input type="password" class="form-control" name="password" placeholder="Password" required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["password"]?></span>
        <div class="form-group">
            <input type="password" class="form-control" name="RepeatPassword" placeholder="RepeatPassword"
                required="required" />
            <br>
            <span class="errors"><?php echo $_SESSION["error"]["RepeatPassword"]?></span>
        </div>
        <input type="text" class="form-control" name="phone" placeholder="Phone"
            value="<?php echo $_SESSION['registration']['phone']; ?>" required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["phone"]?></span>

        <input type="text" class="form-control" name="Address" placeholder="Address"
            value="<?php echo $_SESSION['registration']['Address']; ?>" required="required" />
        <br>
        <span class="errors"><?php echo $_SESSION["error"]["Address"]?></span>

        <label class="male">Male
            <input type="radio" value="male" class="form-control-gender" name="gender" required="required" />
        </label>
        <label>Female
            <input type="radio" value="female" class="form-control-gender" name="gender" required="required" />
        </label>
        <button type="submit" value="Sign in" class="btn btn-success btn-lg btn-block">
            Register Now
        </button>
    </form>
</section>

<?php include("../layout/footer.php");

unset($_SESSION['error']);
unset($_SESSION['registration']);?>
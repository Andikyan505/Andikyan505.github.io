<?php 
include("../layout/header.php");
include("../config/functions.php");

$data=[
    "User_ID" => $_SESSION['user_id']
];
$sql = select('users',  $data, '*', 1);
$user = mysqli_fetch_assoc($sql);
  
?>
<link rel="stylesheet" href="../css/regist.css">
<section>

    <form action="../actions/editProfileAction.php" method="post">
        <input type="text" class="form-control" name="firstname" value="<?php echo $user['Name']; ?>"
            placeholder="First Name" required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["firstname"]?></span>

        <input type="text" class="form-control" name="lastname" value="<?php echo $user['Surname']; ?>"
            placeholder="Last Name" required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["lastname"]?></span>

        <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" placeholder="Email"
            required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["email"]?></span>

        <input type="password" class="form-control" name="password" placeholder="Password" required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["password"]?></span>

        <input type="password" class="form-control" name="NewPassword" placeholder="NewPassword" required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["NewPassword"]?></span>

        <input type="text" class="form-control" name="phone" value="<?php echo $user['Phone']; ?>" placeholder="Phone"
            required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["phone"]?></span>

        <input type="text" class="form-control" name="Address" value="<?php echo $user['Address']; ?>"
            placeholder="Address" required="required" />
        <span class="errors"><?php echo $_SESSION["error"]["Address"]?></span>
        <button type="submit" value="Sign in" class="btn btn-success btn-lg btn-block">
            Edit
        </button>
    </form>

</section>
<?php include("../layout/footer.php");
unset($_SESSION['error']);

 ?>
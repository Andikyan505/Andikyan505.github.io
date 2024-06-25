<?php
session_start();
// include("../config/config.php");     
// include("../config/config.php");
include("../config/functions.php");
// require 'vendor/autoload.php';

// use SMTP_validateEmail\Validator as SmtpEmailValidator;


// $validator = new SmtpEmailValidator($email);
// $results = $validator->validate();

// if (!$results[$email]) {
//     $_SESSION['error']['email'] = '<p style="color: red; text-align: center;margin-top:10px;"><i class="fas fa-times-circle "></i>&nbsp;Email does not exist!<p/>';
// }
// else{
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        unset($_SESSION["error"]["login"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            $_SESSION['error']['email'] = '<p style="color: red; text-align: center; margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Email is incorect!<p/>';
        }
        unset($_SESSION['error']["email"]);
    } else {
        $_SESSION['error']['email'] = '<p style="color: red; text-align: center;margin-top:10px;"><i class="fas fa-times-circle "></i>&nbsp;Email is require!<p/>';
    }
// }
if (isset($_POST['password'])) {
    $password = $_POST["password"];
    unset($_SESSION["error"]["password"]);
} else {
    $_SESSION['error']['password'] = '<i class="fas fa-times-circle"></i>&nbsp;<p style="color: red; text-align: center;margin-top:10px;">Password is require!<p/>';
    //    $_SESSION["error"]["login"] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons"></i> Password is required';
    // $_SESSION['error']['phone'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;; display: inline-block;"></i> <p style="color: red;;display: inline-block;padding: 0">Please write correct ex.(+374 00 000 000)</p>';

}

$date = [
    "email" => $email,
    "Password" => $password,
];

$result = select('users', $date, '*', 1);
$user = mysqli_fetch_assoc($result);
// var_dump($user);die;
//if (password_verify($_POST['password'],$user["password"])) {
if ($user['Password'] == $password) {
    $_SESSION['user_id'] = $user['User_ID'];
    unset($_SESSION['error']['login']);
    // var_dump($_SESSION['user_id'] );die;
    if(1 == $_SESSION['user_id']){
        header('Location:../admin/index.php');die;
    }
    else{
        header('Location:../pages/tesakani.php');die;
    }
    
} else {
    $_SESSION['error']['password'] = '<p style="color: red; text-align: center;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Password is incorect!<p/>';
    // var_dump($date);die;

    header('Location:../pages/login.php');
    die;
}
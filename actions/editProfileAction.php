<?php session_start();
include("../config/config.php");
include("../config/functions.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$user_id = $_SESSION["user_id"];
if (!$user_id) {
header('Location: ../');die;
}

$sql = "SELECT * FROM `users` WHERE User_ID= $user_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $_SESSION['dates']['firstname'] = $firstname;
} else {
    unset($_SESSION["dates"]['firstname']);
    $_SESSION['error']['firstname'] = '<p style="color: red;     margin-left: 15%; text-align: width:70%;center; margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Firstname is required!<p/>';
}
if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
    $_SESSION['dates']['lastname'] = $lastname;
} else {
    unset($_SESSION['dates']['lastname']);
    $_SESSION['error']['lastname'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Lastname is required!<p/>';
}

if (isset($_POST['email'])) {
    $email  = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // header("Location: ../pages/registration.php");
        unset($_SESSION["dates"]["email"]);
        $_SESSION['error']['email'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Email is incorect!<p/>';
    } else {
        $_SESSION['dates']["email"] = $email;
        // unset($_SESSION['error']['email']);
    }
}
else{
    unset($_SESSION['dates']['email']);

    $_SESSION['error']['email'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Email is require!<p/>';
    
}

if (isset($_POST['Address'])) {
    $Address = $_POST['Address'];
    $_SESSION['dates']["Address"] = $Address;
} else {
    unset($_SESSION["dates"]['Address']);
    $_SESSION['error']['Address'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Address is required!<p/>';
}

// $regexPhone = "/^[+374]{4}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}|((([+374]{4})(\s|-)(\d{2})(\s|-)(\d{3})(\s|-)(\d{3})){1})$|[+374]{4}(\s)[\d]{8}/";
$regexPhone = "/^(\+?374[ -]?(77|91|93|94|95|96|97|98|99)|0[ -]?77)[ -]?\d{2}[ -]?\d{2}[ -]?\d{2}$/";

// if (isset($_POST['phone'])) {
//     // $phone  = (double)  $_POST['phone'];
//     // if (preg_match($regexPhone, $phone)) {
//     $phone = $_POST['phone'];
//     $_SESSION['dates']["phone"] = $phone;

//     // unset($_SESSION['error']['phone']);
//     // }
// } else {
//     // $phone  = null;
//     // header("location:../pages/registration.php");
//     unset($_SESSION['dates']["phone"]);
//     $_SESSION['error']['phone'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red; display: inline-block;"></i> <p style="color: red;display: inline-block;padding: 0">Please write correct ex.(+374 00 000 000)</p>';
//     // die;
// }


if (isset($_POST['phone'])) {
    $phone  =  $_POST['phone'];
        $_SESSION['date']["phone"] = $phone;
    if (preg_match($regexPhone, $phone)) {
        $phone = $_POST['phone'];
        unset($_SESSION['error']['phone']);
    }else{
        $_SESSION['error']['phone'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Phone is incorect!<p/>';

    }
} else {
    $phone  = null;
    // header("location:../pages/registration.php");
    // unset($_SESSION['registration']["phone"]);
    $_SESSION['error']['phone'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Phone is required!<p/>';
    // die;
}







// if (isset($_POST['gender'])) {
//     $gender = $_POST['gender'];
//     $_SESSION['dates']["gender"] = $gender;
//     // unset($_SESSION['error']['gender']);
// } else {
//     //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["dates"]['gender']);
//     $_SESSION['error']['gender'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red">gender is required</i>  ';
// }


if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == $row['Password']) {
        $_SESSION['dates']["password"] = $password;
    }else {
        unset($_SESSION["dates"]['password']);
        $_SESSION['error']['password'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Password is incorect!<p/>';

        // $_SESSION['error']['password'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red; display: inline-block"></i> <p style="color: red; display: inline-block">Password is incorect</p>';
    }
} else {
    unset($_SESSION["dates"]['password']);
    // $_SESSION['error']['password'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red">Password is required </i> ';
    $_SESSION['error']['password'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Password is required!<p/>';

}

if (isset($_POST['NewPassword'])) {
    $NewPassword = $_POST['NewPassword'];
    // if ($NewPassword === $password) {
    //     $_SESSION['dates']["NewPassword"] = $NewPassword;
    // } else {
    //     unset($_SESSION["dates"]['NewPassword']);
    //     $_SESSION['error']['NewPassword'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red; display: inline-block"></i> <p  style="color: red; display: inline-block">The NewPassword does not match the Password </p> ';
    // }
    if (mb_strlen($NewPassword, 'UTF-8') > 5) {
        $_SESSION['dates']["NewPassword"] = $NewPassword;
    }else {
        unset($_SESSION["dates"]['NewPassword']);
            // $NewPassword = null;

        // $_SESSION['error']['NewPassword'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red; display: inline-block"></i> <p style="color: red; display: inline-block">NewPassword is less please enter 6 letter</p>';
        $_SESSION['error']['NewPassword'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;NewPassword is less please enter 6 letter!<p/>';

    }
}
else {
    unset($_SESSION["dates"]['NewPassword']);
    $_SESSION['error']['NewPassword'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;NewPassword is required!<p/>';

    // $_SESSION['error']['NewPassword'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red">NewPassword is required </i> ';
}

// $data = [
//     'Name' => $firstname,
//     'Surname' => $lastname,
//     'Phone' => $phone,
//     'email' => $email,
//     'Password' => $password,
//     'Address' => $Address
//     // 'Gender'  => $gender
//     // 'country' => $country,
//     // 'region' => $region,
//     // 'productName' => $_SESSION["productName"],
// ];
// $dataWhere = [
//     'User_ID' => $user_id
// ];
// var_dump($password, $row['Password']);die;
if ($password === $row['Password']  and empty($_SESSION['error'])) {
    // $option = [
    //     'cost' => 12
    // ];
    // $Password = password_hash($Password, PASSWORD_BCRYPT, $option);

    $data = [
        'Name' => $firstname,
        'Surname' => $lastname,
        'Phone' => $phone,
        'email' => $email,
        'Password' => $NewPassword,
        'Address' => $Address
        // 'Gender'  => $gender
        // 'country' => $country,
        // 'region' => $region,
        // 'productName' => $_SESSION["productName"],
    ];
       $dataWhere = [
        'User_ID' => $user_id
    ];
    // var_dump($data);
    // die;
    $isOk = edit('users', $data,$dataWhere);
    // var_dump($isOk);die;
    if ($isOk) {
        header("Location: ../pages/profile.php");
        // unset($_SESSION["dates"]);
        die;
    }
} else {
    header("Location: ../pages/editProfile.php");
    $_SESSION['error']['error'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red"></i> <p style="color: red;display: inline-block">Something went a wrong. Please fill in the indicated boxes right</p>';
    die;
}
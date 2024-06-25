<?php session_start();
include("../config/config.php");

// include("../config/config.php");
include("../config/functions.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $_SESSION['registration']['firstname'] = $firstname;
} else {
    unset($_SESSION["registration"]['firstname']);
    $_SESSION['error']['firstname'] = '<p style="color: red;     margin-left: 15%; text-align: width:70%;center; margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Firstname is required!<p/>';
}
if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
    $_SESSION['registration']['lastname'] = $lastname;
} else {
    unset($_SESSION['registration']['lastname']);
    $_SESSION['error']['lastname'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Lastname is required!<p/>';
}

if (isset($_POST['email'])) {
    $email  = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // header("Location: ../pages/registration.php");
        unset($_SESSION["registration"]["email"]);
        $_SESSION['error']['email'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Email is incorect!<p/>';
    } else {
        $_SESSION['registration']["email"] = $email;
        // unset($_SESSION['error']['email']);
    }
}else{
    unset($_SESSION['registration']['email']);

        $_SESSION['error']['email'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Email is require!<p/>';
    
}

if (isset($_POST['Address'])) {
    $Address = $_POST['Address'];
    $_SESSION['registration']["Address"] = $Address;
} else {
    unset($_SESSION["registration"]['Address']);
    $_SESSION['error']['Address'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Address is required!<p/>';
}

// $regexPhone = "/^[+374]{4}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}|((([+374]{4})(\s|-)(\d{2})(\s|-)(\d{3})(\s|-)(\d{3})){1})$|[+374]{4}(\s)[\d]{8}/";
$regexPhone = "/^(\+?374[ -]?(77|91|93|94|95|96|97|98|99)|0[ -]?77)[ -]?\d{2}[ -]?\d{2}[ -]?\d{2}$/";
if (isset($_POST['phone'])) {
    $phone  =  $_POST['phone'];    
    $_SESSION['registration']["phone"] = $phone;

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

if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    // $_SESSION['registration']["gender"] = $gender;
    // unset($_SESSION['error']['gender']);
} else {
    //    header("location:../pages/".$_SESSION["productName"].".php#userData");
    // unset($_SESSION["registration"]['gender']);
    $_SESSION['error']['gender'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Gender is incorect!<p/>';
}


if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if (mb_strlen($password, 'UTF-8') > 5) {
        $_SESSION['registration']["password"] = $password;
    }else {
        unset($_SESSION["registration"]['password']);
            $_SESSION['error']['password'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Password is less please enter 6 letter!<p/>';
    }
} else {
    unset($_SESSION["registration"]['password']);
    $_SESSION['error']['password'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;Password is require!<p/>';
}

if (isset($_POST['RepeatPassword'])) {
    $RepeatPassword = $_POST['RepeatPassword'];
    if ($RepeatPassword === $password) {
        $_SESSION['registration']["RepeatPassword"] = $RepeatPassword;
    } else {
        unset($_SESSION["registration"]['RepeatPassword']);
        $_SESSION['error']['RepeatPassword'] = '<p style="color: red;     margin-left: 15%; text-align: center; width:70%;margin-top:10px;"><i class="fas fa-times-circle"></i>&nbsp;The RepeatPassword does not match the Password!<p/>';
    }
}
if ($password === $RepeatPassword and empty($_SESSION['error'])) {
    // $option = [
    //     'cost' => 12
    // ];
    // $Password = password_hash($Password, PASSWORD_BCRYPT, $option);

    $data = [
        'Name' => $firstname,
        'Surname' => $lastname,
        'Phone' => $phone,
        'email' => $email,
        'Password' => $password,
        'Address' => $Address,
        'Gender'  => $gender
        // 'country' => $country,
        // 'region' => $region,
        // 'productName' => $_SESSION["productName"],
    ];
    // var_dump($data);
    // die;
    $isOk = create('users', $data);
    if ($isOk) {
        header("Location: ../pages/login.php");
        unset($_SESSION["registration"]);
        unset($_SESSION["error"]);
        die;
    }
} else {
    header("Location: ../pages/registration.php");
    // $_SESSION['error']['error'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> <p style="color: red;     margin-left: 15%;;display: inline-block">Something went a wrong. Please fill in the indicated boxes right</p>';
    die;
}
// if (isset($_POST["send"])) {
//     $mail = new PHPMailer(true);
//     $mail ->isSMTP();
//     $mail ->Host = 'smtp.gmail.com';
//     $mail ->SMTPAuth = true;
//     $mail->Username = "hovsepyantechno@gmail.com"; // gmail
//     $mail->Password = "oducfukjcmhjwtjf"; // gmail password
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;

//     $mail->setFrom('hovsepyantechno@gmail.com'); //gmail

//     $mail->addAddress($email);
//     $mail->isHTML(true);
//     $mail->Subject = 'HTechnologies';
//     $mail->Body = 'Thank for you.We will connect with you';
//     $mail->send();
// ////    header("Location: ../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION['registration']);
//     unset($_SESSION['error']);
//     echo
//     "
// <script>
//     document.location.href = '../pages/".$_SESSION["productName"].".php'
// </script>
// //    ";die;

// }


 











// dvsvssssssss
// <?php session_start();
// include("../config/config.php");
// include("../config/functions.php");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

// if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
//     $firstname = $_POST ['firstname'];
//     $_SESSION['registration']["firstname"] = $firstname;
//     unset($_SESSION['error']['firstname']);
// } else {
// //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["registration"]['firstname']);
//     $_SESSION['error']['firstname'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> Firstname is required ';
// }
// if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
//     $lastname = $_POST ['lastname'];
//     $_SESSION['registration']["lastname"] = $lastname;
//     unset($_SESSION['error']['lastname']);
// } else {
// //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["registration"]['lastname']);
//     $_SESSION['error']['lastname'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons"></i> Lastname is required ';
// }

// if (isset($_POST['email']) && !empty($_POST["email"])) {
//     $email  = $_POST ['email'];
//     $_SESSION['registration']["email"] = $email;
//     if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
//         header("location:../pages/".$_SESSION["productName"].".php#userData");
//         unset($_SESSION["registration"]["email"]);
//         $_SESSION['error']['email'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons"></i> Email is not valid';
//     } else {
//         unset($_SESSION['error']['email']);
//     }
// }
// if (isset($_POST['Address']) && !empty($_POST['Address'])) {
//     $country = $_POST ['Address'];
//     $_SESSION['registration']["Address"] = $country;
//     unset($_SESSION['error']['Address']);
// } else {
// //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["registration"]['Address']);
//     $_SESSION['error']['Address'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> Country is required ';
// }
// if (isset($_POST['password']) && !empty($_POST['password'])) {
//     $region = $_POST ['password'];
//     $_SESSION['registration']["password"] = $region;
//     unset($_SESSION['error']['password']);
// } else {
// //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["registration"]['password']);
//     $_SESSION['error']['password'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> Region is required ';
// }
// $regexPhone = "/^[+374]{4}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}(\s|-)[\d]{2}|((([+374]{4})(\s|-)(\d{2})(\s|-)(\d{3})(\s|-)(\d{3})){1})$|[+374]{4}(\s)[\d]{8}/";

// if (isset($_POST['phone']) && !empty($_POST['phone'])) {
//     if (preg_match($regexPhone,$_POST['phone'])){
//         $phone  = $_POST ['phone'];
//         unset($_SESSION['registration']["tel"]);
//         unset($_SESSION['error']['phone']);
//     } else {
//         header("location:../pages/".$_SESSION["productName"].".php#userData");
//         $_SESSION['registration']["tel"] = $_POST ['phone'];
//         $_SESSION['error']['phone'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;; display: inline-block;"></i> <p style="color: red;     margin-left: 15%;;display: inline-block;padding: 0">Please write correct ex.(+374 00 000 000)</p>';
//         die;
//     }
// }
// if (isset($_POST['gender']) && !empty($_POST['gender'])) {
//     $country = $_POST ['gender'];
//     $_SESSION['registration']["gender"] = $country;
//     unset($_SESSION['error']['gender']);
// } else {
// //    header("location:../pages/".$_SESSION["productName"].".php#userData");
//     unset($_SESSION["registration"]['gender']);
//     $_SESSION['error']['gender'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> Country is required ';
// }

// if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['country']) && !empty($_POST['country']) && isset($_POST['Address']) && !empty($_POST['Address']) && isset($_POST['gender']) && !empty($_POST['gender'])) {
//     $data = [
//         "firstname" => $firstname,
//         'lastname' =>$lastname,
//         'phone' => $phone,
//         'email' => $email,
//         "password" => $password,
//         "Address" =>$address,
//         "gender"  =>$gender
//         // 'country' => $country,
//         // 'region' => $region,
//         // 'productName' => $_SESSION["productName"],
//     ];
//     $isOk = create('users_table',$data);
//     if($isOk){
//         header("Location: ../index.php");
//         unset($_SESSION["registration"]);die;
//     }
// } else {
//     header("Location: ../pages/registration.php");
//     $_SESSION['error']['error'] = '<i class="fas fa-times-circle FalseIcon" id="FalseIcons" style="color: red;     margin-left: 15%;"></i> <p style="color: red;     margin-left: 15%;;display: inline-block">Something went a wrong. Please fill in the indicated boxes right</p>';
//     die;
// }
// // if (isset($_POST["send"])) {
// //     $mail = new PHPMailer(true);
// //     $mail ->isSMTP();
// //     $mail ->Host = 'smtp.gmail.com';
// //     $mail ->SMTPAuth = true;
// //     $mail->Username = "hovsepyantechno@gmail.com"; // gmail
// //     $mail->Password = "oducfukjcmhjwtjf"; // gmail password
// //     $mail->SMTPSecure = 'ssl';
// //     $mail->Port = 465;

// //     $mail->setFrom('hovsepyantechno@gmail.com'); //gmail

// //     $mail->addAddress($email);
// //     $mail->isHTML(true);
// //     $mail->Subject = 'HTechnologies';
// //     $mail->Body = 'Thank for you.We will connect with you';
// //     $mail->send();
// // ////    header("Location: ../pages/".$_SESSION["productName"].".php#userData");
// //     unset($_SESSION['registration']);
// //     unset($_SESSION['error']);
// //     echo
// //     "
// // <script>
// //     document.location.href = '../pages/".$_SESSION["productName"].".php'
// // </script>
// // //    ";die;

// // }
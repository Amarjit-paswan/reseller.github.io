<?php

include 'database.php';

$admin_Register = new Admin_Register();

if(isset($_POST['action']) && $_POST['action'] == 'admin_register'){
    $name = $_POST['admin_register_name'];
    $email = $_POST['admin_register_email'];
    $gender = $_POST['admin_register_gender'];
    $password = $_POST['admin_register_password'];

    $_SESSION['admin_name'] = $name;
    $_SESSION['admin_email'] = $email;
    $_SESSION['admin_gender'] = $gender;
    $_SESSION['admin_password'] = $password;
    

    $admin_Register->checkadmin_email($email);

}


if(isset($_POST['action']) && $_POST['action'] == 'admin_otpCheck'){
    $s_otp = $_SESSION['admin_email_otp'];
    $admin_otp = $_POST['admin_otp'];

    if($admin_otp == $s_otp){
        $admin_Register->admin_register($_SESSION['admin_name'],$_SESSION['admin_email'],$_SESSION['admin_gender'],$_SESSION['admin_password']);
    }else{
        echo "admin_otpfailed";
    }



    
}

if(isset($_POST['action']) && $_POST['action'] == 'admin_login'){
    $login_email = $_POST['admin_login_email'];
    $login_password = $_POST['admin_login_password'];

    $admin_Register->admin_login($login_email,$login_password);
}


?>
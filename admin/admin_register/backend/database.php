<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function otpsendMail($email){
    require 'php mail/Exception.php';
    require 'php mail/PHPMailer.php';
    require 'php mail/SMTP.php';

    $otp = rand(100000,999999);

    $_SESSION['admin_email_otp'] = $otp;

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send 
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'topglobetechnologies22@gmail.com';                     
    $mail->Password   = 'sqsp ygqy rouj fmiy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465; 

    $mail->setFrom('topglobetechnologies22@gmail.com', 'Reseller Register OTP');
    $mail->addAddress($email);  

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = 'This is Your OTP <b>'. $otp .'</b>';

    try{
        $mail->send();
    }catch(PDOException $e){
        echo "otpFailed";
    }

}


class Admin_Register{

    


    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function checkadmin_email($email_id){
        $check_email_sql = "SELECT * FROM admin_user WHERE admin_email = :email";
        $check_email_stmt = $this->database_connection->prepare($check_email_sql);
        $check_email_stmt->bindValue(':email', $email_id, PDO::PARAM_STR);

        if($check_email_stmt->execute()){
            $rowcunt = $check_email_stmt->rowCount();

            if($rowcunt > 0){
                echo "email exists";
            }else{
                otpsendMail($email_id);

            }
        }
    }

    public function admin_register($name,$email_id,$gender,$password){

      
                $add_admin_detail_sql = "INSERT INTO admin_user ( `admin_name`, `admin_email`, `admin_password`, `admin_gender`) VALUES (:admin_name, :admin_email, :admin_password, :admin_gender)";

                $add_admin_detail_stmt = $this->database_connection->prepare($add_admin_detail_sql);

                $add_admin_detail_stmt->bindValue(':admin_name', $name, PDO::PARAM_STR);
                $add_admin_detail_stmt->bindValue(':admin_email', $email_id, PDO::PARAM_STR);
                $add_admin_detail_stmt->bindValue(':admin_gender', $gender, PDO::PARAM_STR);
                $add_admin_detail_stmt->bindValue(':admin_password', $password, PDO::PARAM_STR);

                if($add_admin_detail_stmt->execute()){

                    echo "admin_register";
                }else{
                    return false;
                    die();
                }
       
    }

    
public function admin_login($email,$password){
    $admin_login_sql = "SELECT * FROM admin_user WHERE admin_email = :adminEmail AND admin_password = :adminPassword";

    $admin_login_stmt = $this->database_connection->prepare($admin_login_sql);

    $admin_login_stmt->bindValue(':adminEmail', $email, PDO::PARAM_STR);
    $admin_login_stmt->bindValue(':adminPassword', $password, PDO::PARAM_STR);

    if($admin_login_stmt->execute()){
        $admin_rowcount = $admin_login_stmt->rowCount();
        
        if($admin_rowcount > 0){
            echo "user_match";
        }else{
            echo "not match";
        }
    }else{
        return false;
        die();
    }

}

}



?>
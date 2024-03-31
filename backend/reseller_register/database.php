<?php 
// Check if session is already active
if (session_status() == PHP_SESSION_NONE) {
    // If no session is active, start the session
    session_start();
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function otpsendMail($email){
    require 'php mail/Exception.php';
    require 'php mail/PHPMailer.php';
    require 'php mail/SMTP.php';

    $otp = rand(100000,999999);

    $_SESSION['email_otp'] = $otp;

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



class Reseller_Register{

    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function checkEmail($reseller_email){
        $checkEmail_sql = "SELECT * FROM reseller_userdetails WHERE Ruser_email = :email";
        $checkEmail_stmt = $this->database_connection->prepare($checkEmail_sql);
        $checkEmail_stmt->bindValue(':email',$reseller_email,PDO::PARAM_STR);

        $checkEmail_stmt->execute();
        $rowCheck = $checkEmail_stmt->rowCount();

        if($rowCheck > 0){
            echo "emailExists";
        }else{
            // return false;
            otpsendMail($reseller_email);
            echo "not exists";
            die();
        }

    }

    public function insertResellerDetail($rs_name,$rs_email,$rs_password,$rs_gender){

        $insertReseller_sql = "INSERT INTO reseller_userdetails (Ruser_name, Ruser_email, Ruser_password, Ruser_gender) VALUES (:rs_name, :rs_email, :rs_password, :rs_gender)";
        $insertReseller_stmt = $this->database_connection->prepare($insertReseller_sql);
        $insertReseller_stmt->bindValue(':rs_name',$rs_name, PDO::PARAM_STR);  
        $insertReseller_stmt->bindValue(':rs_email',$rs_email, PDO::PARAM_STR);  
        $insertReseller_stmt->bindValue(':rs_password',$rs_password, PDO::PARAM_STR);  
        $insertReseller_stmt->bindValue(':rs_gender',$rs_gender, PDO::PARAM_STR);  


        if($insertReseller_stmt->execute()){
            echo "dataInsert";
        }else{
            echo "not insert";
            die();
        }

    }

    public function loginUser($email,$password){

        $loginuser_sql = "SELECT * FROM reseller_userdetails WHERE Ruser_email = :loginEmail AND 
        Ruser_password = :loginPassword" ;
        $loginuser_stmt = $this->database_connection->prepare($loginuser_sql);
        $loginuser_stmt->bindValue(':loginEmail', $email, PDO::PARAM_STR);
        $loginuser_stmt->bindValue(':loginPassword', $password, PDO::PARAM_STR);

        if($loginuser_stmt->execute()){

            
            $rowCount = $loginuser_stmt->rowCount();
            
            if($rowCount > 0){
                $fetch = $loginuser_stmt->fetch(PDO::FETCH_ASSOC);
                // $_SESSION['login_id'] = $fetch['Ruser_id'];
                $_SESSION['login_userEmail'] = $email;
                echo "login Success";
            }else{
                return false;
                die();
            }
        }
    }

    public function loginUserDetail(){
        $loginUseremail =   $_SESSION['login_userEmail'];
        $loginDetail_sql = "SELECT * FROM reseller_userdetails WHERE Ruser_email = :loginUseremail";
        $loginDetail_stmt = $this->database_connection->prepare($loginDetail_sql);
        $loginDetail_stmt->bindValue(':loginUseremail', $loginUseremail, PDO::PARAM_STR);

        if($loginDetail_stmt->execute()){
            $fetchDetail = $loginDetail_stmt->fetch(PDO::FETCH_ASSOC);
            return $fetchDetail;
        }else{
            return false;
            die();
        }
    }


    public function edit_product($prdouct_name,$product_price,$product_img,$product_quantity,$deliveryPrice){
        $edit_product_sql = "INSERT INTO edit_product (`ed_Productname`, `ed_ProductPrice`, `ed_productimg`, `ed_prdouctQnty`, `ed_delivery`) 
        VALUES (:name, :price, :img, :qnty, :deliPrice)";
        $edit_product_stmt = $this->database_connection->prepare($edit_product_sql);

        $edit_product_stmt->bindValue(':name',$prdouct_name,PDO::PARAM_STR);
        $edit_product_stmt->bindValue(':price',$product_price,PDO::PARAM_STR);
        $edit_product_stmt->bindValue(':img',$product_img,PDO::PARAM_STR);
        $edit_product_stmt->bindValue(':qnty',$product_quantity,PDO::PARAM_INT);
        $edit_product_stmt->bindValue(':deliPrice',$deliveryPrice,PDO::PARAM_INT);

        if($edit_product_stmt->execute()){
            echo "yes";
        }else{
            echo "no";
            die();
        }

    }

    public function buynowOrderDetail($productname){
        $buynowOrder_sql = "SELECT * FROM edit_product WHERE ed_Productname = :productname";
        $buynowOrder_stmt = $this->database_connection->prepare($buynowOrder_sql);
        $buynowOrder_stmt->bindValue(':productname', $productname, PDO::PARAM_STR);

        if($buynowOrder_stmt->execute()){
            $rowcount = $buynowOrder_stmt->rowCount();
            if($rowcount > 0){
                return $buynowOrder_stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

    }

    public function addOrderDetail($fname, $lname, $address, $apartment, $city, $state, $pincode, $contact, $product_name, $product_price,$orginalPrice, 
$product_totalPrice, $product_quantity,$product_size,$product_deliverprice,$product_img){
        $login_email = $_SESSION['login_userEmail'];
        $addOrder_sql = "INSERT INTO `reseller_orders`( `user_email`, `Firstname`, `lastname`, `Address`, `Apartment`, `city`, `state`, `pincode`,  `contact_num`) VALUES (:login_email, :fname, :lname, :address, :apartment, :city, :state, :pincode, :contact)";

        $addOrder_stmt = $this->database_connection->prepare($addOrder_sql);
        $addOrder_stmt->bindValue(':login_email', $login_email, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':apartment', $apartment, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':state', $state, PDO::PARAM_STR);
        $addOrder_stmt->bindValue(':pincode', $pincode, PDO::PARAM_INT);
        $addOrder_stmt->bindValue(':contact', $contact, PDO::PARAM_INT);

        if($addOrder_stmt->execute()){
            $lastInsertId = $this->database_connection->lastInsertId();
            $insertProduct_sql = "INSERT INTO order_detail (`order_id`,`product_name`, `quanty`, `product_price`, `orginalPrice`, `product_totalPrice`, `product_img`, `product_size`, `product_deliveryprice` ) VALUES (:order_id,:product_name, :product_quantity, :product_price, :orginal_price, :product_totalPrice, :product_img, :product_size, :product_delivery)";

            $insertProduct_stmt = $this->database_connection->prepare($insertProduct_sql);
            $insertProduct_stmt->bindValue(':order_id',$lastInsertId,PDO::PARAM_INT);
            $insertProduct_stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
            $insertProduct_stmt->bindValue(':product_quantity', $product_quantity, PDO::PARAM_INT);
            $insertProduct_stmt->bindValue(':product_price', $product_price, PDO::PARAM_INT);
            $insertProduct_stmt->bindValue(':orginal_price', $orginalPrice, PDO::PARAM_INT);
            $insertProduct_stmt->bindValue(':product_totalPrice', $product_totalPrice, PDO::PARAM_INT);
            $insertProduct_stmt->bindValue(':product_img', $product_img, PDO::PARAM_STR);
            $insertProduct_stmt->bindValue(':product_size', $product_size, PDO::PARAM_STR);
            $insertProduct_stmt->bindValue(':product_delivery', $product_deliverprice, PDO::PARAM_INT);

            if($insertProduct_stmt->execute()){
                echo "order add";
            }else{
                return false;
                die();
            }
        }else{
            return false;
            die();
        }



    }

    public function orders(){
        $login_user = $_SESSION['login_userEmail'];
        $orders_sql = "SELECT reseller_orders.*, order_detail.* 
        FROM reseller_orders 
        INNER JOIN order_detail  ON reseller_orders.order_id = order_detail.order_id 
        WHERE reseller_orders.user_email = :user_email";

            $statement = $this->database_connection->prepare($orders_sql);
            $statement->execute(['user_email' => $login_user]);
            $orders = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $orders;
    }



}




?>
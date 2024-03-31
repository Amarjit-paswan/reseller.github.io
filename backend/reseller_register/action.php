<?php 

include 'database.php';



$Reseller_ResigterObject = new Reseller_Register();

if(isset($_POST['action']) && $_POST['action'] == 'RegisterDetail'){

    $Reseller_name = $_POST['Rs_register_name'];
    $Reseller_gender = $_POST['Rs_register_gender'];
    $Reseller_email = $_POST['Rs_register_email'];
    $Reseller_password = $_POST['Rs_register_password'];
    $Reseller_Gender = $_POST['Rs_register_gender'];

    $_SESSION['Reseller_email']    = $Reseller_email;
    $_SESSION['Reseller_name']     = $Reseller_name;
    // $_SESSION['Reseller_gender']   = $Reseller_email;
    $_SESSION['Reseller_password'] = $Reseller_password;
    $_SESSION['Reseller_gender']   = $Reseller_Gender;

    $Reseller_ResigterObject->checkEmail($Reseller_email);
}

if(isset($_POST['action']) && $_POST['action'] == 'otpSubmit'){
    $emailOTP = $_SESSION['email_otp'];
    $reseller_otp = $_POST['RegisterOTP'];

    if($emailOTP == $reseller_otp){
        $Reseller_ResigterObject->insertResellerDetail($_SESSION['Reseller_name'],              
         $_SESSION['Reseller_email'], $_SESSION['Reseller_password'], $_SESSION['Reseller_gender'] );
    }else{
        echo "otpfailed";
    }

}

// if(isset($_POST['action']) && $_POST['action'] == 'editDetail'){
//     $img = $_POST['ed_productImg'];
//     $name = $_POST['ed_productName'];
//     $price = $_POST['ed_productPrice'];
//     $qunatiy = $_POST['ed_productQuantity'];
//     $delivery = $_POST['deliveryPrice'];
//     $size = $_POST['ed_productSize'];

//     $Reseller_ResigterObject->edit_product($name,$price,$img,$qunatiy,$delivery);
// }

if(isset($_POST['action']) && $_POST['action'] == 'loginForm'){
    $loginemail = $_POST['login_email'];
    $loginpassword = $_POST['login_password'];


    $Reseller_ResigterObject->loginUser($loginemail, $loginpassword);
}

if(isset($_POST['action']) && $_POST['action'] == 'addAddress'){
    $fname = $_POST['User_fname'];
    $lname = $_POST['User_lname'];
    $address = $_POST['User_address'];
    $apartment = $_POST['User_landmark'];
    $city = $_POST['User_city'];
    $state = $_POST['User_state'];
    $pincode = $_POST['User_zip'];
    $contact = $_POST['User_contact'];

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_size = $_POST['product_size'];
    $product_deliveryprice = $_POST['product_deliveryprice'];
    $product_img = $_POST['product_img'];
    $product_orginalPrice = $_POST['orginal_price'];
    $product_totalPrice = $_POST['product_totalPrice'];

    $Reseller_ResigterObject->addOrderDetail($fname,$lname,$address,$apartment,$city,$state,$pincode,$contact,$product_name,$product_price, $product_orginalPrice, $product_totalPrice, $product_quantity,$product_size,$product_deliveryprice,$product_img);



}

?>
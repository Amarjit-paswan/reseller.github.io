<?php  

include 'database.php';
$bank_detail_Object = new Bank_detail();

if(isset($_POST['action']) && $_POST['action'] == 'bank_detail'){
    $HolderName = $_POST['Bank_Holder_name'];
    $AccountNumber = $_POST['Bank_Account_Number'];
    $ifscNumber = $_POST['Bank_ifsc'];
    $bank_name = $_POST['Bank_name'];

    $bank_detail_Object->addBank_detail($HolderName,$AccountNumber,$ifscNumber,$bank_name);
}

if(isset($_POST['action']) && $_POST['action'] == 'ifsc_Code'){
    $bankIFSC_Code = $_POST['IFSC'];

    $bank_data = @file_get_contents('https://ifsc.razorpay.com/'.$bankIFSC_Code);
    $bank_data_arr = json_decode($bank_data,true);

    if($bank_data !== false){
        if(isset($bank_data_arr['BANK'])){
            echo $bank_data_arr['BANK'];
        }else{
            echo 'invalid ifsc';
        }
    }else{
        echo 'invalid ifsc';
    }
}

?>
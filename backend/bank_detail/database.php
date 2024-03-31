<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Bank_detail{

    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }


    public function addBank_detail($bholderName, $baccountNum, $bifsc, $bname){
        $login_email = $_SESSION['login_userEmail'];

        $addBank_detail_SQL = "INSERT INTO `bank_details`(`user_email`, `bank_holderName`, `bank_accountNum`, `bank_ifsc`, `bank_name`) VALUES (:loginUser, :holdername, :accountNum, :ifsc, :bankName)";

        $addBank_detail_STMT = $this->database_connection->prepare($addBank_detail_SQL);

        $addBank_detail_STMT->bindValue(':loginUser', $login_email, PDO::PARAM_STR);
        $addBank_detail_STMT->bindValue(':holdername', $bholderName, PDO::PARAM_STR);
        $addBank_detail_STMT->bindValue(':accountNum', $baccountNum, PDO::PARAM_INT);
        $addBank_detail_STMT->bindValue(':ifsc', $bifsc, PDO::PARAM_STR);
        $addBank_detail_STMT->bindValue(':bankName', $bname, PDO::PARAM_STR);

        if($addBank_detail_STMT->execute()){
            echo "bank_add";
        }else{
            return false;
            die();
        }

    }

    public function fetchBank_detail(){
        $login_email = $_SESSION['login_userEmail'];
        $fetchBank_sql = "SELECT * FROM `bank_details` WHERE user_email = :login_email";
        
        $fetchBank_stmt = $this->database_connection->prepare($fetchBank_sql);
        $fetchBank_stmt->bindValue(':login_email',$login_email,PDO::PARAM_STR);

        if($fetchBank_stmt->execute()){
            $rowCount = $fetchBank_stmt->rowCount();

            if($rowCount > 0){
                return $fetchBank_stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
    }

}

?>
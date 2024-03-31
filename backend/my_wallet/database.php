<?php  


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class withdrawn{

    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function fetch_walletDetail(){
        $login_user = $_SESSION['login_userEmail'];
        $fetch_walletDetail_sql = "SELECT reseller_orders.*, order_detail.*, reseller_userdetails.*, bank_details.*
        FROM reseller_orders 
        INNER JOIN order_detail 
        ON reseller_orders.order_id = order_detail.order_id 
        INNER JOIN reseller_userdetails ON reseller_userdetails.Ruser_email = reseller_orders.user_email
        LEFT JOIN bank_details ON  reseller_userdetails.Ruser_email = bank_details.user_email
        WHERE reseller_orders.user_email = :useremail";

        $fetch_walletDetail_stmt = $this->database_connection->prepare($fetch_walletDetail_sql);
        $fetch_walletDetail_stmt->bindValue(':useremail', $login_user, PDO::PARAM_STR);
        
        if($fetch_walletDetail_stmt->execute()){
            $rowcount = $fetch_walletDetail_stmt->rowCount();

            if($rowcount > 0){
                return $fetch_walletDetail_stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }else{
            return false;
            die();
        }

    }

    public function withdrawn_request($withdrawn_ammount){
        $login_user =  $_SESSION['login_userEmail'];
        $withdrawn_request_sql = "INSERT INTO `withdrawn_request`(`user_email`, `ammount_request`) VALUES (:email, :ammount_request)";

        $withdrawn_request_stmt = $this->database_connection->prepare($withdrawn_request_sql);
        $withdrawn_request_stmt->bindValue(':email', $login_user, PDO::PARAM_STR);
        $withdrawn_request_stmt->bindValue(':ammount_request', $withdrawn_ammount, PDO::PARAM_INT);

        if($withdrawn_request_stmt->execute()){
            echo "request sent";
        }else{
            return false;
            die();
        }
    }

    public function view_ownRequest(){
        $login_user =  $_SESSION['login_userEmail'];
        $view_ownRequest_sql = "SELECT withdrawn_request.*, bank_details.* FROM withdrawn_request INNER JOIN bank_details ON withdrawn_request.user_email = bank_details.user_email WHERE withdrawn_request.user_email = :user_email";

        $view_ownRequest_stmt = $this->database_connection->prepare($view_ownRequest_sql);
        $view_ownRequest_stmt->bindValue(':user_email', $login_user, PDO::PARAM_STR);

        if($view_ownRequest_stmt->execute()){
            $rowcount = $view_ownRequest_stmt->rowCount();
            if($rowcount > 0){
                return $view_ownRequest_stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }else{
            return false;
            die();
        }
    }

}




?>
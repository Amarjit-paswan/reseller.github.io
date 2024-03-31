<?php
session_start();
class my_order{
    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO ('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function loginviewOrder(){
        $login_user = $_SESSION['login_userEmail'];
        $viewOrder_sql = "SELECT reseller_orders.*, order_detail.*, reseller_userdetails.Ruser_name FROM reseller_orders INNER JOIN order_detail ON reseller_orders.order_id = order_detail.order_id INNER JOIN reseller_userdetails ON  reseller_userdetails.Ruser_email = reseller_orders.user_email WHERE reseller_userdetails.Ruser_email = :email";
    
        $viewOrder_stmt = $this->database_connection->prepare($viewOrder_sql);
        $viewOrder_stmt->bindValue(':email', $login_user, PDO::PARAM_STR);


        if($viewOrder_stmt->execute()){
           return $result = $viewOrder_stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'false';
            die();
        }
    }
}

?>
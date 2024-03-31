<?php  

class User_Dashboard{

    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function orders(){
        $login_user = $_SESSION['login_userEmail'];
        $orders_sql = "SELECT reseller_orders.*, order_detail.*
        FROM reseller_orders 
        INNER JOIN order_detail 
        ON reseller_orders.order_id = order_detail.order_id 
        WHERE reseller_orders.user_email = :user_email";

            $statement = $this->database_connection->prepare($orders_sql);
            $statement->execute(['user_email' => $login_user]);
            $orders = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $orders;
    }

   
    
 

}

?>
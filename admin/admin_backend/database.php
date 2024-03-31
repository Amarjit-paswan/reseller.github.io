<?php 

class Admin{

    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function productAdd($unique_id,$tittle,$descripation,$collection){
        $prodcut_addSQL = "INSERT INTO `reseller_allproduct`( `product_uniqueID`, `product_name`, `product_descripation`, `product_collection`) VALUES (:uniqueID,:tittle,:descripation,:collections)";

        $prodcut_add_stmt= $this->database_connection->prepare($prodcut_addSQL);

        $prodcut_add_stmt->bindValue(':uniqueID',$unique_id,PDO::PARAM_INT);
        $prodcut_add_stmt->bindValue(':tittle',$tittle,PDO::PARAM_STR);
        $prodcut_add_stmt->bindValue(':descripation',$descripation,PDO::PARAM_STR);
        $prodcut_add_stmt->bindValue(':collections',$collection,PDO::PARAM_STR);
        // $prodcut_add_stmt->bindValue(':image',$image,PDO::PARAM_STR);
   
        
        if($prodcut_add_stmt->execute()){
            return $this->database_connection->lastInsertId();
        }else{
            return false;
        }
    }

    public function addAttributes($img_id,$product_id,$sellPrice,$comparePrice,$quantity,$sizes){
        $product_attributeSQL = "INSERT INTO product_attributes (img_productID,product_id,sell_price,compare_price, quantity,size) VALUES(:img_productid, :product_id, :sell_price, :compare_price, :quantity, :size)";
        
        $product_attribute_stmt = $this->database_connection->prepare($product_attributeSQL);
        $product_attribute_stmt->bindValue(':img_productid', $img_id, PDO::PARAM_INT);
        $product_attribute_stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $product_attribute_stmt->bindValue(':sell_price', $sellPrice, PDO::PARAM_INT);
        $product_attribute_stmt->bindValue(':compare_price', $comparePrice, PDO::PARAM_INT);
        $product_attribute_stmt->bindValue(':quantity',$quantity,PDO::PARAM_INT);
        $product_attribute_stmt->bindValue(':size', $sizes, PDO::PARAM_INT);

        
            return $product_attribute_stmt->execute();
       
    }

    public function addProduct_of_Image($product_id,$vr_id,$image){
        $addProduct_img_sql = "INSERT INTO images_of_product (product_id,vr_id,img_product_path) VALUES (:productID, :vr_id, :imagePath)";
        $addProduct_img_stmt = $this->database_connection->prepare($addProduct_img_sql);
        $addProduct_img_stmt->bindValue(':productID',$product_id,PDO::PARAM_INT);
        $addProduct_img_stmt->bindValue(':vr_id',$vr_id,PDO::PARAM_INT);
        $addProduct_img_stmt->bindValue(':imagePath',$image,PDO::PARAM_STR);

    
        if($addProduct_img_stmt->execute()){
            return $this->database_connection->lastInsertId();
        }else{
            return false;
            die();
        }
     
    }

    public function variant_image($product_id, $vr_image){
        $variant_imageSQL = "INSERT INTO  `variants_image`(`vr_product_id`, `vr_product_image`) VALUES (:product_id, :vr_img)";
        $variant_imageSTMT = $this->database_connection->prepare($variant_imageSQL);
        $variant_imageSTMT->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $variant_imageSTMT->bindValue(':vr_img',$vr_image, PDO::PARAM_STR);

        if($variant_imageSTMT->execute()){
            return $this->database_connection->lastInsertId();
        }else{
            return false;
        }
    }

    public function uploadImage($file){
        $image_path = "uploads/";
        $target_file = $image_path. basename($file['name']);

        if(move_uploaded_file($file['tmp_name'],$target_file)){
            return $file['name'];
        }else{
            return false;
        }
    }

    public function fetchProductDetail(){
        $fetchProduct_Detail_sql = "SELECT reseller_allproduct.*, product_attributes.* , variants_image.*
        FROM reseller_allproduct
        INNER JOIN product_attributes ON reseller_allproduct.product_id = product_attributes.product_id INNER JOIN variants_image ON reseller_allproduct.product_id = variants_image.vr_product_id
                                GROUP BY reseller_allproduct.product_id";
        $fetchProduct_Detail_stmt = $this->database_connection->prepare($fetchProduct_Detail_sql);

        if($fetchProduct_Detail_stmt->execute()){
            $rowCount = $fetchProduct_Detail_stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rowCount;
        }else{
            return false;
            die();
        }
    }

    public function fetchAllUsers(){
        $fetchallUser_sql = "SELECT * FROM reseller_userdetails";
        $fetchallUser_stmt = $this->database_connection->prepare($fetchallUser_sql);
        
        if($fetchallUser_stmt->execute()){
            $rowcount = $fetchallUser_stmt->rowCount();

            if($rowcount > 0){
                return $fetchallUser_stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function selectProductEdit($imgid){
        $imgProductEdit_sql = "SELECT reseller_allproduct.*, variants_image.*, product_attributes.* FROM reseller_allproduct INNER JOIN variants_image ON variants_image.vr_product_id = reseller_allproduct.product_id INNER JOIN product_attributes ON product_attributes.img_productID = variants_image.vr_id WHERE reseller_allproduct.product_id = :selectid 
        ";

        $imgProductEdit_stmt = $this->database_connection->prepare($imgProductEdit_sql);
        $imgProductEdit_stmt->bindValue(':selectid', $imgid, PDO::PARAM_STR);
        
        if($imgProductEdit_stmt->execute()){
            $rowcount = $imgProductEdit_stmt->rowCount();
            
            if($rowcount > 0){
                return $imgProductEdit_stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
                die();
            }
        }else{
            return false;
            die();
        }
    }

    public function viewOrder(){
        $viewOrder_sql = "SELECT reseller_orders.*, order_detail.*, reseller_userdetails.Ruser_name FROM reseller_orders INNER JOIN order_detail ON reseller_orders.order_id = order_detail.order_id INNER JOIN reseller_userdetails ON  reseller_userdetails.Ruser_email = reseller_orders.user_email ";
    
        $viewOrder_stmt = $this->database_connection->prepare($viewOrder_sql);
    
        if($viewOrder_stmt->execute()){
           return $result = $viewOrder_stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'false';
            die();
        }
    }

    


//super admin allUsers view user Detail

public function viewUserDetail($useremail){
    $viewUserDetail_sql = "SELECT reseller_orders.*, order_detail.*, reseller_userdetails.*, bank_details.*
    FROM reseller_orders 
    INNER JOIN order_detail 
    ON reseller_orders.order_id = order_detail.order_id 
    INNER JOIN reseller_userdetails ON reseller_userdetails.Ruser_email = reseller_orders.user_email
    LEFT JOIN bank_details ON  reseller_userdetails.Ruser_email = bank_details.user_email
    WHERE reseller_orders.user_email = :useremail
";



    $viewOrder_stmt = $this->database_connection->prepare($viewUserDetail_sql);
    $viewOrder_stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);

    if($viewOrder_stmt->execute()){
        $rowCount = $viewOrder_stmt->rowCount();

        if($rowCount > 0){
            return $viewOrder_stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }else{
        return false;
        die();
    }
}

public function fetch_withdrawn_request(){
    $fetch_request_sql = "SELECT withdrawn_request.*, bank_details.* FROM withdrawn_request INNER JOIN bank_details ON withdrawn_request.user_email = bank_details.user_email";
    $fetch_request_stmt = $this->database_connection->prepare($fetch_request_sql);

    if($fetch_request_stmt->execute()){
        $rowcount = $fetch_request_stmt->rowCount();

        if($rowcount > 0){
            return $fetch_request_stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }else{
        return false;
        die();
    }
}

public function changeStatus($order_id, $status){
    $changeStatus_sql = "UPDATE order_detail SET product_status = :p_status WHERE order_id = :id";
    $changeStatus_stmt = $this->database_connection->prepare($changeStatus_sql);

    $changeStatus_stmt->bindValue(':p_status',$status,PDO::PARAM_STR);
    $changeStatus_stmt->bindValue(':id',$order_id,PDO::PARAM_INT);

    if($changeStatus_stmt->execute()){
        echo "status_update";
    }else{
        return false;
        die();
    }
}


// Edit Product in Admin code start
public function editProduct($image_file, $image_vr_id){

        $editProduct_sql = "UPDATE variants_image SET vr_product_image = :images WHERE vr_id = :vr_id";
        $editProduct_stmt = $this->database_connection->prepare($editProduct_sql);
        $editProduct_stmt->bindValue(':images', $image_file, PDO::PARAM_STR);
        $editProduct_stmt->bindValue(':vr_id', $image_vr_id, PDO::PARAM_INT);

    if($editProduct_stmt->execute()){
        echo "detail_update";
    }else{
        echo "image not update";
        die();
    }
}
// Edit Product in Admin code end

public function product_detail($tittle, $descripation, $collection, $product_id){
   $product_detail_sql = "UPDATE reseller_allproduct SET product_name = :tittle, product_descripation = :descripation , product_collection = :collections WHERE product_id = :p_id";

    $product_detail_stmt = $this->database_connection->prepare($product_detail_sql);
    $product_detail_stmt->bindValue(':tittle', $tittle, PDO::PARAM_STR);
    $product_detail_stmt->bindValue(':descripation', $descripation, PDO::PARAM_STR);
    $product_detail_stmt->bindValue(':collections', $collection, PDO::PARAM_STR);
    $product_detail_stmt->bindValue(':p_id', $product_id, PDO::PARAM_INT);

    if($product_detail_stmt->execute()){
        echo "detail_update";
    }else{
        echo "not detail update";
        die();
    }
}

public function deleteProduct($deleteid){
    $deleteProduct_sql = "
    DELETE reseller_allproduct, variants_image, product_attributes
    FROM reseller_allproduct
    LEFT JOIN variants_image ON variants_image.vr_product_id = reseller_allproduct.product_id
    LEFT JOIN product_attributes ON product_attributes.product_id = reseller_allproduct.product_id
    WHERE reseller_allproduct.product_id = :p_id
";

    $deleteProduct_stmt = $this->database_connection->prepare($deleteProduct_sql);
    $deleteProduct_stmt->bindValue(':p_id', $deleteid, PDO::PARAM_INT);

    if($deleteProduct_stmt->execute()){
        echo "deleteProduct";
    }else{
        return false;
        die();
    }
}

public function deleteUser($userid){
    $deleteUser_sql = "DELETE FROM reseller_userdetails WHERE Ruser_id = :user_id";
    $deleteProduct_stmt = $this->database_connection->prepare($deleteUser_sql);

    $deleteProduct_stmt->bindValue(':user_id', $userid, PDO::PARAM_INT);

    if($deleteProduct_stmt->execute()){
        echo 'deleteUser';
    }else{
        return false;
        die();
    }
}

public function deleteOrder($orderid){
    $deleteOrder_sql = "DELETE reseller_orders, order_detail FROM reseller_orders LEFT JOIN order_detail ON order_detail.order_id = reseller_orders.order_id WHERE reseller_orders.order_id = :order_id";
    
    $deleteOrder_stmt = $this->database_connection->prepare($deleteOrder_sql);
    $deleteOrder_stmt->bindValue(':order_id', $orderid, PDO::PARAM_INT);

    if($deleteOrder_stmt->execute()){
        echo 'deleteOrder';
    }else{
        return false;
        die();
    }
}

// Withdrawn status change code starts
public function withdrawn_status_chnge($w_id,$w_value){
    $withdrawn_status_sql = "UPDATE  withdrawn_request SET withdrawn_status = :status WHERE withdrawn_id = :id";
    $withdrawn_status_stmt = $this->database_connection->prepare($withdrawn_status_sql);

    $withdrawn_status_stmt->bindValue(':id', $w_id, PDO::PARAM_INT);
    $withdrawn_status_stmt->bindValue(':status', $w_value, PDO::PARAM_STR);

    if($withdrawn_status_stmt->execute()){
        echo "status_update";
    }else{
        return false;
        die();
    }
}
// Withdrawn status change code end


}
    

?>
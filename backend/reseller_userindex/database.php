<?php

class Reseller_UserIndex{
    private $database_connection = '';

    public function __construct()
    {   
        try{
            $this->database_connection = new PDO ('mysql:host=localhost;dbname=reseller_db','root','');
        }catch(PDOException $e){
            echo "not connect";
        }
    }

    public function viewProduct($collection_name){
        $viewProduct_sql = "SELECT reseller_allproduct.*, product_attributes.*, variants_image.* , GROUP_CONCAT(variants_image.vr_product_image) as images FROM reseller_allproduct INNER JOIN product_attributes ON reseller_allproduct.product_id = product_attributes.product_id INNER JOIN variants_image ON reseller_allproduct.product_id = variants_image.vr_product_id WHERE reseller_allproduct.product_collection = :collections GROUP BY reseller_allproduct.product_id ";
        $viewProduct_stmt = $this->database_connection->prepare($viewProduct_sql);
        $viewProduct_stmt->bindValue(':collections',$collection_name,PDO::PARAM_STR);

        if($viewProduct_stmt->execute()){
            $rowcount = $viewProduct_stmt->rowCount();

            if($rowcount > 0){
                $productDetail = $viewProduct_stmt->fetchAll(PDO::FETCH_ASSOC);
                return $productDetail;
            }else{
                return false;
                die();
            }
        }else{
            return false;
            die();
        }
    }

    // Function to download all images as a zip file
public function downloadImagesAsZip($imageUrls) {
    $zip = new ZipArchive();
    $zipFileName = 'product_images.zip';
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        // Loop through each image URL
        foreach ($imageUrls as $imageUrl) {
            // Get the image filename
            $imageFileName = basename($imageUrl);
            // Download the image and add it to the zip file
            $imageData = file_get_contents($imageUrl);
            $zip->addFromString($imageFileName, $imageData);
        }
        $zip->close();
        // Send the zip file to the browser for download
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . $zipFileName);
        header('Content-Length: ' . filesize($zipFileName));
        readfile($zipFileName);
        // Delete the zip file after sending
        unlink($zipFileName);
        exit;
    } else {
        echo "Failed to create ZIP file";
    }
}




    public function selectProduct($productID){
        $selectProduct_sql = "SELECT reseller_allproduct.*, product_attributes.*, variants_image.* FROM reseller_allproduct INNER JOIN product_attributes ON reseller_allproduct.product_id = product_attributes.product_id  INNER JOIN variants_image ON reseller_allproduct.product_id = variants_image.vr_product_id WHERE reseller_allproduct.product_id = :product_id";
        $selectProduct_stmt = $this->database_connection->prepare($selectProduct_sql);
        $selectProduct_stmt->bindValue(':product_id', $productID, PDO::PARAM_STR);

        if($selectProduct_stmt->execute()){
            $rowCountProduct = $selectProduct_stmt->rowCount();

            if($rowCountProduct > 0){
               return $selectProduct_Detail = $selectProduct_stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
                die();
            }
        }else{
            return false;

        }
    }

    public function viewVariantImage($productID){
        $viewProdcut_sql = "SELECT * FROM variants_image WHERE vr_product_id = :product_id ";
        $viewProdcut_stmt = $this->database_connection->prepare($viewProdcut_sql);
        $viewProdcut_stmt->bindValue(':product_id', $productID, PDO::PARAM_INT);

        if($viewProdcut_stmt->execute()){
            $rowcount = $viewProdcut_stmt->rowCount();

            if($rowcount > 0){
                return $viewProdcut_stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
                die();
            }
        }
    }

    public function images_of_product($prdouctid){
        $image_ofProduct_sql = "SELECT *  FROM images_of_product WHERE product_id = :product_id GROUP BY images_of_product.product_id ";
        $image_ofProduct_stmt = $this->database_connection->prepare($image_ofProduct_sql);
        $image_ofProduct_stmt->bindValue(':product_id',$prdouctid,PDO::PARAM_INT);
        
        if($image_ofProduct_stmt->execute()){
            $rowcount = $image_ofProduct_stmt->rowCount();

            if($rowcount > 0){
                return $image_ofProduct_stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
                die();
            }
        }else{
            return false;
            die();
        }
    }

    public function select_imageof_Product($vr_id){

            $selectimage_sql = "SELECT variants_image.*, product_attributes.*  FROM variants_image INNER JOIN product_attributes ON product_attributes.img_productID = variants_image.vr_id WHERE variants_image.vr_id = :vrid";

            $selectimage_stmt = $this->database_connection->prepare($selectimage_sql);

            $selectimage_stmt->bindValue(':vrid', $vr_id, PDO::PARAM_INT);

            if($selectimage_stmt->execute()){

                $rowcount = $selectimage_stmt->rowCount();

                if($rowcount > 0){
                    return $selectimage_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }else{
                return false;
                die();
            }
    }


    
}
?>
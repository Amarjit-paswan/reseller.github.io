<?php 
include 'database.php';
$adminObject = new Admin();

if(isset($_POST['action']) && $_POST['action'] == 'addProduct'){
    $uniqueId = rand(1,99999999);
    $product_title = $_POST['Product_tittle'];
    $product_description = $_POST['Product_descripation'];
    $product_sellPrice = $_POST['Product_sellPrice'];
    $product_comparePrice = $_POST['Product_comparePrice'];
    $product_quantity = $_POST['Product_quantity'];
    $product_size = $_POST['sizes'];
    $product_collection = $_POST['collection'];

    $product_id = $adminObject->productAdd($uniqueId, $product_title, $product_description,$product_collection);

    if($product_id) {
        if(isset($_FILES['variant_image'])){
            foreach($_FILES['variant_image']['tmp_name'] as $key => $tmp_name){
                $vr_fileName = $_FILES['variant_image']['name'][$key];
                $vr_fileTmp = $_FILES['variant_image']['tmp_name'][$key];
                $image_path = $adminObject->uploadImage(array('name'=>$vr_fileName, 'tmp_name'=>$vr_fileTmp));
                $imgid = $adminObject->variant_image($product_id, $image_path);

                if($imgid){
                    // Check if attributes are provided for this image
                    if(isset($product_quantity[$key]) && isset($product_sellPrice[$key]) && isset($product_comparePrice[$key]) && isset($product_size[$key])){
                        // Get attribute values for this image
                        $sellPrice = $product_sellPrice[$key];
                        $comparePrice = $product_comparePrice[$key];
                        $quantity = $product_quantity[$key];
                        $sizes = $product_size[$key];
                        // Add attributes for this image
                        $adminObject->addAttributes($imgid, $product_id, $sellPrice, $comparePrice, $quantity, $sizes);
                    }

                    // Handle product images
                    if(isset($_FILES['product_images'])) {
                        foreach($_FILES['product_images']['tmp_name'] as $key2 => $tmp_name2){
                            $file_name = $_FILES['product_images']['name'][$key2];
                            $file_tmp = $_FILES['product_images']['tmp_name'][$key2];
                            $image_path = $adminObject->uploadImage(array('name'=>$file_name, 'tmp_name'=>$file_tmp));
                            $adminObject->addProduct_of_Image($product_id, $imgid, $image_path);
                        }
                    }

                    // Handle additional images
                    if(isset($_FILES['product_imagess'])) {
                        foreach($_FILES['product_imagess']['tmp_name'] as $key3 => $tmp_name3){
                            $file_name = $_FILES['product_imagess']['name'][$key3];
                            $file_tmp = $_FILES['product_imagess'] ['tmp_name'][$key3];
                            $image_path = $adminObject->uploadImage(array('name'=>$file_name, 'tmp_name'=>$file_tmp));
                            $adminObject->addProduct_of_Image($product_id, $imgid, $image_path);
                        }
                    }
                }
            } 
        }
        echo "Product added successfully!";
    } else {
        echo "Failed to add product!";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'selectproduct'){
    $selectid = $_POST['slectid'];

    $selectProductDetail =  $adminObject->selectProductEdit($selectid);

    if($selectProductDetail){
        echo json_encode($selectProductDetail);
    }else{
        echo json_encode(null);
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'viewDetail'){
    $selected_useemail = $_POST['SelectBtn'];

    $selectUser =  $adminObject->viewUserDetail($selected_useemail);

    if($selectUser){
        echo json_encode($selectUser);
    }else{
        echo json_encode(null);
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'edit_product'){

    $image_path = $_FILES['vr_image']['name'];
    $image_tmpname = $_FILES['vr_image']['tmp_name'];
    $image_id = $_POST['main_vr_id'];

    $tittle = $_POST['P_tittle'];
    $descripation = $_POST['P_descripation'];
    $collection = $_POST['P_collection'];
    $product_id = $_POST['P_id'];

    $adminObject->product_detail($tittle, $descripation, $collection, $product_id);
    if(isset($image_path)){
        if(move_uploaded_file($image_tmpname, 'uploads/'.$image_path)){
            $adminObject->editProduct($image_path,$image_id);
    
        }else{
            echo "image not add";
        }
    
    }else{
        echo "no image select";
    }


}

if(isset($_POST['action']) && $_POST['action'] == 'Delete_product'){
    $delete_id = $_POST['Delete'];

    $adminObject->deleteProduct($delete_id);
}

if(isset($_POST['delete']) && isset($_POST['deleteid'])){
    foreach($_POST['deleteid'] as $deleteid){
    $adminObject->deleteProduct($deleteid);

    }
}

if(isset($_POST['action']) && $_POST['action'] == 'Delete_user'){
    $User_delete = $_POST['Deleteid'];
    $adminObject->deleteUser($User_delete);
}

if(isset($_POST['action']) && $_POST['action'] == 'order_delete'){
    $order_delete = $_POST['order_deleteid'];
    $adminObject->deleteOrder($order_delete);
}

// Withdrawn status change start
if(isset($_POST['action']) && $_POST['action'] == 'withdrawn_status'){
    $id = $_POST['w_id'];
    $value = $_POST['w_status'];

    $adminObject->withdrawn_status_chnge($id,$value);
}
// Withdrawn status change end

?>
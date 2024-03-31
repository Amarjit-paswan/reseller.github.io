<?php 


include '../backend/reseller_userindex/database.php';
$Reseller_UserIndexObject = new Reseller_UserIndex();
$productDetails = $Reseller_UserIndexObject->viewProduct($_GET['Collection']);


include '../backend/reseller_register/database.php';
$Reseller_ResigterObject = new Reseller_Register();
$detail = $Reseller_ResigterObject->loginUserDetail();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/homestyle.css?<?=time();?>">

<link rel="stylesheet" href="product_page_css/user_home.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time()?>">

</head>
<body>

    <div class="home-section d-flex">



            <ul class="sidebar d-none d-sm-block p-2 ">
                <div class="d-flex logo-tittle justify-content-around align-items-center text-white">
                    <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                    <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    <i class="fa-solid fa-xmark text-danger d-none fs-2"></i>
                </div>

                <li class="fw-bold fs-5"><a href="user_collection.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Proudct</a></li>
                <li class=""><a href="user_dashboard.php"><i class="fa-solid fa-gauge mx-2"></i>Dashboard</a></li>
                <li class=""><a href="my_wallet.php"><i class="fa-solid fa-address-card mx-2"></i>My Wallet</a></li>
                <li class=""><a href="bank_details.php"><i class="fa-solid fa-building-columns mx-2"></i>Bank Details</a></li>
                <li class=""><a href="view_order.php"><i class="fa-solid fa-gauge mx-2"></i>View Order</a></li>


            </ul>
            <div class="content-container   d-flex flex-column ">
                <div class="content ">
                    <?php 

                        require('../include_folder/navbar.php')

                    ?>

                    <div class="all-product-items container-fluid   py-2 my-2">
                        <div class=" product-items   p-2">
                            
                                <?php
                                    if($productDetails){
                                    foreach($productDetails as $product){

                                ?>
                                                                <!-- Modal -->
                                <div class="modal fade" id="selectProductDetail_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column">
                                        <img src="" alt="" srcset="">
                                        <!-- <h2>Product Details</h4> -->
                                        <p class="m-0 py-2 fs-5 fw-bold">Collar t-shirt</p>
                                        <div class=" d-flex flex-column">
                                            <label for="" class="form-label ">Add Your Price</label>
                                            <div class="price-btn d-flex gap-1 justify-content-center align-items-center">
                                                <button class="btn btn-secondary minus">-</button>
                                                <input type="number" name="" class="modalselectprice adjust" value="" min = "" >
                                                <button class="btn btn-primary add">+</button>

                                            </div>
                                        </div>
                                        <ul>
                                            <li class="descripaton"></li>
                                        

                                        </ul>
                                    </div>
                                    <div class="modal-footer p-0 d-grid ">
                                        <button type="button" class="btn btn-primary sendProductDetail_btn">Send Details</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

<!-- Modal End --------------- -->
                                <div class="card  p-2 pb-1 bg-white "   data-aos="zoom-in" data- 
                                aos-offset="300" data-productName = "<?php echo $product['product_name']; ?>">
                                    <div class="card-image" data-productUniquerid = <?php echo $product['product_id']; ?>>
                                        <img src="../admin/admin_backend/uploads/<?php echo $product['vr_product_image']; ?>" class="card-img-top" alt="...">
                                        <img src="" alt="" srcset="">
                                    </div>
                
                                    <div class="card-body">
                                        <h5 class="card-title text-center" ><?php echo $product['product_name']; ?></h5>
                                        <div class="star d-flex justify-content-center align-items-center my-2">
                                            <i class="fa-solid fa-star text-success"></i>
                                            <i class="fa-solid fa-star text-success"></i>
                                            <i class="fa-solid fa-star text-success"></i>
                                            <i class="fa-solid fa-star text-success"></i>
                                            <i class="fa-regular fa-star-half-stroke text-success"></i>
                                        </div>
                                        <div class="price-tag d-flex justify-content-center align-items-center">
                                            <h3 class="me-2">₹<?php echo $product['sell_price']; ?></h3>
                                            <small class="text-decoration-line-through text-secondary ">₹<?php echo $product['compare_price']; ?></small>
                                            <div class="discount  bg-success mx-2">
                                                <p class="m-0 ">10%Off</p>
                                            </div>
                                        </div>
                    
                                        <div class=" ">
                    
                                            <div class="file-transfer   gap-2">
                                                <p class="m-0 text-secondary w-100 p-1 text-center">Share Product</p>
                                                <div class="social-links d-flex justify-content-center align-items-center  gap-3 " >
                                                <i class="fa-brands fa-square-whatsapp fs-2 text-success"  
                                                data-productname = "<?php echo $product['product_name']; ?>"
                                                 data-productprice = "<?php echo $product['sell_price'];?>" 
                                                 data-productimg = "<?php echo $product['vr_product_image'];?>"
                                                 data-descripation = "<?php echo $product['product_descripation']; ?>">
                                                </i>
                                                <i class="fa-brands fa-square-facebook text-primary fs-2"></i>
                                                <!-- <a href="../admin/admin_backend/uploads/<?php echo $product['vr_product_image']; ?>" class="text-dark download-all-images" data-images="<?php echo $product['images']; ?>"> 
    <i class="fa-solid fa-download fs-2"></i>
</a> -->
<a href="../admin/admin_backend/uploads/<?php echo $product['vr_product_image']; ?>" download > 
<i class="fa-solid fa-download text-dark fs-2 download_image" ></i>
</a>


                                                </div>

 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        <?php 
                        } 
                            }else{
                                echo "<div class = 'text-center fs-1 fw-bold w-100 text-primary'>No Products Avaible</div>";
                            }
                        
                        ?>
                        </div>

                    </div>
                </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="../homepage javascript/reseller_userindex.js?<?=time()?>"></script>
    <script src="product_page_js/sidebar.js?<?=time();?>"></script>
</body>
</html>
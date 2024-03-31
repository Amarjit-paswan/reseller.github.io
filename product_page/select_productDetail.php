<?php
    include '../backend/reseller_userindex/database.php';
    $Reseller_UserIndexObject = new Reseller_UserIndex();
    $productDetails = $Reseller_UserIndexObject->selectProduct($_GET['productID']);
    $image_of_product = $Reseller_UserIndexObject->images_of_product($_GET['productID']);
    $variants_images = $Reseller_UserIndexObject->viewVariantImage($_GET['productID']);


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

<link rel="stylesheet" href="product_page_css/user_home.css?<?=time();?>">
<link rel="stylesheet" href="product_page_css/select_product.css?<?= time(); ?>">
<link rel="stylesheet" href="../Responsive_css/select_productDetail.css?<?=time()?>">

</head>
<body>
    <div class="home-section d-flex">



            <ul class="sidebar d-none d-sm-block p-2 ">
                <div class="d-flex logo-tittle justify-content-around align-items-center text-white">
                    <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                    <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    <i class="fa-solid fa-xmark text-danger d-none fs-2"></i>
                </div>

                <li class=""><a href="user_collection.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Proudct</a></li>
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

    <div class="select-productDetail d-flex justify-content-around align-items-start my-3">
        <div class="image-container ">
                                    <div class="image-gallery d-flex justify-content-around ">
                                        <!-- <div class="image-type d-flex flex-column">
                                            <?php  
                                            if (is_array($image_of_product) && count($image_of_product) > 0) {
                                                foreach($image_of_product as $imgPorduct){
                                            
                                            ?>
                                            <div class="image-typeBox">
                                                <img src="../admin/admin_backend/uploads/<?php echo $imgPorduct['img_product_path']; ?>" alt="" srcset="">
                                            </div>
                                            
                                           <?php  }} ?>
                                        </div> -->
                                        <div class="select_product-image   d-flex flex-column  align-items-center " >
        
                                            <img src="../admin/admin_backend/uploads/<?php echo $productDetails['vr_product_image']; ?>" alt="" srcset="" class="shadow container_selectImg" data-imgID = <?php echo $productDetails['product_id']; ?>>
        
                                            <div class="differnt-variants d-flex ">
                                                    
                                               <?php 
                                               
                                                  foreach($variants_images as $variant){

                                                    
                                               ?>
                                                <div class="variants-box border " data-vrid = <?php echo $variant['vr_id'];  ?> >
                                                    <img src="../admin/admin_backend/uploads/<?php echo $variant['vr_product_image'];   ?>" alt="" srcset="">
                                                </div>
        
                                                <?php } ?>
                                            </div>
        

                                        </div>
                                        
                                    </div>

                                    <div class="d-none d-lg-block">
                                        <div class="action-btn d-flex  justify-content-between align-lg-items-center ">
                                            <a href="" class="btn btn-danger addcart abtn fs-5"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a>
                                            <a href="" class="btn btn-success buynow abtn fs-5" data-bs-toggle="modal" data-bs-target="#buynow_modal"><i class="fa-solid fa-bolt" ></i> Buy Now</a>

                                        </div>

                                        <div class="d-lg-grid mt-2">
                                            <button class="btn btn-secondary btn-lg"  data-bs-toggle="modal" data-bs-target="#DownloadImageModal">Download Image</button>

                                        </div>
                                    </div>


                <!-- Buynow Modal --------------------------------------->
              <div class="modal fade " id="buynow_modal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content border-0">
                    <div class="modal-header border-0 bg-primary text-white">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">TeeBiz</h1>
                      <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-2 ">
                      <h4>Prodouct Details</h4>
                      <div class="product-box d-flex gap-3 border p-2 shadow rounded">
                        <img src="" alt="" srcset="" class="select_productImg ed_productImg">
                        <div class="product-orginalPrice d-flex flex-column justify-content-around">
                            <p class="m-0 "><b>Name: </b><span class="ed_productname"><?php echo $productDetails['product_name']; ?></span></p>
                            <p class="m-0 "><b>Price: </b>₹<span class="original-price ed_orginalPrice"><?php echo $productDetails['sell_price']; ?></span></p>
                            <p class="m-0 "><b>Quantity: </b><span class="qnty_no ed_productquantity">1</span></p>
                            <p class="m-0 "><b>Size: </b><span class="product_size ed_productsize"></span></p>
                        </div>
                      </div>

                      <div class="reseller-orderBtn p-2 mt-4 mb-2  d-flex justify-content-between align-items-center ">
                        <div class="confirm-text">
                            <p class="m-0"><b> Reselling the Order?</b></p>
                            <p class="m-0">You can add own Price</p>
                        </div>
                        <div class="confirm-box d-flex gap-2 ">
                            <button class="btn bg-green no-resell">No</button>
                            <button class="btn btn-light border yes-resell">Yes</button>
                        </div>
                      </div>

                      <div class="add-margin d-none p-2">
                        <div class="cash-collect d-flex justify-content-between align-items-center">
                            <div class="cash-collect-item">
                                <p class="m-0 "><b>Cash to Collect From Customer</b></p>
                                <p class="m-0">(Including Your Margin)</p>
                            </div>

                            <div class="add-price d-flex gap-2">
                                <p class="m-0 fs-2 ">₹</p>
                                <input type="number" name="" id="" class="no-spinner price-edit fs-2 text-center" value="" class="">
                            </div>
                        </div>

                        <div class="margin-earn my-2 fw-bold text-success d-flex justify-content-between align-items-center">
                            <p class="m-0 fs-5">Margin You Earn</p>
                            <p class="m-0 fs-5 profit-price">0</p>
                        </div>
                      </div>

                      <div class="price-details p-2 ">
                        <p class="m-0 fs-5 fw-bold">Price Details</p>
                        <div class="price-summary">
                            <!-- <div class="summary-box my-2 d-flex justify-content-between align-items-center">
                                <p class="m-0">Product Price</p>
                                <p class="m-0  pr_price">₹<span class="product_price1"><?php echo $productDetails['product_price'];  ?></span>/-</p>
                            </div> -->

                            <div class="summary-box my-2 d-flex justify-content-between align-items-center">
                                <p class="m-0">Quantity</p>
                                <p class="m-0 fw-bold pr_qunatity">(500 x 1) = ₹500/-</p>
                            </div>

                            <div class="summary-box my-2 d-flex justify-content-between align-items-center">
                                <p class="m-0">Delivery Fee</p>
                                <p class="m-0 fw-bold ">₹<span class="delivery-fee">200</span>/-</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                      <div class="total-price">
                        <p class="m-0 fs-5 fw-bold totalPrice ed_totalPrice"></p>
                        <p class="m-0 fs-4 fw-bold text-primary">Total Price</p>
                      </div>
                      <button type="button" class="btn bg-green btn-lg continue-btn">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
                <!-- Buynow Modal -------------------------++-------------->

                <!-- Download Image Modal ---------------------->
                    <div class="modal fade" id="DownloadImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Download Image</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="dwnld_image-container d-flex gap-2 flex-column align-items-center">
                                        
                                        <?php 
                                            foreach($variants_images as $d_image){
                                        ?>
                                        <div class="form-check d-flex justify-content-around w-100  align-items-center gap-3">
                                            <input class="form-check-input download_checkbox" type="checkbox" value="<?php echo $d_image['vr_product_image']; ?>" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <img src="../admin/admin_backend/uploads/<?php echo $d_image['vr_product_image']; ?>" alt="" srcset="">
                                            </label>
                                        </div>  
                                        
                                        <?php } ?>

                                    
                                 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn bg-green" id="downlaodimage_btn">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Download Image Modal ---------------------->


        </div>



                                <div class="product-descripation shadow rounded p-3 bg-white">
                                    <div class="desc-tittle">
                                        <div class="heading d-flex justify-content-between align-items-center">
                                            <h2 class="text-primary m-0"><?php echo $productDetails['product_name']; ?></h2>
                                            <div class="share-btn d-flex  flex-column">
                                                <i class="fa-solid fa-square-share-nodes fs-1 "></i><p class="m-0">Share</p>

                                            </div>
                                        </div>

                                        <div class="product-rating text-success mb-lg-3">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>

                                        <div class="select-productPrice d-flex gap-2 align-items-center">
                                            <h2 class="fs-1 vr_sellPrice">₹<?php echo $productDetails['sell_price']; ?></h2>
                                            <small class="text-secondary fs-5 text-decoration-line-through vr_comparePrice">₹<?php echo $productDetails['compare_price']; ?></small>
                                            <div class="discount w-15 bg-success">
                                                <p class="m-0 discount_off"><?php  
                                      $compare_price = $productDetails['compare_price'];
                                      $original_price = $productDetails['sell_price'];
                              
                                      $discount_percentage = (($compare_price - $original_price) / $compare_price) * 100;
                                      $discount = "₹" . number_format($discount_percentage, 0) . "% OFF";
                              
                                      echo $discount;
                                                ?></p>
                                            </div>
                                        </div>

                                        <div class="product-quantity my-lg-3 my-1">
                                            <button type="button" class="minus"> - </button>
<input type="number"   class="no-spinner selectproductqnty" value="1">
                                            <button type="button" class="plus"> + </button>
                                        </div>

                                        <div class="size-collection">
                                            <h4>Size</h4>

                                            <div class="size-btn">
                                                <button class="s_slt">M</button>
                                                <button>L</button>
                                                <button>XL</button>

                                            </div>
                                        </div>
                                        <div class="d-lg-none d-block action">
                                            <div class="action-btn d-flex  justify-content-between align-items-center ">
                                                <a href="" class="btn btn-danger addcart abtn fs-5"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a>
                                                <a href="" class="btn btn-success buynow abtn fs-5" data-bs-toggle="modal" data-bs-target="#buynow_modal"><i class="fa-solid fa-bolt" ></i> Buy Now</a>

                                            </div>

                                            <div class="d-grid mt-2 ">
                                                <button class="btn btn-secondary btn-lg-lg d_btn"  data-bs-toggle="modal" data-bs-target="#DownloadImageModal">Download Image</button>

                                            </div>
                                        </div>

                                        <div class="product-detail my-3">
                                            <h4>Product Details</h4>
                                            <div class="detail d-flex flex-column ms-3 gap-1">
                                                <div class="detail-box d-flex gap-2 ">
                                                    <b>Name:</b>
                                                    <p class="m-0">Product T-Shirt</p>
                                                </div>

                                                <div class="detail-box d-flex gap-2">
                                                    <b>Name:</b>
                                                    <p class="m-0">Product T-Shirt</p>
                                                </div>

                                                <div class="detail-box d-flex gap-2">
                                                    <b>Name:</b>
                                                    <p class="m-0">Product T-Shirt</p>
                                                </div>

                                                <div class="detail-box d-flex gap-2">
                                                    <b>Name:</b>
                                                    <p class="m-0">Product T-Shirt</p>
                                                </div>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn bg-green" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button> -->
              

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="product_page_js/select_product.js?<?=time();?>"></script>
<script src="product_page_js/sidebar.js?<?=time();?>"></script>

</body>
</html>
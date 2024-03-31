<?php 
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
<link rel="stylesheet" href="../Responsive_css/sidebar.css?<?=time()?>">
<link rel="stylesheet" href="product_page_css/user_collection.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time()?>">
</head>
<body>

    <div class="home-section d-flex">



            <ul class="sidebar d-none d-sm-block p-2 ">
                <div class="sidebar-box">
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
                </div>
            </ul>
            <div class="content-container   d-flex flex-column ">
                <div class="content ">

                    <?php require('../include_folder/navbar.php') ?>




                    <div class="collection-container container-fluid vh-100 py-2 my-2">

                        <div class="collection-tittle mb-2 w-100 text-center ">
                            <h1 class="py-2 ">All Collection</h1>
                        </div>
                        <div class="collection-content p-3">

                            <div class="collection-items border bg-white p-3 shadow d-flex justify-content-center align-items-center flex-column">
                                <div class="collection-img">
                                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
                                </div>

                                <div class="collection-name">
                                    <h1 class="my-3">Graphic</h1>
                                </div>
                            </div>

                            <div class="collection-items border bg-white p-3 shadow d-flex justify-content-center align-items-center flex-column">
                                <div class="collection-img">
                                    <img src="https://images.unsplash.com/photo-1562157873-818bc0726f68?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
                                </div>

                                <div class="collection-name">
                                    <h1 class="my-3">Combo</h1>
                                </div>
                            </div>

                            <div class="collection-items border bg-white p-3 shadow d-flex justify-content-center align-items-center flex-column">
                                <div class="collection-img">
                                    <img src="https://images.unsplash.com/photo-1698684420707-33f4433f8bd8?q=80&w=1369&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
                                </div>

                                <div class="collection-name">
                                    <h1 class="my-3">Oversize</h1>
                                </div>
                            </div>

                          
                        </div>

                    </div>
                </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="product_page_js/product_collection.js?<?=time();?>"></script>
    <script src="product_page_js/sidebar.js?<?=time();?>"></script>
</body>
</html>
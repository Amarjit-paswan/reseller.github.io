<?php 

include '../backend/view_order/database.php';
$Reseller_ResigterObject = new my_order();
$order_detail = $Reseller_ResigterObject->loginviewOrder();

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
<link rel="stylesheet" href="../product_page/product_page_css/user_home.css?<?=time();?>">
<link rel="stylesheet" href="../product_page_css/buynow_detail.css?<?=time();?>">
<link rel="stylesheet" href="../css/super_admin.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/view_order.css?<?time();?>">

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
                <li class=""><a href="bank_details.php"><i class="fa-solid fa-building-columns mx-2"></i>Bank Details</a>
                <li class="fw-bold fs-5 "><a href="view_order.php"><i class="fa-solid fa-gauge mx-2"></i>View Order</a></li>

               

        </ul>

        <div class="content-container   d-flex flex-column ">
                <div class="content ">
                <?php 

                require('../include_folder/navbar.php')

                ?>

        <div class="container-fluid p-3 pb-5 ">

            <!-- Add Product Modal start  -->
      

               
            <!-- Add Product Modal end  -->
            <div class="heading-tittle d-flex justify-content-between align-items-center mt-3">
                <h3>All Order</h3>
            </div>

            <div class="product-details-container bg-white my-4 p-3 rounded shadow">
                <div class="detail-box d-flex justify-content-between align-items-center">

                    <div class="box-item d-flex gap-2">
                        <button class="btn btn-light slt_box">All</button>
                        <button class="btn btn-light">Pending</button>
                        <button class="btn btn-light">Complete</button>
                        <input type="button" class="btn btn-danger select_deletebtn d-none" value="Delete" name="delete"></input>

                    </div>

                    <div class="product-search">
                        <input type="text" name="" id="" class="product_search_field" placeholder="Search Product">
                    </div>
                </div>

                <div class="product-details my-3">
                    <div class="table-responsive">
                        <div class="tbody-container ">
                            <table class="table table-lg align-middle text-center">
                                <thead class="thead ">
                                    <tr>
                                    <th></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Sell Price</th>
                                    <th scope="col">Original Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Status</th>
                                    

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php   

                                        foreach($order_detail as $view_order ){

                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $view_order['product_img']; ?> "></td>
                                        <td><?php echo $view_order['product_name']; ?></td>
                                        <td><?php echo $view_order['product_price']; ?></td>
                                        <td><?php echo $view_order['orginalPrice']; ?></td>
                                        <td><?php echo $view_order['quanty']; ?></td>
                                        <td><?php echo $view_order['product_totalPrice']; ?></td>
                                        <td><?php echo date('d-m-Y ', strtotime( $view_order['order_date'])); ?></td>

                                        <td><?php echo $view_order['product_status']; ?></td>
                                

                                    </tr>
                                    <?php  } ?>
                                </tbody>
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php include '../include_folder/footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="admin_javascript/admin.js?<?=time()?>"></script>
<script src="product_page_js/sidebar.js?<?=time();?>"></script>

<script>
    $(document).ready(function() {
        adjustScrollbar();
        $(window).on('resize', adjustScrollbar);

        function adjustScrollbar() {
            var containerHeight = $('.tbody-container').height();
            var tableHeight = $('.tbody-container table').height();

            if (tableHeight > containerHeight) {
                $('.tbody-container').css('overflow-y', 'auto');
            } else {
                $('.tbody-container').css('overflow-y', 'hidden');
            }
        }
    });
</script>
</body>
</html>
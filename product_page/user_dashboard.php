<?php 

include '../backend/reseller_register/database.php';

$Reseller_ResigterObject = new Reseller_Register();

$order = $Reseller_ResigterObject->orders();
$totalorder = count($order);


$totalSales = 0;
$totalProfit = 0;
$pending_profit = 0;
foreach($order as $orders){
    

    $totalSales += $orders['product_totalPrice'];

    if($orders['product_status'] == 'Completed'){


        $totalProfit += ($orders['product_price'] * $orders['quanty'] ) - ($orders['orginalPrice'] * $orders['quanty'] ) ;
        // $totalProfit += 10;
    }

    if($orders['product_status'] == 'Pending'){
        $pending_profit += ($orders['product_price'] * $orders['quanty'] ) - ($orders['orginalPrice'] * $orders['quanty'] ) ;
    }


}


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
<link rel="stylesheet" href="product_page_css/select_product.css">
<link rel="stylesheet" href="product_page_css/dashboard.css?<?=time();?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css">
<link rel="stylesheet" href="../Responsive_css/dashboard.css">

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
                <li class="fw-bold fs-5"><a href="user_dashboard.php"><i class="fa-solid fa-gauge mx-2"></i>Dashboard</a></li>
                <li class=""><a href="my_wallet.php"><i class="fa-solid fa-address-card mx-2"></i>My Wallet</a></li>
                <li class=""><a href="bank_details.php"><i class="fa-solid fa-building-columns mx-2"></i>Bank Details</a></li>
                <li class=""><a href="view_order.php"><i class="fa-solid fa-gauge mx-2"></i>View Order</a></li>

            </ul>

            <div class="content-container   d-flex flex-column ">
                <div class="content ">
                <?php 

                require('../include_folder/navbar.php')

                ?>

                    <div class="dashboard-container p-3">

                        <div class="dashboard-tittle py-3">
                            <h3 class="fw-normal">Dashboard</h3>
                        </div>

                        <div class="dashboard_productDetail">

                            <div class="product_detail  shadow  total-order d-flex justify-content-between align-items-center">
                                <div class="service_tittle  px-2">
                                    <p class="m-0 fs-2 fw-bold">Total Orders</p>
                                    <h4 class="text-white fs-2"><?php echo $totalorder; ?></h4>
                                </div>
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-bag-shopping fs-2 "></i>
                                </div>

                            </div>
                            <div class="product_detail shadow  total-sales d-flex justify-content-between align-items-center">
                                <div class="service_tittle  px-2">
                                    <p class="m-0 fs-2 fw-bold">Total Sales</p>
                                    <h4 class="text-white fs-2">₹<?php echo $totalSales; ?>/-</h4>
                                </div>
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-money-bill-trend-up fs-2"></i>
                                </div>

                            </div>

                            <div class="product_detail  shadow pending-profit bg-secondary d-flex justify-content-between align-items-center">
                                <div class="service_tittle  px-2">
                                    <p class="m-0 fs-3 fw-bold">Pending Profit</p>
                                    <h4 class="text-white fs-2">₹<?php
echo $pending_profit; ?>/-</h4>
                                </div>
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-indian-rupee-sign fs-2"></i>
                                </div>

                            </div>

                            <div class="product_detail  shadow total-profit d-flex justify-content-between align-items-center">
                                <div class="service_tittle  px-2">
                                    <p class="m-0 fs-2 fw-bold">Total Profit</p>
                                    <h4 class="text-white fs-2">₹<?php
echo $totalProfit; ?>/-</h4>
                                </div>
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-indian-rupee-sign fs-2"></i>
                                </div>

                            </div>

                            
                        </div>
                        <div class="sales-chart my-4 mb-2 p-3 row d-flex justify-content-around align-items-center">
                            <div class="column-chart col-lg-7 col-md-7 col-12  p-3 rounded shadow bg-white">
                               
                                <div id="columnchart_material" class="h-100 w-100"  ></div>
                            </div>

                            <div class="col-12 col-lg-4 col-md-4 border top-selling-products p-0 bg-white  rounded shadow">
                                <div class="top-selling-tittle  p-3">
                                    <h4>Top Selling Products</h4>
                                </div>

                                <div class="top-productsBox p-3  gap-3   d-flex justify-content-around align-items-center">
                                    <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                    <div class="product-descripation">
                                        <h4 class="m-0 text-primary">T-Shirt</h4>
                                        <p class="m-0">Cotton</p>
                                        <p class="m-0">Seleve</p>
                                    </div>
                                    <div class="price fs-3 text-success fw-bold">
                                        ₹456/-
                                    </div>
                                </div>

                                
                            </div>

                        </div>
                        <div class="coustmer-detail-container row p-3  ">
                            <div class="coustmer-detailBox col-12 p-1  rounded shadow bg-white">
                                <div class="tittle p-3 pb-1">
                                    <h4>Purchase History</h4>
                                </div>

                                <div class="coustmer-status">
                                    <table class="table p-4 align-middle">
                                        <thead class="">
                                          <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Coustmer</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($order as $orderss){

                                            
                                            ?>
                                          <tr>
                                            <td>
                                                <div class="product-name  d-flex gap-3 justify-content-center align-items-center py-2">
                                                    <img src="<?php echo  $orderss['product_img']; ?>" alt="">
                                                    <div class="d-flex flex-column gap-1 justify-content-start align-items-start">
                                                        <h5 class="m-0 text-primary"><?php echo  $orderss['product_name']; ?></h5>
                                                        <p class="m-0 text-secondary delivery_status" style="font-size: 12px;">Cash On Delivery</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class = "fs-5 fw-200"><?php echo  $orderss['Firstname']. ' '. $orderss['lastname']; ?></td>
                                            <td class = "fs-5 fw-bold">₹<?php echo $orderss['product_totalPrice'];  ?>/-</td>
                                            <td>
                                                <a href="" class="btn  product_status"><?php echo $orderss['product_status']; ?></a>
                                            </td>
                                          </tr>
                                            <?php  } ?>
                                          <!-- <tr>
                                            <td>
                                                <div class="product-name  d-flex gap-3 justify-content-center align-items-center py-2">
                                                    <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                    <div class="d-flex flex-column gap-1 justify-content-start align-items-start">
                                                        <h5 class="m-0 text-primary">T-Shirt</h5>
                                                        <p class="m-0 text-secondary" style="font-size: 12px;">Cash On Delivery</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class = "fs-5 fw-200">Mark</td>
                                            <td class = "fs-5 fw-bold">₹456/-</td>
                                            <td>
                                                <a href="" class="btn pending">Pending</a>
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                                <div class="product-name  d-flex gap-3 justify-content-center align-items-center py-2">
                                                    <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                    <div class="d-flex flex-column gap-1 justify-content-start align-items-start">
                                                        <h5 class="m-0 text-primary">T-Shirt</h5>
                                                        <p class="m-0 text-secondary" style="font-size: 12px;">Cash On Delivery</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class = "fs-5 fw-200">Mark</td>
                                            <td class = "fs-5 fw-bold">₹456/-</td>
                                            <td>
                                                <a href="" class="btn cancel ">Cancelled</a>
                                            </td>
                                          </tr> -->
                                        </tbody>

                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>

    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Default data for the initial chart
            var defaultData = [
               
                ['Year', 'Sales', 'Profits'],
                <?php foreach ($order as $fetch) { ?>
                ['<?php echo  $fetch['order_date']; ?>', '<?php echo  $fetch['product_totalPrice']; ?>', <?php echo  ($fetch['product_price'] * $fetch['quanty'] ) - ($fetch['orginalPrice'] * $fetch['quanty'] ) ?>],
            <?php } ?>
 
            ];

            // Function to fetch data from PHP script
        

            // Initial draw with default data
            var data = google.visualization.arrayToDataTable(defaultData);
            var options = {
                chart: {
                    title: 'Sale Performance',
                    subtitle: ' Sales and Profit',
                },
                colors: [ '#FFB703', '#FB8503'],
                series: {
                    0: { color: '#FB8503' },
                    1: { color: '#FFB703' }
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));

     
        }
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="product_page_js/dashboard.js?<?=time();?>"></script>
    <script src="product_page_js/sidebar.js?<?=time();?>"></script>

</body>
</html>
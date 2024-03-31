<?php 

include '../backend/my_wallet/database.php';

$wallet_object = new withdrawn();

$user_wallet = $wallet_object->fetch_walletDetail();

$view_request = $wallet_object->view_ownRequest();


$totalSales = 0;
$totalProfit = 0;
foreach($user_wallet as $orders){

    $totalSales += $orders['product_totalPrice'];

    if($orders['product_status'] == 'Completed'){
        $totalProfit += ($orders['product_price'] * $orders['quanty'] ) - ($orders['orginalPrice'] * $orders['quanty'] ) ;
    }


}


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
    <link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time();?>">
<link rel="stylesheet" href="product_page_css/user_home.css?<?=time();?>">
<link rel="stylesheet" href="product_page_css/wallet.css?<?= time(); ?>">
<link rel="stylesheet" href="../Responsive_css/wallet.css?<?=time();?>">

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
                <li class="fw-bold fs-5"><a href="my_wallet.php"><i class="fa-solid fa-address-card mx-2"></i>My Wallet</a></li>
                <li class=""><a href="bank_details.php"><i class="fa-solid fa-building-columns mx-2"></i>Bank Details</a></li>
                <li class=""><a href="view_order.php"><i class="fa-solid fa-gauge mx-2"></i>View Order</a></li>

            </ul>



            <div class="content-container   d-flex flex-column ">
                <div class="content ">
                <?php 

                require('../include_folder/navbar.php')

                ?>

                    <div class="my-wallet-container m-4 ">
                 

                            <!-- Modal -->
                            <div class="modal fade" id="walletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Withdrawn Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="enter-withdrawn-amount">
                                        <form action="" id="withdDrawn_form">

                                                <div class="alert alert-danger d-none">
                                                </div>

                                                <div class="alert alert-success d-none">

                                                </div>
                                            <div class="tittle text-center">
                                                <p class="m-0 fs-2 my-4 fw-bold text-primary">Withdrawn Amount</p>
                                                <input type="number" name="Withdrawn_amount" id="withdrawn-amount" placeholder="Enter Your Amount" class="amount" readonly>
                                            </div>
                                            <div class="select-amount-price w-100 d-flex justify-content-center align-items-center gap-3 my-3">
                                                <button type="button" class="btn btn-success">+₹ <span class="button">  1000 </span></button>
                                                <button type="button" class="btn btn-success">+₹ <span class="button">  2000 </span></button>
                                                <button type="button" class="btn btn-success">+₹ <span class="button">  5000 </span></button>

                                            </div>  

                                            <div class="transfer_bank-container p-3 my-4 ">
                                                    <div class="tittle bg-primary text-white p-3">
                                                        <p class="m-0 fs-2">Transfer to Bank</p>
                                                    </div>



                                                    <div class="bank_detail p-3">
                                                        <p class="m-0 fs-3 fw-bold my-2">Account Holder Name: <span class="hodler_name fw-normal"><?php echo $orders['bank_holderName'];
                                                         ?></span></p>
                                                        <p class="m-0 fs-3 fw-bold my-2">Account Number: <span class="hodler_name fw-normal"><?php echo $orders['bank_accountNum'];
                                                         ?></span></p>
                                                        <p class="m-0 fs-3 fw-bold my-2">IFSC Code: <span class="hodler_name fw-normal"><?php echo $orders['bank_ifsc'];
                                                         ?></span></p>
                                                        <p class="m-0 fs-3 fw-bold my-2">Bank Name: <span class="hodler_name fw-normal"><?php echo $orders['bank_name'];
                                                         ?> </span></p>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Withdrawn" class="btn btn-primary btn-lg withdrawn_btn">
                                    </div>
                                </form>

                                </div>
                            </div>
                            </div>
                        <div class="wallent_balance_container  p-3 px-4  shadow d-flex justify-content-between align-items-center">
                            <div class="w_tittle">
                                <h2 class="m-0">Wallent Balance</h2>
                                <p class="m-0 fs-1 fw-bold text-white">₹<span class="wallent_balance"> <?php echo $totalProfit; ?> </span>/-</p>
                            </div>

                            <div class="withdrawn-btn_container"> 
                                <button type="button " class="btn bg-green text-white shadow btn-lg fs-3 " data-bs-toggle="modal" data-bs-target="#walletModal"> <i class="fa-solid fa-wallet 
                                mx-2 " ></i> Withdrawn Money</button>
                            </div>
                        </div>

                        <div class="withdrawn-history_container my-4  p-3 ">
                            <h2>All Transaction Details</h2>

                           

                            
                                <div class="transaction-container  bg-white p-3 rounded my-4 shadow">
                                    <table class="table   align-middle">
                                        <thead class="">
                                            <tr>
                                            <th scope="col">Transfer to  Bank</th>
                                            <th scope="col">Withdrawn Amount</th>
                                            <th scope="col">Withdrawn Date</th>

                                            <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class=" fs-4 text-secondary">
                                            <?php 
                                            
                                            foreach($view_request as $amountrequest){

                                            
                                            ?>
                                            <tr>
                                            <td><?php echo $amountrequest['bank_name']; ?></td>
                                            <td>₹<?php echo $amountrequest['ammount_request']; ?>/-</td>
                                            <td><?php echo date("Y-m-d H:i:s", strtotime($amountrequest['request_time'])); ?></td>

                                            <td>
                                                <div class="complete    fs-5 ">
                                                 <span class="status "> <?php echo $amountrequest['withdrawn_status']; ?>
                                                </div>
                                            </td>
                                            </tr>

                                            <?php } ?>
                                        
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                          
                        </div>
                    </div>
                </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>
            
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="product_page_js/my_wallet.js?<?=time();?>"></script>
    <script src="product_page_js/sidebar.js?<?=time();?>"></script>

</body>
</html>
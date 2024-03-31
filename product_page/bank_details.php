<?php 
include '../backend/reseller_register/database.php';
$Reseller_ResigterObject = new Reseller_Register();
$detail = $Reseller_ResigterObject->loginUserDetail();

include '../backend/bank_detail/database.php';
$Bank_detail = new Bank_detail();

$Bank_details = $Bank_detail->fetchBank_detail();



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
<link rel="stylesheet" href="product_page_css/bank_detail.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/bank_detail.css?<?=time()?>">


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
                <li class="fw-bold fs-5"><a href="bank_details.php"><i class="fa-solid fa-building-columns mx-2"></i>Bank Details</a></li>
                <li class=""><a href="view_order.php"><i class="fa-solid fa-gauge mx-2"></i>View Order</a></li>

            </ul>
            <div class="content-container   d-flex flex-column ">
                <div class="content ">
                <?php 

                require('../include_folder/navbar.php')

                ?>
                </div>
                
                <div class="bankDetails-container p-3  m-3 rounded shadow d-flex justify-content-lg-end justify-content-center justify-content-md-end align-items-center  ">
               
                    <div class="bankBox bg-white p-3 rounded shadow me-3">
                        <div class="logo text-center">
                            <img src="../image/bank_logo.jpg" alt="" srcset="">
                            <p class="m-1 fs-4 fw-bold">Bank Details</p>
                        </div>

                        <div class="bank-form">
                            <form action="" id="bankDetailForm">

                                <div class="alert alert-danger p-2 d-none" role="alert">
                               
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Bank Holder Name</label>
                                    <?php if(isset($Bank_details['bank_holderName'])): ?>
                                        <input type="text" name="Bank_Holder_name" id="bankHolder_name" class="form-control" value="<?= $Bank_details['bank_holderName'] ?>" readonly>
                                    <?php else: ?>
                                        <input type="text" name="Bank_Holder_name" id="bankHolder_name" class="form-control" placeholder="Bank Holder Name">
                                    <?php endif; ?>
                                </div>

                                


                                <div class="mb-3">
                                    <label for="" class="form-label">Account Number</label>

                                    <?php if(isset($Bank_details['bank_accountNum'])):  ?>
                                    <input type="number" name="Bank_Account_Number" id="bankAccount_num" class="form-control" placeholder="Account Number" value="<?= $Bank_details['bank_accountNum']  ?>" readonly>
                                    <?php  else: ?>
                                        <input type="number" name="Bank_Account_Number" id="bankAccount_num" class="form-control" placeholder="Account Number" >
                                    <?php endif; ?>

                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">IFSC CODE</label>

                                    <?php if(isset($Bank_details['bank_ifsc'])):  ?>
                                    <input type="text" name="Bank_ifsc" id="bank_ifsc" class="form-control" placeholder="IFSC CODE" value="<?= $Bank_details['bank_ifsc']  ?>" readonly>
                                    <?php  else: ?>

                                    <input type="text" name="Bank_ifsc" id="bank_ifsc" class="form-control" placeholder="IFSC CODE">
                                    <?php endif; ?>

                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Bank Name</label>

                                    <?php if(isset($Bank_details['bank_name'])):  ?>
                                    <input type="text" name="Bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="<?= $Bank_details['bank_name']  ?>" readonly>
                                    <?php  else: ?>
                                    <input type="text" name="Bank_name" id="bank_name" class="form-control" placeholder="Bank Name" readonly>
                                    <?php endif; ?>

                                </div>
                                
                                <?php if(isset($Bank_details['user_email'])):  ?>
                                <div class="d-grid">
                                    <input type="submit" value="Edit Details" class="btn btn-primary editBankDetail">
                                </div>
                                <?php  else: ?>
                                <div class="d-grid">
                                    <input type="submit" value="Submit" class="btn btn-primary bankSubmit_btn">
                                </div>
                                <?php endif; ?>

                            </form>
                        </div>
                    </div>
                </div>
    <?php include '../include_folder/footer.php'; ?>

            </div>

            

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="../product_page/product_page_js/bank_detail.js?<?=time()?>"></script>
    <script src="product_page_js/sidebar.js?<?=time();?>"></script>

</body>
</html>

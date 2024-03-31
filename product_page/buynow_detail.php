<?php
// Retrieve the variables from the URL
$ed_productImg = urldecode($_GET['img']);
$ed_productName = urldecode($_GET['name']);
$ed_productPrice = urldecode($_GET['price']);
$ed_productQuantity = urldecode($_GET['quantity']);
$ed_productSize = urldecode($_GET['size']);
$deliveryPrice = urldecode($_GET['delivery']);
$orginalPrice = urldecode($_GET['originalPrice']);


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
<link rel="stylesheet" href="product_page_css/user_home.css">
<link rel="stylesheet" href="product_page_css/buynow_detail.css?<?=time();?>">
</head>
<body>
    <div class="home-section d-flex">
            <div class="content-container   d-flex flex-column ">
                <div class="content ">
                <?php 

                require('../include_folder/navbar.php')

                ?>

                    <div class="all-product-items row  container-fluid h-100 w-100 d-flex justify-content-around align-items-center py-2 my-2 gap-3">
                        <div class="billing-address col-lg-7 col-md-7 col-12 p-0 bg-white rounded shadow ">
                            <div class="billing-tittle bg-dark text-white p-3 rounded">
                                <h3>Billing Address</h3>
                            </div>
                            <form action="" id="addOrder">

                            <div class="billing-address-form p-3">
                                <div class="row ">
                                     <!-- Display This Code if user provide any incorrect value -->
                            <div class="error ">
                              <div class="alert alert-danger d-none" role="alert">
                              </div>
                            </div>
                            <!-- Display This Code if user provide any incorrect value -->

                            <!-- Fecthing Data Animation -->
                            <div class="fetchingData p-3 d-none">
                              <button class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                              </button>
                            </div>
                            <!-- Fecthing Data Animation -->
                                    <div class="col input-group-lg">
                                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="user_fname" name="User_fname">
                                    </div>
                                    <div class="col input-group-lg">
                                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="user_lname" name="User_lname">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col input-group-lg">
                                            <input type="text" class="form-control" placeholder="Address" aria-label="Contact Number" id="user_address" name="User_address">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col input-group-lg">
                                            <input type="text" class="form-control" placeholder="Appartment, Floor, etc" aria-label="Contact Number" id="user_landmark" name="User_landmark">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-4 input-group-lg">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="user_city" name="User_city">
                                    </div>
                                    <div class="col-md-4 input-group-lg">
                                        <label for="inputState" class="form-label">State</label>
                                        <select id="inputState" class="form-select" id = "user_state" name="User_state">
                                            <option selected>Choose...</option>
                                            <option value="AN">Andaman and Nicobar Islands</option>
                                            <option value="AP">Andhra Pradesh</option>
                                            <option value="AR">Arunachal Pradesh</option>
                                            <option value="AS">Assam</option>
                                            <option value="BR">Bihar</option>
                                            <option value="CG">Chandigarh</option>
                                            <option value="CH">Chhattisgarh</option>
                                            <option value="DH">Dadra and Nagar Haveli</option>
                                            <option value="DD">Daman and Diu</option>
                                            <option value="DL">Delhi</option>
                                            <option value="GA">Goa</option>
                                            <option value="GJ">Gujarat</option>
                                            <option value="HR">Haryana</option>
                                            <option value="HP">Himachal Pradesh</option>
                                            <option value="JK">Jammu and Kashmir</option>
                                            <option value="JH">Jharkhand</option>
                                            <option value="KA">Karnataka</option>
                                            <option value="KL">Kerala</option>
                                            <option value="LD">Ladakh</option>
                                            <option value="LA">Lakshadweep</option>
                                            <option value="MP">Madhya Pradesh</option>
                                            <option value="MH">Maharashtra</option>
                                            <option value="MN">Manipur</option>
                                            <option value="ML">Meghalaya</option>
                                            <option value="MZ">Mizoram</option>
                                            <option value="NL">Nagaland</option>
                                            <option value="OR">Odisha</option>
                                            <option value="PY">Puducherry</option>
                                            <option value="PB">Punjab</option>
                                            <option value="RJ">Rajasthan</option>
                                            <option value="SK">Sikkim</option>
                                            <option value="TN">Tamil Nadu</option>
                                            <option value="TS">Telangana</option>
                                            <option value="TR">Tripura</option>
                                            <option value="UP">Uttar Pradesh</option>
                                            <option value="UK">Uttarakhand</option>
                                            <option value="WB">West Bengal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 input-group-lg">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="user_zip" name="User_zip">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col input-group-lg">

                                        <input type="text" class="form-control" placeholder="Contact Number" id="user_contact" name="User_contact" >
                                    </div>
                                </div>

                                <input type="hidden" name="product_name" id="" value="<?php echo $ed_productName; ?>">
                                <input type="hidden" name="product_price" id="" value="<?php echo $ed_productPrice; ?>">

                                <input type="hidden" name="product_totalPrice" id="" value="<?php echo ($ed_productPrice * $ed_productQuantity); ?>">
                                <input type="hidden" name="product_quantity" id="" value="<?php echo $ed_productQuantity; ?>">
                                <input type="hidden" name="product_size" id="" value="<?php echo $ed_productSize; ?>">
                                <input type="hidden" name="product_deliveryprice" id="" value="<?php echo $deliveryPrice; ?>">
                                <input type="hidden" name="product_img" id="" value="<?php echo $ed_productImg; ?>">

                                <input type="hidden" name="orginal_price" id="" value="<?php echo $orginalPrice;  ?>">



                                <div class="d-grid">
                                    <input type="submit" value="Submit Details" class="btn btn-primary btn-lg" id="buynowSubmit_btn" >
                                </div>
                                </form>
                            </div>

                        </div>
                         
                            <div class="select-product-preview rounded  col-lg-4 col-md-4 col-12 shadow d-flex flex-column gap-3 bg-white p-3">
                                <div class="product-preview-box d-flex gap-3 border p-1 rounded">
                                    <img src="<?php echo $ed_productImg; ?>" alt="" srcset="">
                                    <div class="preivew-detail fs-5">
                                        <p class="m-0"><b>Name: </b>    <?php echo $ed_productName; ?></p>
                                        <p class="m-0"><b>Price: </b><?php echo $ed_productPrice; ?></p>
                                        <p class="m-0"><b>Quantity: </b><?php echo $ed_productQuantity; ?></p>
                                        <p class="m-0"><b>Size: </b><?php echo $ed_productSize; ?></p>
                                        <p class="m-0"><b>Delivary Price: </b><?php echo $deliveryPrice; ?></p>



                                    </div>
                                </div>

                                <div class="amount-detail">

                                    <div class="amount-box d-flex justify-content-between align-items-center fs-5 p-2">
                                        <p class="m-0"><b>Quantiy Price :<b></p>
                                        <p class="qntyprice m-0 fw-normal"><?php echo $ed_productPrice ?> x <?php echo $ed_productQuantity ?>  = ₹<?php echo ($ed_productPrice * $ed_productQuantity) ?>/-</p>
                                    </div>

                                    <div class="amount-box fw-normal d-flex justify-content-between fs-5 align-items-center p-2">
                                        <p class="m-0"><b>Delivery Price :<b></p>
                                        <p class="qntyprice m-0 fw-normal">₹<?php echo $deliveryPrice ?>/-</p>
                                    </div>

                                    <div class="total-amountbox fw-normal my-2 p-3 d-flex justify-content-between align-items-center">
                                        <p class="m-0 fs-2">Total Price:</p>
                                        <p class="t_price fs-2 m-0 text-success">₹<?php echo (($ed_productPrice * $ed_productQuantity) + $deliveryPrice)  ?>/-</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>



<!-- Modal -->
<div class="modal fade" id="payment_method" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Method</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
            <div class="alert alert-danger method_error fw-normal d-none" role="alert"></div>

        <div class="form-check d-flex justify-content-start align-items-center cash_on_delivery gap-3 ">
            
            <input class="form-check-input fs-5" type="checkbox" name="flexRadioDefault" id="payment">
            <div class="border rounded d-flex justify-content-start align-items-center px-3 py-2 p_method">
                <img src="../image/delivery.png" alt="" srcset="">
                <p class="m-0 fs-2 fw-bold">Cash On Delivery</p>
            </div>
          
        </div>
      </div>
      <div class="p-3 d-grid border">
        <button type="button" class="btn btn-primary btn-lg payment_optionBtn">Submit Order</button>
      </div>
    </div>
  </div>
</div>
<?php include '../include_folder/footer.php'; ?>

            </div>

            

            
        </div>

        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="product_page_js/buynow_detail.js?<?=time();?>"></script>
</body>
</html>

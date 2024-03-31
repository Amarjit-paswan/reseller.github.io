<?php 

include 'admin_backend/database.php';

$adminObject = new Admin();
$productsDetail = $adminObject->viewOrder();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../product_page/product_page_css/user_home.css?<?=time();?>">
<link rel="stylesheet" href="../product_page_css/buynow_detail.css?<?=time();?>">
<link rel="stylesheet" href="../css/super_admin.css?<?=time()?>">
<link rel="stylesheet" href="../css/delete_popup.css?<?=time()?>">


</head>
<body>
    <div class="home-section d-flex">

        <ul class="sidebar d-none d-sm-block p-2 ">
                    <a href="" class="d-flex logo-tittle justify-content-around align-items-center text-white">
                        <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                        <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    </a>

                    <li class=""><a href="super_admin_index.php"><i class="fa-solid fa-bag-shopping mx-2"></i>View Products</a></li>
                    <li class=""><a href="super_admin_addproduct.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Add Products</a></li>
                    <li class=""><a href="super_admin_allusers.php"><i class="fa-solid fa-gauge mx-2"></i>All Users</a></li>
                    <li class="fw-bold fs-5 "><a href="admin_order.php"><i class="fa-solid fa-gauge mx-2 "></i>All Orders</a></li>
                    <li class=""><a href="admin_withdrawn_request.php"><i class="fa-solid fa-gauge mx-2"></i>Withdrawn Request</a></li>

        </ul>

        <div class="content-container   d-flex flex-column ">
                <div class="content ">
                    <div class=" navbar  navbar-light bg-white  ">

                        <div class="search-container  d-none d-sm-flex align-items-center">

                            <div class="search-btn ">
                                <input type="text" name="" id="" placeholder="Search Anything...">
                            </div>
                            <div class="search-icon d-flex bg-primary text-white justify-content-center align-items-center">
                                <i class="fa-solid fa-magnifying-glass "></i>

                            </div>

                        </div>

                        <div class="user-detail d-flex ">
                            <div class="name px-2 text-center d-flex justify-content-center align-items-center ">
                                <p class="mx-2 my-0">Amarjit Paswan</p>
                                <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                            </div>
                            <div class="logout">
                                <a href="" class="btn btn-primary">Logout</a>
                            </div>
                        </div>

        </div>

        <div class="container-fluid p-3 pb-5 ">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="view-detail-container d-flex gap-3">
                            <div class="product-imageBox border p-2 border-primary rounded shadow bg-white ">
                                <img src="../admin/admin_backend/uploads/WhatsApp Image 2024-02-09 at 7.38.08 PM.jpeg" alt="" srcset="" class="product_imgsrc2">
                                <div class="p-name my-2">
                                    <p class="m-0  "><b>Name:</b> <span class="product_name">Collar T-shirt</span> </p>
                                    <p class="m-0"><b>Size:</b> <span class="product_size">M</span> </p>
                                    <p class="m-0"><b>Quantity:</b> <span class="product_qunatity"></span> </p>

                                    <div class="detail-item d-flex gap-1">
                                        <p class="m-0 fw-bold">Sell Price: </p>
                                        <p class="m-0"> ₹<span class="sellPrice">200</span>/-</p>
                                    </div>

                                </div>
                            </div>

                            <div class="Shipping-detail border border-primary shadow rounded p-3">
                                <div class="ship-tittle mb-2">
                                    <p class="m-0 fs-4 fw-bold">User Shipping Details</p>
                                </div>
                                <form action="" >
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="" id="" class="form-control ship-name" readonly>
                                    </div>

                                    <input type="hidden" name="" id="user_id" value="">
                                    
                                    <div class="mb-3">
                                        <label for="" class="form-label">Address</label>
                                        <input type="text" name="" id="" class="form-control ship-address" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Apartment</label>
                                        <input type="text" name="" id="" class="form-control ship-apartment" readonly>
                                    </div>

                                    <div class="d-flex gap-2 ">
                                        <div class="mb-3">
                                            <label for="" class="form-label">City</label>
                                            <input type="text" name="" id="" class="form-control ship-address" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">State</label>
                                            <input type="text" name="" id="" class="form-control ship-state" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Pincode</label>
                                            <input type="text" name="" id="" class="form-control ship-pincode" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone Number</label>
                                            <input type="number" name="" id="" class="form-control ship-number" readonly>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center gap-3 ">
                                        <div class="mb-3 w-50">
                                            <label for="" class="form-label">Payment Method</label>
                                                <input type="text" name="" id="" class="form-control ship-method" value="Cash On Delivery" readonly>
                                        </div>
                                        <div class="mb-3 w-50">
                                            <label for="" class="form-label">Status</label>
                                            <select name="" id="payment_status_value" class="form-select form-select payment_status"  aria-label="Large select example">
                                                <option value="Pending">Pending</option>
                                                <option value="Cancel">Cancel</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                  

                            </div>

                            <div class="order-amount-detail border border-primary bg-white rounded bg-white p-3">
                                <div class="amount-tittle">
                                    <p class="m-0 fs-4 fw-bold">Total Order Amount</p>
                                </div>

                                <div class="order-detail">
                                  

                                    <div class="detail-item d-flex justify-content-between aling-items-center my-2">
                                        <p class="m-0">Quantity:</p>
                                        <p class="m-0"><span class="sellPrice">200</span>  x <span class="quantity">1</span> = ₹ <span class="quantity_totalPrice">200</span> /-</p>
                                    </div>

                                    <div class="detail-item d-flex justify-content-between aling-items-center my-2">
                                        <p class="m-0">Delivery:</p>
                                        <p class="m-0">₹ <span class="deliveryPrice"> 200</span>/-</p>
                                    </div>

                                    <div class="total py-1 my-4 d-flex justify-content-between align-items-center">
                                    <p class="m-0 fs-3 fw-bold text-success">Total:</p>
                                        <p class="m-0 fs-5 text-success">₹ <span class="totalPrice"> 200 </span> /-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary order_submit_btn">Save changes</button>
                    </div>
                    </form>

                    </div>
                </div>

            </div>

            <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header flex-column">
                                    <div class="icon-box">
                                    <i class="fa-solid fa-xmark"></i>
                                    </div>						
                                    <h4 class="modal-title w-100">Are you sure?</h4>	
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger order_deletebtn">Delete</button>
                                </div>
                            </div>
                        </div>
            </div>

            <!-- Add Product Modal start  -->
        


            <div class="heading-tittle d-flex justify-content-between align-items-center mt-3">
                <h3>All Orders</h3>
            </div>

           <div class="order-detail p-3 my-3 shadow bg-white rounded">
           <div class="order-details my-3">
                    <div class="tbody-container">
                        <table class="table table-lg align-middle text-center">
                            <thead class="thead">
                                <tr>
                                <th scope="col">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </th>
                                <th scope="col">Product</th>
                                <th scope="col">Coustmer Name</th>
                                <th scope="col">Quantity</th>
                                
                                <th scope="col">Total Price</th>
                                <th scope="col">Delivery Method</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>

                                </tr>
                            </thead>

                            <tbody class="">
                                    <?php 
                                    
                                    foreach($productsDetail as $product){

                                    
                                    ?>
                                    <tr class="">
                                        <td class="text-center">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </td>
                                        <td class="product-name-detail d-flex justify-content-start align-items-center gap-2 ">
                                            <img src="<?php echo $product['product_img']; ?>" alt="" srcset="">
                                            <p class="m-0 "><?php echo $product['product_name']; ?></p>
                                        </td>
                                        <td><?php echo $product['Ruser_name'];  ?></td>
                                        <td>5</td>
                                        <td>₹<?php echo $product['product_totalPrice'];  ?>/-</td>
                                        <td>Cash On Delivery</td>
                                        <td><?php echo $product['product_status'];  ?></td>
                                        <td>
                                            <div class="action-btn">
                                                <button class="btn btn-primary viewDetail" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                                data-viewdetail = "<?php echo $product['order_id'];  ?>"
                                                data-shipproductimg = <?php echo urlencode( $product['product_img']); ?>
                                                data-shipnamee = <?php echo urlencode( $product['product_name']); ?>
                                                data-shipname = "<?php echo $product['Firstname'].' '. $product['lastname'];   ?>" 
                                              data-shipaddress = <?php echo $product['Address']; ?> 
                                              data-shipapartment = <?php echo $product['Apartment']; ?>
                                              data-shipcity = <?php echo $product['city']; ?>
                                              data-shipstate = <?php echo $product['state']; ?> 
                                              data-shippincode = <?php echo $product['pincode']; ?>
                                              data-shipcontact = <?php echo $product['contact_num']; ?>
                                              data-shippaymenttype = <?php echo $product['payment_type']; ?>
                                              data-shipnamew=<?php echo  $product['quanty'];?>
                                              data-shipsellprice = <?php echo $product['product_price']; ?>
                                              data-ship-totalprice = <?php echo $product['product_totalPrice']; ?>
                                              data-status = <?php echo $product['product_status'];  ?>  

                                              data-shipproductsize = <?php echo  $product['product_size']; ?>
                                              data-shipdeliveryPrice = <?php echo $product['product_deliveryprice']; ?>
                                              data-shipSellBy = <?php echo $product['Ruser_name']; ?>> View Details </button>
                                                <input type="hidden" name="" class="delivery" value=" <?php echo $product['product_deliveryprice']; ?>">
                                                <input type="hidden" name="" class="number" value="<?php echo  $product['quanty'];?>">
                                                <button class="btn btn-danger order_deletebtn" data-orderdeletebtn = <?php echo $product['order_id']; ?>>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                   
<?php  } ?>
                             
                           
                            </tbody>
                            
                            
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="admin_javascript/admin.js?<?=time()?>"></script>

</body>
</html>
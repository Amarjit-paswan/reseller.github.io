<?php 

include 'admin_backend/database.php';

$adminObject = new Admin();
$RequestDetail = $adminObject->fetch_withdrawn_request();


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
<link rel="stylesheet" href="../Responsive_css/user_collection.css?<?=time();?>">
<link rel="stylesheet" href="../Responsive_css/admin/view_product.css?<?=time();?>">

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
                    <li class=""><a href="admin_order.php"><i class="fa-solid fa-gauge mx-2"></i>All Orders</a></li>
                    <li class="fw-bold fs-5 "><a href="admin_withdrawn_request.php"><i class="fa-solid fa-gauge mx-2"></i>Withdrawn Request</a></li>

               

        </ul>

        <div class="content-container   d-flex flex-column ">
            <!-- Modal -->
                <div class="modal fade" id="WithdrawnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Withdrawn Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                            <select name="withdrawn_status" id="withdrawn_status" class="form-select">
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary  W_status_edit">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>

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

            <!-- Add Product Modal start  -->
      

          
            <div class="heading-tittle d-flex justify-content-between align-items-center mt-3">
                <h3>Money Withdrawn Request</h3>
            </div>

            <div class="product-details-container bg-white my-4 p-3 rounded shadow">
                <div class="detail-box d-flex justify-content-end align-items-center">


                    <div class="product-search">
                        <input type="text" name="" id="" class="product_search_field" placeholder="Search Product">
                    </div>
                
                </div>

                <div class="product-details my-3">
                    <div class="tbody-container">
                        <table class="table table-lg align-middle text-center">
                            <thead class="thead">
                                <tr>
                                <th scope="col">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </th>
                                <th scope="col">User name</th>
                                <th scope="col">Amount Request</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">IFSC CODE</th>
                                <th scope="col">Request Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                
                                foreach($RequestDetail as $request){

                                
                                ?>
                                <tr>
                                    <td> 
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td><?= $request['bank_holderName'] ?></td>
                                    <td>₹<?= $request['ammount_request'] ?>/-</td>
                                    <td><?= $request['bank_name'] ?></td>
                                    <td><?= $request['bank_accountNum'] ?></td>
                                    <td><?= $request['bank_ifsc'] ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($request['request_time'])) ?></td>
                                    <td><?= $request['withdrawn_status'] ?></td>
                                    <td>
                                        <button class="btn btn-primary withdrawn_button" data-withdrawnedit = <?php echo $request['withdrawn_id'];  ?> >Edit</button>
                                        <button class="btn btn-danger">Delete</button>
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
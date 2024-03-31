<?php 

include 'admin_backend/database.php';

$adminObject = new Admin();
$allUsersDetail = $adminObject->fetchAllUsers();




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
<link rel="stylesheet" href="../css/super_admin.css?<?=time()?>">
<link rel="stylesheet" href="../css/delete_popup.css?<?=time()?>">
<link rel="stylesheet" href="../Responsive_css/user_collection.css<?=time();?>">
<link rel="stylesheet" href="../Responsive_css/admin/allusers.css?<?=time();?>">

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<style>
   
</style>
<body>
    <div class="home-section d-flex">

        <ul class="sidebar d-none d-sm-block p-2 ">
                <div class="d-flex logo-tittle justify-content-around align-items-center text-white">
                    <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                    <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    <i class="fa-solid fa-xmark text-danger d-none fs-2"></i>
                </div>
                    <li class=""><a href="super_admin_index.php"><i class="fa-solid fa-bag-shopping mx-2"></i>View Products</a></li>
                    <li class=""><a href="super_admin_addproduct.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Add Products</a></li>
                    <li class="fw-bold fs-5"><a href="super_admin_allusers.php"><i class="fa-solid fa-gauge mx-2"></i>All Users</a></li>
                    <li class=""><a href="admin_order.php"><i class="fa-solid fa-gauge mx-2"></i>All Orders</a></li>
                    <li class=""><a href="admin_withdrawn_request.php"><i class="fa-solid fa-gauge mx-2"></i>Withdrawn Request</a></li>


        </ul>

        <div class="content-container   d-flex flex-column ">


                <div class="content ">
                    <div class=" navbar  navbar-light bg-white   justify-content-lg-end justify-content-md-end">

                        <div class="sidebar-icon d-lg-none d-md-none">
                            <i class="fa-solid fa-bars"></i>
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
                </div>

            <div class="container-fluid my-3  ">
                <div class="heading-tittle">
                    <h3>All Users</h3>
                </div>

                <div class="allusers-container bg-white rounded shadow p-3 ">

                                    <!-- Modal -->
                    <div class="modal fade" id="profileView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="row  d-flex justify-content-around align-items-center">
                                        <div class="col-4 user-bio border bg-white rounded  d-flex flex-column justify-content-center align-items-center gap-3 p-2">
                                            <div class="user-profile">
                                                <div class="img  d-flex justify-content-center align-items-center ">
                                                    <img src="../image/male-deafult image.jpg" alt="">
                                                </div>
                                            </div>

                                            <div class="user-detail text-center">
                                                <p class="m-0 fs-3 fw-bold text-primary user_name">Amarjit Paswan</p>
                                                <p class="m-2 fs-5 fw-bold " >Email : <span class="fw-normal user_email">amarjitp594@gmail.com</span></p>
                                                <p class="m-2 fs-5 fw-bold ">Role : <span class="text-success fw-normal user_role">Reseller</span> </p>
                                            </div>
                                        </div>

                                        <div class="col-7 user-sales-detail border bg-white ">
                                            <div class=" p-3 d-flex justify-content-around align-items-center gap-2">
                                                <div class="saleBox p-2  total-order">
                                                    <div class="saledetail d-flex flex-column m-2 align-items-start justify-content-start">
                                                        <p class="m-0 fs-4 fw-bold">Total Order</p>
                                                        <p class="m-0 fs-3 fw-bold text-white total_order">0</p>
                                                    </div>
                                                </div>

                                                <div class="saleBox   total-sales">
                                                    <div class="saledetail d-flex flex-column m-2 align-items-start justify-content-start">
                                                        <p class="m-0 fs-4 fw-bold">Total Sales</p>
                                                        <p class="m-0 fs-3 fw-bold text-white total_sales">0</p>
                                                    </div>
                                                </div>

                                                <div class="saleBox total-profit">
                                                    <div class="saledetail d-flex flex-column m-2 align-items-start justify-content-start">
                                                        <p class="m-0 fs-4 fw-bold">Total Profit</p>
                                                        <p class="m-0 fs-3 fw-bold text-white total_profit">0</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bank-detail my-2 border border-bottom">
                                                <p class="m-0 p-2 fw-bold fs-4 text-primary">Bank Details</p>

                                                <div class="d-flex flex-column p-2">
                                                    <p class="mb-2 fw-bold fs-5">Account Holder Name: <span class="fw-normal holder_name">Amarjit Paswan</span></p>
                                                    <p class="mb-2 fw-bold fs-5">Account Number: <span class="fw-normal account_number">Amarjit Paswan</span></p>
                                                    <p class="mb-2 fw-bold fs-5">Bank IFSC Code: <span class="fw-normal account_ifsc">Amarjit Paswan</span></p>
                                                    <p class="mb-2 fw-bold fs-5">Bank Name: <span class="fw-normal bank_name">Amarjit Paswan</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <!-- Modal -->
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

                    <div class="detail-box d-flex justify-content-between align-items-center">

                        <div class="box-item d-flex gap-2">
                            <button class="btn btn-light slt_box">All</button>
                            <button class="btn btn-light">Reseller Users</button>
                            <button class="btn btn-light">Wholesaller Users</button>
                            <button class="btn btn-light">Admin</button>
                        </div>

                        <div class="product-search">
                            <input type="text" name="" id="" class="product_search_field" placeholder="Search Users">
                        </div>
                    </div>

                <table class="table table-lg align-middle text-center my-3">
                            <thead class="thead">
                                <tr>
                                <th scope="col">
                                    <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Users Type</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>

                                </tr>
                            </thead>

                            <tbody class="">
                                <?php 
                                
                                    foreach($allUsersDetail  as $userDetail){

                                
                                ?>
                                
                                    <tr class="">
                                        <td class="text-center">
                                            <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                        </td>
                                        <td class="product-name-detail d-flex justify-content-start align-items-center  gap-2 ">
                                            <img src="../image/collarTshirt.jpeg" alt="" srcset="">
                                            <p class="m-0 "><?php echo $userDetail['Ruser_name'];  ?></p>
                                        </td>
                                        <td><p class="m-0 text-success"><?php echo $userDetail['Ruser_type'];  ?></p></td>
                                        <td><?php echo $userDetail['Ruser_email'];  ?></td>
                                        <td>
                                            <div class="action-btn">
                                                <button class="btn btn-danger  user_Deletebtn"  data-user_deleteid = <?php echo $userDetail['Ruser_id'];  ?>>Delete</button>
                                                <button class="btn btn-secondary viewbtn" data-useremail = <?php echo $userDetail['Ruser_email']; ?> data-bs-toggle="modal" data-bs-target="#profileView">View</button>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./admin_javascript/admin.js?<?=time();?>"></script>
    <script src="../product_page/product_page_js/sidebar.js"></script>

</body>
</html>
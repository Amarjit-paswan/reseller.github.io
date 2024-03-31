<?php 

include 'admin_backend/database.php';

$adminObject = new Admin();
$productsDetail = $adminObject->fetchProductDetail();



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
                <div class="d-flex logo-tittle justify-content-around align-items-center text-white">
                    <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                    <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    <i class="fa-solid fa-xmark text-danger d-none fs-2"></i>
                </div>

                    <li class="fw-bold fs-5"><a href="super_admin_index.php"><i class="fa-solid fa-bag-shopping mx-2"></i>View Products</a></li>
                    <li class=""><a href="super_admin_addproduct.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Add Products</a></li>
                    <li class=""><a href="super_admin_allusers.php"><i class="fa-solid fa-gauge mx-2"></i>All Users</a></li>
                    <li class=""><a href="admin_order.php"><i class="fa-solid fa-gauge mx-2"></i>All Orders</a></li>
                    <li class=""><a href="admin_withdrawn_request.php"><i class="fa-solid fa-gauge mx-2"></i>Withdrawn Request</a></li>

               

        </ul>

        <div class="content-container   d-flex flex-column ">
                <div class="content ">
                    <div class=" navbar  navbar-light bg-white  d-flex  justify-content-lg-end justify-content-md-end">
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

        <div class="container-fluid p-3 pb-5 ">

            <!-- Add Product Modal start  -->
      

                    <!-- Modal -->
                    <div class="modal  fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content border-0">
                            <div class="modal-header bg-primary text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="productEdit_form" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row p-2 d-flex justify-content-around">
                                    <div class="col-12 border p-2 ">
                                        <div class="product-tittle  p-2 rounded">
                                            <label class="form-label fs-5">Product Tittle</label>
                                            <input type="text" name="P_tittle" id="" class="w-100 form-control product_tittle" placeholder="Product Tittle">
                                            <input type="hidden" name="P_id" id="" class="product_id">
                                        </div>
    
                                        <div class="product-textarea p-2">
                                            <label class="form-label fs-5">Product Descripation</label>
                                            <textarea class="form-control prodcut_descripation" placeholder="Product Descripation" id="floatingTextarea" name="P_descripation"></textarea>
                                        </div>

                                      

                                        <div class="main-image-contaienr p-2  my-2 d-flex justify-content-around border gap-2 ">
                                            
                                            <div class="col-3 main_image_box">
                                                <div class="tittle my-2">
                                                    <h4 class="m-0">Main Image</h4>
                                                </div>

                                                <div class="main_img">

                                                    <img src="" alt="" id="main_image">
                                                </div>
                                                <div class="file d-grid gap-2 my-3">
                                                    <input type="file" name="vr_image"  class="form-control d-none main_image_file">        
                                                    <input type="hidden" name="main_vr_id" class="vr_id">
                                                    <button class="btn btn-primary" type="button" id="main_image_btn">Upload</button>
                                                </div>

                                            </div>


                                            <div class="product_price-container p-2 col-8">
                                                <div class="product-price   row" >
                                                    <div class="col-6">
                                                        <label for="" class="form-label">Sell Price</label>
                                                        <input type="number" name="" class="form-control sell_price" placeholder="Sell Price">
                                                    </div>

                                                    <div class="col-6 ">
                                                        <label for="" class="form-label">Compare Price</label>
                                                        <input type="number" name="" class="form-control compare_price" placeholder="Compare Price">
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="" class="form-label">Quantity</label>
                                                        <input type="number" name="" class="form-control product_quantity" placeholder="Quantity">
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="" class="form-label">Collection</label>
                                                        <select name="P_collection" id="" class="product_collection form-select ">
                                                        <option value="Cotton">Combo</option>
                                                        <option value="Oversize">Oversize</option>
                                                        <option value="Graphic">Graphic</option>
                                                    </select>
                                                    </div>
                                                    

                                                </div>
                                            </div>

                                        </div>

                                        <div class="variant-image-contaienr border-secondary p-2  my-2 d-flex flex-column border gap-2 ">
                                            <div class="tittle mb-2">
                                                <h4 class="m-0">Vaiants Image</h4>
                                            </div>

                                            <div class="row gap-3 variants-image-box d-flex justify-content-start p-3">
                                             

                                            
                                            </div>


                                             

                                        </div>

                                    </div>

                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary product_editbtn">Submit</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
            <!-- Add Product Modal end  -->
            <div class="heading-tittle d-flex justify-content-between align-items-center mt-3">
                <h3>All Products</h3>
            </div>

            <div class="product-details-container bg-white my-4 p-3 rounded shadow">
                <div class="detail-box d-flex justify-content-between align-items-center">

                    <div class="box-item d-flex gap-2">
                        <button class="btn btn-light slt_box">All</button>
                        <button class="btn btn-light">High to Low</button>
                        <button class="btn btn-light">Low to High</button>
                        <button class="btn btn-light">Out of Stock</button>
                        <input type="button" class="btn btn-danger select_deletebtn d-none" value="Delete" name="delete"></input>

                    </div>

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
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Compare Price</th>
                                <th scope="col">Available</th>
                                <th scope="col">Action</th>
                                

                                </tr>
                            </thead>

                            <tbody class="">
                                <?php 
                                
                                foreach($productsDetail as $product){
                                ?>
                                    <form action="./admin_backend/action.php">
                                    <tr class="">
                                        <td class="text-center">
                                            <input class="form-check-input" type="checkbox" name="deleteid[]" value="<?php echo $product['product_id'];  ?>" id="flexCheckDefault">
                                        </td>
                                        <td class="product-name-detail d-flex justify-content-start align-items-center gap-2 "> 
                                            <img src="admin_backend/uploads/<?php echo $product['vr_product_image']; ?>" alt="" srcset="">                            
                                            <p class="m-0 "><?php echo $product['product_name']; ?></p>
                                        </td>
                                        <td>₹<?php echo $product['sell_price']; ?>/-</td>
                                        <td>₹<?php echo $product['compare_price']; ?>/-</td>
                                        <td><?php echo $product['quantity']; ?></td>
                                        <td>
                                            <div class="action-btn">
                                                <button class="btn btn-primary editbtn" type="button" data-bs-toggle="modal" data-bs-target="#editProductModal" data-selectproduct = <?php echo $product['product_id'];  ?>>Edit</button>
                                                <button class="btn btn-danger product_delete_btn"  type="button" data-deletedata = <?php echo $product['product_id'];  ?>>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    </form>
                                <?php } ?>
                                   

                             
                           
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
<script src="../product_page/product_page_js/sidebar.js"></script>
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
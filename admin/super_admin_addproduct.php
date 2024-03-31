

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
<link rel="stylesheet" href="../Responsive_css/user_collection.css<?=time();?>">



</head>
<body>
    <div class="home-section d-flex">

        <ul class="sidebar d-none d-sm-block p-2 ">
                <div class="d-flex logo-tittle justify-content-around align-items-center text-white">
                    <!-- <img src="../image/logo.png" alt="" srcset=""> -->
                    <h4 class="fs-3 text-white mb-0">Dhaga Store</h4>
                    <i class="fa-solid fa-xmark text-danger d-none fs-2"></i>
                </div>

                    <li class=""><a href="super_admin_index.php"><i class="fa-solid fa-bag-shopping mx-2"></i>View Products</a></li>
                    <li class="fw-bold fs-5"><a href="super_admin_addproduct.php"><i class="fa-solid fa-bag-shopping mx-2"></i>Add Products</a></li>
                    <li class=""><a href="super_admin_allusers.php"><i class="fa-solid fa-gauge mx-2"></i>All Users</a></li>
                    <li class=""><a href="admin_order.php"><i class="fa-solid fa-gauge mx-2"></i>All Orders</a></li>
                    <li class=""><a href="admin_withdrawn_request.php"><i class="fa-solid fa-gauge mx-2"></i>Withdrawn Request</a></li>

               

        </ul>

        <div class="content-container   d-flex flex-column ">
                <div class="content ">
                    <div class=" navbar  navbar-light bg-white justify-content-lg-end justify-content-md-end ">


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

                <div class="add-prdouct-container rounded shadow mx-4 my-4  bg-white">
                    <div class="heading-tittle p-3 bg-light">
                        <p class="m-0 fw-bold text-primary fs-5">Add Product Form</p>
                    </div>
                        <div class="alert alert-danger d-none m-3" role="alert">
                        
                        </div>
                        <div class="alert alert-success d-none m-3" role="alert">
                        
                        </div>
                    <div class="add-product-content py-3">
                        <form action="" id="ProductAdd_Details" enctype="multipart/form-data">
                            <div class="row  d-flex justify-content-around">
                                <div class="col-11 border p-3  rounded">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Tittle</label>
                                        <input type="text" name="Product_tittle" id="product_tittle" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Descripation</label>
                                        <textarea class="form-control" placeholder="Add Descripation here" id="product_descripation" name="Product_descripation" style="min-height: 150px"></textarea>
                                    </div>

                                    <div class="mb-3 row  d-flex gap-4 justify-content-start">
                                        <div class="col-lg-2 col-md-2 col-12 px-2 ">
                                            <label for="" class="form-label">Sell Price</label>
                                            <input type="number" name="Product_sellPrice[]" id="product_sellPrice" class="form-control"
                                            placeholder="Sell Price">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12px-2 ">
                                            <label for="" class="form-label">Compare Price</label>
                                            <input type="number" name="Product_comparePrice[]" id="product_comparePrice" class="form-control"
                                            placeholder="Compare Price">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12px-2 ">
                                            <label for="" class="form-label">Quantity</label>
                                            <input type="number" name="Product_quantity[]" id="product_quantity" class="form-control" placeholder="Quantity">
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12px-2 ">
                                            <label for="" class="form-label">Size</label>
                                            <select name="sizes[]" id="" class="form-select">
                                                <option value="1">S</option>
                                                <option value="2">M</option>
                                                <option value="3">L</option>
                                                <option value="4">XL</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12 px-2 ">
                                            <label for="" class="form-label">Collection</label>
                                            <select name="collection" id="" class="form-select">
                                                <option value="Graphic">Graphic</option>
                                                <option value="Combo">Combo</option>
                                                <option value="Oversize">Oversize</option>


                                            </select>
                                        </div>

                                        <!-- <div class="col-2 px-2 d-flex align-items-end">

                                                    <button type="button" class="btn btn-primary add-attribute">Add Product Detail</button>
                                        </div> -->

                                        <div class="row  addAttribute-container d-flex gap-4 justify-content-start">

                                        </div>
                                  
                                    </div>

                                    <div class="mb-3 px-2">
                                         <div class="form-label">Add Product Images</div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-lg-9 col-md-9 col-12 px-1">
                                                <input type="file" name="variant_image[]" id="product_image" accept="image/*" class="form-control allimg"  >
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 d-lg-block d-md-block d-grid mt-2 mt-lg-0 mt-md-0 p-0">
                                                <button class="btn btn-primary addmoreImg">Upload Images</button>
                                                <!-- <button class="btn btn-secondary add_more_image" type="button" >Add More Images</button> -->
                                            </div>
                                            <div class="imagepreview"></div>
                                            <div class="row my-2 addimagebutton_container d-flex justify-content-between  align-items-center">
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="add-variatns-container ">
                                        <p class="m-0 text-primary fs-5">Add Variants</p>
                                        <div class="add-variatnbox my-3">
                                            
                                            <div class="mb-3 row  d-flex gap-4 justify-content-start">
                                                <div class="col-2 px-2 ">
                                                    <label for="" class="form-label">Sell Price</label>
                                                    <input type="number" name="Product_sellPrice[]" id="product_sellPrice" class="form-control"
                                                    placeholder="Sell Price">
                                                </div>
                                                <div class="col-2 px-2 ">
                                                    <label for="" class="form-label">Compare Price</label>
                                                    <input type="number" name="Product_comparePrice[]" id="product_comparePrice" class="form-control"
                                                    placeholder="Compare Price">
                                                </div>
                                                <div class="col-2 px-2 ">
                                                    <label for="" class="form-label">Quantity</label>
                                                    <input type="number" name="Product_quantity[]" id="product_quantity" class="form-control" placeholder="Quantity">
                                                </div>

                                                <div class="col-2 px-2 ">
                                                    <label for="" class="form-label">Size</label>
                                                    <select name="sizes[]" id="" class="form-select">
                                                        <option value="1">S</option>
                                                        <option value="2">M</option>
                                                        <option value="3">L</option>
                                                        <option value="4">XL</option>

                                                    </select>
                                                </div>

                                         

                                                <div class="col-2 px-2 d-flex align-items-end">

                                                            <button type="button" class="btn btn-primary add-attribute">Add Product Detail</button>
                                                </div>

                                                <div class="row  addAttribute-container d-flex gap-4 justify-content-start">

                                                </div>
                                        
                                            </div>

                                        
                                        </div>
                                    </div> -->

                                    <div class="add-variatns-container ">
                                        <p class="m-0 text-primary fs-5 add-variants-btn">Add Variants</p>
                                        <!-- <div class="add-variatnbox my-3">
                                            
                                            <div class="mb-3 row  d-flex gap-4 justify-content-start">
                                                <div class="col-3 px-2 ">
                                                    <label for="" class="form-label">Sell Price</label>
                                                    <input type="number" name="Product_sellPrice[]" id="product_sellPrice" class="form-control"
                                                    placeholder="Sell Price">
                                                </div>
                                                <div class="col-3 px-2 ">
                                                    <label for="" class="form-label">Compare Price</label>
                                                    <input type="number" name="Product_comparePrice[]" id="product_comparePrice" class="form-control"
                                                    placeholder="Compare Price">
                                                </div>
                                                <div class="col-3 px-2 ">
                                                    <label for="" class="form-label">Quantity</label>
                                                    <input type="number" name="Product_quantity[]" id="product_quantity" class="form-control" placeholder="Quantity">
                                                </div>

                                                <div class="col-2 px-2 ">
                                                    <label for="" class="form-label">Size</label>
                                                    <select name="sizes[]" id="" class="form-select">
                                                        <option value="1">S</option>
                                                        <option value="2">M</option>
                                                        <option value="3">L</option>
                                                        <option value="4">XL</option>

                                                    </select>
                                                </div>


                                                <div class="row  addAttribute-container d-flex gap-4 justify-content-start">

                                                </div>
                                        
                                            </div>

                                            <div class="mb-3 px-2">
                                                <div class="form-label">Add Product Images</div>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-9 px-1">
                                                        <input type="file" name="variant_image[]" id="product_image" class="form-control allimg " required >
                                                    </div>
                                                    <div class="col-3 p-0">
                                                        <button class="btn btn-primary addmoreImg">Upload Images</button>
                                                        <button class="btn btn-secondary add_more_image" type="button" >Add More Images</button>
                                                    </div>
                                                    <div class="imagepreview"></div>
                                                    <div class="row my-2 addimagebutton_container d-flex justify-content-between  align-items-center">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                </div>

                               
                            </div>

                            
                            
                            <div class="m-3 float-end">

                                <input type="submit" value="Submit" class="btn btn-primary" id="productAdd_btn">
                            </div>
                        </form>
                    </div>
                </div>

        </div>

        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="admin_javascript/admin.js?<?=time()?>"></script>
<script src="../product_page/product_page_js/sidebar.js"></script>

</body>
</html>
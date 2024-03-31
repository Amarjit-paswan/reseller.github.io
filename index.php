
<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/homestyle.css?<?=time();?>">
    <link rel="stylesheet" href="Responsive_css/index.css?<?=time();?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css?<?=time();?>" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <style>
      
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg text-white d-flex p-3  custom-navbar ">
        <div class="container d-flex justify-content-between">
        
            <div class="tittle-logo">
                <a class="navbar-brand text-white" href="#">TeeBiz</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>

          <!-- <div class="collapse navbar-collapse w-100" id="navbarNav">
            <ul class="navbar-nav  ms-auto   d-flex justify-content-around ">
              <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="#">Home</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="#">About </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="#">Contact</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="#">Services</a>
              </li>
              

            </ul>
          </div> -->
        </div>
    </nav> 

    <div class="container-fluid section-1 p-3 pb-5 d-flex justify-content-center align-items-center section-1">
        <div class="row ">
            <div class="access-form d-flex ">
              
                <div class="form-detail bg-white p-3">

                    <div class="tittle text-center p-3">
                        <h2>Welcome to Our Website</h2>
                    </div>

                    <div class="become-patner d-flex justify-content-center ">
                        <a href="reseller_register.php" class="button reseller-btn  btn bg-yellow shadow">Become a Reseller</a>
                        <a href="" class="button wholesaller-btn btn bg-orange shadow">Become a Wholesaller</a>
                    </div>

                    <div class="or">
                        <hr class="mb-0 mt-4">
                        <p>OR</p>
                    </div>

                    <div class="login-form text-center p-4 ">
                        <h4 class="mb-2">Sign In</h4>

                        <form action="" autocomplete="OFF" id="loginFormDetail">
                            <?php 

                            if(isset($_SESSION['email_otp'])){
                                echo '<div class="alert alert-success" role="alert"> Congratulations! ' . $_SESSION["Reseller_name"].', Your Account has Created</div>' ;
                            }
                            session_unset();

                            ?>

                            <!-- Display This Code if user provide any incorrect value -->
                            <div class="error ">
                              <div class="alert alert-danger d-none" role="alert">
                              </div>
                            </div>
                            <!-- Display This Code if user provide any incorrect value -->

                            <!-- Fecthing Data Animation -->
                            <div class="fetchingData p-3 d-none">
                              <button class="btn bg-green" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                              </button>
                            </div>
                            <!-- Fecthing Data Animation -->
                            <div class="mb-3 form-box d-flex align-items-center p-2">
                                <i class="fa-solid fa-user fs-4 mx-2"></i>
                                <input type="text" name="login_email" id="L_email" placeholder="Enter Your Email">
                            </div>
                            <div class="mb-3 form-box password-eye d-flex align-items-center p-2">
                                <i class="fa-solid fa-lock fs-4 mx-2"></i>
                                <input type="password" name="login_password" id="L_password" placeholder="Enter Your 
Password">
                                <i class="fa-regular fa-eye eye"></i>
                                <i class="fa-solid fa-eye-slash eye d-none"></i>
                            </div>

                            <div class="d-grid">
                                <input type="submit" value="Login" class="btn login-btn " id="loginSubmitbtn">
                            </div>
                        </form>

                        <p class="m-2 text-primary">Forgot Password ?</p>
                    </div>

                    
                </div>


            </div>
        </div>
    </div>

    <div class="container-fluid why_choose  bg-green p-4">
        <div class="tittle w-100 text-center p-4">
            <h1 class="m-0 fs-1">Why Seller Choose TeeBiz ?</h1>
        </div>

        <div class="container-fluid choose_detail p-4">
            <div class="chooseBox  d-flex flex-column justify-content-center align-items-center gap-2 ">
                <div class="icon d-flex justify-content-center align-items-center">
                     <i class="fa-solid fa-money-bill-wave"></i>
                </div>

                <div class="content text-center text-dark">
                    <h3 class="my-2 fs-2 fw-bold">No Registration Fee</h3>
                    <p class="my-3 text-white">Registering as a TeeBiz seller is free - no cost of creating your account or getting your products listed.</p>
                </div>
            </div>
          
            <div class="chooseBox  d-flex flex-column justify-content-center align-items-center gap-2 ">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-truck "></i>
                </div>

                <div class="content text-center text-dark">
                    <h3 class="my-2 fs-2 fw-bold">Sell Across India</h3>
                    <p class="my-3 text-white">Reach crores of customers on Teebiz, India's most visited shopping destination.</p>
                </div>
            </div>
            <div class="chooseBox  d-flex flex-column justify-content-center align-items-center gap-2 ">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                </div>

                <div class="content text-center text-dark">
                    <h3 class="my-2 fs-2 fw-bold">Higher Profits</h3>
                    <p class="my-3 text-white">You keep 100% of the sale price with no charges on both payment gateway or cash on delivery orders on TeeBiz.</p>
                </div>
            </div>
            <div class="chooseBox  d-flex flex-column justify-content-center align-items-center gap-2 ">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>

                <div class="content text-center text-dark">
                    <h3 class="my-2 fs-2 fw-bold">Fast & Regular Payments</h3>
                    <p class="my-3 text-white">Get payments as fast as 7-10 days from the date of dispatch.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid detail_animation p-3">
        <div class="tittle p-3   mb-4">
            <h1 class="">How to Earn Money From Our Website</h1>
        </div>
        <div class="timeline d-flex justify-content-start align-items-center"  data-aos="fade-zoom-in" data-aos-offset="300">


            <div class="containerbox left-container">
                <span></span>
                <div class="text-box">
                    <h2>Step 1</h2>
                    <div class="d-flex justify-content-center align-items-center c_icon my-2">
                        <img src="image/1.png" alt="" srcset="">
                    </div>
                    <p class="fs-3">Register Account</p>
                    <div class="right-container-arrow"></div>
                </div>
            </div>
            <div class="containerbox right-container">
                <span></span>
                <div class="text-box">
                    
                    <h2>Step 2</h2>
                    <div class="d-flex justify-content-center align-items-center c_icon my-2">
                        <img src="image/2.png" alt="" srcset="">
                    </div>
                    <p class="fs-3">Buy Product</p>

                    <div class="left-container-arrow"></div>

                </div>
            </div>
            <div class="containerbox left-container">
                <span></span>
                <div class="text-box">
                    
                    <h2>Step 3</h2>
                    <div class="d-flex justify-content-center align-items-center c_icon my-2">
                        <img src="image/3.png" alt="" srcset="">

                    </div>
                    <p class="fs-3">Add Margin</p>

                    <div class="right-container-arrow"></div>

                </div>
            </div>
            <div class="containerbox right-container">
                <span></span>
                <div class="text-box">
                    <h2>Step 4</h2>
                    <div class="d-flex justify-content-center align-items-center c_icon my-2">
                        <img src="image/4.png" alt="" srcset="">
                    </div>
                    <p class="" style="font-size: 15px;">Margin Amount will be added to the Wallet</p>

                    <div class="left-container-arrow"></div>

                </div>
            </div>
            <div class="containerbox left-container">
                <span></span>
                <div class="text-box">
                    <h2>Step 5</h2>
                    <div class="d-flex justify-content-center align-items-center c_icon my-2">
                        <img src="image/5.png" alt="" srcset="">

                    </div>
                  
                    <p class="fs-3">Bank Withdrawn</p>

                    <div class="right-container-arrow"></div>

                </div>
            </div>
      

        </div>
    </div>

    <div class="container-fluid success_stories bg-green p-3 pt-5">
        <div class="tittle">
            <h1 class="">Seller Success Stories</h1>
        </div>

        <div class="container-fluid p-5 success_box">
            <div class="video_box p-4 bg-white d-flex flex-column  gap-3 justify-content-center align-items-center">
            <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fdhagastoreindia%2Fvideos%2F607541817543059%2F&show_text=false&width=261&t=0" width="98%" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
            
                <div class="profile-logo d-flex justify-content-start gap-3 align-items-center">
                    <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <h3 class="m-0">Pritam</h3>
                        <small class="m-0 text-secondary fs-5">Reseller</small>
                    </div>
                    
                </div>
                <div>
                    <i class="fa-solid fa-quote-left fs-1 text-dark mt-2"></i>
                    <p class="m-0 text-dark">The t-shirt I purchased is comfortable and fits well, though I did notice a small stitching issue after washing it. Despite this minor concern, my overall shopping experience at your store was positive. I appreciate the quality of your products and the smooth checkout process.</p>
                    <i class="fa-solid fa-quote-right fs-1 text-dark float-end"></i>
                </div>
            
            </div>
            <div class="video_box p-4 bg-white d-flex flex-column  gap-3 justify-content-center align-items-center">
                <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fdhagastoreindia%2Fvideos%2F1288743338370807%2F&show_text=false&width=261&t=0" width="98%" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
            
                <div class="profile-logo d-flex justify-content-start gap-3 align-items-center">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1376&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <h3 class="m-0">Shneya Chattarjee</h3>
                        <small class="m-0 text-secondary fs-5">Reseller</small>
                    </div>
                    
                </div>
                <div>
                    <i class="fa-solid fa-quote-left fs-1 text-dark mt-2"></i>
                    <p class="m-0 text-dark">The t-shirt I bought is stylish and comfortable, though I did notice a small stitching problem after washing it. Overall, I had a good shopping experience at your store and appreciate the quality of your products</p>
                    <i class="fa-solid fa-quote-right fs-1 text-dark float-end"></i>
                </div>
            
            </div>
            <div class="video_box p-4 bg-white d-flex flex-column  gap-3 justify-content-center align-items-center">
                <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fdhagastoreindia%2Fvideos%2F212647098106040%2F&show_text=false&width=261&t=0" width="98%" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
            
                <div class="profile-logo d-flex justify-content-start gap-3 align-items-center">
                    <img src="https://media.istockphoto.com/id/871752462/vector/default-gray-placeholder-man.jpg?s=612x612&w=0&k=20&c=4aUt99MQYO4dyo-rPImH2kszYe1EcuROC6f2iMQmn8o=" alt="" srcset="">
                    <div class="d-flex justify-content-start flex-column align-items-start">
                        <h3 class="m-0">RamKrishna Upadhay</h3>
                        <small class="m-0 text-secondary fs-5">Reseller</small>
                    </div>
                    
                </div>
                <div>
                    <i class="fa-solid fa-quote-left fs-1 text-dark mt-2"></i>
                    <p class="m-0 text-dark">The t-shirt I purchased was comfortable and the design was appealing. However, I did notice a minor stitching issue after washing it. Despite this, my overall experience at your store was positive and I appreciate the quality of your products.</p>
                    <i class="fa-solid fa-quote-right fs-1 text-dark float-end"></i>
                </div>
            
            </div>
        </div>
    </div>

    <div class="container-fluid about-us section-3 p-3">
        <div class="heading text-center mb-1 mt-5" data-aos="fade-up" data-aos-offset="300">
            <h3 class="fs-1">Services</h3>
        </div>

        <div class="about-detail">
            <div class="container-fluid">
                <div class="row p-5">
                    <div class="col-7 service-box-container ">
                        <div class="service-box p-3 justify-content-center align-items-center bg-white shadow " data-aos="zoom-in" data-aos-offset="300">
  
                            <div class="animated_icon">
                                <img src="image/Delivery truck.gif" alt="" srcset="">
                            </div>
                            <h3 class="m-0">Fast Delivery</h3>

                    
                        </div>
                        <div class="service-box p-3 justify-content-center align-items-center bg-white shadow" data-aos="zoom-in" data-aos-offset="300" >
                            <div class="animated_icon">
                                <img src="image/shiping.gif" alt="" srcset="">
                            </div>
                            <h3 class="m-0">Easy to Ship</h3>
                      
                        </div>
                        <div class="service-box p-3 justify-content-center align-items-center bg-white shadow" data-aos="zoom-in" data-aos-offset="200">
                        <div class="animated_icon">
                                <img src="image/service.gif" alt="" srcset="">
                            </div>
                            <h3 class="m-0">24 x 7 Support</h3>
                       
                        </div>
                        <div class="service-box p-3 justify-content-center align-items-center bg-white shadow" data-aos="zoom-in" data-aos-offset="200">
                        <div class="animated_icon">
                                <img src="image/return.gif" alt="" srcset="">
                            </div>
                            <h3 class="m-0">Easy to Return</h3>
                       
                        </div>
                    </div>
                    <div class="col-4" data-aos="zoom-in" data-aos-offset="300">
                        <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" srcset="" class="">
                    </div>
                </div>

            
            </div>
        </div>
    </div>

    <?php include 'include_folder/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="homepage javascript/home_index.js?<?=time();?>"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>
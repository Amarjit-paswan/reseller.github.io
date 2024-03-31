<!DOCTYPE html>
<html lang="en">
<head>
    <meta chaadminet="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="homestyle.css?<?=time();?>">
    <link rel="stylesheet" href="../../Responsive_css/admin/admin_index.css?<?=time();?>">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body style="background-color: #4e73df;">
    <nav class="navbar navbar-expand-lg text-white d-flex p-3  custom-navbar ">
        <div class="container d-flex justify-content-between">
        
            <div class="tittle-logo">
                <a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>

          <div class="collapse navbar-collapse w-100 " id="navbarNav">
            <ul class="navbar-nav  ms-auto   d-flex justify-content-around ">
              <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="index.php">Home</a>
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
          </div>
        </div>
    </nav> 

    <div class="container-fluid section-1 p-3 pb-5 d-flex justify-content-center align-items-center" style="height: 87.9vh;">
        <div class="row ">
            <div class="access-form d-flex ">
                <div class="access-img">
                    <img src="https://t3.ftcdn.net/jpg/03/48/55/20/360_F_348552050_uSbrANL65DNj21FbaCeswpM33mat1Wll.jpg" alt="" srcset="">

                </div>
                <div class="form-detail d-flex flex-column justify-content-center bg-white p-3">
<!-- 
                    <div class="tittle text-center p-3 pb-1">
                        <h2>Welcome to Our Website</h2>
                    </div> -->




                    <div class="login-form text-center p-4  ">
                        <h4 class="mb-4">Admin Sign Up</h4>

                        <form action="" autocomplete="off" id="Admin_RegisterDetails">
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

                            <div class="mb-3 form-box d-flex align-items-center p-2">
                                <i class="fa-solid fa-user fs-4 mx-2"></i>
                                <input type="text" name="admin_register_name" id="Admin_name" placeholder="Enter Your Full Name" >
                            </div>

                            <div class="mb-3 form-box d-flex align-items-center p-2">
                                <i class="fa-solid fa-envelope fs-4 mx-2"></i>
                                <input type="text" name="admin_register_email" id="Admin_email" placeholder="Enter Your Email">
                            </div>

                            <div class="mb-3 d-flex justify-content-around fs-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="admin_register_gender" id="flexRadioDefault1" checked value="Male">
                                    <label class="form-check-label" for="flexRadioDefault1" >
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="admin_register_gender" id="flexRadioDefault2" value="Female">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Female
                                    </label>
                                  </div>
                            </div>
                            <div class="mb-3 form-box password-eye showpassword d-flex align-items-center p-2">
                                <i class="fa-solid fa-lock fs-4 mx-2"></i>
                                <input type="password" name="admin_register_password" id="Admin_password" placeholder="Enter Your 
Password">
                                <i class="fa-regular fa-eye eye"></i>
                                <i class="fa-solid fa-eye-slash eye d-none"></i>
                            </div>

                            <div class="mb-3 form-box password-eye confirmPassword d-flex align-items-center p-2">
                                <i class="fa-solid fa-lock fs-4 mx-2"></i>
                                <input type="password" name="" id="AdminConfirm_password" placeholder="Confirm Password">
                                <i class="fa-regular fa-eye eye"></i>
                                <i class="fa-solid fa-eye-slash eye d-none"></i>
                            </div>

                            <div class="d-grid">
                                <input type="submit" value="Sign Up" class="btn login-btn admin_btn" id="admin_submitbtn">
                            </div>
                        </form>

                    </div>


                    
                </div>


            </div>
        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="admin_js.js?<?=time();?>"></script>
    <script src="https://cdn.lordicon.com/lordicon.js<?=time();?>"></script>

</body>
</html>
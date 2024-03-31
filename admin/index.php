
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

    <link rel="stylesheet" href="../css/homestyle.css?<?=time();?>">
    <link rel="stylesheet" href="../Responsive_css/admin/admin_index.css?<?=time();?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css?<?=time();?>" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg text-white d-flex p-3  custom-navbar ">
        <div class="container d-flex justify-content-between">
        
            <div class="tittle-logo">
                <a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>

          <div class="collapse navbar-collapse w-100" id="navbarNav">
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
          </div>
        </div>
    </nav> 

    <div class="container-fluid section-1 p-3 pb-5 d-flex justify-content-center align-items-center vh-100">
        <div class="row ">
            <div class="access-form d-lg-flex ">
                
                <div class="form-detail bg-white p-3">

                    <div class="tittle text-center p-3">
                        <h2>Welcome to Our Website</h2>
                    </div>

        

                    <div class="login-form text-center p-4 ">
                        <h4 class="mb-2">Sign In</h4>

                        <form action="" autocomplete="OFF" id="admin_loginFormDetail">
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
                              <button class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                              </button>
                            </div>
                            <!-- Fecthing Data Animation -->
                            <div class="mb-3 form-box d-flex align-items-center p-2">
                                <i class="fa-solid fa-user fs-4 mx-2"></i>
                                <input type="text" name="admin_login_email" id="admin_L_email" placeholder="Enter Your Email">
                            </div>
                            <div class="mb-3 form-box password-eye d-flex align-items-center p-2">
                                <i class="fa-solid fa-lock fs-4 mx-2"></i>
                                <input type="password" name="admin_login_password" id="admin_L_password" placeholder="Enter Your 
Password">
                                <i class="fa-regular fa-eye eye"></i>
                                <i class="fa-solid fa-eye-slash eye d-none"></i>
                            </div>

                            <div class="d-grid gap-3">
                                <input type="submit" value="Login" class="btn login-btn " id="admin_loginSubmitbtn">

                        <a href="admin_register/admin_register.php" class="button reseller-btn  btn bg-success text-white">Create a Account</a>
                            </div>
                        </form>

                        <p class="m-2 text-primary">Forgot Password ?</p>
                    </div>
             

              

           
                    
                </div>

                


            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="admin_register/admin_js.js?<?=time();?>"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>
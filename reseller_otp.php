<?php 

session_start();

if(isset($_SESSION['Reseller_email'])){

  $email = $_SESSION['Reseller_email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/homestyle.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <div class="container-fluid section-1 p-3 pb-5 d-flex justify-content-center align-items-center" style="height: 89.6vh;">
        <div class="row ">
            <div class="access-form d-flex " style="max-width: 70rem; max-height:30rem;">
                <div class="access-img">
                    <img src="https://media.istockphoto.com/id/1620527146/photo/otp-one-time-password-security-authentication.jpg?s=1024x1024&w=is&k=20&c=j8iPBluzjMuReCW8-yBH-gXcWfrDcGLefOoXsJi1GQ0=" alt="" srcset="" style="height: 100%; ">

                </div>
                <div class="form-detail bg-white p-3" style="min-height: 25rem; max-height:30rem;">
<!-- 
                    <div class="tittle text-center p-3 pb-1">
                        <h2>Welcome to Our Website</h2>
                    </div> -->




                    <div class="login-form text-center p-4 " >
                        <h4 class="mb-4">Verify Email</h4>

                        <form action="" class="">
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
                                <i class="fa-solid fa-envelope fs-4 mx-2"></i>
                                <input type="text" name="" id="" placeholder="Email" 
                                value="<?php if(!empty($email)){ echo $email;} ?>" readonly>
                            </div>

                            <div class="mb-3 form-box d-flex align-items-center p-2">
                                <i class="fa-solid fa-lock fs-4 mx-2"></i>
                                <input type="text" name="" id="Register_otp" placeholder="OTP">
                            </div>

                            <div class="d-grid mb-3">
                                <input type="submit" value="Verify Email" class="btn login-btn " id="Reseller_otpbtn">
                            </div>

                            <div class="d-grid">
                                <input type="submit" value="Back to Register Form" class="btn cng-email btn-secondary " id="changeEmailbtn">
                            </div>
                        </form>

                    </div>

                    
                    
                </div>


            </div>
        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="homepage javascript/reseller_otp.js?<?=time();?>"></script>


</body>
</html>
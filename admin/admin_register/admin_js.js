 $(document).ready(function(){
        
        // Enter Only Digits
        $('#admin_otp').on('input',function(){
            let registeOTP = $(this).val();
            registeOTP = registeOTP.replace(/\D/g,'');
            registeOTP = registeOTP.slice(0,6);
            $(this).val(registeOTP);
        })
        // Enter Only Digits ----


        // Password Show/Hide Code Start here 
        $('.showpassword .eye').on('click',function(){
            if($('#Admin_password').attr('type') == 'password'){
                $('#Admin_password').attr('type','text');
                $(' .showpassword .fa-eye').addClass('d-none');
                $(' .showpassword .fa-eye-slash').removeClass('d-none');
            }else{
                $('#Admin_password').attr('type','password');
                $(' .showpassword .fa-eye-slash').addClass('d-none');
                $(' .showpassword .fa-eye').removeClass('d-none');
            }
        })
    
        $('.confirmPassword .eye').on('click',function(){
            if($('#AdminConfirm_password').attr('type') == 'password'){
                $('#AdminConfirm_password').attr('type','text');
                $(' .confirmPassword .fa-eye').addClass('d-none');
                $(' .confirmPassword .fa-eye-slash').removeClass('d-none');
            }else{
                $('#AdminConfirm_password').attr('type','password');
                $(' .confirmPassword .fa-eye-slash').addClass('d-none');
                $(' .confirmPassword .fa-eye').removeClass('d-none');
            }
        })
        // Password Show/Hide Code Start End ------------------------
    
    $('.admin_btn').click(function(e){

        e.preventDefault(); // Prevent the default form submissione.preventDefault();
        console.log('d');

        let name = $('#Admin_name').val();
        let email = $('#Admin_email').val();
        let password = $('#Admin_password').val();
        let conf_password = $('#AdminConfirm_password').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let adminForm = new FormData($('#Admin_RegisterDetails')[0]);
        adminForm.append('action','admin_register');


        if(name === '' || email === '' || password === '' || conf_password === ''){
            $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');
        }else if(name.length < 4){
            $('.alert-danger').html('Name Must be more than four characters').removeClass('d-none').hide().fadeIn('slow');

        }else if(!emailRegex.test(email)){
            $('.alert-danger').html('Provide Valid Email').removeClass('d-none').hide().fadeIn('slow');

        }else if(password.length < 6){
            $('.alert-danger').html('Password Must be more than Six characters').removeClass('d-none').hide().fadeIn('slow');

        }else if(password != conf_password){
            $('.alert-danger').html('Password are not matched').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'backend/action.php',
                type:'POST',
                beforeSend:function(){
                    $('.alert-danger').addClass('d-none');
                    $('.fetchingData').removeClass('d-none');
                },
                data:adminForm,
                contentType:false,
                processData:false,
                success:function(res){
                    // window.location.href = 'backend/database.php';
                    console.log(res);
                    if(res == 'email exists'){
                        $('.fetchingData').addClass('d-none');
                        $('.alert-danger').html('Email already Exists').removeClass('d-none').hide().fadeIn('slow');
                    }else{
                        window.location.href = "reseller_otp.php";
                    }
                  
                }
            })
        }
    
    })

    $('#admin_otpbtn').click(function(e){
        e.preventDefault();

        console.log('dsfs');

        let otp = $('#admin_otp').val();

        if(otp === ''){
            $('.alert-danger').html('Kindly Fill the OTP').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'backend/action.php',
                type:'POST',
                data:{admin_otp:otp,action:'admin_otpCheck'},
                success:function(res){
                    if(res == 'admin_otpfailed'){
                        $('.alert-danger').html('Provide Correct OTP').removeClass('d-none').hide().fadeIn('slow');
                    }else{
                        window.location.href = "../index.php";
                    }
                }
            })
        }
    })

    $('#admin_loginSubmitbtn').click(function(e){
        e.preventDefault();

        let admin_login = $('#admin_L_email').val();
        let admin_password = $('#admin_L_password').val();
        let admin_login_form = new FormData($('#admin_loginFormDetail')[0]);
        admin_login_form.append('action','admin_login');

        if(admin_login == '' || admin_password == ''){
            $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'admin_register/backend/action.php',
                type:'POST',
                data:admin_login_form,
                contentType:false,
                processData:false,
                success:function(res){
                    if(res == 'user_match'){
                        window.location.href = "./super_admin_index.php";
                    }
                }
            })
        }

    })


 })
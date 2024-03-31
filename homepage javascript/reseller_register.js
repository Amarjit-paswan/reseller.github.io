$(document).ready(function(){
    $('.form-box input').on('focus', function(){
        $(this).parent('.form-box').addClass('active');
    });

    $('.form-box input').on('blur', function(){
        $(this).parent('.form-box').removeClass('active');
    });


    // Password Show/Hide Code Start here 
    $('.showpassword .eye').on('click',function(){
        if($('#Reseller_password').attr('type') == 'password'){
            $('#Reseller_password').attr('type','text');
            $(' .showpassword .fa-eye').addClass('d-none');
            $(' .showpassword .fa-eye-slash').removeClass('d-none');
        }else{
            $('#Reseller_password').attr('type','password');
            $(' .showpassword .fa-eye-slash').addClass('d-none');
            $(' .showpassword .fa-eye').removeClass('d-none');
        }
    })

    $('.confirmPassword .eye').on('click',function(){
        if($('#ResellerConfirm_password').attr('type') == 'password'){
            $('#ResellerConfirm_password').attr('type','text');
            $(' .confirmPassword .fa-eye').addClass('d-none');
            $(' .confirmPassword .fa-eye-slash').removeClass('d-none');
        }else{
            $('#ResellerConfirm_password').attr('type','password');
            $(' .confirmPassword .fa-eye-slash').addClass('d-none');
            $(' .confirmPassword .fa-eye').removeClass('d-none');
        }
    })
    // Password Show/Hide Code Start End ------------------------

    // Reseller User Resgister Code Start here



    // Check Form is Fillup or not
    $('#Reseller_submitbtn').click(function(e){

        e.preventDefault();

        // Reseller data store from input fields
        let Reseller_name = $('#Reseller_name').val();
        let Reseller_email = $('#Reseller_email').val();
        let Reseller_password = $('#Reseller_password').val();
        let Reseller_confirmPassword = $('#ResellerConfirm_password').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let Reseller_registerDetail = new FormData($('#Reseller_RegisterDetails')[0]);
        Reseller_registerDetail.append('action','RegisterDetail');
        // Reseller data store from input fields --

        if(Reseller_name === '' || Reseller_email === '' || Reseller_password === '' || Reseller_confirmPassword === ''){
            $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');

        }else if(Reseller_name.length < 4){
            $('.alert-danger').html('Name Must be more than four characters').removeClass('d-none').hide().fadeIn('slow');

        }else if(!emailRegex.test(Reseller_email)){
            $('.alert-danger').html('Provide Valid Email').removeClass('d-none').hide().fadeIn('slow');

        }else if(Reseller_password.length < 6){
            $('.alert-danger').html('Password Must be more than Six characters').removeClass('d-none').hide().fadeIn('slow');

        }else if(Reseller_password != Reseller_confirmPassword){
            $('.alert-danger').html('Password are not matched').removeClass('d-none').hide().fadeIn('slow');
        }else{
            
            $.ajax({
                url:'./backend/reseller_register/action.php',
                type:'POST',
                data:Reseller_registerDetail,
                contentType:false,
                processData:false,
                beforeSend: function(){
                    $('.alert-danger').addClass('d-none');
                    $('.fetchingData').removeClass('d-none');
                },
                success:function(res){
                    if(res == 'emailExists'){
                        $('.fetchingData').addClass('d-none');
                        $('.alert-danger').html('Email already Exists').removeClass('d-none').hide().fadeIn('slow');

                    }else{
                        window.location.href = './reseller_otp.php';
                        $('.alert-danger').addClass('d-none');
                        $('.fetchingData').addClass('d-none');

                    }
                }
            })
            // window.location.href = "reseller_otp.php";
        }
    })

    // Check Form is Fillup or not --


    // Reseller User Resgister Code End -------------------------

})
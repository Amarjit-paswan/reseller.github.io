$(document).ready(function(){

    // Enter Only Digits
    $('#Register_otp').on('input',function(){
        let registeOTP = $(this).val();
        registeOTP = registeOTP.replace(/\D/g,'');
        registeOTP = registeOTP.slice(0,6);
        $(this).val(registeOTP);
    })
    // Enter Only Digits ----

    $('#changeEmailbtn').click(function(e){
        e.preventDefault();
        window.location.href = "./reseller_register.php";
    })

    $('#Reseller_otpbtn').click(function(e){
        e.preventDefault(); // Prevent default form submission behavior
        let Register_otp = $('#Register_otp').val();
    
        if(Register_otp === ''){
            $('.alert-danger').html('Please Enter OTP').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $('.alert-danger').addClass('d-none');
            $.ajax({
                url:'./backend/reseller_register/action.php',
                type:'POST',
                data:{RegisterOTP:Register_otp, action:'otpSubmit'},
                beforeSend:function(){
                    $('.alert-danger').addClass('d-none');
                    $('.fetchingData').removeClass('d-none');
                },
                success:function(res){
                    if(res == 'dataInsert'){
                        window.location.href = './index.php';
                    }else if(res == 'otpfailed'){
                        $('.fetchingData').addClass('d-none');
                        $('.alert-danger').html('Enter Valid OTP').removeClass('d-none').hide().fadeIn('slow');
                    }
                }
            })
        }

    })

})
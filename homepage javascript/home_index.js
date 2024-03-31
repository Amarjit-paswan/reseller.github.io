$(document).ready(function(){

    // Responsive sidebar
    $('.sidebar-icon').click(function(){
        $('.sidebar').removeClass('d-none');
    })

    $('.form-box input').on('focus', function(){
        $(this).parent('.form-box').addClass('active');
    });

    $('.form-box input').on('blur', function(){
        $(this).parent('.form-box').removeClass('active');
    });

    // Password Show/Hide Function Start
    $('.eye').on('click',function(){
        console.log('click');
        if($('#L_password').attr('type') == 'password'){
            $('#L_password').attr('type','text');
            $('.fa-eye').addClass('d-none');
            $('.fa-eye-slash').removeClass('d-none');
        }else{
            $('#L_password').attr('type','password');
            $('.fa-eye-slash').addClass('d-none');
            $('.fa-eye').removeClass('d-none');
        }
    })

    // Password Show/Hide Function End

    $('#loginSubmitbtn').click(function(e){
        e.preventDefault();

        let loginEmail = $('#L_email').val();
        let loginPassword = $('#L_password').val();
        let loginForm = new FormData($('#loginFormDetail')[0]);
        loginForm.append('action','loginForm');

        if(loginEmail === '' || loginPassword === ''){
                $('.alert-success').addClass('d-none');
                $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'./backend/reseller_register/action.php',
                type:'POST',
                data:loginForm,
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $('.alert-success').addClass('d-none');
                    $('.fetchingData').removeClass('d-none');
                },
                success:function(res){
                    if(res == 'login Success'){
                        window.location.href = 'product_page/user_collection.php';
                    }else{
                        $('.alert-success').addClass('d-none');
                        $('.fetchingData').addClass('d-none');
                        $('.alert-danger').html('Invalid Email or Password').removeClass('d-none').hide().fadeIn('slow');

                    }
                }
            })
        }
    })

     // Select the 4th .containerbox element
     var containerBox4 = $('.containerbox:nth-child(3)');
    
     // Add an event listener for animation end on the 4th containerbox
     containerBox4.on('animationend webkitAnimationEnd oAnimationEnd', function() {
         // Scroll .detail_animation horizontally by 500px
         $('.detail_animation').animate({
             scrollLeft: '+=1200px'
         }, 1000); 

         
     });

     
     function updateTimelineContent() {
        
        const originalContent = document.querySelector('.timeline').innerHTML;
        document.querySelector('.timeline').innerHTML = originalContent; // Reset to original content

        $('.detail_animation')
    
    }

    // Call updateTimelineContent initially when the page loads
    // updateTimelineContent();

    // Reload timeline content every 10 seconds (10000 milliseconds)
    setInterval(updateTimelineContent, 6000);
     
});

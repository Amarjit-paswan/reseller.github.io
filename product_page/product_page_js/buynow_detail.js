$(document).ready(function(){

    $('#buynowSubmit_btn').click(function(e){

        e.preventDefault();

        let user_fname = $('#user_fname').val();
        let user_lname = $('#user_lname').val();
        let user_address = $('#user_address').val();
        let user_landmark = $('#user_landmark').val();
        let user_city = $('#user_city').val();
        let user_state = $('#user_state').val();
        let user_zip = $('#user_zip').val();
        let user_contact = $('#user_contact').val();

        let addOrderForm = new FormData($('#addOrder')[0]);
        addOrderForm.append('action','addAddress');

        if(user_fname === '' || user_lname === '' || user_address === '' || user_landmark === '' || user_city === '' || user_state === '' || user_zip === '' || user_contact === ''){
            $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');
        }else{
            $('#payment_method').modal('show');
          
            $('.payment_optionBtn').click(function(e){
                e.preventDefault();

                if($('#payment').is(':checked')){
                    $.ajax({
                        url:'../backend/reseller_register/action.php',
                        type:'POST',
                        data:addOrderForm,
                        contentType:false,
                        processData:false,
                        success:function(res){
                            if(res == 'order add'){
                                $('#payment_method').modal('hide');
                                $('.method_error').removeClass('alert-success').addClass('d-none');
                                $('.alert').removeClass('alert-danger d-none');
                                $('.alert').addClass('alert-success');
                                $('.alert').html('Order Successfully');
                                $('#addOrder').trigger('reset');
                            }
                            console.log(res);
                        }
                    })
                }else{
                    $('.method_error').html('Select Payment Method').removeClass('d-none').hide().fadeIn('slow');
                }
 
            })
                

         
        }

    })

    $('#payment').change(function() {
        if ($(this).is(':checked')) {
            $('.p_method').addClass('bg-primary text-white');
            $('.method_error').addClass('d-none');
        } else {
            $('.p_method').removeClass('bg-primary text-white'); // Reset background color if unchecked
        }
    });

    $('.p_method').click(function() {
        if ($('#payment').is(':checked')) {
            $('#payment').prop('checked', false).change();
        } else {
            $('#payment').prop('checked', true).change();
        }
    });
    

  
})
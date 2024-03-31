$(document).ready(function(){
    $('.withdrawn_btn').click(function(e){
        e.preventDefault();

        let withdrawn_ammount = $('#withdrawn-amount').val();
        let wallent_balance = parseFloat($('.wallent_balance').text());

        console.log(wallent_balance);

        if(withdrawn_ammount === ''){
            $('.alert-danger').addClass('d-none');
            $('.alert-danger').html('Please Enter Withdrawn amount').removeClass('d-none').hide().fadeIn('slow');
        }else if(withdrawn_ammount > wallent_balance){
            $('.alert-danger').addClass('d-none');
            $('.alert-danger').html("You Don't have Balance").removeClass('d-none').hide().fadeIn('slow');
        }else if(withdrawn_ammount < 100){
            $('.alert-danger').addClass('d-none');
            $('.alert-danger').html("You Can Withdrawn minimum 500 amount").removeClass('d-none').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'../backend/my_wallet/action.php',
                type:'POST',
                data:{WithdrawnAmmount:withdrawn_ammount, action:'amount_withdrawn'},
                success:function(res){
                    console.log(res);
                    if(res == 'request sent'){
                        $('.alert-danger').addClass('d-none');
                        $('.alert-success').html('Amount Request sent successfully').removeClass('d-none');
                        $('#withdrawn-amount').val('');
                    }
                }
            })
        }
    })

    $('.select-amount-price button').click(function(){
    
       let amount = parseFloat($(this).find('.button').text());

        $('#withdrawn-amount').val(amount);
    })

    let withdrawn_status = $('.status').text(); // Use .text() instead of .html()
    console.log(withdrawn_status);

 
})
$(document).ready(function(){

    $('#bankHolder_name').on('input', function() {
        let Holder_name_value = $(this).val();
        Holder_name_value = Holder_name_value.replace(/[^A-Za-z\s]/g, ''); // Allow alphabetic characters and space
        Holder_name_value = Holder_name_value.toUpperCase();
        $(this).val(Holder_name_value);
    });

    $('#bankAccount_num').on('input', function(){
        let accountNumber = $(this).val();
        accountNumber = accountNumber.replace(/\D/g,'');
        $(this).val(accountNumber);
    })

    $('#bank_ifsc,#bank_name').on('input',function(){
        let ifscValue = $(this).val();
        ifscValue = ifscValue.toUpperCase();
        $(this).val(ifscValue)
    })


    $('#bank_ifsc').on('input',function(){
        let ifscValue = $(this).val();

        if(ifscValue.length > 10){
            $.ajax({
                url:'../backend/bank_detail/action.php',
                type:'POST',
                data:{IFSC:ifscValue, action:'ifsc_Code'},
                success:function(res){
                    if(res == 'invalid ifsc'){
                        $('.fetching_bankdetail').addClass('d-none');
                        $('.alert-danger').html('IFSC Code is Invalid').removeClass('d-none');
                        $('#bank_name').val('');
                    }else{
                        $('.fetching_bankdetail').addClass('d-none');
                        $('.alert-danger').addClass('d-none');
                        $('#bank_name').val(res.toUpperCase());
                        console.log(res);
                    }
                }
            })
        }
    })

    $('.bankSubmit_btn').click(function(e){
        e.preventDefault();
        let holderName = $('#bankHolder_name').val();
        let accountNumb = $('#bankAccount_num').val();
        let ifsc = $('#bank_ifsc').val();
        let bank_name = $('#bank_name').val();

        let bankForm = new FormData($('#bankDetailForm')[0]);
        bankForm.append('action','bank_detail');


        if(holderName === '' || accountNumb === '' || ifsc === '' || bank_name === ''){
            $('.alert-danger').removeClass('d-none').html('All Fields are Require').hide().fadeIn('slow');
        }else{
            $.ajax({
                url:'../backend/bank_detail/action.php',
                type:'POST',
                data: bankForm,
                contentType:false,
                processData:false,
                success:function(res){
                    console.log(res);
                }
            })
        }
    })
})
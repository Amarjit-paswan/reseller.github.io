$(document).ready(function(){
    $('.card-image').click(function(){
        let selectProductID = $(this).attr('data-productUniquerid');
        let selectProductImage = $(this).find('.card-image img').attr('src');
        let selectProductName =  $(this).attr('data-productName');

  
        window.location.href = './select_productDetail.php?productID=' + selectProductID ;
    })

    $('body').on('click','.fa-square-whatsapp',function(e){
        e.preventDefault();
        let selectProductName = $(this).data('productname');
        let selectProductPrice = $(this).data('productprice');
        let selectProductImg = $(this).data('productimg');
        let selectDescripaotn = $(this).data('descripation');
        $('#selectProductDetail_modal').modal('show');
        $('.modal-body p').text(selectProductName);
        $('.modal-body .descripaton').text(selectDescripaotn);
        $('.modal .modalselectprice').val(selectProductPrice);
        $('.modal .modalselectprice').attr('min',selectProductPrice);
        $('.modal-body img').attr('src','../admin/admin_backend/uploads/'+selectProductImg);

        $('.minus').off('click').on('click',function(){
            let currentValue = parseInt($('.modalselectprice').val());
            if(currentValue <= selectProductPrice){

                $('.modalselectprice').val(currentValue);
            }else{
                $('.modalselectprice').val(currentValue - 1);

            }
            
        })

        $('.modalselectprice').on('blur',function(){
            let price = $(this).val();
            if(price < selectProductPrice){
                $(this).val(selectProductPrice);
            }
        })

        $('.sendProductDetail_btn').click(function(){
            let priceselect = $('.modalselectprice').val();
            let message = `Check out this product:\n`;
            message += `Name: ${selectProductName}\n`;
            message += `Price: ${priceselect}\n`;
            message += `Descripaton: ${selectDescripaotn}\n`;



            let encode_Message = encodeURIComponent(message);

            let whatsappLink = `https://wa.me/?text=${encode_Message}`;

            window.open(whatsappLink,'_blank');
        })
    })

    $('.add').off('click').on('click',function(){
        let currentValue = parseInt($('.modalselectprice').val());
        $('.modalselectprice').val(currentValue + 1);
    })






})
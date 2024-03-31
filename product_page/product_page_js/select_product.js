$(document).ready(function(){
    $('.yes-resell').click(function(e){
        e.preventDefault();
        $('.no-resell').removeClass('bg-green').addClass('btn-light');
        $(this).removeClass('btn-light').addClass('bg-green');
        $('.add-margin').removeClass('d-none');
        $('.profit-price').text('₹0');

    })

    $('.no-resell').click(function(e){
        e.preventDefault();
        let totalqnty = parseInt($('.selectproductqnty').val());
        let originalPrice = parseFloat($('.original-price').text());
        let delivery_price = parseFloat($('.delivery-fee').text());
        let totalPrice_qnty = (totalqnty * originalPrice);
        let grandTotal = (totalPrice_qnty + delivery_price);

        $('.yes-resell').removeClass('bg-green').addClass('btn-light');
        $('.price-edit').val('');
        $('.totalPrice').html(`${grandTotal}`);
        $('.pr_qunatity').html(`(${originalPrice} x ${totalqnty}) = ₹${totalPrice_qnty}/-`);

        $(this).removeClass('btn-light').addClass('bg-green');
        $('.add-margin').addClass('d-none');
    })

    $('#buynow_modal').on('show.bs.modal', function (event) {
        let totalqnty = parseInt($('.selectproductqnty').val());
        let originalPrice = parseFloat($('.original-price').text());
        let delivery_price = parseFloat($('.delivery-fee').text());
        let totalPrice_qnty = (totalqnty * originalPrice);
        let grandTotal = (totalPrice_qnty + delivery_price);
        let product_size = $('.size-btn button.s_slt').text();
        let container_selectImg = $('.container_selectImg').attr('src');

        $('.select_productImg').attr('src', container_selectImg);
        $('.qnty_no').text(totalqnty);
        $('.pr_qunatity').html(`(${originalPrice} x ${totalqnty}) = ₹${totalPrice_qnty}/-`);
        $('.totalPrice').html(`${grandTotal}`);
        $('.product_size').html(product_size);


        console.log(container_selectImg);
    });

    let originalPrice = parseFloat($('.original-price').text());
    let delivery_price = parseFloat($('.delivery-fee').text());
    $('.totalPrice').html("₹"+ (delivery_price + originalPrice));


    $('.price-edit').on('input',function(){
        let originalPrice = parseFloat($('.original-price').text());
        let editprice = parseFloat($(this).val());
        let delivery_price = parseFloat($('.delivery-fee').text());
        let totalqnty = parseInt($('.selectproductqnty').val());
        let totalPrice_qnty = (totalqnty * editprice);


        if(!isNaN(originalPrice) && !isNaN(editprice)){

            if(editprice > originalPrice){
                let margin = editprice - originalPrice;
                console.log(margin);
                $('.profit-price').text(margin);
                let product_price = $('.product_price1').text();
                console.log(product_price);
                $('.pr_qunatity').html(`(${editprice} x ${totalqnty}) = ₹${totalPrice_qnty}/-`);

                let totalPrice = "₹" + ( delivery_price + totalPrice_qnty);
                $('.totalPrice').html(totalPrice);
        // $('.pr_price').text('₹' + $(this).val() + "/-");

            }else{
            let totalPrice_qnty1 = (totalqnty * originalPrice);

                $('.profit-price').text('0');
                $('.totalPrice').html('₹'+ (delivery_price + totalPrice_qnty1))
                $('.pr_price').text('₹' + originalPrice + "/-");
                $('.pr_qunatity').html(`(${originalPrice} x ${totalqnty}) = ₹${totalPrice_qnty1}/-`);


            }
        }

    })


        // quantity show in modal start
      
        // $('.qnty_no').text(totalqnty);
        // quantity show in modal end ----

    $('.continue-btn').click(function(e){
        e.preventDefault();
        let ed_productImg = $('.ed_productImg').attr('src');
        let ed_productName = $('.ed_productname').text();
        let ed_productPrice = $('.ed_totalPrice').text();
        let ed_orginalPrice = parseFloat($('.ed_orginalPrice').text());
        let ed_productQuantity = $('.ed_productquantity').text();
        let ed_productSize = $('.ed_productsize').text();
        let ed_margin = parseFloat($('.profit-price').text());
        let deliveryPrice = $('.delivery-fee').text();

        let encodedImg = encodeURIComponent(ed_productImg);
        let encodedName = encodeURIComponent(ed_productName);
        let encodedPrice = encodeURIComponent(ed_productPrice);
        let encodedQuantity = encodeURIComponent(ed_productQuantity);
        let encodedSize = encodeURIComponent(ed_productSize);
        let encodedDelivery = encodeURIComponent(deliveryPrice);

        // console.log(( ed_margin + ed_orginalPrice));
    
        // Redirect to buynow_detail.php with the variables in the URL
        window.location.href = `./buynow_detail.php?img=${encodedImg}&name=${encodedName}&price=${( ed_margin + ed_orginalPrice)}&quantity=${encodedQuantity}&size=${encodedSize}&delivery=${encodedDelivery}&originalPrice=${ed_orginalPrice}`;

        // window.location.href = './buynow_detail.php';

        // window.location.href = "./buynow_detail.php";
    })

    $('.selectproductqnty').on('blur',function(){
        let qnty = $(this).val();
        if(qnty < 1){

            $('.selectproductqnty').val(1);
        }
    })

    $('.minus').click(function(e){
        // e.preventDefault();
        let qntyInput = $(this).next('.selectproductqnty');
        let qntyValue = parseInt(qntyInput.val());

        if(!isNaN(qntyValue)){
            if(qntyValue <= 1){
            qntyInput.val(1);

            }else{

                qntyInput.val(qntyValue - 1);
            }
        }else{
            qntyInput.val(1);
        }
    })

    $('.plus').click(function(e){
        e.preventDefault();
     
        let qntyInput = $(this).prev('.selectproductqnty');
        let qntyValue = parseInt(qntyInput.val());
        $('.hselect_prodouct_qnty').html(5);

        if(!isNaN(qntyValue)){
            qntyInput.val(qntyValue + 1);
        }else{
            qntyInput.val(1);
        }
        console.log(qntyValue);
    })

    // size button click starts
    $('.size-btn button').click(function(){
        $('.size-btn button').removeClass('s_slt');
        $(this).addClass('s_slt');
        console.log($(this).text());
    })
    // size button click end ------------------


    $('.image-typeBox').click(function(e){
        e.preventDefault();
        $('.image-typeBox').removeClass('border border-primary');
        $(this).addClass('border border-primary');
        let imgtypebox = $(this).find('img').attr('src');

        $('.container_selectImg').attr('src',imgtypebox);
        console.log(imgtypebox);
    })


    // Selected Variants Image 
    $('body').on('click','.variants-box',function(){
        let selectVimg = $(this).data('vrid');
        $('.variants-box').removeClass('border-primary');
        $(this).addClass('border-primary');


        $.ajax({
            url:'../backend/reseller_userindex/action.php',
            type:'POST',
            data:{vr_selectID:selectVimg, action:'select_variant'},
            success:function(res){
                console.log(res);
                let data = JSON.parse(res);
                let sellPrice = parseFloat(data.sell_price);
                let comparePrice = parseFloat(data.compare_price);
                let discount = ((comparePrice - sellPrice) / comparePrice) * 100;
                console.log(data);
                
                $('.container_selectImg').attr('src','../admin/admin_backend/uploads/'+ data.vr_product_image);
                $('.vr_sellPrice').html('₹'+sellPrice);
                $('.vr_comparePrice').html('₹'+comparePrice );
                $('.discount_off').html(`₹ ${discount.toFixed(0)}% OFF`);
                $('.ed_orginalPrice').html(sellPrice);
            }

        })
        console.log(selectVimg);

    })


    $('#downlaodimage_btn').on('click',function(){
        let checkImage = $('.download_checkbox:checked');

        if(checkImage.length === 0){
            alert('slect iamge');
            return;
        }

        checkImage.each(function(index, checkbox){
            let imageUrl ="../admin/admin_backend/uploads/"+ $(checkbox).val();
            console.log(imageUrl);
            let filename = imageUrl.substring(imageUrl.lastIndexOf('/')+1)
            downloadImage(imageUrl, filename);
        });
    })

    function downloadImage(url, name){
        let a = document.createElement('a');
        console.log(name);
        a.href = url;
        a.download = name;
        document.body.appendChild(a);
        a.click();
        $(a).remove();
        $('.download_checkbox:checked').prop('checked', false);
        $('#DownloadImageModal').modal('hide');
    }
})

$(document).ready(function(){




    $('.addmoreImg').click(function(e){
        e.preventDefault();

        $('#product_image').click();
    })

    // $('#product_image').change(function(){
    //     $('.imagepreview').empty(); // Clear existing images
        
    //     // Loop through selected files
    //     for (let i = 0; i < this.files.length; i++) {
    //         let reader = new FileReader();
            
    //         // Closure to capture the file information.
    //         reader.onload = (function(file) {
    //             return function(e) {
    //                 // Create img element
    //                 let img = $('<img>').addClass('preview-image').attr('src', e.target.result);
    //                 // Append img element to container
    //                 $('.imagepreview').append(img);
              

    //             };
    //         })(this.files[i]);
    //         localStorage.setItem('imges',this.files[i]);
            
    //         // Read in the image file as a data URL.
    //         reader.readAsDataURL(this.files[i]);
    //     }
    // });

    $('#productAdd_btn').click(function(e){
        e.preventDefault();
        let product_tittle = $('#product_tittle').val();
        let product_descripation = $('#product_descripation').val();
        let product_sellPrice = $('#product_sellPrice').val();
        let product_comparePrice = $('#product_comparePrice').val();
        let product_qnty = $('#product_quantity').val();
        let allimg = $('.allimg').val();
        // let allimg1 = $('.allimg1').val();

        let productDetail = new FormData($('#ProductAdd_Details')[0]);
        productDetail.append('action','addProduct');

        let allFilesSelected = true;
        $('input[name="product_images[]"]').each(function() {
            if ($(this).get(0).files.length === 0) {
                allFilesSelected = false;
                return false; // Exit the loop if any field is empty
            }
        });

        if(product_tittle === '' || product_descripation === '' || product_sellPrice === '' || product_comparePrice === '' || product_qnty === '' || allimg === ''){
            $('.alert-danger').html('All Fields are Require').removeClass('d-none').hide().fadeIn('slow');
        }else if(!allFilesSelected){
            $('.alert-danger').html('Please select All image.').removeClass('d-none').hide().fadeIn('slow');
        } else{
            $.ajax({
                url:'./admin_backend/action.php',
                type:'POST',
                data:productDetail,
                contentType:false,
                processData:false,
                success:function(res){
                    if(res == 'Product added successfully!'){
                        $('.alert-danger').addClass('d-none');
                        $('#ProductAdd_Details').trigger('reset');
                        $('.alert-success').html('Product Added Successfully!').removeClass('d-none').hide().fadeIn('slow');
                    }else{
                        $('.alert-danger').html('Something Invalid').removeClass('d-none').hide().fadeIn('slow');
                    }
                    console.log(res);
                }
            })
        }
    
      
    })

    function remove_image(id){
        console.log(id);
        $('#add_image_box_'+id).remove();;
       }
    

    let total_image = 1;
    $('.add_more_image').click(function(){
        total_image++;
        let html = '<div class="col-5" id="add_image_box_'+total_image+'"><div class="row "><div class="col-12 d-flex flex-column jusity-content-center gap-2 border border-secondary rounded my-2 p-2 align-items-center"><input type="file" name="product_images[]" accept="image/*"  class="form-control allimg1" required><div class=" "><button class="btn btn-danger mx-3 removebox" type="button" data-removeid="'+total_image+'">Remove</button><button class="btn btn-primary uploadimgbtn" type = "button" data-uploadid="'+total_image+'">Upload Images</button></div></div></div></div>';

        $('.addimagebutton_container').prepend(html);
    })



    let total_attribute = 1;
    $('.add-attribute').click(function(){
        total_attribute++;
        let attribute_html = `<div class="col-lg-3 col-md-3 col-12 px-2 ">
                <label for="" class="form-label">Sell Price</label>
                <input type="number" name="Product_sellPrice[]" id="product_sellPrice" class="form-control"
                placeholder="Sell Price">
            </div>
            <div class="col-lg-2 col-md-2 col-12 px-2 ">
                <label for="" class="form-label">Compare Price</label>
                <input type="number" name="Product_comparePrice[]" id="product_comparePrice" class="form-control"
                placeholder="Compare Price">
            </div>
            <div class="col-lg-2 col-md-2 col-12 px-2 ">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="Product_quantity[]" id="product_quantity" class="form-control" placeholder="Quantity">
            </div>

            <div class="col-lg-2 col-md-2 col-12 px-2 ">
                <label for="" class="form-label">Size</label>
                <select name="sizes[]" id="" class="form-select">
                    <option value="1">S</option>
                    <option value="2">M</option>
                    <option value="3">L</option>
                    <option value="4">XL</option>

                </select>
            </div>

            <div class="col-lg-2 col-md-2 col-12 px-2 d-flex align-items-end">

                        <button type="button" class="btn btn-danger remove-attribute">Remove</button>
            </div>`;

            $('.addAttribute-container1').prepend(attribute_html);
    })


    let variants_id = 1;
    $('.add-variants-btn').click(function(){
        variants_id++;
        let variants_html = `    <div class="add-variatnbox my-3">
                                            
        <div class="mb-3 row  d-flex gap-4 justify-content-start">
            <div class="col-lg-3 col-md-3 col-12 px-2 ">
                <label for="" class="form-label">Sell Price</label>
                <input type="number" name="Product_sellPrice[]" id="product_sellPrice" class="form-control"
                placeholder="Sell Price">
            </div>
            <div class="col-lg-3 col-md-3 col-12 px-2 ">
                <label for="" class="form-label">Compare Price</label>
                <input type="number" name="Product_comparePrice[]" id="product_comparePrice" class="form-control"
                placeholder="Compare Price">
            </div>
            <div class="col-lg-3 col-md-3 col-12 px-2 ">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="Product_quantity[]" id="product_quantity" class="form-control" placeholder="Quantity">
            </div>

            <div class="col-lg-2 col-md-2 col-12 px-2 ">
                <label for="" class="form-label">Size</label>
                <select name="sizes[]" id="" class="form-select">
                    <option value="1">S</option>
                    <option value="2">M</option>
                    <option value="3">L</option>
                    <option value="4">XL</option>

                </select>
            </div>


            <div class="row  addAttribute-container d-flex gap-4 justify-content-start">

            </div>
    
        </div>

        <div class="mb-3 px-2">
            <div class="form-label">Add Product Images</div>
            <div class="row d-flex justify-content-between">
                <div class="col-lg-9 col-md-9 col-12 px-1">
                    <input type="file" name="variant_image[]" id="product_image${variants_id}" accept="image/*" class="form-control allimg "  >
                </div>
                <div class="col-lg-3 col-md-3 col-12 p-0">
                    <button class="btn btn-primary addmoreImg1" type = "button" data-variantsid ="${variants_id}">Upload Images</button>
                    
                </div>
                <div class="imagepreview"></div>
                <div class="row my-2 addimagebutton_container1 d-flex justify-content-between  align-items-center">
                
                </div>
            </div>
        </div>
    </div>`;

    $('.add-variatns-container ').append(variants_html);
    })

    $('body').on('click', '.add_more_image1', function(){
        console.log('ddsd');
        total_image++;
        let addmoreID = $(this).data('addmorevr');
        let html = '<div class="col-lg-5 col-md-5 col-12" id="add_image_box1_'+total_image+'"><div class="row "><div class="col-12 d-flex flex-column jusity-content-center gap-2 border border-secondary rounded my-2 p-2 align-items-center"><input type="file" name="product_imagess[]" accept="image/*" id = "vrproduct'+total_image+'"  class="form-control allimg1" required><div class=" "><button class="btn btn-danger mx-3 removebox" type="button" data-removeid="'+total_image+'">Remove</button><button class="btn btn-primary uploadimgbtn1" type = "button" data-uploadid1="'+total_image+'">Upload Images</button></div></div></div></div>';
    
        $(this).closest('.add-variatnbox').find('.addimagebutton_container1').prepend(html);
       })

    $('body').on('click','.removebox',function(){
        let id = $(this).data('removeid');
        remove_image(id);
    })

    $('body').on('click','.uploadimgbtn',function(){
        let id = $(this).data('uploadid');
        $('#add_image_box_'+id).find('input').click();
    })

    $('body').on('click','.uploadimgbtn1',function(){
        let id = $(this).data('uploadid1');
        $('#vrproduct'+id).click();
    })

    $('body').on('click', '.addmoreImg1', function(){
        let id = $(this).data('variantsid');
        console.log(id);
        $('#product_image'+id).click();
    })




    $('.editbtn').click(function(e){
        e.preventDefault();
        let imgid = $(this).data('selectproduct');

        $.ajax({
            url:'./admin_backend/action.php',
            type:'POST',
            data:{slectid:imgid,action:'selectproduct'},
            success:function(res){
                let productdata = JSON.parse(res);
                console.log(productdata[0].vr_id);
                let productName = productdata[0].product_name;
                let productDescripation = productdata[0].product_descripation;
                let product_firstsellPrice = productdata[0].sell_price;
                let proudct_firstComparePrice = productdata[0].compare_price;
                let product_firstQuantity = productdata[0].quantity;
                let product_collection = productdata[0].product_collection;
                let product_Main_image = productdata[0].vr_product_image;
                let product_vr_id = productdata[0].vr_id;
                let product_id = productdata[0].product_id;

                $('.product_tittle').val(productName);
                $('.prodcut_descripation').val(productDescripation);
                $('.sell_price').val(product_firstsellPrice);
                $('.compare_price').val(proudct_firstComparePrice);
                $('.product_quantity').val(product_firstQuantity);
                $('.product_collection ').val(product_collection);
                $('.vr_id').val(product_vr_id);
                $('.product_id').val(product_id);
                $('#main_image').attr('src',"../admin/admin_backend/uploads/"+product_Main_image);


                let variants_html = '';
                for(i = 1; i < (productdata.length); i++){
                    console.log(productdata[i]);
                    variants_html += `<div class="col-lg-3 col-md-3 col-12 vr_img shadow p-2 d-flex flex-column  border ">
                    <div class = 'img'>
                        <img src="../admin/admin_backend/uploads/${productdata[i].vr_product_image}" alt="" >
                    </div>
                    <div class="file d-grid gap-2 my-2">
                        <input type="file" name="" accept = image/*  class="form-control d-none">
                        <input type="hidden" name="vr_id" value = "${productdata[i].vr_id}">

                        <button class="btn btn-primary vr_image_btn" type="button">Upload</button>
                    </div>
                </div>  `;
                }

                $('.variants-image-box').html(variants_html);

            }
        })
        // console.log(imgid);
    })

    $('body').on('click','#main_image_btn',function(){
        let select_image_file = $(this).closest('.file').find('input').click();

        $('body').on('change', 'input[type="file"]', function(){
            let file = this.files[0];
        
            if(file){
                let reader = new FileReader();
                let imageElement = $(this).closest('.main_image_box').find('.main_img');
                
                reader.onload = function(e){
                    // Create a new image element with the selected image
                    let newImage = $('<img>').attr('src', e.target.result).addClass('preview-image');
                    console.log(newImage);
                    // Empty the existing image element and append the new one
                    imageElement.empty().append(newImage);
                };
        
                reader.readAsDataURL(file);
            }
        })
    })
    

    $('body').on('click','.vr_image_btn',function(){
        let select_file = $(this).closest('.vr_img').find('input');
        let select_image_file = $(this).closest('.vr_img').find('input').click();
        let select_image = $(this).closest('.vr_img').find('img').attr('src');
        console.log(select_image);

        $('body').on('change', 'input[type="file"]', function(){
            let file = this.files[0];
        
            if(file){
                let reader = new FileReader();
                let imageElement = $(this).closest('.vr_img').find('.img');
                
                reader.onload = function(e){
                    // Create a new image element with the selected image
                    let newImage = $('<img>').attr('src', e.target.result).addClass('preview-image');
                    console.log(newImage);
                    // Empty the existing image element and append the new one
                    imageElement.empty().append(newImage);
                };
        
                reader.readAsDataURL(file);
            }
        })
    })

    $('.product_editbtn').click(function(e){
        e.preventDefault();

        let productForm = new FormData($('#productEdit_form')[0]);
        productForm.append('action','edit_product');

        $.ajax({
            url:'./admin_backend/action.php',
            type:'POST',
            data:productForm,
            contentType:false,
            processData:false,
            success:function(res){
                
               window.location.href = 'super_admin_index.php';
            }
        })
    })

    $('.product_delete_btn').click(function(e){
        let deleteID = $(this).data('deletedata');

        $.ajax({
            url:'./admin_backend/action.php',
            type:'POST',
            data:{Delete: deleteID, action:'Delete_product'},
            success:function(res){
                window.location.href = 'super_admin_index.php';
            }
        })
    })

    $('.form-check-input').change(function(){
        let checked = $('.form-check-input:checked').length > 0;
        if (checked) {
            $('.select_deletebtn').removeClass('d-none'); // Show delete button
        } else {
            $('.select_deletebtn').addClass('d-none'); // Hide delete button
        }
    });

    $('.user_Deletebtn').click(function(e){
        e.preventDefault();

        let userDeleteId = $(this).data('user_deleteid');
        console.log(userDeleteId);
        
        $('#DeleteModal').modal('show');

        $('.user_deletebtn').click(function(e){
            e.preventDefault();

            $.ajax({
                url:'./admin_backend/action.php',
                type:'POST',
                data:{Deleteid : userDeleteId, action:'Delete_user'},
                success:function(res){

                    if(res == 'deleteUser'){
                        window.location.reload();
                    }
                    console.log(res);
                }
            })
        })

    })



    $('.select_deletebtn').click(function(e){
        e.preventDefault();

        let selectid = [];
        $('input[name="deleteid[]"]:checked').each(function(){
            selectid.push($(this).val());
        });

        $.ajax({
            url: './admin_backend/action.php',
            type: 'POST',
            data: {
                delete: 'delete',
                deleteid: selectid
            },
            success: function(response){
                if(response == 'deleteProduct'){
                    window.location.href = 'super_admin_index.php';
                }
             
            }
    })

})



   
    $('.viewDetail').click(function(e){
        e.preventDefault();
        let viewDetail = $(this).data('viewdetail');
        let viewDetail_orderID = $(this).data('viewdetail');
        let viewDetail_shipname = $(this).data('shipname');
        let viewDetail_shipaddress = $(this).data('shipaddress');
        let viewDetail_shipapartment = $(this).data('shipapartment');
        let viewDetail_shipcity = $(this).data('shipcity');
        let viewDetail_shipstate = $(this).data('shipstate');
        let viewDetail_shipincode = $(this).data('shippincode');
        let viewDetail_shipcontact = $(this).data('shipcontact');
        let viewDetail_shipaymentMethod = $(this).data('shipPaymenttype');
        let viewDetail_shipProduct_size = $(this).data('shipproductsize');
        let viewDetail_shipSellPrice = $(this).data('shipsellprice');
        let viewDetail_shipDeliveryPrice = $(this).data('shipdeliveryPrice');
        let viewDetail_shiptotalPrice = $(this).data('ship-totalprice');
        let viewDetail_shiptotalPrice2 = $(this).data('ship-totalprice2 ');
        let payment_status = $(this).data('status');

        let viewDetail_shipProductname =  $(this).data('shipnamee').replace(/\+/g, ' ');
        let viewDetail_shipProductImg = $(this).data('shipproductimg').replace(/%2F/g, '/').replace(/\+/g, ' ');
        
        let viewDetail_shipProductQuantity = $(this).siblings('.number').val();
        let viewDetail_shipProductDelivery = $(this).siblings('.delivery').val();

        let viewDetail_shipSellBy = $(this).data('shipSellBy');
        let totalPrice = ( parseFloat(viewDetail_shipProductDelivery)+(viewDetail_shipSellPrice * viewDetail_shipProductQuantity )) ;

        // Update HTML elements


        console.log(totalPrice );



        $('.ship-name').val(viewDetail_shipname);
        $('.ship-address').val(viewDetail_shipaddress);
        $('.ship-apartment').val(viewDetail_shipapartment);
        $('.product_imgsrc2').attr('src',viewDetail_shipProductImg);
        $('.product_name').html(viewDetail_shipProductname);
        $('.product_size').html(viewDetail_shipProduct_size);
        $('.ship-city').val(viewDetail_shipcity);
        $('.ship-state').val(viewDetail_shipstate);
        $('.ship-pincode').val(viewDetail_shipincode);
        $('.ship-number').val(viewDetail_shipcontact);
        $('.sellPrice').html(viewDetail_shipSellPrice);
        $('.quantity_totalPrice').html((viewDetail_shipSellPrice * viewDetail_shipProductQuantity ));
        $('.quantity').html(viewDetail_shipProductQuantity)
        $('.deliveryPrice').html(viewDetail_shipDeliveryPrice);
        $('.totalPrice').html(totalPrice);;
        $('.product_qunatity').html(viewDetail_shipProductQuantity);
        $('.payment_status').val(payment_status);
        $('#user_id').val(viewDetail);
  

    })

    $('.viewbtn').click(function(e){
        e.preventDefault();
        let selectbtn = $(this).data('useremail');
        console.log(selectbtn);
        $.ajax({
            url:'./admin_backend/action.php',
            type:'POST',
            data:{SelectBtn:selectbtn, action:'viewDetail'},
            success:function(res){
                let data = JSON.parse(res);
                if(data.length > 0){
                    $('.user_name').html(data[0].Ruser_name);
                    $('.user_email').html(data[0].Ruser_email);
                    $('.user_role').html(data[0].Ruser_type);
                    $('.holder_name').html(data[0].bank_holderName);
                    $('.account_number').html(data[0].bank_accountNum);
                    $('.account_ifsc').html(data[0].bank_ifsc);
                    $('.bank_name').html(data[0].bank_name);
    
                    }
                let totalPrice = 0;
                let totalProductPrice = 0;
                let totalOriginalPrice = 0;
                for(let i = 0; i < data.length; i++){
                    console.log(data[i].product_status);
                    let prodcuttotalPrice = parseFloat(data[i].product_totalPrice);
                    totalPrice += prodcuttotalPrice;
                    
                    if(data[i].product_status == 'Completed'){
                        let productprice = parseFloat(data[i].product_price)*(data[i].quanty);
                        totalProductPrice += productprice;
    
                        let productOrignal = parseFloat(data[i].orginalPrice)*(data[i].quanty);
                        totalOriginalPrice += productOrignal;
                    }
        
                }
                // $('.user_name').html(data[0].Ruser_name);
                $('.total_order').html(`${data.length}`);
                $('.total_sales').html("₹"+totalPrice+"/-");
                $('.total_profit').html("₹"+(totalProductPrice - totalOriginalPrice)+"/-");

             
            }
        })
        
    })


    $('.order_submit_btn').click(function(e){
        e.preventDefault();
        let id = $('#user_id').val();
        let payemt_status_val = $('#payment_status_value').val();
        
        $.ajax({
            url:'./admin_backend/action.php',
            type:'POST',
            data:{order_id:id, order_status:payemt_status_val, action:'change_status'},
            success:function(res){
                if(res == 'status_update'){
                    window.location.href = 'admin_order.php';
                }
                console.log(res);
            }
        })
    });


    // all orders delete feature
    $('.order_deletebtn').click(function(e){
        e.preventDefault();
        $('#DeleteModal').modal('show');
        let id = $(this).data('orderdeletebtn');

        $('.order_deletebtn').click(function(e){
            e.preventDefault();

            $.ajax({
                url:'./admin_backend/action.php',
                type:'POST',
                data:{order_deleteid : id, action:'order_delete'},
                success:function(res){
                    if(res == 'deleteOrder'){
                        window.location.href = 'admin_order.php';
                    }
                    console.log(res);
                }
            })
        })
    })


    // Withdrawn Section Edit Status start
    $('.withdrawn_button').click(function(e){
        e.preventDefault();

        $('#WithdrawnModal').modal('show');

        let w_id = $(this).data('withdrawnedit');

        $('.W_status_edit').click(function(e){
            e.preventDefault();
            let w_value = $('#withdrawn_status').val();

            $.ajax({
                url:'./admin_backend/action.php',
                type:'POST',
                data:{w_status : w_value, w_id : w_id, action:'withdrawn_status'},
                success:function(res){
                    if(res == 'status_update'){
                        window.location.href = 'admin_withdrawn_request.php';
                    }
                }
            })
        })
   
    })
    // Withdrawn Section Edit Status end


})
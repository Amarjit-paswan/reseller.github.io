$(document).ready(function(){
    $('.product_status').each(function() {
        if ($(this).text().trim() === 'Completed') {
            $(this).removeClass('success').addClass('success');
        }else if ($(this).text().trim() === 'Pending') {
            $(this).removeClass('success').addClass('pending');
        }else if ($(this).text().trim() === 'Cancel') {
            $(this).removeClass('success').addClass('cancel');
        }
    });
    console.log('nn');
})
$(document).ready(function(){
    $('.collection-items').click(function(){
        let collection_name = $(this).find('.collection-name h1').text();

        window.location.href = `./user_index.php?Collection=${collection_name}`;
    })


})
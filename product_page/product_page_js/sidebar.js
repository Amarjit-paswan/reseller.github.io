$(document).ready(function(){
          // Responsive sidebar
          $('.sidebar-icon').click(function(){
            $('.sidebar-icon .fa-bars').addClass('d-none');
            $(' .fa-xmark').removeClass('d-none');
            $('.sidebar').removeClass('d-none');
    
        })
        
        $(document).on('click', '.fa-xmark', function() {
            $('.sidebar').addClass('d-none');
            $('.sidebar-icon .fa-bars').removeClass('d-none');
            $(' .fa-xmark').addClass('d-none');
        });
})
$(document).ready(function() {
    $('#list').click(function(event){
        event.preventDefault();
        $('#grid_post .item').removeClass('col-md-6');
    });
    $('#grid').click(function(event){
        event.preventDefault();
        $('#grid_post .item').addClass('col-md-6');
    });


    $(window).resize(function(){

        if( this.innerWidth <= 767 ) {
            $('#pagination-sm').removeClass('d-none') ;
            $('#pagination-main').addClass('d-none') ;
            
        } else {
            $('#pagination-sm').addClass('d-none') ;
            $('#pagination-main').removeClass('d-none') ;
        }
    })

    
});


    
$(loadDocument);

function loadDocument () {
    $('#searchbtn').click(function(){
        search_restaurants();
    });
}

function search_restaurants() {
    $.ajax({
        url: 'search.php',
        type: 'get',
        data: {name: $('#name').val()},
        success: function(response) {
            $('#restaurants_found').html(response);
        }
    }); 
    $('html, body').animate({
        scrollTop: $("#restaurants_found").offset().top
    }, 1000);
}

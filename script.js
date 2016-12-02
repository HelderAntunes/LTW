$(loadDocument);

function loadDocument () {
    $('#buttonsearch').click(function(){
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
}


$(document).ready(function () {
    $('#s').autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax( {
                type: 'get',
                url: 'search',
                data: {
                    s:  $('#s').val(),
                },
                success: function( data ) {
                    response( data.data );
                }
            } );
        },
    });
});
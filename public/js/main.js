
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
        select: function (a, b) {
            $(this).val(b.item.value);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax( {
                type: 'get',
                url: 'searchmain',
                data: {
                    s:  $('#s').val(),
                },
                success: function( data ) {
                    $('.dummy-column').empty();
                    $('.dummy-column').first().append("<h2>Business</h2>");
                    $('.dummy-column').eq(1).append("<h2>POPULAR</h2>");
                    $('.dummy-column').last().append("<h2>Recent</h2>");

                    $.each(data.value, function( index, value ) {
                        $('.dummy-column').append("<a class='dummy-media-object' href='"+ value.url +"'><img src='"+ value.icon+"' alt='TooltipStylesInspiration'/>"+value.name +"</a>");
                    });
                    $('#morphsearch').css('height','400px');
                    $('.morphsearch-content').css('top','255px');
                    $('#state').show();
                    $('#sta').focus();
                }
            } );
        }
    });
    $('#sta').autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax( {
                type: 'get',
                url: 'searchbystate',
                data: {
                    sta: $('#sta').val()
                },
                success: function( data ) {
                    response( data.data );
                }
            } );
        },
        select: function (a, b) {
            $(this).val(b.item.value);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax( {
                type: 'get',
                url: 'searchmain',
                data: {
                    s:  $('#s').val(),
                    sta: $('#sta').val()
                },
                success: function( data ) {
                    console.log(data);
                    $('.dummy-column').empty();
                    $('.dummy-column').first().append("<h2>Business</h2>");
                    $('.dummy-column').eq(1).append("<h2>POPULAR</h2>");
                    $('.dummy-column').last().append("<h2>Recent</h2>");

                    $.each(data.value, function( index, value ) {
                        $('.dummy-column').append("<a class='dummy-media-object' href='"+ value.url +"'><img src='img/thumbs/TooltipStylesInspiration.png' alt='TooltipStylesInspiration'/>"+value.name +"</a>");
                    });
                }
            } );
        }
    });
});
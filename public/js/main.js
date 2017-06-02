$(document).ready(function () {
    // $('.search-icon').hover(function () {
    //     $('#search-box').css({"color": "white",
    //     "background": "#c8c8c8",
    //     "box-shadow": "0 0 0 5px #3d4752"});
    // });
    // $('.search-icon').mouseleave(function () {
    //     $('#search-box').css({"color": "white",
    //         "background": "#c8c8c8",
    //         "box-shadow": "0 0 0 0 none"});
    // });
    $('.search-icon, #search-box').hover(function () {
        $('#search-box').css({
        '-webkit-transition': 'width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s',
        'transition': 'width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s',
        'border': 'none',
        'outline': 'none',
        'box-shadow': 'none',
        'padding-left': '15px',
        'cursor': 'text',
        'width': '100%',
        'color': 'black',
        'border-radius': '0px',

        });
        $('.search-icon').css({
            '-webkit-transition': 'all 1.6s',
            'transition': 'width 1.6s',
            'left':'1000px'
        });
        $('.boder').css("border-bottom", "solid 10px #000");
        $('.text-ex').show('slow');
    });
    $('.search-icon').click(function () {
        window.location.href = '/search-list';
    });
});

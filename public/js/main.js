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
        'width': '850px',
        'background': '#ebebeb',
        'color': 'black',
        'border-radius': '0px',
        });
        $('.text-ex').show('slow');
    });
});

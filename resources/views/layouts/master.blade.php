<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ineeda</title>
    <meta name="description" content="A search input that morphs into a fullscreen search page." />
    <meta name="keywords" content="search, input, effect, morph, transition, inspiration" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @yield('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
</head>
<body>
<div class="container">
    <aside class="sidebar clearfix">
        <nav>
            <a href="#"><i class="fa fa-fw fa-comments-o"></i></a>
            <a href="#"><i class="fa fa-fw fa-heart-o"></i></a>
            <a href="#"><i class="fa fa-fw fa-send-o"></i></a>
            <a href="#"><i class="fa fa-fw fa-smile-o"></i></a>
        </nav>
    </aside>
    <div id="morphsearch" class="morphsearch">
        <form class="morphsearch-form">
            <input class="morphsearch-input" type="search" placeholder="Search..." autocomplete="off" name="countries" id="s"/>
            <div id="suggestions-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
            <button class="morphsearch-submit" type="submit">Search</button>
        </form>
        <div class="morphsearch-content">
            <div class="dummy-column">
                <h2>Business</h2>

            </div>
            <div class="dummy-column">
                <h2>POPULAR</h2>
            </div>
            <div class="dummy-column">
                <h2>Recent</h2>
            </div>
        </div><!-- /morphsearch-content -->
        <span class="morphsearch-close"></span>
    </div><!-- /morphsearch -->
    <header class="codrops-header">
        <h1>Ineeda Search <span>A search input that morphs into a fullscreen search page.</span></h1>
        <div class="codrops-links">
            <a class="codrops-icon codrops-icon-prev" href="#"><span>Previous Demo</span></a>
            <a class="codrops-icon codrops-icon-drop" href="#"><span>Back to the Codrops Article</span></a>
        </div>
    </header>
    <div class="overlay"></div>
</div><!-- /container -->

@yield('content')

<script src="js/classie.js"></script>

<script>
    (function() {
        var morphSearch = document.getElementById( 'morphsearch' ),
            input = morphSearch.querySelector( 'input.morphsearch-input' ),
            ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
            isOpen = isAnimating = false,
            // show/hide search area
            toggleSearch = function(evt) {
                // return if open and the input gets focused
                if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

                if( isOpen ) {
                    classie.remove( morphSearch, 'open' );

                    // trick to hide input text once the search overlay closes
                    // todo: hardcoded times, should be done after transition ends
                    if( input.value !== '' ) {
                        setTimeout(function() {
                            classie.add( morphSearch, 'hideInput' );
                            setTimeout(function() {
                                classie.remove( morphSearch, 'hideInput' );
                                input.value = '';
                            }, 300 );
                        }, 500);
                    }

                    input.blur();
                }
                else {
                    classie.add( morphSearch, 'open' );
                }
                isOpen = !isOpen;
            };

        // events
        input.addEventListener( 'focus', toggleSearch );
        ctrlClose.addEventListener( 'click', toggleSearch );
        // esc key closes search overlay
        // keyboard navigation events
        document.addEventListener( 'keydown', function( ev ) {
            var keyCode = ev.keyCode || ev.which;
            if( keyCode === 27 && isOpen ) {
                toggleSearch(ev);
            }
        } );


        /***** for demo purposes only: don't allow to submit the form *****/
        morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
    })();
</script>
</body>
</html>
@extends('layouts.app')
@section('content')

    <div class="col-md-10">
        <div class="textp">
            <p>Finding business information<br> should be easy.</p>
        </div>
        <div class="search">
            <form class="search-container" action="//llamaswill.tumblr.com/search">
                <div class="boder" style="position: relative">
                    <div class="search-box" style="position: relative">
                        <input id="search-box" type="text" class="search-box" name="q"/>
                        <img src="img/s.png" class="search-icon"></label>
                    </div>
                </div>
                <input type="submit" id="search-submit"/>
            </form>
        </div>
        <div class="">
            <p class="text-ex" style="float: right; display: none">Ex. Cafe in Montego Bay</p>
        </div>
    </div>

    <script>
        document.addEventListener("touchstart", function () {
        }, true);
    </script>
@endsection
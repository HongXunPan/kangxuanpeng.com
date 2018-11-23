<header id="header" class="header bg-white">
    <div class="navbar-container">
        <!--logo-->
        <a href="{{ url('/') }}" class="navbar-logo"> <img src="{{ asset('images/logo.png') }}" alt="HongXunPan"> </a>
        <!--nav-->
        <div class="navbar-menu">
            <a class="{{ active_class(if_uri('/'), 'current') }}" href="{{ url('/') }}">Index</a>
            {{--<a href="#">Links</a>--}}
            <a class="{{ active_class(if_uri('about'), 'current') }}" href="{{ url('about') }}">About</a>
            <a class="{{ active_class(if_uri('website-intro'), 'current') }}" href="{{ url('website-intro') }}">Website Intro</a>
        </div>
        <a href="{{ url('search') }}" class="navbar-search"> <span class="icon-search"></span> </a>
        <div class="navbar-mobile-menu" onclick="">
            <span class="icon-menu cross"><span class="middle"></span></span>
            <ul>
                <li><a class="{{ active_class(if_uri('/'), 'current') }}" href="{{ url('/') }}">Index</a></li>
                {{--<li><a href="#">Links</a></li>--}}
                <li><a class="{{ active_class(if_uri('about'), 'current') }}" href="{{ url('about') }}">About</a></li>
                <li><a class="{{ active_class(if_uri('website-intro'), 'current') }}" href="{{ url('website-intro') }}">Website Intro</a></li>
            </ul>
        </div>
    </div>
</header>
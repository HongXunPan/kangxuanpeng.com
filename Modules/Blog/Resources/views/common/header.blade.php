<header id="header" class="header bg-white">
    <div class="navbar-container">
        <!--logo-->
        <a href="{{ url('/') }}" class="navbar-logo"> <img src="{{ asset('images/logo.png') }}" alt="HongXunPan"> </a>
        <!--nav-->
        <div class="navbar-menu">
            <a class="current" href="{{ url('/') }}">Index</a>
            {{--<a href="#">Links</a>--}}
            <a href="{{ url('about') }}">About</a>
        </div>
        <a href="{{ url('search') }}" class="navbar-search"> <span class="icon-search"></span> </a>
        <div class="navbar-mobile-menu" onclick="">
            <span class="icon-menu cross"><span class="middle"></span></span>
            <ul>
                <li><a class="current" href="{{ url('/') }}">Index</a></li>
                {{--<li><a href="#">Links</a></li>--}}
                <li><a href="{{ url('about') }}">About</a></li>
            </ul>
        </div>
    </div>
</header>
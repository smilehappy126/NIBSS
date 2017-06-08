<nav class="navbar navbar-miscamp navbar-fixed-top">
    <div class="container container-fluid scroll">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- 左上角LOGO --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/mainpage/logow.png') }}" alt="">
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">中央資管營</a>



        </div>

        {{-- Collapse --}}
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- 左邊的 Navbar --}}
            <ul class="nav navbar-nav">
                <!-- <li><a href="{{ url('/') }}">2017資管營</a></li> -->
            </ul>

            {{-- 右邊的 Navbar --}}
            <ul class="nav navbar-nav navbar-right">

                <li><a href="{{ url('/course') }}">課程資訊</a></li>
                <li><a href="{{ url('/staff') }}">人員介紹</a></li>
                <li><a href="{{ url('/traffic') }}">交通方式</a></li>
                <li><a href="{{ url('/signup') }}">我要報名</a></li>
                <!-- <li><a href="{{ url('/game') }}">小遊戲</a></li> -->
                @if (Auth::guest())
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

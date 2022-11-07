<nav class="panel-menu" id="mobile-menu">
    <ul>

    </ul>
    <div class="mm-navbtn-names">
        <div class="mm-closebtn">
            Close
            <div class="tt-icon">
                <svg>
                    <use xlink:href="#icon-cancel"></use>
                </svg>
            </div>
        </div>
        <div class="mm-backbtn">Back</div>
    </div>
</nav>
<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
                <!-- /logo -->
                <!-- desctop menu -->
                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="/"><span>Home </span></a></li>
                            <li><a href="/posts/?popular=1"><span>Trending</span></a></li>
                            @auth
                                <li><a href="/posts?by={{ auth()->user()->name }}"><span>My Posts</span></a></li>
                                <li><a href="/posts/create"><span>New</span></a></li>
                            @endauth
                            <li>
                                <a href=""><span>Category</span></a>
                                <ul>
                                    @foreach($channels as $category)
                                        <li>
                                            <a href="{{ $category->path() }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <form class="search-wrapper" method="GET" action="/posts">
                        <div class="search-form">
                            <input name="search" type="text" class="tt-search__input" placeholder="Search">
                        </div>
                        {{--                        <div class="search-results">--}}
                        {{--                            <div class="tt-search-scroll">--}}
                        {{--                                <ul>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                Here’s what I’ve found in Red Dead Redem..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                You can find these easter eggs in Red Dea..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                Here’s what I’ve found in Red Dead Redem..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                Here’s what I’ve found in Red Dead Redem..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                You can find these easter eggs in Red Dea..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="page-single-topic.html">--}}
                        {{--                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>--}}
                        {{--                                            <div class="tt-description">--}}
                        {{--                                                Here’s what I’ve found in Red Dead Redem..--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                            <button type="button" class="tt-view-all" data-toggle="modal"--}}
                        {{--                                    data-target="#modalAdvancedSearch">Advanced Search--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto">
                @guest
                    <div class="tt-account-btn">
                        <a href="/login" class="btn btn-primary">Log in</a>
                        <a href="/register" class="btn btn-secondary">Sign up</a>
                    </div>
                @endguest
                @auth
                    <div class="tt-desktop-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href=""><span>{{ auth()->user()->name }}</span></a>
                                    <ul>
                                        <li>
                                            <a href="/profile/{{ auth()->user()->name }}"><span>My Profile</span></a>
                                        </li>
                                        <li>
                                            <a href=""
                                               onclick="event.preventDefault();document.getElementById('logout-user').submit();">Logout</a>
                                        </li>
                                    </ul>
                                    <form action="{{ route('logout') }}" method="post" id="logout-user"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>


<template>
  <nav class="panel-menu" id="mobile-menu">
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
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <div class="tt-logo">
                    <a href="index.html">
                      <img src="#" alt=""></a>
                </div>
                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="/"><span>Home </span></a></li>
                            <li><a href="/posts/?popular=1"><span>Trending</span></a></li>
<!--                            @auth-->
<!--                                <li><a href="/posts?by={{ auth()->user()->name }}"><span>My Posts</span></a></li>-->
<!--                                <li><a href="/posts/create"><span>New</span></a></li>-->
<!--                            @endauth-->
<!--                            <li>-->
<!--                                <a href=""><span>Category</span></a>-->
<!--                                <ul>-->
<!--                                    @foreach($channels as $category)-->
<!--                                        <li>-->
<!--                                            <a href="{{ $category->path() }}">{{ $category->name }}</a>-->
<!--                                        </li>-->
<!--                                    @endforeach-->
<!--                                </ul>-->
<!--                            </li>-->
                        </ul>
                    </nav>
                </div>
                <div class="tt-search">
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <form class="search-wrapper" method="GET" action="/posts">
                        <div class="search-form">
                            <input name="search" type="text" class="tt-search__input" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-auto ml-auto">
<!--                @guest-->
                    <div class="tt-account-btn">
                        <a href="/login" class="btn btn-primary">Log in</a>
                        <a href="/register" class="btn btn-secondary">Sign up</a>
                    </div>
<!--                @endguest-->
<!--                @auth-->
                    <div class="tt-desktop-menu">
                        <nav>
                            <ul>
                                <li>
<!--                                    <a href=""><span>{{ auth()->user()->name }}</span></a>-->
                                    <ul>
                                        <li>
<!--                                            <a href="/profile/{{ auth()->user()->name }}"><span>My Profile</span></a>-->
                                        </li>
                                        <li>
                                            <a href=""
                                               onclick="event.preventDefault();document.getElementById('logout-user').submit();">Logout</a>
                                        </li>
                                    </ul>
                                    <form action="#" method="post" id="logout-user"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
<!--                @endauth-->
            </div>
        </div>
    </div>
</header>


</template>
<script>
export default {
  mounted() {
    window.axios.get('test')
  }
}
</script>

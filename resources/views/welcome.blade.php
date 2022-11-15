{{--@extends('posts.layouts.app')--}}
{{--@section('content')--}}
{{--    <main id="tt-pageContent" class="tt-offset-small">--}}
{{--        <div class="container">--}}
{{--            <div class="tt-topic-list">--}}
{{--                <div class="tt-list-header">--}}
{{--                    <div class="tt-col-topic">Topic</div>--}}
{{--                    <div class="tt-col-category">Category</div>--}}
{{--                    <div class="tt-col-value hide-mobile">Likes</div>--}}
{{--                    <div class="tt-col-value hide-mobile">Replies</div>--}}
{{--                    <div class="tt-col-value hide-mobile">Views</div>--}}
{{--                    <div class="tt-col-value">Actions</div>--}}
{{--                </div>--}}

{{--                @forelse($forums as $forum)--}}
{{--                    <div class="tt-item">--}}
{{--                        <div class="tt-col-avatar">--}}
{{--                            @if($forum->user->avatar)--}}
{{--                                <img src="{{ $forum->user->avatar }}" alt="" class="avatar">--}}
{{--                            @else--}}
{{--                                <img src="{{ asset('default.jpg') }}" alt="" class="avatar">--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="tt-col-description">--}}
{{--                            <h6 class="tt-title">--}}
{{--                                <a href="{{ $forum->path() }}">--}}
{{--                                    {{ $forum->title }}--}}
{{--                                    <div class="row align-items-center no-gutters">--}}
{{--                                        <div class="col-11">--}}
{{--                                            <ul class="tt-list-badge">--}}
{{--                                                <li><a href="/profile/{{ $forum->user->name }}"><span--}}
{{--                                                                class="tt-badge">{{ $forum->user->name }}</span></a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-1 ml-auto show-mobile">--}}
{{--                                            <div class="tt-value">1h</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </h6>--}}
{{--                            <div class="row align-items-center no-gutters">--}}
{{--                                <div class="col-1 ml-auto show-mobile">--}}
{{--                                    <div class="tt-value">1h</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tt-col-category"><span--}}
{{--                                    class="tt-color01 tt-badge">{{ $forum->category->name  }}</span></div>--}}
{{--                        <div class="tt-col-value hide-mobile">985</div>--}}
{{--                        <div class="tt-col-value tt-color-select hide-mobile">{{ $forum->replies_count }}</div>--}}
{{--                        <div class="tt-col-value hide-mobile">15.1k</div>--}}

{{--                        <div style="display: flex">--}}
{{--                            <a href="{{ $forum->path() }}" class="pr-3">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                     stroke-width="1.5" stroke="currentColor" class="h-17">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                            @can('update', $forum)--}}
{{--                                <a href="{{ route('forum.edit',$forum->slug) }}" class="pr-3">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                         stroke-width="1.5" stroke="currentColor" class="h-17">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                                <form action="{{ $forum->path() }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="custom-button">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                             stroke-width="1.5" stroke="currentColor" class="h-17">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                  d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            @endcan--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <div class="tt-topic-alert tt-alert-default" role="alert">--}}
{{--                        <a href="#" target="_blank">No post available.</a>--}}
{{--                        @guest--}}
{{--                            <a href="/login" target="_blank">Try Login and create one.</a>--}}
{{--                        @endguest--}}
{{--                        @auth--}}
{{--                            <a href="/post/create" target="_blank">Try creating one.</a>--}}
{{--                        @endauth--}}
{{--                    </div>--}}
{{--                @endforelse--}}

{{--                @if(count($forums) > 0)--}}
{{--                    {{ $forums->links('pagination::bootstrap-4') }}--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
{{--@endsection--}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Forum - Responsive HTML5 Template">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <style>
        ul.pagination {
            display: flex;
            justify-content: space-between;
            width: 22rem;
        }

        li.page-item {
            list-style-type: none;
        }

        div .tt-topic-list > nav {
            width: 100%;
            display: flex;
            justify-content: end;
            margin-top: 1rem;
        }

        .custom-button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            color: red;
        }

        .h-17 {
            height: 17px;
        }

        .custom-alert {
            background: #d4edda;
            margin: 2px;
            padding: 1rem;
            border-radius: 18px;
            width: 25rem;
            position: fixed;
            z-index: 100;
            bottom: 41px;
            right: 0;
        }

        .avatar {
            height: 56px;
            border-radius: 50%;
            width: 4rem;
        }

        .tw-flex {
            display: flex;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>
<div id="app">
</div>

{{--    @if(session()->has('flash'))--}}
{{--        <div id="alert" class="alert alert-success custom-alert" role="alert">--}}
{{--            {{ session('flash') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div>--}}
{{--        @include('posts.layouts.header')--}}
{{--        @yield('content')--}}
{{--    </div>--}}


<script>
    setTimeout(function () {
        document.querySelector(".custom-alert").style.display = 'none';
    }, 3000)
</script>
<script src="{{ asset('bundle.js')  }}"></script>
</body>
</html>


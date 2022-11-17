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

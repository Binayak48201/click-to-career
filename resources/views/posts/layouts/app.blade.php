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
    </style>
</head>
<body>
@include('posts.layouts.header')
@yield('content')

</body>
</html>

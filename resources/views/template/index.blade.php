<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @yield('title')
    </title>

    @include('include.style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.navbar')

            @include('layouts.sidebar')

            @yield('content')

            {{-- @include('layouts.footer') --}}

        </div>
    </div>

    @include('include.scripct')

</body>

</html>

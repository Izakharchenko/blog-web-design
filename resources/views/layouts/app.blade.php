<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/sass/blog.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ url('/') }}">Blog about web design</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/dashboard/home') }}" class="btn btn-sm btn-outline-secondary">Dashboard</a>
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        @else
                        <a href=" {{ route('login') }}" class="btn btn-sm btn-outline-secondary">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-secondary">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="{{ route('post.index')}}">Home</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">U.S.</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Technology</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a>
            </nav>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>
    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p class="mb-0">
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
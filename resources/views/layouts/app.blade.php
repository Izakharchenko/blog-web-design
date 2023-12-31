<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog about web design</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/sass/blog.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v18.0&appId=907478524222207" nonce="qORemSHL"></script>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 col-sm-8 col-sx-12">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ url('/') }}">Blog about web design</a>
                </div>
                <div class="col-4 col-xs-12 d-flex justify-content-end align-items-center">

                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        @if(Auth::check() && Auth::user()->is_author)
                        <a href="{{ url('/dashboard/posts') }}" class="btn btn-sm btn-outline-secondary">Dashboard</a>
                        @endif
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
                <a class="nav-item nav-link link-body-emphasis active" href="{{ route('home')}}">Home</a>
                @foreach ($middlewareSharedData as $url)
                <a class="nav-item nav-link link-body-emphasis" href="{{ route ('home', ['category_id' => $url->id])}}">{{ $url->title }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>
    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p class="mb-0">
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
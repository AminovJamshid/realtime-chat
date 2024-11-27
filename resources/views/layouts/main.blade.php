<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Hously - Tailwind CSS Real Estate Landing & Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template">
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="2.2.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Css -->
    <!-- Main Css -->
    <link href="/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-body text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader End -->

    <div class="page-wrapper toggled">
        {{ $slot }}

    </div>
    <!-- page-wrapper -->

    <!-- Switcher -->
    <div class="fixed top-[10%] z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
            <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                <i data-feather="moon" class="size-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="size-[18px] text-yellow-500"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

    <!-- JAVASCRIPTS -->
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>

    <!-- JAVASCRIPTS -->
</body>
</html>
<!DOCTYPE html>

<head>
    <title>Laravel + Vue Chat</title>
    @vite(['resources/js/app.js'])
</head>

<body>
<div class="min-h-screen bg-gray-100" id="app">
    <header >
        @if (Route::has('login'))
            <nav>
                @auth
                    <div id="app">
                        <app :is-auth="{{ json_encode(auth()->check()) }}"
                             :user="{{ auth()->check() ? auth()->user() : 'null' }}">>
                        </app>
                        <form method="get" action="/logout">
                            <button type="submit">Log out</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}"> Log in </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"> Register </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
</div>
</body>

</html>

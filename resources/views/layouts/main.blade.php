<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Cherubim and Seraphim Church Unification Campus Fellowship </title>
    <meta name="description" content="@yield('description') ">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="canonical" href="https://cnsunification.org" />
    <link rel="shortcut icon" href="{{ asset('assets/images/isokan_logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('assets/images/isokan_logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('canonical')">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('assets/images/isokan_logo.png') }}">
    <!-- Fav Icon -->

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="@yield('title')">
    <meta name="og:description" content="@yield('description')">
    <meta name="og:image" content="assets/images/favicon.png">
    <meta name="og:url" content="@yield('canonical')">
    <meta name="og:site_name" content="@yield('title')">
    <meta name="og:application-name" content="@yield('title')">
    <meta name="og:author" content="Afolabi Marcus - +2349035155129">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="{{ asset('assets/tailwindcss%402.2.19/dist/tailwind.min.css') }}" rel="stylesheet">



    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150022879-1"> </script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-150022879-1', { 'optimize_id': 'GTM-5L3ZJLW' }); gtag('set', { 'user_id': 'USER_ID' }); // Set the user ID using signed-in user_id. ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
    </script> --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-RBZ3GDR92P"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'G-RBZ3GDR92P');
    </script>
    <script src="https://www.googleoptimize.com/optimize.js?id=GTM-5L3ZJLW"></script> <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) { w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' }); var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f); })(window, document, 'script', 'dataLayer', 'GTM-MGHC4XX');
    </script> --}}
    <!-- End Google Tag Manager -->
    {{--
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" /> --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        // Controls (as seen below) works in such a way that as soon as you explicitly define (add) one control
        // to the settings, ALL default controls are removed and you have to add them back in by defining those below.
        // For example, let's say you just simply wanted to add 'restart' to the control bar in addition to the default.
        // Once you specify *just* the 'restart' property below, ALL of the controls (progress bar, play, speed, etc) will be removed,
        // meaning that you MUST specify 'play', 'progress', 'speed' and the other default controls to see them again.
           const controls = [
           'play-large', // The large play button in the center
           // 'restart', // Restart playback
            //'rewind', // Rewind by the seek time (default 10 seconds)
            'play', // Play/pause playback
            //'fast-forward', // Fast forward by the seek time (default 10 seconds)
            'progress', // The progress bar and scrubber for playback and buffering
         //   'current-time', // The current time of playback
            'duration', // The full duration of the media
         //   'mute', // Toggle mute
           'volume', // Volume control
        //    'captions', // Toggle captions
        //    'settings', // Settings menu
        //    'pip', // Picture-in-picture (currently Safari only)
          //  'airplay', // Airplay (currently Safari only)
            'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
            'fullscreen' // Toggle fullscreen
        ];
        const player = Plyr.setup('.js-player', { controls });
    });
    </script>
</head>

</head>

<body>


    <div id="wrapper">
        <header>
            <div class="header_wrap">
                <div class="header_inner mcontainer">
                    <div class="left_side"> 
                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path>
                            </svg>
                        </span>

                        <div id="logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Unification Campus Fellowship">
                                <img src="{{ asset('assets/images/logo.png') }}" class="logo_mobile" alt="">
                            </a>
                        </div>
                    </div>

                    <!-- search icon for mobile -->

                    <div class="header_search"><i class="uil-search-alt"></i>
                        <form action="" method="">
                            <input value="" type="text" class="form-control" name="search"
                                placeholder="Search for Articules, Messages and more.." autocomplete="off">
                        </form>
                    </div>

                    <div class="right_side">

                        <div class="header_widgets">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ route('convention.index') }}" class="is_link">Convention</a>
                            @else
                            <a href="{{ route('login') }}" class="is_link">Log in</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="is_link">Become a Member</a>
                            @endif
                            @endauth
                            @endif

                            @if (Route::has('login'))
                            @auth
                            <a href="{{ route('user.index') }}">
                                <img src="{{ auth()->user()->profile_photo_url }}" class="is_avatar" alt=""></a>
                            @else
                            <a href="#">
                                <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="is_avatar"
                                    alt=""></a>
                            @endauth
                            @endif



                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                                @if (Route::has('login'))
                                @auth
                                <a href="{{ route('user.index') }}" class="user">
                                    <div class="user_avatar">
                                        <img src="{{ auth()->user()->profile_photo_url }}" class="is_avatar" alt="">


                                    </div>
                                    <div class="user_name">
                                        <div> {{ auth()->user()->name }} </div>
                                        <span> {{ auth()->user()->email }} </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="{{ route('convention.index') }}" class="is-link">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    2023 - Convention </span>
                                </a>
                                <hr>
                                <a href="{{ route('profile.show') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    My Profile
                                </a>
                                <a href="{{ route('user.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    My Timeline
                                </a>
                                <a href="{{ url('/dashboard.index') }}">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Manage Account
                                </a>

                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                    Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                                @else
                                <a href="{{ route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Login
                                </a>
                                <a href="{{ route('register') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Register 
                                </a>
                                @endauth
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>

        @guest
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar> 
                <ul>
                    <li class="{{ Request::routeIs('login') ? 'active' : '' }}"><a href="{{ route('login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Login </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('register') ? 'active' : '' }}"><a href="{{ route('register') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Become a member </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('convention.index') ? 'active' : '' }}"><a href="{{ route('convention.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="text-blue-600">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Convention Registration </span> </a>
                </li>
                
                <li class="{{ Request::routeIs('donation') ? 'active' : '' }}"><a href="{{ route('donation') }}">
                            <svg fill="currentColor" class="text-red-500" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> Donate </span> </a>
                    </li>
                </ul>
            </div>
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>
        </div>
        @endguest

        @auth
        @if(auth()->user()->role === 'admin' )
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar>

                <ul>
                    <li class="{{ Request::routeIs('welcome') ? 'active' : '' }}"><a href="{{ route('welcome') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Home </span> </a>
                    </li>
                    <li class="{{ Request::route('dashboard.index') ? 'active' : '' }}"><a
                            href="{{ route('dashboard.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Dashboard </span> </a>
                    </li>
                     
                    <li class="{{ Request::route('convention.index') ? 'active' : '' }}"><a
                            href="{{ route('convention.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Convention </span> </a>
                    </li>
                    <li class="{{ Request::route('subconvention.idcard') ? 'active' : '' }}"><a
                        href="{{ route('subconvention.idcard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="text-blue-600">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Download ID </span> </a>
                </li>
                    <li class="{{ Request::routeIs('institution.index') ? 'active' : '' }}"><a
                            href="{{ route('institution.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span>All Institutions </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}"><a
                            href="{{ route('user.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-500">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> All Members </span></a>
                    </li>
                    <li class="{{ Request::routeIs('executives.index') ? 'active' : '' }}"><a
                            href="{{ route('executives.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-500">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> All Executives </span></a>
                    </li>
                    <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a
                            href="{{ route('posts.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-pink-500">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd" />
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span> All Posts</span></a>
                    </li>
                    <li class="{{ Request::routeIs('resource.index') ? 'active' : '' }}"><a
                            href="{{ route('resource.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Resources </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('prayers.index') ? 'active' : '' }}"><a
                            href="{{ route('prayers.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Prayer/Bible </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a
                            href="{{ route('videos.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Video</span></a>
                    </li>
                    <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a
                            href="{{ route('audios.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Audio </span></a>
                    </li>
                    <li class="{{ Request::routeIs('vacancies.index') ? 'active' : '' }}"><a
                            href="{{ route('vacancies.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Jobs</span> </a>
                    </li>
                    <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a
                            href="{{ route('products.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> All Products</span></a>
                    </li>

                    <li class="{{ Request::url('donation') ? 'active' : '' }}"><a href="{{ url('donation') }}">
                            <svg fill="currentColor" class="text-red-500" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg> <span> Donation </span></a>
                    </li>
                </ul>
                <div class="footer-links">
                    <a href="{{ route('executives.index') }}">About Us</a>
                    <a href="{{ url('contact') }}">Contact Us </a>
                    <a href="{{ url('developers') }}">Developers</a>
                    <a href="{{ route('executives.index') }}">CEC Profile</a>
                    <a href="{{ url('donation') }}">Support</a>
                    <a href="{{ url('privacy-policy') }}">Privacy Policy </a>
                    <a href="{{ url('terms-condition') }}">Terms and Condition</a>
                    <a href="{{ url('cookies-policy') }}">Cookies</a>
                    <a href="{{ url('content-policy') }}">Content Policy</a>
                </div>
            </div>
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>
        @elseif(auth()->user()->role === 'member' )
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar>

                <ul>
                    <li class="{{ Request::routeIs('welcome') ? 'active' : '' }}"><a href="{{ route('welcome') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Home </span> </a>
                    </li>

                    <li><a href="{{ route('resource.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> CEC Resources </span> </a>
                    </li>
                    @if(App\Models\Convention::select('email')->where('email') === auth()->user()->email)
                    <li class="{{ Request::route('convention.idcard') ? 'active' : '' }}"><a
                            href="{{ route('convention.idcard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span>Convention ID Card </span> </a>
                    </li>
                    @endif
                    <li class="{{ Request::routeIs('prayers.index') ? 'active' : '' }}"><a
                            href="{{ route('prayers.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-600">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Isokan Prays </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a
                            href="{{ route('posts.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> My Posts </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a
                            href="{{ route('videos.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-red-500">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-4V5h-1v2h1zM5 5v2H4V5h1zm0 4H4v2h1V9zm-1 4h1v2H4v-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span> My Videos </span></a>
                    </li>
                    <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a
                            href="{{ route('audios.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-blue-500">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> My Audios </span></a>
                    </li>

                    <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a
                            href="{{ route('products.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="text-green-500">
                                <path
                                    d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                            </svg> <span> My Products </span></a>
                    </li>

                </ul>

                




                <div class="footer-links">

                    <a href="https://www.facebook.com/isokancampusfellowship"><i class="icon-brand-facebook"></i>
                        Facebook </a>
                    <a href="https://twitter.com/isokancampus"><i class="icon-brand-twitter"></i> Twitter </a>
                    <a href="https://www.instagram.com/isokancampusfellowship/"><i class="icon-brand-instagram"></i>
                        Instagram </a>
                    <a href="https://t.me/unificationcampusfellowships"><i class="icon-brand-telegram"></i> Telegram
                    </a>
                    <a href="https://www.youtube.com/channel/UC2UQ-kfj__DO2_zoEExg0UQ"><i
                            class="icon-brand-youtube"></i> Youtube </a>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <a href="{{ url('contact') }}">Contact Us </a>
                    <a href="{{ url('donation') }}">Support</a>
                    <a href="{{ url('policy') }}">Privacy Policy </a>
                    <a href="{{ url('terms') }}">Terms and Condition</a>
                </div>

            </div>

            <!-- sidebar overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>
        @endif
        @endauth

        @yield('main')

    </div>


    <!-- For Night mode -->
    <script>
        (function(window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);

        (function(window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function(event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>

    <!-- Javascript
    ================================================== -->
    <script src="{{ asset('assets/code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script nomodule="" src="{{ asset('assets/ionicons%405.2.3/dist/ionicons.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.min.js"></script> --}}
</body>

</html>
            
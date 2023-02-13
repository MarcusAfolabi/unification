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
            const player = Plyr.setup('.js-player', {
                controls
            });
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
                            <input value="" type="text" class="form-control" name="search" placeholder="Search for Articules, Messages and more.." autocomplete="off">
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
                                <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="is_avatar" alt=""></a>
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
                                        <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                                    </svg>
                                    2023 - Convention </span>
                                </a>
                                <hr>
                                <a href="{{ route('profile.show') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                    </svg>

                                    My Profile
                                </a>
                                <a href="{{ route('user.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                    </svg>

                                    My Timeline
                                </a>
                                <a href="{{ url('/dashboard.index') }}">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Login
                                </a>
                                <a href="{{ route('register') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Login </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('register') ? 'active' : '' }}"><a href="{{ route('register') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Become a member </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('convention.index') ? 'active' : '' }}"><a href="{{ route('convention.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Convention Registration </span> </a>
                    </li>

                    <li class="{{ Request::routeIs('donation') ? 'active' : '' }}"><a href="{{ route('donation') }}">
                            <svg fill="currentColor" class="text-red-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Home </span> </a>
                    </li>
                    <li class="{{ Request::route('dashboard.index') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Dashboard </span> </a>
                    </li>

                    <li class="{{ Request::route('convention.index') ? 'active' : '' }}"><a href="{{ route('convention.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Convention </span> </a>
                    </li>
                    
                    <li class="{{ Request::routeIs('fellowship.index') ? 'active' : '' }}"><a href="{{ route('fellowship.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span>Fellowships </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}"><a href="{{ route('user.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> Members </span></a>
                    </li>
                    <li class="{{ Request::routeIs('executives.index') ? 'active' : '' }}"><a href="{{ route('executives.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> CEC Council </span></a>
                    </li>
                    <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a href="{{ route('posts.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span> Stories</span></a>
                    </li>
                    <li class="{{ Request::routeIs('resource.index') ? 'active' : '' }}"><a href="{{ route('resource.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Downloads</span> </a>
                    </li>
                    <li class="{{ Request::routeIs('prayers.index') ? 'active' : '' }}"><a href="{{ route('prayers.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Prayers </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a href="{{ route('videos.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Shorts</span></a>
                    </li>
                    <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a href="{{ route('audios.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Audio Clips</span></a>
                    </li>
                    <li class="{{ Request::routeIs('vacancies.index') ? 'active' : '' }}"><a href="{{ route('vacancies.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Vacancies</span> </a>
                    </li>
                    <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a href="{{ route('products.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Products</span></a>
                    </li>

                    <li class="{{ Request::url('donation') ? 'active' : '' }}"><a href="{{ url('donation') }}">
                            <svg fill="currentColor" class="text-red-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg> <span> Donation list </span></a>
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Home </span> </a>
                    </li>

                    <li><a href="{{ route('resource.index') }}">
                            <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                <path style="fill:#9BC9FF;" d="M505.751,475.563l-90.815-90.815c33.944-40.71,54.397-93.04,54.397-150.064
                                    c0-129.395-105.271-234.667-234.667-234.667S0,105.287,0,234.684s105.271,234.667,234.667,234.667
                                    c57.041,0,109.389-20.467,150.103-54.43l90.813,90.813c4.166,4.166,9.626,6.249,15.084,6.249s10.92-2.082,15.084-6.249
                                    C514.084,497.401,514.084,483.893,505.751,475.563z" />
                                <path style="fill:#BDFDFF;" d="M234.667,42.684c-105.869,0-192,86.13-192,192c0,105.869,86.131,192,192,192s192-86.131,192-192
                                    C426.667,128.814,340.535,42.684,234.667,42.684z M135.111,334.239c0-54.987,44.574-99.556,99.556-99.556
                                    c-35.345,0-64.001-28.654-64.001-64s28.656-64,64.001-64s64,28.652,64,63.999s-28.655,64-64,64c54.98,0,99.554,44.568,99.554,99.556
                                    h-199.11V334.239z" />
                                <circle style="fill:#EFC27B;" cx="234.667" cy="170.68" r="64" />
                                <path style="fill:#5286FA;" d="M234.667,234.684c-54.982,0-99.556,44.568-99.556,99.556h99.556h99.554
                                    C334.221,279.252,289.647,234.684,234.667,234.684z" />
                                <path style="fill:#ECB45C;" d="M170.665,170.682c0,35.348,28.656,64,64.001,64v-128
                                    C199.322,106.684,170.665,135.336,170.665,170.682z" />
                                <path style="fill:#3D6DEB;" d="M135.111,334.239h99.556v-99.556C179.685,234.684,135.111,279.252,135.111,334.239z" />
                            </svg>
                            <span> CEC Resources </span> </a>
                    </li>
                    @if(App\Models\Convention::select('email')->where('email') === auth()->user()->email)
                    <li class="{{ Request::route('convention.idcard') ? 'active' : '' }}"><a href="{{ route('convention.idcard') }}">
                            <svg width="800px" height="800px" viewBox="0 -4.19 48 48" xmlns="http://www.w3.org/2000/svg">
                                <g id="_3" data-name="3" transform="translate(-385 -155.852)">
                                    <g id="Group_273" data-name="Group 273">
                                        <path id="Path_210" data-name="Path 210" d="M414,164.466v-3.379a5.005,5.005,0,1,0-10,0v3.379H385v31h48v-31Zm-3,17h6v2h-6Zm-5-20.379a3,3,0,1,1,6,0v3.379h-6Zm-8.112,11.627a4.151,4.151,0,1,1-4.152,4.151A4.163,4.163,0,0,1,397.888,172.714ZM406,188.466H389v-1.222c0-2.8,5.7-4.152,8.5-4.152s8.5,1.349,8.5,4.152Zm14,0h-9v-2h9Zm6-5h-7v-2h7Zm2-6H411v-2h17Z" fill="#59bdff" fill-rule="evenodd" />
                                        <path id="Path_211" data-name="Path 211" d="M409,160.466a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-1A1,1,0,0,0,409,160.466Z" fill="#59bdff" fill-rule="evenodd" />
                                    </g>
                                </g>
                            </svg>
                            <span>Convention ID Card </span> </a>
                    </li>
                    @endif
                    <li class="{{ Request::route('convention.index') ? 'active' : '' }}"><a href="{{ route('convention.index') }}">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 7C5 4.23858 7.23858 2 10 2C12.7614 2 15 4.23858 15 7C15 9.76142 12.7614 12 10 12C7.23858 12 5 9.76142 5 7ZM10 4C8.34315 4 7 5.34315 7 7C7 8.65685 8.34315 10 10 10C11.6569 10 13 8.65685 13 7C13 5.34315 11.6569 4 10 4Z" fill="#152C70" />
                                <path d="M4.00242 20C4.07771 17.7781 5.90263 16 8.14286 16H9C9.55228 16 10 15.5523 10 15C10 14.4477 9.55228 14 9 14H8.14286C4.75025 14 2 16.7503 2 20.1429C2 21.1685 2.83147 22 3.85714 22H10C10.5523 22 11 21.5523 11 21C11 20.4477 10.5523 20 10 20H4.00242Z" fill="#152C70" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17 22C19.7614 22 22 19.7614 22 17C22 14.2386 19.7614 12 17 12C14.2386 12 12 14.2386 12 17C12 19.7614 14.2386 22 17 22ZM17.0303 19.0303L19.5303 16.5303C19.8232 16.2374 19.8232 15.7626 19.5303 15.4697C19.2374 15.1768 18.7626 15.1768 18.4697 15.4697L16.5 17.4393L16.0303 16.9697C15.7374 16.6768 15.2626 16.6768 14.9697 16.9697C14.6768 17.2626 14.6768 17.7374 14.9697 18.0303L15.9692 19.0298C16.2621 19.3227 16.7374 19.3232 17.0303 19.0303Z" fill="#4296FF" />
                            </svg>
                            <span>Convention </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('prayers.index') ? 'active' : '' }}"><a href="{{ route('prayers.index') }}">
                            <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 256L106.666667 512v42.666667l405.333333-256 405.333333 256v-42.666667zM938.666667 213.333333c0 46.933333-38.4 85.333333-85.333334 85.333334s-85.333333-38.4-85.333333-85.333334 85.333333-106.666667 85.333333-106.666666 85.333333 59.733333 85.333334 106.666666zM256 213.333333c0 46.933333-38.4 85.333333-85.333333 85.333334s-85.333333-38.4-85.333334-85.333334 85.333333-106.666667 85.333334-106.666666 85.333333 59.733333 85.333333 106.666666z" fill="#F44336" />
                                <path d="M106.666667 554.666667v362.666666h810.666666V554.666667L512 298.666667 106.666667 554.666667z" fill="#E89419" />
                                <path d="M746.666667 445.866667V917.333333h128V526.933333zM277.333333 445.866667V917.333333H149.333333V526.933333z" fill="#DB8D18" />
                                <path d="M586.666667 533.333333h-49.066667L512 576l-25.6-42.666667h-49.066667l25.6-42.666666-25.6-42.666667h49.066667l25.6-42.666667 25.6 42.666667h49.066667l-25.6 42.666667z" fill="#FFECB3" />
                                <path d="M789.333333 298.666667h128v618.666666h-128zM106.666667 298.666667h128v618.666666H106.666667z" fill="#FFB74D" />
                                <path d="M768 256h170.666667v42.666667h-170.666667zM85.333333 256h170.666667v42.666667H85.333333z" fill="#FFCC80" />
                                <path d="M597.333333 917.333333h-170.666666v-170.666666c0-46.933333 38.4-85.333333 85.333333-85.333334s85.333333 38.4 85.333333 85.333334v170.666666z" fill="#805A26" />
                            </svg>
                            <span> Daily Prayers </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a href="{{ route('posts.index') }}">
                            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="discussion" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                <path id="secondary" d="M8.4,16.8A3,3,0,0,0,9,15a3,3,0,0,0-6,0,3,3,0,0,0,.6,1.8A4,4,0,0,0,2,20v1a1,1,0,0,0,1,1H9a1,1,0,0,0,1-1V20A4,4,0,0,0,8.4,16.8Z" style="fill: rgb(44, 169, 188);"></path>
                                <path id="primary" d="M22,7v3a2,2,0,0,1-2,2H16.24l-3.79,1.89A1,1,0,0,1,12,14a1,1,0,0,1-.53-.15A1,1,0,0,1,11,13V11.73A2,2,0,0,1,10,10V7a2,2,0,0,1,2-2h8A2,2,0,0,1,22,7ZM9,7a3,3,0,0,1,3-3h4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V7A2,2,0,0,0,4,9H9Z" style="fill: rgb(0, 0, 0);"></path>
                            </svg>
                            <span> Stories </span> </a>
                    </li>
                    <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a href="{{ route('videos.index') }}">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 6C3 4.34315 4.34315 3 6 3H14C15.6569 3 17 4.34315 17 6V14C17 15.6569 15.6569 17 14 17H6C4.34315 17 3 15.6569 3 14V6Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 7V18C21 19.6569 19.6569 21 18 21H7" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 12V8L12.1429 10L9 12Z" fill="#000000" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span> Shorts </span></a>
                    </li>
                    <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a href="{{ route('audios.index') }}">
                            <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M862 779.3c-6.8 0-12.3-5.5-12.3-12.3V514.1c0-45.2-8.9-89.2-26.6-130.7-17-40.1-41.4-76.1-72.3-107.1-31-31-67-55.3-107.1-72.3-41.5-17.6-85.4-26.6-130.7-26.6-45.2 0-89.2 8.9-130.7 26.6-40.1 17-76.1 41.4-107.1 72.3-31 31-55.3 67-72.3 107.1-17.6 41.5-26.6 85.4-26.6 130.7v252.8c0 6.8-5.5 12.3-12.3 12.3s-12.3-5.5-12.3-12.3V514.1c0-48.6 9.6-95.8 28.5-140.3 18.3-43 44.4-81.6 77.6-114.9 33.2-33.2 71.9-59.3 114.9-77.6 44.5-18.9 91.7-28.5 140.3-28.5 48.6 0 95.8 9.6 140.3 28.5 43 18.3 81.6 44.4 114.9 77.6 33.2 33.2 59.3 71.9 77.6 114.9 18.9 44.5 28.5 91.7 28.5 140.3v252.8c0 6.9-5.5 12.4-12.3 12.4z" fill="#154B8B" />
                                <path d="M99.9 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                <path d="M99.9 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0.1 42.1-34.2 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c0-28.5-23.2-51.8-51.8-51.8z" fill="#154B8B" />
                                <path d="M926.1 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                <path d="M926.1 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0 42.1-34.3 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c-0.1-28.5-23.3-51.8-51.8-51.8zM527.2 762.9c-0.9 0-1.8-0.1-2.7-0.2-6.5-1.1-11.6-6-13-12.5l-41.8-192-71.5 107.3c-3 4.5-8 7.2-13.4 7.2h-92.6c-8.9 0-16.1-7.2-16.1-16.1s7.2-16.1 16.1-16.1h84L464 508.8c3.6-5.4 10-8.1 16.4-6.9 6.4 1.2 11.4 6.1 12.8 12.4l41.4 190.3 39.6-63.6c2.9-4.7 8.1-7.6 13.7-7.6h146c8.9 0 16.1 7.2 16.1 16.1s-7.2 16.1-16.1 16.1h-137l-55.8 89.7c-3.1 4.8-8.4 7.6-13.9 7.6z" fill="#154B8B" />
                            </svg><span> Audio Clips </span></a>
                    </li>

                    <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a href="{{ route('products.index') }}">
                            <svg width="800px" height="800px" viewBox="0 0 32 32" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                 <style type="text/css">
                                    .st0 {
                                        fill: #00BBB4;
                                    }

                                    .st1 {
                                        fill: #1B75BC;
                                    }

                                    .st2 {
                                        fill: #F15A29;
                                    }
                                </style> 
                                <g>

                                    <g>

                                        <path class="st0" d="M5,14.015625V30.5h12.0424805v-7.9232178c0-1.8409424,1.4923706-3.333313,3.333313-3.333313    s3.333374,1.4923706,3.333374,3.333313V30.5H27V14.015625H5z M13.553833,20.75h-4c-0.5523071,0-1-0.4477539-1-1    c0-0.5523071,0.4476929-1,1-1h4c0.5523071,0,1,0.4476929,1,1C14.553833,20.3022461,14.1061401,20.75,13.553833,20.75z" />

                                    </g>

                                    <g>

                                        <path class="st1" d="M31,31.5H1c-0.5522461,0-1-0.4477539-1-1s0.4477539-1,1-1h30c0.5522461,0,1,0.4477539,1,1    S31.5522461,31.5,31,31.5z" />

                                    </g>

                                    <g>

                                        <path class="st2" d="M5.2246366,12.531251h-0.00001c-3.0098128,0-5.0521717-3.0604792-3.8971148-5.8398342l2.5730567-6.1914167    h6.6666656L9.4049702,8.8900909C9.1158504,10.9771776,7.3316536,12.531251,5.2246366,12.531251z" />

                                    </g>

                                    <g>

                                        <path class="st2" d="M16.1548214,12.531251h-0.3096428c-2.5610209,0-4.5317516-2.2625523-4.1803341-4.7993479l1.0018225-7.2319031    h6.666667l1.0018215,7.2319031C20.686573,10.2686987,18.7158413,12.531251,16.1548214,12.531251z" />

                                    </g>

                                    <g>

                                        <path class="st2" d="M26.7753735,12.531251h-0.0000095c-2.1070175,0-3.8912144-1.5540733-4.1803341-3.64116L21.432766,0.4999999    h6.666666l2.5730553,6.1914167C31.8275452,9.4707718,29.7851868,12.531251,26.7753735,12.531251z" />

                                    </g>

                                </g> 
                            </svg> <span> Store </span></a>
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
                    <a href="https://www.youtube.com/channel/UC2UQ-kfj__DO2_zoEExg0UQ"><i class="icon-brand-youtube"></i> Youtube </a>
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
    <script src="{{ asset('assets/code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script nomodule="" src="{{ asset('assets/ionicons%405.2.3/dist/ionicons.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.min.js"></script> --}}
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Cherubim and Seraphim Church Unification Campus Fellowship </title>
    <meta name="description" content="@yield('description') ">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" wire:navigate href="@yield('canonical')" />
    <link rel="shortcut icon" wire:navigate href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="canonical" wire:navigate href="https://cnsunification.org" />
    <link rel="shortcut icon" wire:navigate href="{{ asset('assets/images/isokan_logo.png') }}" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('assets/images/isokan_logo.png') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('canonical')">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('assets/images/isokan_logo.png') }}">
    <meta name="og:title" content="@yield('title')">
    <meta name="og:description" content="@yield('description')">
    <meta name="og:image" content="{{ asset('assets/images/favicon/favicon.png') }}">
    <meta name="og:url" content="@yield('canonical')">
    <meta name="og:site_name" content="@yield('title')">
    <meta name="og:application-name" content="@yield('title')">
    <meta name="og:author" content="Afolabi Marcus - +2349035155129">
    <link rel="apple-touch-icon" sizes="180x180" wire:navigate href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" wire:navigate href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" wire:navigate href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" wire:navigate href="{{ asset('assets/images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" wire:navigate href="{{ asset('assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" wire:navigate href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" wire:navigate href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" wire:navigate href="{{ asset('assets/css/style.css') }}">
    <link wire:navigate href="{{ asset('assets/tailwindcss%402.2.19/dist/tailwind.min.css') }}" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RBZ3GDR92P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-RBZ3GDR92P');
    </script>
    <script src="https://www.googleoptimize.com/optimize.js?id=GTM-5L3ZJLW"></script>

    <link rel="stylesheet" wire:navigate href="https://cdn.plyr.io/3.5.6/plyr.css" />
    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                // 'volume', // Volume control
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
    @livewireStyles
</head>

<body>
    <div id="wrapper" class="is-collapse">
        @persist('header')
            <header>
                <div class="header_wrap">
                    <div class="header_inner mcontainer">
                        <div class="left_side"><span class="slide_menu"
                                uk-toggle="target: #wrapper ; cls: is-collapse is-active"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path>
                                </svg></span>
                            <div id="logo"><a wire:navigate href="/"><img src="{{ asset('assets/images/logo.png') }}"
                                        title="Unification Campus Fellowship" alt="Unification Campus Fellowship"><img
                                        src="{{ asset('assets/images/logo.png') }}" class="logo_mobile"
                                        title="Unification Campus Fellowship" alt="Unification Campus Fellowship"></a>
                            </div>
                        </div>
                        <div class="header_search"><i class="uil-search-alt"></i>
                            <form action="" method=""><input value="" type="text"
                                    class="form-control" name="search"
                                    placeholder="Search for Articules, Messages and more.." autocomplete="off"></form>
                        </div>
                        <div class="right_side">
                            <div class="header_widgets">
                                @if (Route::has('login')) @auth
                                    <a wire:navigate href="{{ route('convention.index') }}" class="is_link">Convention</a>
                                @else
                                    <a wire:navigate href="{{ route('login') }}" class="is_link">Log in</a>
                                    @if (Route::has('register'))
                                        <a wire:navigate href="{{ route('register') }}" class="is_link">Become a Member</a>
                                    @endif @endauth
                                @endif
                                @if (Route::has('login'))
                                    @auth @php $user = auth()->user(); @endphp <a wire:navigate href="{{ route('user.index') }}"><img
                                                src="{{ asset($user->profile_photo_url) }}" class="is_avatar"
                                                alt=""></a>
                                    @else
                                        <a wire:navigate href="#"><img src="{{ asset('assets/images/avatars/avatar-1.png') }}"
                                            class="is_avatar" alt=""></a>@endauth
                                @endif
                                <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                                    @if (Route::has('login')) @auth
                                        <a wire:navigate href="{{ route('user.index') }}" class="user">
                                            <div class="user_avatar"><img src="{{ asset($user->profile_photo_url) }}"
                                                    class="is_avatar" title="Unification Campus Fellowship"
                                                    alt="Unification Campus Fellowship"></div>
                                            <div class="user_name">
                                                <div>{{ auth()->user()->name }} </div><span>{{ auth()->user()->email }}
                                                </span>
                                            </div>
                                        </a>
                                        <hr><a wire:navigate href="{{ route('convention.index') }}" class="is-link"><svg
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                    clip-rule="evenodd"></path>
                                            </svg>2023 - Convention </span></a>
                                        @php $user = Auth::user()->id @endphp
                                        <hr><a wire:navigate href="{{ route('user.editMember', $user) }}"><svg fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>Manage account </a>
                                        <a wire:navigate href="{{ route('user.logout', $user) }}"><svg fill="#000000" height="800px"
                                                width="800px" version="1.1" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.3 490.3"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M0,121.05v248.2c0,34.2,27.9,62.1,62.1,62.1h200.6c34.2,0,62.1-27.9,62.1-62.1v-40.2c0-6.8-5.5-12.3-12.3-12.3 s-12.3,5.5-12.3,12.3v40.2c0,20.7-16.9,37.6-37.6,37.6H62.1c-20.7,0-37.6-16.9-37.6-37.6v-248.2c0-20.7,16.9-37.6,37.6-37.6h200.6 c20.7,0,37.6,16.9,37.6,37.6v40.2c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-40.2c0-34.2-27.9-62.1-62.1-62.1H62.1 C27.9,58.95,0,86.75,0,121.05z" />
                                                        <path
                                                            d="M385.4,337.65c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l83.9-83.9c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9 c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l63,63H218.6c-6.8,0-12.3,5.5-12.3,12.3c0,6.8,5.5,12.3,12.3,12.3h229.8l-63,63 C380.6,325.15,380.6,332.95,385.4,337.65z" />
                                                    </g>
                                                </g>
                                            </svg>Logout </a><a wire:navigate href="#" id="night-mode"
                                            class="btn-night-mode"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                            </svg>Night mode <span class="btn-night-mode-switch"><span
                                                    class="uk-switch-button"></span></span></a>
                                    @else
                                        <a wire:navigate href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>Login </a><a wire:navigate href="{{ route('register') }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                        </svg>Register </a>@endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar>

                <ul>
                    @guest
                        <li class="{{ Request::routeIs('login') ? 'active' : '' }}"><a wire:navigate href="{{ route('login') }}">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1024 1024"
                                    xmlns="http://www.w3.org/2000/svg" class="icon">
                                    <defs>
                                        <style />
                                    </defs>
                                    <path
                                        d="M521.7 82c-152.5-.4-286.7 78.5-363.4 197.7-3.4 5.3.4 12.3 6.7 12.3h70.3c4.8 0 9.3-2.1 12.3-5.8 7-8.5 14.5-16.7 22.4-24.5 32.6-32.5 70.5-58.1 112.7-75.9 43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 32.6 32.5 58.1 70.4 76 112.5C865.7 417.8 875 464.1 875 512c0 47.9-9.4 94.2-27.8 137.8-17.8 42.1-43.4 80-76 112.5s-70.5 58.1-112.7 75.9A352.8 352.8 0 0 1 520.6 866c-47.9 0-94.3-9.4-137.9-27.8A353.84 353.84 0 0 1 270 762.3c-7.9-7.9-15.3-16.1-22.4-24.5-3-3.7-7.6-5.8-12.3-5.8H165c-6.3 0-10.2 7-6.7 12.3C234.9 863.2 368.5 942 520.6 942c236.2 0 428-190.1 430.4-425.6C953.4 277.1 761.3 82.6 521.7 82zM395.02 624v-76h-314c-4.4 0-8-3.6-8-8v-56c0-4.4 3.6-8 8-8h314v-76c0-6.7 7.8-10.5 13-6.3l141.9 112a8 8 0 0 1 0 12.6l-141.9 112c-5.2 4.1-13 .4-13-6.3z" />
                                </svg><span>Login </span></a></li>
                        <li class="{{ Request::routeIs('register') ? 'active' : '' }}"><a
                                wire:navigate href="{{ route('register') }}"><svg width="800px" height="800px"
                                    viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="512" cy="512" r="512" style="fill:#112e51" />
                                    <path
                                        d="m458.15 617.7 18.8-107.3a56.94 56.94 0 0 1 35.2-101.9V289.4h-145.2a56.33 56.33 0 0 0-56.3 56.3v275.8a33.94 33.94 0 0 0 3.4 15c12.2 24.6 60.2 103.7 197.9 164.5V622.1a313.29 313.29 0 0 1-53.8-4.4zM656.85 289h-144.9v119.1a56.86 56.86 0 0 1 35.7 101.4l18.8 107.8A320.58 320.58 0 0 1 512 622v178.6c137.5-60.5 185.7-139.9 197.9-164.5a33.94 33.94 0 0 0 3.4-15V345.5a56 56 0 0 0-16.4-40 56.76 56.76 0 0 0-40.05-16.5z"
                                        style="fill:#fff" />
                                </svg><span>Become a member </span></a></li>
                        <li hidden class="{{ Request::routeIs('convention.index') ? 'active' : '' }}"><a
                                wire:navigate href="{{ route('convention.index') }}"><svg width="20px" height="20px"
                                    viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M106.666667 810.666667V298.666667h810.666666v512c0 46.933333-38.4 85.333333-85.333333 85.333333H192c-46.933333 0-85.333333-38.4-85.333333-85.333333z"
                                        fill="#CFD8DC" />
                                    <path
                                        d="M917.333333 213.333333v128H106.666667v-128c0-46.933333 38.4-85.333333 85.333333-85.333333h640c46.933333 0 85.333333 38.4 85.333333 85.333333z"
                                        fill="#F44336" />
                                    <path d="M704 213.333333m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#B71C1C" />
                                    <path d="M320 213.333333m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#B71C1C" />
                                    <path
                                        d="M704 64c-23.466667 0-42.666667 19.2-42.666667 42.666667v106.666666c0 23.466667 19.2 42.666667 42.666667 42.666667s42.666667-19.2 42.666667-42.666667V106.666667c0-23.466667-19.2-42.666667-42.666667-42.666667zM320 64c-23.466667 0-42.666667 19.2-42.666667 42.666667v106.666666c0 23.466667 19.2 42.666667 42.666667 42.666667s42.666667-19.2 42.666667-42.666667V106.666667c0-23.466667-19.2-42.666667-42.666667-42.666667z"
                                        fill="#B0BEC5" />
                                    <path
                                        d="M277.333333 426.666667h85.333334v85.333333h-85.333334zM405.333333 426.666667h85.333334v85.333333h-85.333334zM533.333333 426.666667h85.333334v85.333333h-85.333334zM661.333333 426.666667h85.333334v85.333333h-85.333334zM277.333333 554.666667h85.333334v85.333333h-85.333334zM405.333333 554.666667h85.333334v85.333333h-85.333334zM533.333333 554.666667h85.333334v85.333333h-85.333334zM661.333333 554.666667h85.333334v85.333333h-85.333334zM277.333333 682.666667h85.333334v85.333333h-85.333334zM405.333333 682.666667h85.333334v85.333333h-85.333334zM533.333333 682.666667h85.333334v85.333333h-85.333334zM661.333333 682.666667h85.333334v85.333333h-85.333334z"
                                        fill="#90A4AE" />
                                </svg><span>Convention Registration </span></a></li>

                        <li class="{{ Request::routeIs('convention.index') ? 'active' : '' }}"><a
                                wire:navigate href="{{ route('convention.index') }}"><svg width="20px" height="20px"
                                    viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M106.666667 810.666667V298.666667h810.666666v512c0 46.933333-38.4 85.333333-85.333333 85.333333H192c-46.933333 0-85.333333-38.4-85.333333-85.333333z"
                                        fill="#CFD8DC" />
                                    <path
                                        d="M917.333333 213.333333v128H106.666667v-128c0-46.933333 38.4-85.333333 85.333333-85.333333h640c46.933333 0 85.333333 38.4 85.333333 85.333333z"
                                        fill="#F44336" />
                                    <path d="M704 213.333333m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#B71C1C" />
                                    <path d="M320 213.333333m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#B71C1C" />
                                    <path
                                        d="M704 64c-23.466667 0-42.666667 19.2-42.666667 42.666667v106.666666c0 23.466667 19.2 42.666667 42.666667 42.666667s42.666667-19.2 42.666667-42.666667V106.666667c0-23.466667-19.2-42.666667-42.666667-42.666667zM320 64c-23.466667 0-42.666667 19.2-42.666667 42.666667v106.666666c0 23.466667 19.2 42.666667 42.666667 42.666667s42.666667-19.2 42.666667-42.666667V106.666667c0-23.466667-19.2-42.666667-42.666667-42.666667z"
                                        fill="#B0BEC5" />
                                    <path
                                        d="M277.333333 426.666667h85.333334v85.333333h-85.333334zM405.333333 426.666667h85.333334v85.333333h-85.333334zM533.333333 426.666667h85.333334v85.333333h-85.333334zM661.333333 426.666667h85.333334v85.333333h-85.333334zM277.333333 554.666667h85.333334v85.333333h-85.333334zM405.333333 554.666667h85.333334v85.333333h-85.333334zM533.333333 554.666667h85.333334v85.333333h-85.333334zM661.333333 554.666667h85.333334v85.333333h-85.333334zM277.333333 682.666667h85.333334v85.333333h-85.333334zM405.333333 682.666667h85.333334v85.333333h-85.333334zM533.333333 682.666667h85.333334v85.333333h-85.333334zM661.333333 682.666667h85.333334v85.333333h-85.333334z"
                                        fill="#90A4AE" />
                                </svg><span>Convention Registration </span></a></li>
                        <li class="{{ Request::routeIs('donation.index') ? 'active' : '' }}"><a
                                wire:navigate href="{{ route('donation.index') }}"><svg fill="currentColor" class="text-red-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg><span>Donate </span></a></li>
                        <li class="{{ Request::routeIs('fellowship.list') ? 'active' : '' }}"><a
                                wire:navigate href="{{ route('fellowship.list') }}"><svg width="20px" height="20px"
                                    viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                    class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
                                    <path fill="#BCBEC0"
                                        d="M20 2h-1V1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v6a1 1 0 1 0 2 0V4h1a1 1 0 1 0 0-2z">
                                    </path>
                                    <path fill="#FFD983" d="M18 9l-5.143 4H13v9h10v-9h.143z"></path>
                                    <path fill="#662113" d="M19.999 15A2 2 0 0 0 16 15v7h4l-.001-7z"></path>
                                    <path fill="#FFD983"
                                        d="M17.999 18L4 26v9a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-9l-14.001-8z">
                                    </path>
                                    <path fill="#DD2E44"
                                        d="M31.998 27a.988.988 0 0 1-.495-.132l-13.504-7.717l-13.504 7.717a.999.999 0 1 1-.992-1.736l14-8a.998.998 0 0 1 .992 0l14 8A.998.998 0 0 1 31.998 27zm-8.999-13a1 1 0 0 1-.624-.219l-4.376-3.5l-4.374 3.5a1 1 0 0 1-1.25-1.562l4.999-4a1.001 1.001 0 0 1 1.25 0l5.001 4A1 1 0 0 1 22.999 14z">
                                    </path>
                                    <path fill="#662113"
                                        d="M12.999 31A2 2 0 1 0 9 31v5h4v-5h-.001zm7-2A2 2 0 0 0 16 29v7h4l-.001-7zm7 2A2 2 0 0 0 23 31v5h4l-.001-5z">
                                    </path>
                                </svg><span>Fellowships </span></a></li>
                        <li><a wire:navigate href="{{ route('resource.list') }}"><svg height="800px" width="800px" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                    xml:space="preserve">
                                    <path style="fill:#9BC9FF;"
                                        d="M505.751,475.563l-90.815-90.815c33.944-40.71,54.397-93.04,54.397-150.064 c0-129.395-105.271-234.667-234.667-234.667S0,105.287,0,234.684s105.271,234.667,234.667,234.667 c57.041,0,109.389-20.467,150.103-54.43l90.813,90.813c4.166,4.166,9.626,6.249,15.084,6.249s10.92-2.082,15.084-6.249 C514.084,497.401,514.084,483.893,505.751,475.563z" />
                                    <path style="fill:#BDFDFF;"
                                        d="M234.667,42.684c-105.869,0-192,86.13-192,192c0,105.869,86.131,192,192,192s192-86.131,192-192 C426.667,128.814,340.535,42.684,234.667,42.684z M135.111,334.239c0-54.987,44.574-99.556,99.556-99.556 c-35.345,0-64.001-28.654-64.001-64s28.656-64,64.001-64s64,28.652,64,63.999s-28.655,64-64,64c54.98,0,99.554,44.568,99.554,99.556 h-199.11V334.239z" />
                                    <circle style="fill:#EFC27B;" cx="234.667" cy="170.68" r="64" />
                                    <path style="fill:#5286FA;"
                                        d="M234.667,234.684c-54.982,0-99.556,44.568-99.556,99.556h99.556h99.554 C334.221,279.252,289.647,234.684,234.667,234.684z" />
                                    <path style="fill:#ECB45C;"
                                        d="M170.665,170.682c0,35.348,28.656,64,64.001,64v-128 C199.322,106.684,170.665,135.336,170.665,170.682z" />
                                    <path style="fill:#3D6DEB;"
                                        d="M135.111,334.239h99.556v-99.556C179.685,234.684,135.111,279.252,135.111,334.239z" />
                                </svg><span>CEC Resources </span></a></li>
                        @endguest

                        @auth @if (auth()->user()->role === 'admin')
                            <li class="{{ Request::routeIs('welcome') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('welcome') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg><span>Home </span></a></li>
                            <li class="{{ Request::route('dashboard.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('dashboard.index') }}"><svg fill="#000000" width="20px" height="20px"
                                        viewBox="0 0 24 24" id="dashboard-alt" data-name="Flat Color"
                                        xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                        <path id="primary"
                                            d="M2,8V4A2,2,0,0,1,4,2H20a2,2,0,0,1,2,2V8Zm14,2V22h4a2,2,0,0,0,2-2V10Z"
                                            style="fill: rgb(0, 0, 0);"></path>
                                        <path id="secondary" d="M14,10H2V20a2,2,0,0,0,2,2H14Z"
                                            style="fill: rgb(44, 169, 188);">
                                        </path>
                                    </svg><span>Dashboard </span></a></li>
                            <li class="{{ Request::route('convention.list') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('convention.list') }}"><svg width="800px" height="800px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 2C7.55228 2 8 2.44772 8 3V5C8 5.55228 7.55228 6 7 6C6.44772 6 6 5.55228 6 5V3C6 2.44772 6.44772 2 7 2Z"
                                            fill="#4296FF" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 2C17.5523 2 18 2.44772 18 3V5C18 5.55228 17.5523 6 17 6C16.4477 6 16 5.55228 16 5V3C16 2.44772 16.4477 2 17 2Z"
                                            fill="#4296FF" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 13C7 12.4477 7.44772 12 8 12H16C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14H8C7.44772 14 7 13.5523 7 13Z"
                                            fill="#4296FF" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 17C7 16.4477 7.44772 16 8 16H12C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18H8C7.44772 18 7 17.5523 7 17Z"
                                            fill="#4296FF" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 4C4.23858 4 2 6.23858 2 9V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V9C22 6.23858 19.7614 4 17 4H7ZM19.8293 8C19.4175 6.83481 18.3062 6 17 6H7C5.69378 6 4.58254 6.83481 4.17071 8H19.8293ZM4 10H20V17C20 18.6569 18.6569 20 17 20H7C5.34315 20 4 18.6569 4 17V10Z"
                                            fill="#152C70" />
                                    </svg><span>Convention </span></a></li>
                            <li class="{{ Request::routeIs('fellowship.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('fellowship.index') }}"><svg width="20px" height="20px"
                                        viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
                                        <path fill="#BCBEC0"
                                            d="M20 2h-1V1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v6a1 1 0 1 0 2 0V4h1a1 1 0 1 0 0-2z">
                                        </path>
                                        <path fill="#FFD983" d="M18 9l-5.143 4H13v9h10v-9h.143z"></path>
                                        <path fill="#662113" d="M19.999 15A2 2 0 0 0 16 15v7h4l-.001-7z"></path>
                                        <path fill="#FFD983"
                                            d="M17.999 18L4 26v9a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-9l-14.001-8z">
                                        </path>
                                        <path fill="#DD2E44"
                                            d="M31.998 27a.988.988 0 0 1-.495-.132l-13.504-7.717l-13.504 7.717a.999.999 0 1 1-.992-1.736l14-8a.998.998 0 0 1 .992 0l14 8A.998.998 0 0 1 31.998 27zm-8.999-13a1 1 0 0 1-.624-.219l-4.376-3.5l-4.374 3.5a1 1 0 0 1-1.25-1.562l4.999-4a1.001 1.001 0 0 1 1.25 0l5.001 4A1 1 0 0 1 22.999 14z">
                                        </path>
                                        <path fill="#662113"
                                            d="M12.999 31A2 2 0 1 0 9 31v5h4v-5h-.001zm7-2A2 2 0 0 0 16 29v7h4l-.001-7zm7 2A2 2 0 0 0 23 31v5h4l-.001-5z">
                                        </path>
                                    </svg><span>Fellowships </span></a></li>
                            <li class="{{ Request::routeIs('unit.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('unit.index') }}"><svg width="20px" height="20px" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="iconify iconify--twemoji"
                                        preserveAspectRatio="xMidYMid meet">
                                        <path fill="#BCBEC0"
                                            d="M20 2h-1V1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v6a1 1 0 1 0 2 0V4h1a1 1 0 1 0 0-2z">
                                        </path>
                                        <path fill="#FFD983" d="M18 9l-5.143 4H13v9h10v-9h.143z"></path>
                                        <path fill="#662113" d="M19.999 15A2 2 0 0 0 16 15v7h4l-.001-7z"></path>
                                        <path fill="#FFD983"
                                            d="M17.999 18L4 26v9a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-9l-14.001-8z">
                                        </path>
                                        <path fill="#DD2E44"
                                            d="M31.998 27a.988.988 0 0 1-.495-.132l-13.504-7.717l-13.504 7.717a.999.999 0 1 1-.992-1.736l14-8a.998.998 0 0 1 .992 0l14 8A.998.998 0 0 1 31.998 27zm-8.999-13a1 1 0 0 1-.624-.219l-4.376-3.5l-4.374 3.5a1 1 0 0 1-1.25-1.562l4.999-4a1.001 1.001 0 0 1 1.25 0l5.001 4A1 1 0 0 1 22.999 14z">
                                        </path>
                                        <path fill="#662113"
                                            d="M12.999 31A2 2 0 1 0 9 31v5h4v-5h-.001zm7-2A2 2 0 0 0 16 29v7h4l-.001-7zm7 2A2 2 0 0 0 23 31v5h4l-.001-5z">
                                        </path>
                                    </svg><span>Units </span></a></li>
                            <li class="{{ Request::routeIs('house.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('house.index') }}"><svg width="20px" height="20px"
                                        viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
                                        <path fill="#BCBEC0"
                                            d="M20 2h-1V1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v6a1 1 0 1 0 2 0V4h1a1 1 0 1 0 0-2z">
                                        </path>
                                        <path fill="#FFD983" d="M18 9l-5.143 4H13v9h10v-9h.143z"></path>
                                        <path fill="#662113" d="M19.999 15A2 2 0 0 0 16 15v7h4l-.001-7z"></path>
                                        <path fill="#FFD983"
                                            d="M17.999 18L4 26v9a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-9l-14.001-8z">
                                        </path>
                                        <path fill="#DD2E44"
                                            d="M31.998 27a.988.988 0 0 1-.495-.132l-13.504-7.717l-13.504 7.717a.999.999 0 1 1-.992-1.736l14-8a.998.998 0 0 1 .992 0l14 8A.998.998 0 0 1 31.998 27zm-8.999-13a1 1 0 0 1-.624-.219l-4.376-3.5l-4.374 3.5a1 1 0 0 1-1.25-1.562l4.999-4a1.001 1.001 0 0 1 1.25 0l5.001 4A1 1 0 0 1 22.999 14z">
                                        </path>
                                        <path fill="#662113"
                                            d="M12.999 31A2 2 0 1 0 9 31v5h4v-5h-.001zm7-2A2 2 0 0 0 16 29v7h4l-.001-7zm7 2A2 2 0 0 0 23 31v5h4l-.001-5z">
                                        </path>
                                    </svg><span>Houses </span></a></li>
                            <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('user.index') }}"><svg height="20px" width="20px" version="1.1"
                                        id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58 58" xml:space="preserve">
                                        <path style="fill:#3083C9;"
                                            d="M39.566,45.283l-9.552-4.776C28.78,39.89,28,38.628,28,37.248V33.5 c0.268-0.305,0.576-0.698,0.904-1.162c1.302-1.838,2.286-3.861,2.969-5.984C33.098,25.977,34,24.845,34,23.5v-4 c0-0.88-0.391-1.667-1-2.217V11.5c0,0,1.187-9-11-9c-12.188,0-11,9-11,9v5.783c-0.609,0.55-1,1.337-1,2.217v4 c0,1.054,0.554,1.981,1.383,2.517C12.382,30.369,15,33.5,15,33.5v3.655c0,1.333-0.728,2.56-1.899,3.198L4.18,45.22 C1.603,46.625,0,49.326,0,52.261V55.5h44v-3.043C44,49.419,42.283,46.642,39.566,45.283z" />
                                        <path style="fill:#CB465F;"
                                            d="M54.07,46.444l-9.774-4.233c-0.535-0.267-0.971-0.836-1.277-1.453 c-0.277-0.557,0.136-1.212,0.758-1.212h6.883c0,0,2.524,0.242,4.471-0.594c1.14-0.49,1.533-1.921,0.82-2.936 c-2.085-2.969-6.396-9.958-6.535-17.177c0,0-0.239-11.112-11.202-11.202c-2.187,0.018-3.97,0.476-5.438,1.188 C33.152,10.324,33,11.5,33,11.5v5.783c0.609,0.55,1,1.337,1,2.217v4c0,1.345-0.902,2.477-2.127,2.854 c-0.683,2.122-1.667,4.145-2.969,5.984C28.576,32.802,28.268,33.195,28,33.5v3.748c0,0.853,0.299,1.659,0.818,2.297h2.751 c0.687,0,0.99,0.868,0.451,1.293c-0.186,0.147-0.364,0.283-0.53,0.406l8.077,4.038C42.283,46.642,44,49.419,44,52.457V55.5h14 v-2.697C58,50.11,56.479,47.648,54.07,46.444z" />
                                    </svg><span>Members </span></a></li>
                            <li class="{{ Request::routeIs('executives.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('executives.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                    </svg><span>CEC Council </span></a></li>
                            <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('posts.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                            clip-rule="evenodd" />
                                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                                    </svg><span>Stories</span></a></li>
                            <li class="{{ Request::routeIs('resource.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('resource.index') }}"><svg height="800px" width="800px" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                        xml:space="preserve">
                                        <path style="fill:#9BC9FF;"
                                            d="M505.751,475.563l-90.815-90.815c33.944-40.71,54.397-93.04,54.397-150.064 c0-129.395-105.271-234.667-234.667-234.667S0,105.287,0,234.684s105.271,234.667,234.667,234.667 c57.041,0,109.389-20.467,150.103-54.43l90.813,90.813c4.166,4.166,9.626,6.249,15.084,6.249s10.92-2.082,15.084-6.249 C514.084,497.401,514.084,483.893,505.751,475.563z" />
                                        <path style="fill:#BDFDFF;"
                                            d="M234.667,42.684c-105.869,0-192,86.13-192,192c0,105.869,86.131,192,192,192s192-86.131,192-192 C426.667,128.814,340.535,42.684,234.667,42.684z M135.111,334.239c0-54.987,44.574-99.556,99.556-99.556 c-35.345,0-64.001-28.654-64.001-64s28.656-64,64.001-64s64,28.652,64,63.999s-28.655,64-64,64c54.98,0,99.554,44.568,99.554,99.556 h-199.11V334.239z" />
                                        <circle style="fill:#EFC27B;" cx="234.667" cy="170.68" r="64" />
                                        <path style="fill:#5286FA;"
                                            d="M234.667,234.684c-54.982,0-99.556,44.568-99.556,99.556h99.556h99.554 C334.221,279.252,289.647,234.684,234.667,234.684z" />
                                        <path style="fill:#ECB45C;"
                                            d="M170.665,170.682c0,35.348,28.656,64,64.001,64v-128 C199.322,106.684,170.665,135.336,170.665,170.682z" />
                                        <path style="fill:#3D6DEB;"
                                            d="M135.111,334.239h99.556v-99.556C179.685,234.684,135.111,279.252,135.111,334.239z" />
                                    </svg><span>Downloads</span></a></li>
                            <li class="{{ Request::routeIs('prayers.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('prayers.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Prayers </span></a></li>
                            <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('videos.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Shorts</span></a></li>
                            <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('audios.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Audio Clips</span></a></li>
                            <li class="{{ Request::routeIs('vacancies.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('vacancies.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Vacancies</span></a></li>
                            <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('products.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Products</span></a></li>
                            <li class="{{ Request::routeIs('donation.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('donation.index') }}"><svg fill="currentColor" class="text-red-500"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Donation </span></a></li>
                            @elseif(auth()->user()->role === 'member')
                            <li class="{{ Request::routeIs('welcome') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('welcome') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg><span>Home </span></a></li>
                            <li><a wire:navigate href="{{ route('resource.index') }}"><svg height="800px" width="800px" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                        xml:space="preserve">
                                        <path style="fill:#9BC9FF;"
                                            d="M505.751,475.563l-90.815-90.815c33.944-40.71,54.397-93.04,54.397-150.064 c0-129.395-105.271-234.667-234.667-234.667S0,105.287,0,234.684s105.271,234.667,234.667,234.667 c57.041,0,109.389-20.467,150.103-54.43l90.813,90.813c4.166,4.166,9.626,6.249,15.084,6.249s10.92-2.082,15.084-6.249 C514.084,497.401,514.084,483.893,505.751,475.563z" />
                                        <path style="fill:#BDFDFF;"
                                            d="M234.667,42.684c-105.869,0-192,86.13-192,192c0,105.869,86.131,192,192,192s192-86.131,192-192 C426.667,128.814,340.535,42.684,234.667,42.684z M135.111,334.239c0-54.987,44.574-99.556,99.556-99.556 c-35.345,0-64.001-28.654-64.001-64s28.656-64,64.001-64s64,28.652,64,63.999s-28.655,64-64,64c54.98,0,99.554,44.568,99.554,99.556 h-199.11V334.239z" />
                                        <circle style="fill:#EFC27B;" cx="234.667" cy="170.68" r="64" />
                                        <path style="fill:#5286FA;"
                                            d="M234.667,234.684c-54.982,0-99.556,44.568-99.556,99.556h99.556h99.554 C334.221,279.252,289.647,234.684,234.667,234.684z" />
                                        <path style="fill:#ECB45C;"
                                            d="M170.665,170.682c0,35.348,28.656,64,64.001,64v-128 C199.322,106.684,170.665,135.336,170.665,170.682z" />
                                        <path style="fill:#3D6DEB;"
                                            d="M135.111,334.239h99.556v-99.556C179.685,234.684,135.111,279.252,135.111,334.239z" />
                                    </svg><span>CEC Resources </span></a></li>
                            @if (App\Models\Convention::select('email')->where('email') === auth()->user()->email)
                            <li class="{{ Request::route('convention.idcard') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('convention.idcard') }}"><svg width="800px" height="800px"
                                        viewBox="0 -4.19 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <g id="_3" data-name="3" transform="translate(-385 -155.852)">
                                            <g id="Group_273" data-name="Group 273">
                                                <path id="Path_210" data-name="Path 210"
                                                    d="M414,164.466v-3.379a5.005,5.005,0,1,0-10,0v3.379H385v31h48v-31Zm-3,17h6v2h-6Zm-5-20.379a3,3,0,1,1,6,0v3.379h-6Zm-8.112,11.627a4.151,4.151,0,1,1-4.152,4.151A4.163,4.163,0,0,1,397.888,172.714ZM406,188.466H389v-1.222c0-2.8,5.7-4.152,8.5-4.152s8.5,1.349,8.5,4.152Zm14,0h-9v-2h9Zm6-5h-7v-2h7Zm2-6H411v-2h17Z"
                                                    fill="#59bdff" fill-rule="evenodd" />
                                                <path id="Path_211" data-name="Path 211"
                                                    d="M409,160.466a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-1A1,1,0,0,0,409,160.466Z"
                                                    fill="#59bdff" fill-rule="evenodd" />
                                            </g>
                                        </g>
                                    </svg><span>Convention ID Card </span></a></li>
                            @endif
                            <li class="{{ Request::route('convention.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('convention.index') }}"><svg width="800px" height="800px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 7C5 4.23858 7.23858 2 10 2C12.7614 2 15 4.23858 15 7C15 9.76142 12.7614 12 10 12C7.23858 12 5 9.76142 5 7ZM10 4C8.34315 4 7 5.34315 7 7C7 8.65685 8.34315 10 10 10C11.6569 10 13 8.65685 13 7C13 5.34315 11.6569 4 10 4Z"
                                            fill="#152C70" />
                                        <path
                                            d="M4.00242 20C4.07771 17.7781 5.90263 16 8.14286 16H9C9.55228 16 10 15.5523 10 15C10 14.4477 9.55228 14 9 14H8.14286C4.75025 14 2 16.7503 2 20.1429C2 21.1685 2.83147 22 3.85714 22H10C10.5523 22 11 21.5523 11 21C11 20.4477 10.5523 20 10 20H4.00242Z"
                                            fill="#152C70" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 22C19.7614 22 22 19.7614 22 17C22 14.2386 19.7614 12 17 12C14.2386 12 12 14.2386 12 17C12 19.7614 14.2386 22 17 22ZM17.0303 19.0303L19.5303 16.5303C19.8232 16.2374 19.8232 15.7626 19.5303 15.4697C19.2374 15.1768 18.7626 15.1768 18.4697 15.4697L16.5 17.4393L16.0303 16.9697C15.7374 16.6768 15.2626 16.6768 14.9697 16.9697C14.6768 17.2626 14.6768 17.7374 14.9697 18.0303L15.9692 19.0298C16.2621 19.3227 16.7374 19.3232 17.0303 19.0303Z"
                                            fill="#4296FF" />
                                    </svg><span>Convention </span></a></li>
                            <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('posts.index') }}"><svg fill="#000000" width="800px" height="800px"
                                        viewBox="0 0 24 24" id="discussion" data-name="Flat Color"
                                        xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                        <path id="secondary"
                                            d="M8.4,16.8A3,3,0,0,0,9,15a3,3,0,0,0-6,0,3,3,0,0,0,.6,1.8A4,4,0,0,0,2,20v1a1,1,0,0,0,1,1H9a1,1,0,0,0,1-1V20A4,4,0,0,0,8.4,16.8Z"
                                            style="fill: rgb(44, 169, 188);"></path>
                                        <path id="primary"
                                            d="M22,7v3a2,2,0,0,1-2,2H16.24l-3.79,1.89A1,1,0,0,1,12,14a1,1,0,0,1-.53-.15A1,1,0,0,1,11,13V11.73A2,2,0,0,1,10,10V7a2,2,0,0,1,2-2h8A2,2,0,0,1,22,7ZM9,7a3,3,0,0,1,3-3h4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V7A2,2,0,0,0,4,9H9Z"
                                            style="fill: rgb(0, 0, 0);"></path>
                                    </svg><span>Stories </span></a></li>
                            <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('videos.index') }}"><svg width="800px" height="800px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 6C3 4.34315 4.34315 3 6 3H14C15.6569 3 17 4.34315 17 6V14C17 15.6569 15.6569 17 14 17H6C4.34315 17 3 15.6569 3 14V6Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M21 7V18C21 19.6569 19.6569 21 18 21H7" stroke="#000000" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 12V8L12.1429 10L9 12Z" fill="#000000" stroke="#000000" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg><span>Shorts </span></a></li>
                            <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('audios.index') }}"><svg width="800px" height="800px"
                                        viewBox="0 0 1024 1024" class="icon" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M862 779.3c-6.8 0-12.3-5.5-12.3-12.3V514.1c0-45.2-8.9-89.2-26.6-130.7-17-40.1-41.4-76.1-72.3-107.1-31-31-67-55.3-107.1-72.3-41.5-17.6-85.4-26.6-130.7-26.6-45.2 0-89.2 8.9-130.7 26.6-40.1 17-76.1 41.4-107.1 72.3-31 31-55.3 67-72.3 107.1-17.6 41.5-26.6 85.4-26.6 130.7v252.8c0 6.8-5.5 12.3-12.3 12.3s-12.3-5.5-12.3-12.3V514.1c0-48.6 9.6-95.8 28.5-140.3 18.3-43 44.4-81.6 77.6-114.9 33.2-33.2 71.9-59.3 114.9-77.6 44.5-18.9 91.7-28.5 140.3-28.5 48.6 0 95.8 9.6 140.3 28.5 43 18.3 81.6 44.4 114.9 77.6 33.2 33.2 59.3 71.9 77.6 114.9 18.9 44.5 28.5 91.7 28.5 140.3v252.8c0 6.9-5.5 12.4-12.3 12.4z"
                                            fill="#154B8B" />
                                        <path
                                            d="M99.9 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z"
                                            fill="#9ED5E4" />
                                        <path
                                            d="M99.9 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0.1 42.1-34.2 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c0-28.5-23.2-51.8-51.8-51.8z"
                                            fill="#154B8B" />
                                        <path
                                            d="M926.1 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z"
                                            fill="#9ED5E4" />
                                        <path
                                            d="M926.1 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0 42.1-34.3 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c-0.1-28.5-23.3-51.8-51.8-51.8zM527.2 762.9c-0.9 0-1.8-0.1-2.7-0.2-6.5-1.1-11.6-6-13-12.5l-41.8-192-71.5 107.3c-3 4.5-8 7.2-13.4 7.2h-92.6c-8.9 0-16.1-7.2-16.1-16.1s7.2-16.1 16.1-16.1h84L464 508.8c3.6-5.4 10-8.1 16.4-6.9 6.4 1.2 11.4 6.1 12.8 12.4l41.4 190.3 39.6-63.6c2.9-4.7 8.1-7.6 13.7-7.6h146c8.9 0 16.1 7.2 16.1 16.1s-7.2 16.1-16.1 16.1h-137l-55.8 89.7c-3.1 4.8-8.4 7.6-13.9 7.6z"
                                            fill="#154B8B" />
                                    </svg><span>Audio Clips </span></a></li>
                            <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('products.index') }}"><svg width="800px" height="800px"
                                        viewBox="0 0 32 32" id="Layer_1" version="1.1" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                                                <path class="st0"
                                                    d="M5,14.015625V30.5h12.0424805v-7.9232178c0-1.8409424,1.4923706-3.333313,3.333313-3.333313 s3.333374,1.4923706,3.333374,3.333313V30.5H27V14.015625H5z M13.553833,20.75h-4c-0.5523071,0-1-0.4477539-1-1 c0-0.5523071,0.4476929-1,1-1h4c0.5523071,0,1,0.4476929,1,1C14.553833,20.3022461,14.1061401,20.75,13.553833,20.75z" />
                                            </g>
                                            <g>
                                                <path class="st1"
                                                    d="M31,31.5H1c-0.5522461,0-1-0.4477539-1-1s0.4477539-1,1-1h30c0.5522461,0,1,0.4477539,1,1 S31.5522461,31.5,31,31.5z" />
                                            </g>
                                            <g>
                                                <path class="st2"
                                                    d="M5.2246366,12.531251h-0.00001c-3.0098128,0-5.0521717-3.0604792-3.8971148-5.8398342l2.5730567-6.1914167 h6.6666656L9.4049702,8.8900909C9.1158504,10.9771776,7.3316536,12.531251,5.2246366,12.531251z" />
                                            </g>
                                            <g>
                                                <path class="st2"
                                                    d="M16.1548214,12.531251h-0.3096428c-2.5610209,0-4.5317516-2.2625523-4.1803341-4.7993479l1.0018225-7.2319031 h6.666667l1.0018215,7.2319031C20.686573,10.2686987,18.7158413,12.531251,16.1548214,12.531251z" />
                                            </g>
                                            <g>
                                                <path class="st2"
                                                    d="M26.7753735,12.531251h-0.0000095c-2.1070175,0-3.8912144-1.5540733-4.1803341-3.64116L21.432766,0.4999999 h6.666666l2.5730553,6.1914167C31.8275452,9.4707718,29.7851868,12.531251,26.7753735,12.531251z" />
                                            </g>
                                        </g>
                                    </svg><span>Store </span></a></li>
                            <li class="{{ Request::routeIs('books.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('books.index') }}"><svg height="800px" width="800px" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                        xml:space="preserve">
                                        <g>
                                            <path style="fill:#B12621;"
                                                d="M445.793,512H101.517c-19.421,0-35.31-15.89-35.31-35.31v-8.828c0-19.421,15.89-35.31,35.31-35.31 h344.276V512z" />
                                            <path style="fill:#DD342E;"
                                                d="M392.828,17.655C392.828,9.251,386.887,0,378.624,0L79.501,61.678 c-7.724,1.527-13.294,8.307-13.294,16.19v389.994c0-19.421,15.89-35.31,35.31-35.31l278.978-42.266 c7.089-1.077,12.332-7.177,12.332-14.345V17.655z" />
                                            <path style="fill:#B12621;"
                                                d="M348.693,163.242l-233.869,48.384c-6.868,1.421-13.303-3.822-13.303-10.831v-83.332 c0-5.244,3.681-9.772,8.819-10.84l233.869-48.384c6.868-1.421,13.312,3.822,13.312,10.84v83.324 C357.521,157.655,353.831,162.183,348.693,163.242" />
                                            <g>
                                                <path style="fill:#EDEBDA;"
                                                    d="M66.207,485.517c0-2.039,0.106-3.981,0.3-5.853l0,0C66.313,481.536,66.207,483.478,66.207,485.517" />
                                                <path style="fill:#EDEBDA;"
                                                    d="M392.828,52.966V375.94c0,7.168-5.244,13.268-12.332,14.345l-278.978,42.266h344.276V52.966 H392.828z" />
                                            </g>
                                        </g>
                                    </svg><span>Book Store </span></a></li>
                            <li class="{{ Request::routeIs('fellowship.index') ? 'active' : '' }}"><a
                                    wire:navigate href="{{ route('fellowship.index') }}"><svg width="800px" height="800px"
                                        viewBox="-40.61 0 538.137 538.137" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Group_13" data-name="Group 13" transform="translate(-1124.204 -2310.279)">
                                            <path id="path206"
                                                d="M849.627-1498.45a45.108,45.108,0,0,0,25.4,17.053c1.012-14.893,1.995-30.133-1.967-44.547-1.484-5.387-4.047-11.04-9.067-13.493-4.157-2.04-9.327-1.373-13.26,1.067-5.633,3.507-10.064,10.32-9.553,16.933a45.154,45.154,0,0,0,8.445,22.987"
                                                transform="translate(490 4018.328)" fill="#6a3b1a" />
                                            <path id="path208"
                                                d="M836.869-1666.089s35.916-18.467,38.947-21.453,4.611-6.053,8.623-4.573,2.543,5.48,2.543,5.48,5.144-1.307,7.391,1.573-1.928,10.907-1.928,10.907,35.447-25.52,40.575-22.227c9.187,5.893-34.9,29.653-32.521,31.547,1.095.88,8.9-.787,17.139-2.453,9.637-1.96,19.863-3.907,20.62-1.787,1.4,3.92-5.48,6.867-15.187,10.36s-34.685,12.32-46.212,16.747-24.688,9.267-24.688,9.267l-33.467,16.76-13.748-36.693,31.915-13.453"
                                                transform="translate(490 4018.328)" fill="#f7966c" />
                                            <path id="path210"
                                                d="M875.337-1669.983c-.032-.787,9.593-14.08,11.524-16.733l.239.16c-4.567,6.293-11.391,15.893-11.468,16.573h-.295"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path212"
                                                d="M874.066-1657.849c-1.2-2,.467-9.053,1.072-11.413-1.324,1.773-5.168,6.573-8.084,6.747a2.252,2.252,0,0,1-1.909-.787c-1.368-1.533.021-6.12,4.129-13.627a123.815,123.815,0,0,1,6.883-11.173l.209.213a123.123,123.123,0,0,0-6.84,11.12c-3.981,7.267-5.42,11.867-4.161,13.267a1.932,1.932,0,0,0,1.672.693c3.36-.2,8.276-7.187,8.327-7.267l.492-.707-.229.84c-.027.093-2.656,9.68-1.307,11.947l-.253.147"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path214"
                                                d="M879.915-1643.543l-.263-.133c.107-.213,10.465-20.36,11.893-27.96.909-4.84-1.619-7.32-3.541-7.8a2.416,2.416,0,0,0-3.121,1.587c-1.208,3.813-7.839,18.2-11.059,20.68a30.814,30.814,0,0,1-3.091,1.933c-4.105,2.373-9.725,5.613-9.795,10.48h-.295c.072-5.04,5.777-8.333,9.941-10.733a34.748,34.748,0,0,0,3.059-1.907c3.112-2.4,9.792-16.853,10.957-20.547a2.736,2.736,0,0,1,3.473-1.787c2.511.64,4.608,3.64,3.76,8.147-1.436,7.653-11.816,27.84-11.92,28.04"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path216"
                                                d="M1048.12-1355.477s23.095-33.133,26.459-35.746,6.609-3.76,5.685-7.933-5.1-3.253-5.1-3.253,1.975-4.92-.573-7.533-11.072.453-11.072.453,30.024-31.72,27.444-37.24c-2.491-5.333-12.185,3.973-20.84,13.293-7.4,7.96-14.048,15.933-14.768,14.733-1.563-2.613,12.952-34.947,9.244-36.853s-7.539,4.507-12.3,13.667-16.835,32.733-22.753,43.573-12.48,23.227-12.48,23.227l-21.063,30.933,34.531,18.515,17.583-29.835"
                                                transform="translate(490 4018.328)" fill="#f7966c" />
                                            <path id="path218"
                                                d="M1057.132-1393.09h-.024l.045-.28h0c.7,0,11.108-5.48,17.94-9.16l.14.253c-2.865,1.547-17.095,9.187-18.1,9.187"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path220"
                                                d="M1051.623-1383.09a3.19,3.19,0,0,1-2.489-.787,2.274,2.274,0,0,1-.535-2c.563-2.867,5.836-6.027,7.771-7.107-2.42.28-9.625,1-11.456-.467l.184-.227c2.064,1.64,11.917.32,12.016.293l.853-.107-.765.387c-.076.04-7.664,3.987-8.313,7.293a1.966,1.966,0,0,0,.468,1.747c1.229,1.44,5.968.613,13.712-2.36a126.751,126.751,0,0,0,11.928-5.293l.177.227a120.776,120.776,0,0,1-11.988,5.333c-5.305,2.04-9.173,3.067-11.563,3.067"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path222"
                                                d="M1030.943-1381.837a5.324,5.324,0,0,1-.792-.053l.036-.293c4.833.587,8.8-4.56,11.7-8.307a31.356,31.356,0,0,1,2.323-2.8c2.889-2.866,18.027-7.52,21.976-8.213a2.411,2.411,0,0,0,1.985-2.88c-.221-1.96-2.339-4.8-7.261-4.547-7.725.4-29.076,7.987-29.291,8.067l-.1-.28c.215-.08,21.605-7.68,29.373-8.08,4.584-.24,7.281,2.24,7.571,4.813a2.721,2.721,0,0,1-2.228,3.2c-3.811.667-19.025,5.36-21.82,8.12a30.655,30.655,0,0,0-2.3,2.787c-2.783,3.6-6.54,8.467-11.175,8.467"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path224"
                                                d="M774.915-1434.317s-18.744,139.886-21.944,181.945c-1.787,23.476-6.031,55.125-13.052,82.162H957.335A298.873,298.873,0,0,1,945.892-1203c-8.229-30.172-8.229-42.515-8.229-42.515s18.744,21.485,39.087,6.4,84.474-119.482,84.474-119.482l-48.131-32.293-45.043,72.421c-5.485-7.315,9.385-86.141-.673-106.714s-63.086-42.973-63.086-42.973-166.406-54.853-170.521-75.88,127.09-85.493,127.09-85.493-6.4-37.027-21.487-44.346c0,0-180.121,59.893-187.435,116.573s122.977,122.986,122.977,122.986"
                                                transform="translate(490 4018.328)" fill="#4f334b" />
                                            <path id="path226"
                                                d="M937.663-1245.217l-.229-.109c-.064-.077-6.508-8.007-12.015-26.844-9.191-31.444-8.8-68.667-6.852-94.36a.307.307,0,0,1,.317-.28.3.3,0,0,1,.275.32c-1.943,25.64-2.336,62.794,6.831,94.153,5.472,18.721,11.839,26.556,11.9,26.633a.3.3,0,0,1-.04.417l-.189.069"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path228"
                                                d="M851.714-1486.516s-7.573-7.627-17.7-6.56l-35.749,46.733,26.724,19.56-23,10.253s40.832,186.768,41.043,187.36c0,0,1.821-101.7,13.935-168.253l-5.256-89.093"
                                                transform="translate(490 4018.328)" fill="#6b4668" />
                                            <path id="path230"
                                                d="M929.514-1455.8l-4.987,42.067-26.557,4.187s6.057,16.307,5.125,24.227-54.261,128.738-60.06,156.146c0,0,1.821-127.306,13.935-168.253l59.905-64.92s5.979-1.973,12.639,6.547"
                                                transform="translate(490 4018.328)" fill="#6b4668" />
                                            <path id="path232"
                                                d="M843.035-1169.912a.3.3,0,0,1-.3-.288c-.039-1.311-3.677-132.186,13.94-227.277a.284.284,0,0,1,.345-.24.3.3,0,0,1,.239.346c-17.605,95.029-13.969,225.842-13.931,227.153a.3.3,0,0,1-.288.305h-.008"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path234"
                                                d="M844.857-1458s10.251,57.773,12.113,60.573S903.1-1449.61,903.1-1449.61s-47.988-17.24-58.239-8.387"
                                                transform="translate(490 4018.328)" fill="#e5e5e5" />
                                            <path id="path236"
                                                d="M903.015-1486.716s15.381,17.4,13.86,24.373-14.407,30.107-20.144,30.347-20.873-13.493-24.086-14.4-30.477-.067-32.313-5.12,8.032-33.507,14.457-38.787,20.919-12.48,48.227,3.587"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path238"
                                                d="M918.862-1521.29s-9.295,47.387-10.892,54.76a8.791,8.791,0,0,1-.675,1.867c-4.035,8.547-23.052,26.267-34.648,18.267-10.8-7.453-10.452-28.933-10.149-34.72.055-.933.1-1.453.1-1.453l15.947-54.933,40.321,16.213"
                                                transform="translate(490 4018.328)" fill="#f7966c" />
                                            <path id="path240"
                                                d="M918.862-1521.29s-9.295,47.387-10.892,54.76a8.791,8.791,0,0,1-.675,1.867,58.665,58.665,0,0,1-43.985-15.653c-.275-.267-.551-.52-.812-.8.055-.933.1-1.453.1-1.453l15.947-54.933,40.321,16.213"
                                                transform="translate(490 4018.328)" fill="#e62" />
                                            <path id="path242"
                                                d="M787.673-1589.6l-.175-.053-8.556-6.32-.117-.293.2-.227,46.42-14.92a.3.3,0,0,1,.373.187.291.291,0,0,1-.192.373L779.761-1596.1l8.089,5.973a.294.294,0,0,1,.063.413l-.24.12"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path244"
                                                d="M957.2-1514.916a129.464,129.464,0,0,1-3.153,18.4c-4.711,17.96-27.556,32.933-42.729,32.2s-47.788-20.52-53.18-39.36c-5.392-18.866,6.2-60.72,16.493-69.533a15.9,15.9,0,0,1,4.351-2.453,42.462,42.462,0,0,1,7.1-2.08c16.925-3.573,46.343-1.667,63.019,19.013a52.744,52.744,0,0,1,9.421,18.187,251.452,251.452,0,0,1-1.321,25.626"
                                                transform="translate(490 4018.328)" fill="#f7966c" />
                                            <path id="path246"
                                                d="M957.2-1514.916a164.538,164.538,0,0,0-24.233-16.533c-22.72-13.067-51.248-16.24-51.248-16.24l-2.737-27.973-.432-4.36,7.532,2.28L949.1-1558.73a52.749,52.749,0,0,1,9.421,18.187,251.453,251.453,0,0,1-1.321,25.626"
                                                transform="translate(490 4018.328)" fill="#e62" />
                                            <path id="path248"
                                                d="M841.242-1572.37c-3.037,5.253-4.324,12.96-5.165,18.173a72.621,72.621,0,0,0,.28,24.92c1.2,6.413,3.392,12.853,7.784,17.68-7.291-8-2.148-20.267,7.535-22.72,5.285-1.32,9.1,2.987,10.529,7.76a20.329,20.329,0,0,1-1.7,15.533c6.195-1.507,11.549-5.573,15.556-10.533s6.783-10.787,9.183-16.693c3.821-9.4,6.791-19.96,3.521-29.573,3.309,6.067,6.045,10.533,13.347,12.107a52,52,0,0,0,10.975.76c2.249,0,4.5,0,6.736.173a42.555,42.555,0,0,1,23.155,9.373,41.744,41.744,0,0,1,8.664,9.213c2.2,3.307,5.308,6.333,5.661,10.507-.172-2.04,1.355-5.187,1.761-7.253q.822-4.18,1.231-8.427a88.091,88.091,0,0,0,.031-16.507,87.47,87.47,0,0,0-3.049-16.213c-1.565-5.413-3.247-8.547-7.26-12.453-8.791-8.56-20.991-13.76-33.253-13.32s-24.357,6.773-31.036,17.067c.071-.107-9.439-2.24-10.367-2.32a44.1,44.1,0,0,0-11.088.387c-7.043,1.146-14.725,3.987-20.167,8.747a14.2,14.2,0,0,0-2.864,3.613"
                                                transform="translate(490 4018.328)" fill="#6a3b1a" />
                                            <path id="path250"
                                                d="M852.382-1536.423a12.325,12.325,0,0,0-11.261,5.787,14.971,14.971,0,0,0-1.177,12.827,19.109,19.109,0,0,0,8.539,9.867,10.069,10.069,0,0,0,6.324,1.613,9.474,9.474,0,0,0,5.861-4.053c5.776-7.867,3.5-24.933-8.285-26.04"
                                                transform="translate(490 4018.328)" fill="#f7966c" />
                                            <path id="path252"
                                                d="M859.238-1527.263a12.839,12.839,0,0,1,.087,10.693c-.711,1.68-1.919,3.373-3.711,3.707a4.357,4.357,0,0,1-3.876-1.493,9.194,9.194,0,0,1-1.9-3.867c-.937-3.453-1.675-10.133.887-13.147s7.337,1.813,8.511,4.107"
                                                transform="translate(490 4018.328)" fill="#e62" />
                                            <path id="path254"
                                                d="M852.779-1509.743l-.159-.44a11.857,11.857,0,0,0,7.533-12c-.183-3.187-2.025-7.36-5.2-9.16a5.948,5.948,0,0,0-5.925,0,7,7,0,0,0-3.613,7.467l-.463.107a7.462,7.462,0,0,1,3.855-7.987,6.38,6.38,0,0,1,6.381,0c3.321,1.88,5.249,6.227,5.437,9.547a12.327,12.327,0,0,1-7.848,12.467"
                                                transform="translate(490 4018.328)" fill="#e2474d" />
                                            <path id="path256"
                                                d="M840.55-1550.836l-61.432-45.373,144.16-46.333,86.941,79.24-47.26,15.613s-94.633-19.827-122.409-3.147"
                                                transform="translate(490 4018.328)" fill="#4f334b" />
                                            <path id="path258"
                                                d="M835-1536.81s34.12-25.32,76.375-15.773,47.078,29.533,47.078,29.533l9.765-53.453s-25.8-27.44-69.8-27.787-66.361,18.08-66.361,18.08l2.939,49.4"
                                                transform="translate(490 4018.328)" fill="#6b4668" />
                                            <path id="path754" d="M634.205-1445.53a.209.209,0,0,1,0-.04v.04"
                                                transform="translate(490 4018.328)" fill="#b5393e" />
                                            <path id="path766" d="M1087.451-1708.049h0" transform="translate(490 4018.328)"
                                                fill="#ffffff" />
                                            <path id="path772"
                                                d="M875.347-1670.049c.368-1.293,9.624-14.067,11.513-16.667l.239.16c-4.4,6.053-10.881,15.173-11.431,16.453l.187-.68-.492.707s-.007.013-.016.027"
                                                transform="translate(490 4018.328)" fill="#ec898d" />
                                            <path id="path774"
                                                d="M874.066-1657.849c-1.2-2,.467-9.053,1.072-11.413-1.324,1.773-5.168,6.573-8.084,6.747a.661.661,0,0,1-.16.013,2.272,2.272,0,0,1-1.749-.8,2.9,2.9,0,0,1-.488-2.2l.425-.907c-.283,1.4-.191,2.373.283,2.907a1.966,1.966,0,0,0,1.52.707.588.588,0,0,0,.152-.013c3.265-.187,8-6.8,8.311-7.24.009-.013.015-.027.016-.027l.492-.707-.187.68-.043.16c-.027.093-2.636,9.6-1.323,11.92l-.071.08-.167.093m-2.5-22.507,1.157-2.493c1.255-2.027,2.328-3.667,2.929-4.547.28-.413.457-.653.5-.707l.105.107.1.107c-.175.173-2.367,3.413-4.8,7.533"
                                                transform="translate(490 4018.328)" fill="#ec898d" />
                                            <path id="path776"
                                                d="M879.915-1643.543l-.263-.133c.107-.213,10.465-20.36,11.893-27.96.909-4.84-1.619-7.32-3.541-7.8a2.989,2.989,0,0,0-.819-.107,2.311,2.311,0,0,0-2.3,1.693c-1.208,3.813-7.839,18.2-11.059,20.68a30.814,30.814,0,0,1-3.091,1.933c-4.105,2.373-9.725,5.613-9.795,10.48h-.295c.072-5.04,5.777-8.333,9.941-10.733a34.748,34.748,0,0,0,3.059-1.907,6.6,6.6,0,0,0,.588-.547c.023-.027.047-.053.071-.08,3.309-3.64,9.209-16.48,10.3-19.92a2.624,2.624,0,0,1,2.6-1.893,4.054,4.054,0,0,1,.872.107c2.511.64,4.608,3.64,3.76,8.147-1.436,7.653-11.816,27.84-11.92,28.04"
                                                transform="translate(490 4018.328)" fill="#ec898d" />
                                            <path id="path784"
                                                d="M917.474-1342.61c.124-8.627.548-16.733,1.093-23.92a.306.306,0,0,1,.3-.28h.015a.3.3,0,0,1,.275.32c-.516,6.813-.923,14.44-1.071,22.547l-.615,1.333"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path790"
                                                d="M842.526-1181.485c-.14-10.6-.236-27.987.144-49.3.423-23.572,1.428-51.944,3.6-81.21,2.057-27.7,5.16-56.192,9.808-82.205.2-1.094.4-2.2.6-3.28a.279.279,0,0,1,.157-.213,2.468,2.468,0,0,0,.135.267.242.242,0,0,0,.216.093h.068c-10.06,54.333-13.181,120.357-14,167.18-.353,20.212-.279,36.849-.149,47.424l-.577,1.241"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path792"
                                                d="M857.186-1397.33a.241.241,0,0,1-.216-.094,2.412,2.412,0,0,1-.135-.267c-1.607-3.733-7.371-34.827-10.277-50.853,8.747,1.733,23.731,1.48,26.081,2.133,0,.013.005.013.008.013a10.672,10.672,0,0,0,2.149,1.16c3.681,2.427,10.368,7.866,15.773,10.973-1.132,1.36-2.309,2.787-3.512,4.24-12.217,14.693-27.348,32.36-29.8,32.693h-.068"
                                                transform="translate(490 4018.328)" fill="#eee" />
                                            <path id="path794"
                                                d="M896.587-1432c-1.46,0-3.485-.84-5.755-2.12a2.591,2.591,0,0,0-.263-.147c-5.405-3.107-12.092-8.547-15.773-10.973a11.852,11.852,0,0,0,4.568.867c11.131,0,24.609-13.253,27.931-20.293h0c.029-.053.059-.12.087-.173a26.408,26.408,0,0,0,3.936.52c.359.027.72.027,1.088.027a27.415,27.415,0,0,0,4.459-.387,6.183,6.183,0,0,1,.011,2.333h0c-1.521,6.987-14.407,30.106-20.144,30.347h-.144m-23.948-14.413c-2.351-.653-17.335-.4-26.081-2.133-3.308-.653-5.724-1.587-6.227-2.973-1.56-4.293,5.333-25.493,11.383-35h0a16.57,16.57,0,0,1,3.075-3.787c.413-.333.86-.68,1.341-1.027a27.033,27.033,0,0,1,6.419-3.44c.792,1.146,1.66,2.28,2.595,3.413l-2.549,8.787s-.041.52-.1,1.453c-.3,5.787-.647,27.253,10.141,34.707"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                            <path id="path796"
                                                d="M879.365-1444.37a11.852,11.852,0,0,1-4.568-.867,10.66,10.66,0,0,1-2.149-1.16s-.005,0-.008-.013c-10.788-7.453-10.444-28.92-10.141-34.707.055-.933.1-1.453.1-1.453l2.549-8.787h0l-2.549,8.787s-.041.52-.1,1.453c.261.28.537.533.812.8a58.726,58.726,0,0,0,39.955,15.8c1.344,0,2.691-.04,4.031-.146-3.321,7.04-16.8,20.293-27.931,20.293"
                                                transform="translate(490 4018.328)" fill="#fabca1" />
                                            <path id="path798"
                                                d="M903.264-1464.516a58.727,58.727,0,0,1-39.955-15.8c-.275-.267-.551-.52-.812-.8.055-.933.1-1.453.1-1.453l2.549-8.787c10.645,12.827,29.852,23.96,42.238,26.52-.028.053-.057.12-.087.173h0c-1.34.107-2.687.147-4.031.147"
                                                transform="translate(490 4018.328)" fill="#f49d71" />
                                            <path id="path802"
                                                d="M957.2-1514.916h0a164.538,164.538,0,0,0-24.233-16.533c-16.047-9.227-34.992-13.52-44.736-15.253a49.809,49.809,0,0,0,1.68-8.013c.692-.013,1.384-.013,2.084-.013a87.368,87.368,0,0,1,19.381,2.147c32.515,7.333,42.867,20.88,45.911,26.72.005.067.011.12.016.173h0c0-.053-.008-.107-.011-.16.3.587.531,1.08.7,1.493-.189,2.973-.447,6.16-.795,9.44"
                                                transform="translate(490 4018.328)" fill="#f49d71" />
                                            <path id="path806"
                                                d="M853.807-1506.263a10.885,10.885,0,0,1-5.325-1.68,20.265,20.265,0,0,1-5.808-4.987,17.372,17.372,0,0,1-2.731-4.88c-.023-.067-.044-.133-.067-.187a14.954,14.954,0,0,1,1.244-12.64,12.482,12.482,0,0,1,10.273-5.84,8.171,8.171,0,0,1,.988.053c11.387,1.067,13.9,17.04,8.84,25.213-.176.293-.361.56-.555.827a11.559,11.559,0,0,1-3.313,3.12,7.5,7.5,0,0,1-2.548.933,8.393,8.393,0,0,1-1,.067m4.164-8.053a10.976,10.976,0,0,1-5.351,4.133l.159.44a12.327,12.327,0,0,0,7.848-12.467,12.788,12.788,0,0,0-.788-3.627,11.415,11.415,0,0,0-.6-1.427c-.071-.133-.153-.28-.249-.44a10.249,10.249,0,0,0-3.8-4.053,6.293,6.293,0,0,0-3.14-.853,6.87,6.87,0,0,0-3.241.853,7.462,7.462,0,0,0-3.855,7.987l.463-.107a6.994,6.994,0,0,1,3.613-7.467,6.707,6.707,0,0,1,2.693-.787,2.764,2.764,0,0,0-1,.76c-2.561,3.013-1.824,9.693-.887,13.147a9.2,9.2,0,0,0,1.9,3.867A4.588,4.588,0,0,0,855-1512.81a3.2,3.2,0,0,0,.619-.053,4.12,4.12,0,0,0,2.357-1.453"
                                                transform="translate(490 4018.328)" fill="#fabca1" />
                                            <path id="path808"
                                                d="M855-1512.81a4.588,4.588,0,0,1-3.257-1.547,9.2,9.2,0,0,1-1.9-3.867c-.937-3.453-1.675-10.133.887-13.147a2.765,2.765,0,0,1,1-.76h.325a5.787,5.787,0,0,1,2.907.787c3.173,1.8,5.016,5.973,5.2,9.16a12.547,12.547,0,0,1-2.183,7.867,4.12,4.12,0,0,1-2.357,1.453,3.23,3.23,0,0,1-.619.053m4.844-13.027a14.914,14.914,0,0,0-.851-1.867c.1.16.179.307.249.44a11.363,11.363,0,0,1,.6,1.427"
                                                transform="translate(490 4018.328)" fill="#f49d71" />
                                            <path id="path810"
                                                d="M852.779-1509.743l-.159-.44a10.976,10.976,0,0,0,5.351-4.133,12.547,12.547,0,0,0,2.183-7.867c-.183-3.187-2.025-7.36-5.2-9.16a5.787,5.787,0,0,0-2.907-.787h-.325a6.706,6.706,0,0,0-2.693.787,7,7,0,0,0-3.613,7.467l-.463.107a7.462,7.462,0,0,1,3.855-7.987,6.872,6.872,0,0,1,3.241-.853,6.292,6.292,0,0,1,3.14.853,10.25,10.25,0,0,1,3.8,4.053,14.905,14.905,0,0,1,.851,1.867,12.786,12.786,0,0,1,.788,3.627,12.327,12.327,0,0,1-7.848,12.467"
                                                transform="translate(490 4018.328)" fill="#ec898d" />
                                            <path id="path884"
                                                d="M1030.943-1381.837a5.324,5.324,0,0,1-.792-.053l.036-.293a4.848,4.848,0,0,0,.755.053c4.024,0,7.415-3.854,10.052-7.213l-.528,1.133c-2.559,3.147-5.749,6.373-9.523,6.373m.673-19.027-.1-.28c.139-.053,9.133-3.24,17.573-5.613l-.164.36c-8.35,2.347-17.172,5.48-17.311,5.533"
                                                transform="translate(490 4018.328)" fill="#ec898d" />
                                            <path id="path888"
                                                d="M937.663-1245.217l-.229-.109c-.053-.064-4.532-5.575-9.208-18.3l.353-.761c4.711,13.016,9.259,18.615,9.313,18.68a.3.3,0,0,1-.031.409l-.009.008-.184.067-.005,0"
                                                transform="translate(490 4018.328)" fill="#ffffff" />
                                        </g>
                                    </svg><span>Fellowships </span></a></li>
                            @endif
                        @endauth
                    </ul>
                    <div class="footer-links"><a wire:navigate href="https://www.facebook.com/isokancampusfellowship"><i
                                class="icon-brand-facebook"></i>Facebook </a><a wire:navigate href="https://twitter.com/isokancampus"><i
                                class="icon-brand-twitter"></i>Twitter </a><a
                            wire:navigate href="https://www.instagram.com/isokancampusfellowship/"><i
                                class="icon-brand-instagram"></i>Instagram
                        </a><a wire:navigate href="https://t.me/unificationcampusfellowships"><i
                                class="icon-brand-telegram"></i>Telegram
                        </a><a wire:navigate href="https://www.youtube.com/channel/UC2UQ-kfj__DO2_zoEExg0UQ"><i
                                class="icon-brand-youtube"></i>Youtube </a><br><br>
                        <hr><br><a wire:navigate href="{{ url('contact') }}">Contact Us </a><a
                            wire:navigate href="{{ route('donation.index') }}">Support</a><a wire:navigate href="{{ url('policy') }}">Privacy Policy
                        </a><a wire:navigate href="{{ url('terms') }}">Terms and Condition</a>
                    </div>
                </div>
                <!-- sidebar overly for mobile -->
                <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>
            </div>
        @endpersist
        <!-- Main Contents -->
        @yield('main')
    </div>
    @livewireScripts

    <script src="{{ asset('assets/code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
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
</body>

</html>

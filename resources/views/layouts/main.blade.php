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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="{{ asset('assets/tailwindcss%402.2.19/dist/tailwind.min.css') }}" rel="stylesheet">
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

    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
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
            <x-header />
            <div class="sidebar">
            <x-sidebar />
            </div>
        @endpersist
        @yield('main')
    </div>

    @livewireScripts
    <script src="{{ asset('assets/code.jquery.com/jquery-3.6.0.min.js') }}"></script>
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

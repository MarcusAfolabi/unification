<div>
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
                            <hr><a wire:navigate href="{{ route('subconvention') }}" class="is-link"><svg
                                    fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                        clip-rule="evenodd"></path>
                                </svg>2024 - Subconvention </span></a>

                            @php $user = Auth::user()->id @endphp
                            <hr><a wire:navigate href="{{ route('user.editMember', $user) }}"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"></path>
                                </svg>Manage account </a>
                            <a wire:navigate href="{{ route('logout') }}"><svg fill="#000000" height="800px"
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
                                </svg>Logout </a><a wire:navigate href="{{ route('logout') }}" id="night-mode"
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
</div>
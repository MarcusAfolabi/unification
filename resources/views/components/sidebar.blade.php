 <div class="sidebar_inner" data-simplebar>
                <ul>
                    @guest
                        <li class="{{ Request::routeIs('login') ? 'active' : '' }}"><a wire:navigate.hover href="{{ route('login') }}">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1024 1024"
                                    xmlns="http://www.w3.org/2000/svg" class="icon">
                                    <defs>
                                        <style />
                                    </defs>
                                    <path
                                        d="M521.7 82c-152.5-.4-286.7 78.5-363.4 197.7-3.4 5.3.4 12.3 6.7 12.3h70.3c4.8 0 9.3-2.1 12.3-5.8 7-8.5 14.5-16.7 22.4-24.5 32.6-32.5 70.5-58.1 112.7-75.9 43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 32.6 32.5 58.1 70.4 76 112.5C865.7 417.8 875 464.1 875 512c0 47.9-9.4 94.2-27.8 137.8-17.8 42.1-43.4 80-76 112.5s-70.5 58.1-112.7 75.9A352.8 352.8 0 0 1 520.6 866c-47.9 0-94.3-9.4-137.9-27.8A353.84 353.84 0 0 1 270 762.3c-7.9-7.9-15.3-16.1-22.4-24.5-3-3.7-7.6-5.8-12.3-5.8H165c-6.3 0-10.2 7-6.7 12.3C234.9 863.2 368.5 942 520.6 942c236.2 0 428-190.1 430.4-425.6C953.4 277.1 761.3 82.6 521.7 82zM395.02 624v-76h-314c-4.4 0-8-3.6-8-8v-56c0-4.4 3.6-8 8-8h314v-76c0-6.7 7.8-10.5 13-6.3l141.9 112a8 8 0 0 1 0 12.6l-141.9 112c-5.2 4.1-13 .4-13-6.3z" />
                                </svg><span>Login </span></a></li>
                        <li class="{{ Request::routeIs('register') ? 'active' : '' }}"><a
                                wire:navigate.hover href="{{ route('register') }}"><svg width="800px" height="800px"
                                    viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="512" cy="512" r="512" style="fill:#112e51" />
                                    <path
                                        d="m458.15 617.7 18.8-107.3a56.94 56.94 0 0 1 35.2-101.9V289.4h-145.2a56.33 56.33 0 0 0-56.3 56.3v275.8a33.94 33.94 0 0 0 3.4 15c12.2 24.6 60.2 103.7 197.9 164.5V622.1a313.29 313.29 0 0 1-53.8-4.4zM656.85 289h-144.9v119.1a56.86 56.86 0 0 1 35.7 101.4l18.8 107.8A320.58 320.58 0 0 1 512 622v178.6c137.5-60.5 185.7-139.9 197.9-164.5a33.94 33.94 0 0 0 3.4-15V345.5a56 56 0 0 0-16.4-40 56.76 56.76 0 0 0-40.05-16.5z"
                                        style="fill:#fff" />
                                </svg><span>Become a member </span></a></li>
                        <li hidden class="{{ Request::routeIs('convention.index') ? 'active' : '' }}"><a
                                wire:navigate.hover href="{{ route('convention.index') }}"><svg width="20px" height="20px"
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
                                wire:navigate.hover href="{{ route('convention.index') }}"><svg width="20px" height="20px"
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
                                wire:navigate.hover href="{{ route('donation.index') }}"><svg fill="currentColor" class="text-red-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg><span>Donate </span></a></li>
                        <li class="{{ Request::routeIs('fellowship.list') ? 'active' : '' }}"><a
                                wire:navigate.hover href="{{ route('fellowship.list') }}"><svg width="20px" height="20px"
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
                        <li><a wire:navigate.hover href="{{ route('resource.list') }}"><svg height="800px" width="800px" version="1.1"
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
                                    wire:navigate.hover href="{{ route('welcome') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg><span>Home </span></a></li>
                            <li class="{{ Request::route('dashboard.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('dashboard.index') }}"><svg fill="#000000" width="20px" height="20px"
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
                                    wire:navigate.hover href="{{ route('convention.list') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('fellowship.index') }}"><svg width="20px" height="20px"
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
                                    wire:navigate.hover href="{{ route('unit.index') }}"><svg width="20px" height="20px" viewBox="0 0 36 36"
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
                                    wire:navigate.hover href="{{ route('house.index') }}"><svg width="20px" height="20px"
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
                                    wire:navigate.hover href="{{ route('user.index') }}"><svg height="20px" width="20px" version="1.1"
                                        id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58 58" xml:space="preserve">
                                        <path style="fill:#3083C9;"
                                            d="M39.566,45.283l-9.552-4.776C28.78,39.89,28,38.628,28,37.248V33.5 c0.268-0.305,0.576-0.698,0.904-1.162c1.302-1.838,2.286-3.861,2.969-5.984C33.098,25.977,34,24.845,34,23.5v-4 c0-0.88-0.391-1.667-1-2.217V11.5c0,0,1.187-9-11-9c-12.188,0-11,9-11,9v5.783c-0.609,0.55-1,1.337-1,2.217v4 c0,1.054,0.554,1.981,1.383,2.517C12.382,30.369,15,33.5,15,33.5v3.655c0,1.333-0.728,2.56-1.899,3.198L4.18,45.22 C1.603,46.625,0,49.326,0,52.261V55.5h44v-3.043C44,49.419,42.283,46.642,39.566,45.283z" />
                                        <path style="fill:#CB465F;"
                                            d="M54.07,46.444l-9.774-4.233c-0.535-0.267-0.971-0.836-1.277-1.453 c-0.277-0.557,0.136-1.212,0.758-1.212h6.883c0,0,2.524,0.242,4.471-0.594c1.14-0.49,1.533-1.921,0.82-2.936 c-2.085-2.969-6.396-9.958-6.535-17.177c0,0-0.239-11.112-11.202-11.202c-2.187,0.018-3.97,0.476-5.438,1.188 C33.152,10.324,33,11.5,33,11.5v5.783c0.609,0.55,1,1.337,1,2.217v4c0,1.345-0.902,2.477-2.127,2.854 c-0.683,2.122-1.667,4.145-2.969,5.984C28.576,32.802,28.268,33.195,28,33.5v3.748c0,0.853,0.299,1.659,0.818,2.297h2.751 c0.687,0,0.99,0.868,0.451,1.293c-0.186,0.147-0.364,0.283-0.53,0.406l8.077,4.038C42.283,46.642,44,49.419,44,52.457V55.5h14 v-2.697C58,50.11,56.479,47.648,54.07,46.444z" />
                                    </svg><span>Members </span></a></li>
                            <li class="{{ Request::routeIs('executives.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('executives.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                    </svg><span>CEC Council </span></a></li>
                            <li class="{{ Request::routeIs('posts.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('posts.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                            clip-rule="evenodd" />
                                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                                    </svg><span>Stories</span></a></li>
                            <li class="{{ Request::routeIs('resource.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('resource.index') }}"><svg height="800px" width="800px" version="1.1"
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
                                    wire:navigate.hover href="{{ route('prayers.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Prayers </span></a></li>
                            <li class="{{ Request::routeIs('videos.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('videos.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Shorts</span></a></li>
                            <li class="{{ Request::routeIs('audios.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('audios.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Audio Clips</span></a></li>
                            <li class="{{ Request::routeIs('vacancies.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('vacancies.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Vacancies</span></a></li>
                            <li class="{{ Request::routeIs('products.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('products.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Products</span></a></li>
                            <li class="{{ Request::routeIs('donation.index') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('donation.index') }}"><svg fill="currentColor" class="text-red-500"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg><span>Donation </span></a></li>
                            @elseif(auth()->user()->role === 'member')
                            <li class="{{ Request::routeIs('welcome') ? 'active' : '' }}"><a
                                    wire:navigate.hover href="{{ route('welcome') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg><span>Home </span></a></li>
                            <li><a wire:navigate.hover href="{{ route('resource.list') }}"><svg height="800px" width="800px" version="1.1"
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
                                    wire:navigate.hover href="{{ route('convention.idcard') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('convention.index') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('posts.index') }}"><svg fill="#000000" width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('videos.index') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('audios.index') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('products.index') }}"><svg width="800px" height="800px"
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
                                    wire:navigate.hover href="{{ route('books.index') }}"><svg height="800px" width="800px" version="1.1"
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
                         
                            @endif
                        @endauth
                    </ul>
                    <div class="footer-links"><a wire:navigate.hover href="https://www.facebook.com/isokancampusfellowship"><i
                                class="icon-brand-facebook"></i>Facebook </a><a wire:navigate.hover href="https://twitter.com/isokancampus"><i
                                class="icon-brand-twitter"></i>Twitter </a><a
                            wire:navigate.hover href="https://www.instagram.com/isokancampusfellowship/"><i
                                class="icon-brand-instagram"></i>Instagram
                        </a><a wire:navigate.hover href="https://t.me/unificationcampusfellowships"><i
                                class="icon-brand-telegram"></i>Telegram
                        </a><a wire:navigate.hover href="https://www.youtube.com/channel/UC2UQ-kfj__DO2_zoEExg0UQ"><i
                                class="icon-brand-youtube"></i>Youtube </a><br><br>
                        <hr><br><a wire:navigate.hover href="{{ url('contact') }}">Contact Us </a><a
                            wire:navigate.hover href="{{ route('donation.index') }}">Support</a><a wire:navigate.hover href="{{ url('policy') }}">Privacy Policy
                        </a><a wire:navigate.hover href="{{ url('terms') }}">Terms and Condition</a>
                    </div>
                </div>
                <!-- sidebar overly for mobile -->
                <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>
            </div>

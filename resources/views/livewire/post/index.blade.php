<div class='mt-10'>
    @if (auth()->user()->role === 'admin')
        <div class="card">
            <a wire:navigate.hover class='px-3 py-3 bg-red-800 hover:text-white rounded-xl'
                href='{{ route('posts.create') }}'>New Post</a>
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="justify-between header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="search" placeholder="search post"
                        autocomplete="off">
                </form>
            </div>
            <hr>
            @if ($all_posts->count() > 0)
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b bg-blue-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                S/No</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Image</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Title</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Category</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Creator</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Date</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Edit</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Delete</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                Views</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($all_posts as $key => $post)
                                            <tr class="border-b">
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-blue-900 whitespace-nowrap">
                                                    {{ ++$key }}</td>
                                                <th
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    <img src="{{ asset('storage/' . $post->images->first()->path) }}"
                                                        alt="{{ $post->title }}" class="rounded-lg"
                                                        style="max-height: 50px; max-width:50px" srcset="">
                                                </th>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    {{ $post->category }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    <a href="{{ route('user.index', $post->user->id) }}">
                                                        {{ $post->user->name }} </a>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    {{ $post->created_at->diffForHumans() }}</td>

                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    <a href="{{ route('posts.edit', $post) }}"> <span
                                                            class="icon-feather-edit "></span></a>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('Hey, Are you sure about this?');">
                                                            <span class="icon-feather-trash-2"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                    {{ $post->views }} read
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                                Sorry, nothing to show</p>
            @endif
        </div>
        {{-- {{ $all_posts->links() }} --}}
    @elseif (auth()->user()->role === 'member')
        <div class="lg:flex lg:space-x-12">
            <div class="lg:w-3/4">
                <div class="px-4 divide-y divide-blue-100 card">
                    @foreach ($myposts as $post)
                        <div class="py-5 lg:flex lg:space-x-6">
                            <a href="{{ route('posts.show', $post) }}">
                                <div class="relative w-full h-40 overflow-hidden rounded-lg shadow-sm lg:w-60">
                                    @if ($post->images)
                                        <img src="{{ asset('storage/' . $post->images->first()->path) }}"
                                            alt="{{ $post->title }}" title="{{ $post->title }}"
                                            class="absolute inset-0 object-cover w-full h-full">
                                    @endif
                                    <div
                                        class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                        {{ $post->category }}
                                    </div>
                                </div>
                            </a>
                            <div class="flex-1 pt-4 lg:pt-0">

                                <a href="{{ route('posts.show', $post) }}" class="text-xl font-semibold line-clamp-2">
                                    {{ $post->title }}</a>

                                <div class="flex items-center pt-3">
                                    <div class="flex items-center"> <a href="{{ route('posts.edit', $post) }}">
                                            <span class="icon-feather-edit "></span></a></td>
                                    </div>
                                    <div class="flex items-center mx-4">

                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Hey, Are you sure about this?');">
                                                <span class="icon-feather-trash-2"></span> </button>

                                        </form>
                                    </div>
                                    <div class="flex items-center">
                                        {{ $post->created_at->diffForHumans() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                {{-- {{ $myposts->links() }} --}}
            </div>
            <div class="flex-shrink-0 w-full lg:w-1/4">
                <div uk-sticky="offset:100" class="uk-sticky">
                    <h4 class="mb-3 text-lg font-semibold"> Recommended Products </h4>
                    <div class="px-4 py-3 mb-5 bg-white rounded-md shadow">
                        @forelse ($sideproducts as $sideproduct)
                            <a href="{{ route('products.show', $sideproduct) }}">
                                <div class="flex px-2 py-2 -mx-2 duration-300 rounded-md hover:bg-blue-50">
                                    <img src="{{ asset($sideproduct->image) }}" class="mr-3 w-9 h-9" alt="">
                                    <p class="mt-2 leading-6 line-clamp-1"> <strong> {{ $sideproduct->name }}
                                        </strong>
                                        for
                                        <strong>
                                            {{ $sideproduct->currency }}{{ number_format($sideproduct->price) }}
                                        </strong>
                                    </p>
                                </div>
                            </a>
                        @empty
                            <a href="{{ route('products.create') }}">
                                <h4 class="mb-3 text-lg font-semibold"> You can add your first product </h4>
                            </a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

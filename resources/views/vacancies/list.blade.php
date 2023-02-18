        <div class="lg:flex lg:space-x-12">
            <div class="lg:w-3/4">
                <div class="breadcrumb-area py-0">
                    <div class="breadcrumb">
                        <ul class="m-0">
                            <li>
                                <a href="{{ route('vacancies.index') }}">My Posted Job Opportunities</a>
                            </li>
                            <li class="active">
                                <a href="{{ route('vacancies.create') }}" title="Are you employing?">Post New Job </a>
                            </li>
                        </ul>
                    </div>
                </div>  
                @if ($vacancies->count() > 0)

                <div class="card divide-y divide-blue-100 sm:m-0 -mx-4">

                    <!-- job list -->
                    @foreach ($vacancies as $vacancy)
                    @if (auth()->user()->id === $vacancy->user->id)

                    <div class="flex items-start flex-wrap p-7 sm:space-x-6">
                        <a href="{{ route('vacancies.show', $vacancy) }}" class="w-14 h-14 relative mt-1 order-1">
                            <img src="{{ asset($vacancy->image) }}" alt="{{ $vacancy->position }}" class="rounded-md">
                        </a>
                        <div class="flex-1 sm:order-2">
                            <h4 class="text-base text-blue-500 font-medium mb-2">{{ $vacancy->company }} </h4>
                            <a href="{{ route('vacancies.show', $vacancy) }}">
                                <h3 class="text-xl font-medium mb-4"> {{ $vacancy->position }} </h3>
                            </a>
                            <div class="leading-6 line-clamp-1 mt-1">

                                {!! $vacancy->description !!}
                            </div>
                            <div class="job-tags mt-5 mb-2 space-x-2.5 space-y-2">
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> {{ $vacancy->type }} </a>
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> <b>Deadline: </b>{{ $vacancy->deadline }} </a>
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> {{ $vacancy->currency }}{{ number_format($vacancy->salary) }} </a>

                                <a href="{{ route('vacancies.edit', $vacancy) }}" title="Edit"> <span class="icon-feather-edit border px-3 py-1.5 rounded-md text-sm inline-block"></span> </a>

                                <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                        <span class="icon-feather-trash-2 border px-3 py-1.5 rounded-md text-sm inline-block"></span> </button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                        Sorry, nothing to show</p>
                    @endif
                </div>
                {{ $vacancies->links() }}



            </div>
            <div class="lg:w-1/4 w-full flex-shrink-0">

                <div uk-sticky="media @m ; offset:80 ; bottom : true" class="lg:mt-0 mt-6">

                    <h2 class="text-xl font-semibold mb-2"> Other vacancies Posted </h2>

                    <ul class="-space-y-2">
                        @foreach ($othervacancies as $othervacancy )
                        <li>
                            <a href="{{ route('vacancies.show', $vacancy) }}" class="hover:bg-blue-100 rounded-md p-3 -mx-3 block">
                                <h3 class="font-medium line-clamp-2">{{ $othervacancy->position }}</h3>
                                <div class="flex font-medium items-center mt-1 space-x-1.5 text-xs">
                                    <div class="">{{ $othervacancy->type }}</div>
                                    <div class="pb-1"> . </div>
                                    <div class="text-blue-500">{{ $othervacancy->currency }}{{ number_format($othervacancy->salary) }}</div>
                                </div>
                            </a>
                        </li>
                        @endforeach


                    </ul>
                    <br>

                    <h4 class="text-lg font-semibold mb-3"> Tags </h4>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($vacancytags as $vacancytag)
                        <a href="{{ route('vacancies.show', $vacancytag) }}" class="bg-blue-100 py-1.5 px-4 rounded-full"> {{ $vacancytag->type }}</a>
                        @endforeach
                    </div>

                </div>
                <div class="uk-sticky-placeholder" style="height: 556px; margin: 0px;"></div>
            </div>

        </div>
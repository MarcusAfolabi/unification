@extends('layouts.main')
@section('title', 'All Job / Training / Conferences / Empowerment')
@section('description', 'These are confirmed opening from various industrial companies and enterprise. Apply if you can, in time')
@section('keywords', 'jobs, mentoring, business, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/vacancies')

@section('main')
            @auth
                @if (auth()->user()->isAdmin())
                    <!--  breadcrumb -->
                    <div class="main_content">
                        <div class="mcontainer">
                            <div class="flex justify-between items-center relative md:mb-4 mb-3">
                                <div class="flex-1">
                                    <h5 class="text-1xl font-semibold">
                                        <a href="{{ route('vacancies.create') }}"><i class="icon-material-outline-add"></i> New Job Vacancy
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            @if (session('status'))
                            <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
                                {{ session('status') }}</p>
                            @endif
                            <div class="card">
                                <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                                <div class="header_search"><i class="uil-search-alt"></i>
                                    <form action="">
                                        <input type="text" class="form-control" name="vacancy"
                                            placeholder="Search Job Opportunities, Companies and more.." autocomplete="off">
                                    </form>
                                </div>
                                @if ($vacancies->count() > 0)
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full">
                                                    <thead class="border-b bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                                S/No</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Image</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">By</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Position</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Company</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Type</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Salary</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">link</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Deadline</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Date</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Delete</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Status</th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Views</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($vacancies as $key => $job)
                                                <tr class="border-b">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                                        ++$key}}</td>
                                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($job->image) }}"> <img
                                                                    src="{{ asset($job->image) }}"
                                                                    alt="{{ $job->position }}" class="rounded-lg"
                                                                    style="max-height: 50px; max-width:50px" srcset=""></a></th>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('member.index', $job->user->id) }}">
                                                                {{ $job->user->name }} </a></td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                                href="{{ route('vacancies.show', $job) }}">{{ $job->position }}</a>
                                                        </td>
                                                         <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->company }}</td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->type }}</td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->currency }} {{ number_format($job->salary, 2) }}</td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ $job->website }}">Apply Link</a></td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->deadline }}</td>

                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{ $job->created_at->diffForHumans() }}</td>

                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('vacancies.edit', $job) }}"> <span
                                                                    class="icon-feather-edit "></span></a></td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            <form action="{{ route('vacancies.destroy', $job) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                                    <span class="icon-feather-trash-2"></span> </button>

                                                            </form>
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            <script
                                                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                                                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                                                                crossorigin="anonymous"></script>

                                                            <div class="switches-list">
                                                                <div class="switch-container">
                                                                    @if($job->status =='1')
                                                                    <label class="switch"><a href="{{ url('/status', $job) }}"><input
                                                                                type="checkbox" checked>
                                                                            <span class="switch-button"></span>Active</a> </label>
                                                                    @else
                                                                    <label class="switch"> <a href="{{ url('/status', $job) }}"><input
                                                                                type="checkbox">
                                                                            <span class="switch-button"></span>InActive </a></label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                                            $job->views }} Applied</td>
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
                            {{ $vacancies->links() }}

                        </div>
                    </div>
                </div>
            @elseif (!auth()->user()->isAdmin())
                <div class="lg:flex lg:space-x-12">

                <div class="lg:w-3/4">

                <div class="breadcrumb-area py-0">
                    <div class="breadcrumb">
                        <ul class="m-0">
                            <li>
                                <a href="{{ route('vacancies.index') }}">My Posted Job Opportunities</a>
                            </li>
                            <li class="active">
                                <a href="{{ route('vacancies.create') }}" title="Are you employing?">Post New Job  </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if ($vacancies->count() > 0)

                <div class="card divide-y divide-gray-100 sm:m-0 -mx-4">

                    <!-- job list -->
                    @foreach ($vacancies as $vacancy)
                    @if (auth()->user()->id === $vacancy->user->id)

                    <div class="flex items-start flex-wrap p-7 sm:space-x-6">
                        <a href="{{ route('vacancies.show', $vacancy) }}" class="w-14 h-14 relative mt-1 order-1">
                            <img src="{{ asset($vacancy->image) }}" alt="{{ $vacancy->position }}" class="rounded-md">
                        </a>
                        <div class="flex-1 sm:order-2">
                            <h4 class="text-base text-gray-500 font-medium mb-2">{{ $vacancy->company }} </h4>
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

                            <a href="{{ route('vacancies.edit', $vacancy) }}" title="Edit"> <span
                                class="icon-feather-edit border px-3 py-1.5 rounded-md text-sm inline-block"></span>  </a>

                                <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Hey, Are you sure about this?');">
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
                                <a href="{{ route('vacancies.show', $vacancy) }}" class="hover:bg-gray-100 rounded-md p-3 -mx-3 block">
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
                        <a href="{{ route('vacancies.show', $vacancytag) }}" class="bg-gray-100 py-1.5 px-4 rounded-full"> {{ $vacancytag->type }}</a>
                        @endforeach
                    </div>

                    </div><div class="uk-sticky-placeholder" style="height: 556px; margin: 0px;"></div>
                </div>

             </div>
            @endif
            @endauth

            @guest
            @if ($vacancies->count() > 0)

            <div class="lg:flex lg:space-x-12">

                <div class="lg:w-3/4">

                    <div class=" md:mb-4 mb-3">
                        <h2 class="text-2xl font-semibold"> Job Opportunities </h2>
                        <nav class="responsive-nav style-2 md:m-0 -mx-4">
                            <ul>
                                <li class="active"><a href="#" class="lg:px-2">   Suggestions </a></li>

                            </ul>
                        </nav>
                    </div>

                    <div class="card divide-y divide-gray-100 sm:m-0 -mx-4">

                         <!-- job list -->
                    @foreach ($vacancies as $vacancy)

                    <div class="flex items-start flex-wrap p-7 sm:space-x-6">
                        <a href="{{ route('vacancies.show', $vacancy) }}" class="w-14 h-14 relative mt-1 order-1">
                            <img src="{{ asset($vacancy->image) }}" alt="{{ $vacancy->position }}" class="rounded-md">
                        </a>
                        <div class="flex-1 sm:order-2">
                            <h4 class="text-base text-gray-500 font-medium mb-2">{{ $vacancy->company }} </h4>
                            <a href="{{ route('vacancies.show', $vacancy) }}">
                                <h3 class="text-xl font-medium mb-4"> {{ $vacancy->position }} </h3>
                            </a>
                            <p class="leading-6 line-clamp-2 mt-2">{!! $vacancy->description !!}</p>
                            <div class="vacancy-tags mt-5 mb-2 space-x-2.5 space-y-2">
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> {{ $vacancy->type }} </a>
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> <b>Deadline: </b>{{ $vacancy->deadline }} </a>
                                <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> {{ $vacancy->currency }}{{ number_format($vacancy->salary) }} </a>
                                <a href="{{ $vacancy->website }}" class="border px-3 py-1.5 rounded-md text-sm inline-block"> Apply Now</a>

                            </div>
                        </div>
                    </div>
                     @endforeach

                    </div>
                    <br>
                    {{ $vacancies->links() }}



                </div>

                <div class="lg:w-1/4 w-full flex-shrink-0">

                    <div uk-sticky="media @m ; offset:80 ; bottom : true" class="lg:mt-0 mt-6">

                        <h2 class="text-xl font-semibold mb-2"> Other vacancies Posted </h2>

                        <ul class="-space-y-2">
                            @foreach ($othervacancies as $othervacancy )
                            <li>
                                <a href="{{ route('vacancies.show', $othervacancy) }}" class="hover:bg-gray-100 rounded-md p-3 -mx-3 block">
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

                      <h4 class="text-lg font-semibold mb-3">Job Tags </h4>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($vacancytags as $vacancytag)
                        <a href="{{ route('vacancies.show', $vacancytag) }}" class="bg-gray-100 py-1.5 px-4 rounded-full"> {{ $vacancytag->type }}</a>
                        @endforeach
                    </div>

                    </div><div class="uk-sticky-placeholder" style="height: 556px; margin: 0px;"></div>
                </div>

            </div>
            @else
            <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                Sorry, nothing to show</p>
                <a href="{{ route('vacancies.create') }}" class="bg-gray-100 py-1.5 px-4 rounded-full"> Share Job Opportunities</a>

            @endif
            @endguest


    </div>
@endsection

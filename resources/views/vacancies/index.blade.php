@extends('layouts.main')
@section('title', 'All Job / Training / Conferences / Empowerment')
@section('description', 'These are confirmed opening from various industrial companies and enterprise. Apply if you can, in time')
@section('keywords', 'jobs, mentoring, business, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/vacancies')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-jobs" uk-toggle><i class="icon-material-outline-add"></i> New Job Vacancy
                    </a>
                </h5>
            </div>
        </div>
        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="vacancy" placeholder="Search Job Opportunities, Companies and more.." autocomplete="off">
                </form>
            </div>
            @if ($vacancies->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-blue-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Image</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">By</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Position</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Company</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Type</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Salary</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">link</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Deadline</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Delete</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Views</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($vacancies as $key => $job)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                                        ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($job->image) }}"> <img src="{{ asset($job->image) }}" alt="{{ $job->position }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('user.index', $job) }}">
                                                {{ $job->user->name }} </a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('vacancies.show', $job) }}">{{ $job->position }}</a>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->company }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->type }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->currency }} {{ number_format($job->salary, 2) }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ $job->website }}">Apply Link</a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $job->deadline }}</td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> {{ $job->created_at->diffForHumans() }}</td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('vacancies.edit', $job) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('vacancies.destroy', $job) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td> 
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
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
        
    </div>
</div>
<div id="modal-jobs" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Share prayer</h2>
            <h5>You can share available vacancies across the state and nation here. Member will receive the notification</h5>
        </div>
        <form method="POST" action="{{ route('vacancies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="position" name="position" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('position') }}" autocomplete="off">
                    <span for="position" class="line__placeholder"> Job Title </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="company" name="company" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('company') }}" autocomplete="off">
                    <span for="company" class="line__placeholder"> Company Name </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="location" name="location" type="address" onkeyup="this.setAttribute('value', this.value);" value="{{ old('location') }}" autocomplete="off">
                    <span for="location" class="line__placeholder"> Company Address/Location </span>
                </div> 
                <div>
                    <label for="type"> Job Working Type </label>
                    <select id="type" name="type" class="shadow-none selectpicker with-border " required>
                        <option value="{{ old('type') }}">{{ old('type') }}</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Remote">Remote</option>
                        <option value="Intern">Intern</option>
                        <option value="Training">Training/Bootcamp</option>
                        <option value="Empowerment">Empowerment Submit</option>
                    </select>
                </div> 
                <div class="line">
                    <input class="line__input" id="website" name="website" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ old('website') }}" autocomplete="off">
                    <span for="website" class="line__placeholder"> Application link </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="salary" name="salary" type="number" onkeyup="this.setAttribute('value', this.value);" value="{{ old('salary') }}" autocomplete="off">
                    <span for="salary" class="line__placeholder"> Job Salary (optional)</span>
                </div> 
                <div>
                    <label for="currency"> Salary Currency (Optional)</label>
                    <select id="currency" name="currency" class="shadow-none selectpicker with-border " required>
                        <option value="{{ old('currency') }}">{{ old('currency') }}</option>
                        <option value="₦"> NGN (₦) </option>
                        <option value="$"> USD ($) </option>
                        <option value="€"> EURO (&#xa3;) </option>
                        <option value="Free">Free</option>
                    </select>
                </div> 
                <div>
                    <label for="scheme"> Salary Scheme (Optional)</label>
                    <select id="scheme" name="scheme" class="shadow-none selectpicker with-border" required>
                        <option value="{{ old('scheme') }}">{{ old('scheme') }}</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Annual">Annual</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Free">Free</option>
                        <option value="Other">Other</option>
                    </select>
                </div> 
                <div class="form-group">
                    <textarea name="description" id="description" placeholder="Job Description" class="with-border py-3 px-3">
                    {{ old('description') }}</textarea>

                </div> 
                <label for="type"> Job Application Deadline </label>
                <div class="line">
                    <input class="line__input" id="deadline" name="deadline" type="date" onkeyup="this.setAttribute('value', this.value);" value="{{ old('deadline') }}" autocomplete="off">
                    <span for="deadline" class="line__placeholder"> </span>
                </div> 
                <div uk-form-custom class="w-full py-3">
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div> <input type="file" id="image" name="image">
                    <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        Poster Image</a>
                </div> 
            </div>

            <!-- form footer -->
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> Your Job Opportunities Is Subject to Review and Proof-reading. Ensure To Be
                    Accurate And Concise. </p>
                <button class="button blue" type="submit">SHARE</button>
            </div>
        </form>
    </div>
</div>

@endsection
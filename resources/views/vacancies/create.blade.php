@extends('layouts.main')
@section('title', 'Create Job / Training / Conferences / Empowerment')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('vacancies.index') }}">All Posted Jobs</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('vacancies.create') }}">Create New Job Opportunities </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                @if (session('status'))
                    <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif
                <!-- form header -->
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Create New Job Opportunity</h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('vacancies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="position" name="position" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('position') }}"
                                autocomplete="off">
                            <span for="position" class="line__placeholder"> Job Title </span>
                        </div>
                        @error('position')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="company" name="company" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('company') }}"
                                autocomplete="off">
                            <span for="company" class="line__placeholder"> Company Name </span>
                        </div>
                        @error('company')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="location" name="location" type="address"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('location') }}"
                                autocomplete="off">
                            <span for="location" class="line__placeholder"> Company Address/Location </span>
                        </div>
                        @error('location')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div>
                            <label for="type"> Job Working Type </label>
                            <select id="type" name="type" class="shadow-none selectpicker with-border "
                                required>
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
                        @error('type')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="website" name="website" type="url"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('website') }}"
                                autocomplete="off">
                            <span for="website" class="line__placeholder"> Application link </span>
                        </div>
                        @error('website')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="salary" name="salary" type="number"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('salary') }}"
                                autocomplete="off">
                            <span for="salary" class="line__placeholder"> Job Salary (optional)</span>
                        </div>
                        @error('salary')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div>
                            <label for="currency"> Salary Currency (Optional)</label>
                            <select id="currency" name="currency" class="shadow-none selectpicker with-border "
                                required>
                                <option value="{{ old('currency') }}">{{ old('currency') }}</option>
                                <option value="₦"> NGN (₦) </option>
                                <option value="$"> USD ($) </option>
                                <option value="€"> EURO (&#xa3;) </option>
                                <option value="Free">Free</option>
                            </select>
                        </div>
                        @error('currency')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div>
                            <label for="scheme"> Salary Scheme (Optional)</label>
                            <select id="scheme" name="scheme" class="shadow-none selectpicker with-border"
                                required>
                                <option value="{{ old('scheme') }}">{{ old('scheme') }}</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Annual">Annual</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Free">Free</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        @error('scheme')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="form-group">
                            <textarea name="description" id="description" placeholder="Job Description" rows="5" cols="30">
                            {{ old('description') }}</textarea>

                        </div>
                        @error('description')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                            <label for="type"> Job Application Deadline  </label>
                            <div class="line">
                            <input class="line__input" id="deadline" name="deadline" type="date"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('deadline') }}"
                                autocomplete="off">
                            <span for="deadline" class="line__placeholder"> </span>
                        </div>
                        @error('deadline')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                         <div uk-form-custom class="w-full py-3">
                            <div
                                class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-12">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div> <input type="file" id="image" name="image">
                            <a href="#"
                                class="bg-gray-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                                Poster Image</a>
                        </div>
                        @error('image')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> Your Job Opportunities Is Subject to Review and Proof-reading. Ensure To Be
                            Accurate And Concise. </p>
                        <button class="button dark" type="submit">SHARE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(description => {
                console.log(description);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@extends('layouts.main')
@section('title', $vacancy->position)
@section('description', $vacancy->company)
@section('keywords', 'jobs, mentoring, business, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/vacancies')

@section('main')

<div class="main_content">
    <div class="mcontainer">

        <div class="lg:flex lg:space-x-12">


            <div class="lg:w-3/4 card">

                <div class="h-44 md:h-60 overflow-hidden relative rounded-t-lg w-full">
                    <img src="{{ asset($vacancy->image) }}" alt="{{ $vacancy->position }}" class="w-full h-full absolute inset-0 object-cover">
                </div>

                <div class="p-10 pt-4 divide-y divide-gray-100">

                   <div class="md:py-8 py-3">
                       <h2 class="text-2xl font-bold">  {{ $vacancy->position }} </h2>
                       <p class="font-medium mt-1.5 text-base"> {{ $vacancy->company }} </p>
                   </div>

                   <div class="md:py-8 py-3">
                       <h1 class="block text-xl font-bold mb-9"> Job details  </h1>
                       <div class="md:flex">
                           <div class="md:w-2/3 space-y-4 -mt-2">

                               <div class="flex items-center space-x-3">
                                   <ion-icon name="unlink" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                                   <div class="flex-1">
                                       <div>  <a href="{{ $vacancy->location }}" class="text-blue-500"> {{ $vacancy->location }} </a> </div>
                                   </div>
                               </div>
                               <div class="flex items-center space-x-3">
                                   <ion-icon name="mail-open" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                                   <div class="flex-1">
                                       <div> {{ $vacancy->type }}  </div>
                                   </div>
                               </div>
                               <div class="flex items-center space-x-3">
                                   <ion-icon name="mail-open" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                                   <div class="flex-1">
                                       <div> Posted {{ $vacancy->created_at->diffForHumans() }} </div>
                                   </div>
                               </div>
                               <div class="flex items-center space-x-3">
                                   <ion-icon name="unlink" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                                   <div class="flex-1">
                                       <div>  <a href="{{ $vacancy->website }} " class="text-blue-500"> {{ $vacancy->website }}  </a> </div>
                                   </div>
                               </div>
                               <div class="flex items-center space-x-3">
                                   <ion-icon name="albums" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                                   <div class="flex-1">
                                                        {{-- <td> {{ date('l', strtotime($product->created_at)) }}</td> --}}
                                                        <div>  <a href="#" class="text-blue-500">Deadline: {{ date('l-d-M-Y', strtotime($vacancy->deadline)) }} </a> </div>
                                   </div>
                               </div>

                           </div>

                           <div class="flex-1 space-y-4 md:mt-0 mt-6 text-sm font-medium">
                               {{-- <div>
                                   <div class="font-semibold mb-2"> Minimum </div>
                                   <div class="text-gray-400"> <span class="text-2xl font-semibold text-black"> $500 </span> Per Month</div>
                               </div> --}}
                               <div>
                                   {{-- <div  class="font-semibold mb-2"> Maximum </div> --}}
                                   <div class="text-gray-400"> <span class="text-2xl font-semibold text-black">{{ $vacancy->currency }}{{ number_format($vacancy->salary) }}   </span> {{ $vacancy->scheme }} </div>
                               </div>
                               <a href="{{ $vacancy->website }}" target="_blank" referrerpolicy="origin" class="bg-blue-600 text-white py-2.5 text-center font-semibold w-full mt-4 block rounded"> Apply now </a>
                           </div>
                       </div>
                   </div>

                   <div class="md:py-8 py-3">
                       <h1 class="block text-2xl font-bold mb-6"> Job Description  </h1>
                       <div class="space-y-3">
                        {!! $vacancy->description !!}
                       </div>
                   </div>

               </div>

            </div>

            <div class="lg:w-1/4 w-full flex-shrink-0">

                <div uk-sticky="media @m ; offset:80 ; bottom : true" class="lg:mt-0 mt-6">

                    <h2 class="text-xl font-semibold mb-2"> Other Jobs Posted </h2>

                    <ul class="-space-y-2">
                        @foreach ($othervacancies as $othervacany )
                        <li>
                            <a href="{{ route('vacancies.show', $othervacany) }}" class="hover:bg-gray-100 rounded-md p-3 -mx-3 block">
                                <h3 class="font-medium line-clamp-2">{{ $othervacany->position }}</h3>
                                <div class="flex font-medium items-center mt-1 space-x-1.5 text-xs">
                                    <div class="">{{ $othervacany->type }}</div>
                                    <div class="pb-1"> . </div>
                                    <div class="text-blue-500">{{ $othervacany->currency }}{{ number_format($vacancy->salary) }} </div>
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



    </div>
</div>

@endsection

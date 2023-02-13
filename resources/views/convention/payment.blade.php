@extends('layouts.main')
@section('title', 'Sub Convention Payment')
@section('main')
<div class="main_content">
    <div
        class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">

        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">  CONVENTION 2022 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Choose the appropriate level please.</div>
        </div>
    </div> 
    <div class="mcontainer">
        <div class="-mt-10 bg-blue max-w-2x1 mx-auto p-10 relative rounded-md shadow">
            @if (session('status'))
            <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
                {{ session('status') }}</p>
            @endif
            <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6"> 
                <div class="md:col-span-2 md:flex items-center justify-between">
                    <a href="https://flutterwave.com/pay/graduate_student"
                        class="button hover:bg-white bg-blue-700 w-full md:w-auto md:mt-0 mt-4">
                        Pay Graduate N2,500</a>

                    <a href="https://flutterwave.com/pay/students_payment"
                        class="button hover:bg-white bg-dark-700 w-full md:w-auto md:mt-0 mt-4">Pay Undergraduate N1,500
                    </a>
                </div>
            </div> 
        </div> 
    </div>
</div>  
@endsection
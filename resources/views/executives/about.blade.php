@extends('layouts.main')
@section('title', 'Central Executives Council')

@section('main')
<div class="main_content"> 
        <div class="w-full lg:h-80 h-52 pb-10 bg-cover flex justify-center items-center relative" data-src="{{ asset('assets/images/group/group-cover-1.jpg') }}" uk-img>

        <div class="text-center max-w-xl mx-auto z-10 relative">
            <div class="lg:text-4xl text-2xl text text-white font-semibold mb-3"> About Unification Campus Fellowship</div>
            <div class="text-white text-lg font-medium text-opacity-90"> Socialite Is a template for developers who want to start their next social web application UI</div>
        </div>

        <div class="absolute w-full h-full inset-0 bg-gray-600 bg-opacity-20"> </div>

    </div> 
    <div class="mcontainer"> 
        <div class="-mt-16 bg-white max-w-3xl mx-auto p-10 relative rounded-md shadow">

            <div class="md:space-y-6 space-y-5 text-gray-400 md:text-base">
                
                <div class="font-semibold md:text-2xl text-lg text-gray-700">Write about your website here</div>
                <div>
             
                    <div class="md:flex md:space-x-14">
                        <div class="md:w-3/4">
                            <h2 class="text-xl font-semibold mb-2" id="basic"> Members of The CEC</h2>
                            <p class="text-base mb-10">  Create a list of items that can be shown individually by clicking an item's header. </p>
                            
                            <ul uk-accordion>
                                <li class="uk-open">
                                    <a class="uk-accordion-title" href="#">Public Relation Officer 1</a>
                                    <div class="uk-accordion-content">
                                     <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                                         <img src="{{ asset('assets/images/blog/img-3.jpg') }}" alt="" class="w-full h-full absolute inset-0 object-cover">
                                     </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">Welfare Cord</a>
                                    <div class="uk-accordion-content">
                                     <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                                         <img src="{{ asset('assets/images/blog/img-3.jpg') }}" alt="" class="w-full h-full absolute inset-0 object-cover">
                                     </div>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">General Secretary</a>
                                    <div class="uk-accordion-content">
                                     <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                                         <img src="{{ asset('assets/images/blog/img-3.jpg') }}" alt="" class="w-full h-full absolute inset-0 object-cover">
                                     </div>  
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                                    </div>
                                </li>
                            </ul>   
                        </div> 
                    </div> 
                 </div> 
                <div class="font-semibold md:text-xl text-lg text-gray-700"> Remote is not for everyone</div>
                <div class="md:leading-8">Laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                <div class="md:leading-8">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</div>
                <div class="md:leading-8">Aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                 
            </div>
            
        </div>

    </div>
</div>   
@endsection
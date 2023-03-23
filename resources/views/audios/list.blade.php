@extends('layouts.main')
@section('title', 'Audio clips')
@section('description', 'You can listen to all the audio clip both in music, sermon and worship chat to help your spirit man')
@section('keywords', 'You can listen to all the audio clip both in music, sermon and worship chat to help your spirit man')
@section('canonical', 'https://cnsunification.org/audio-messages')

@section('main')
<div class="main_content">
    <div class="mcontainer"> 
    <div class="lg:flex lg:space-x-10">
        <div class="lg:w-3/3">
            <div class="divide-y -mt-3 card px-5 py-2 ">
                @forelse ($audios as $aud)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                        <img src="{{ asset('storage/app/public/' . $aud->image) }}" alt="{{ $aud->title }}" class="w-full h-full absolute inset-0 object-cover">
                     <audio class="js-player">
                                <source src="{{asset('storage/app/public/' . $aud->file )}}" />
                            </audio>   
                    </div>
                    <div class="flex-1 relative md:mt-0 mt-4">
                        <a href="#" class="text-xl font-semibold leading-6">{{ $aud->title }}</a>
                        {{-- <p class="leading-6 line-clamp-2 mt-2"> {!! $aud->content !!}</p> --}}
                        <div class="leading-6 line-clamp-2 mt-2">
                            {!! $aud->content !!}
                        </div>
                        <div class="font-semibold mt-2"> Minister: {{ $aud->author }} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div> {{ $aud->created_at->diffForHumans() }}</div>
                            <div>·</div>
                            <div> <a href="{{ route('audios.edit', $aud) }}"> <span class="icon-feather-edit "></span>
                                    Edit</a></div>
                            <div>·</div>
                            <div>
                                <form action="{{ route('audios.destroy', $aud) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                        <span class="icon-feather-trash-2"></span> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-opacity-75"> You currently do not have audio clips!</p>
                @endforelse
            </div>
        </div>         
    </div>
</div>
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = Plyr.setup('.js-player');
    });
</script> 
@endsection
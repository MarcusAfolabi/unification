@extends('layouts.main')
@section('title', 'Edit unit')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('unit.index') }}">Back</a>
                        </li>
                        <li class="active">
                            <a href="#">Editing unit </a>
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
                    <h3 class="font-bold text-xl"> Edit unit </h3>
                </div>


                <!-- form body -->

                <form action="{{ route('unit.update', $unit) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="uk-modal-body" uk-overflow-auto>
                        <div>
                            <div class="line">
                                <input class="line__input" id="name" name="name" type="text"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ $unit->name }}"
                                    autocomplete="off">
                                <span for="name" class="line__placeholder"> Name </span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-modal-footer text-right">
                        <button class="button" type="submit">UPDATE</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection

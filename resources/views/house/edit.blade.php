@extends('layouts.main')
@section('title', $house->name)
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <x-jet-validation-errors class="alert alert-danger" />
            @if (session('status'))
            <div class="bg-whit border-t-4 border-red-600 p-5 shadow-lg relative rounded-md" uk-alert>
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('house.update') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="uk-modal-body" uk-overflow-auto>
                    <div>
                        <div class="line">
                            <input class="line__input" id="" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ $house->name }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder">House Name </span>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer text-right">
                    <button class="button gray uk-modal-close" type="button">Cancel</button>
                    <button class="button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

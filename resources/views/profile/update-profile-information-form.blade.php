<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- LastName -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="{{ __('LastName') }}" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="state.lastname" />
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>
        <!-- Phone Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
            <x-jet-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" ReadOnly wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Contact Address') }}" />
            <x-jet-input id="address" type="address" class="mt-1 block w-full" wire:model.defer="state.address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="academic_status" value="{{ __('Academic Status') }}" />
            <x-jet-input id="academic_status" type="text" class="mt-1 block w-full" wire:model.defer="state.academic_status" />
            <x-jet-input-error for="academic_status" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="school_level" value="{{ __('Level In School') }}" />
            <x-jet-input id="school_level" type="text" class="mt-1 block w-full" wire:model.defer="state.school_level" />
            <x-jet-input-error for="school_level" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fellowship_status" value="{{ __('Position Held') }}" />
            <x-jet-input id="fellowship_status" type="text" class="mt-1 block w-full" wire:model.defer="state.fellowship_status" />
            <x-jet-input-error for="fellowship_status" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fellowship_id" value="{{ __('Chapter Fellowship') }}" />
            <x-jet-input id="fellowship_id" type="text" class="mt-1 block w-full" wire:model.defer="state.fellowship_id" />
            <x-jet-input-error for="fellowship_id" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unit_id" value="{{ __('Unit in Fellowship') }}" />
            <x-jet-input id="unit_id" type="text" class="mt-1 block w-full" wire:model.defer="state.unit_id" />
            <x-jet-input-error for="unit_id" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="qualification_one" value="{{ __('First Degree Qualification') }}" />
            <x-jet-input id="qualification_one" type="text" class="mt-1 block w-full" wire:model.defer="state.qualification_one" />
            <x-jet-input-error for="qualification_one" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="degree_one" value="{{ __('First Degree Institution') }}" />
            <x-jet-input id="degree_one" type="text" class="mt-1 block w-full" wire:model.defer="state.degree_one" />
            <x-jet-input-error for="degree_one" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="course_one" value="{{ __('First Degree Course') }}" />
            <x-jet-input id="course_one" type="text" class="mt-1 block w-full" wire:model.defer="state.course_one" />
            <x-jet-input-error for="course_one" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="year_graduated" value="{{ __('Graduation Year') }}" />
            <x-jet-input id="year_graduated" type="tel" class="mt-1 block w-full" wire:model.defer="state.year_graduated" />
            <x-jet-input-error for="year_graduated" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="relationship_status" value="{{ __('Relationship Status') }}" />
            <x-jet-input id="relationship_status" type="text" class="mt-1 block w-full" wire:model.defer="state.relationship_status" />
            <x-jet-input-error for="relationship_status" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="occupation" value="{{ __('Occupation') }}" />
            <x-jet-input id="occupation" type="text" class="mt-1 block w-full" wire:model.defer="state.occupation" />
            <x-jet-input-error for="occupation" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="professional_skill" value="{{ __('Professional Skill') }}" />
            <x-jet-input id="professional_skill" type="text" class="mt-1 block w-full" wire:model.defer="state.professional_skill" />
            <x-jet-input-error for="professional_skill" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Updated.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
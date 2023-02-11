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
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
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
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
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
            <x-jet-label for="phoneNumber" value="{{ __('Phone Number') }}" />
            <x-jet-input id="phoneNumber" type="tel" class="mt-1 block w-full" wire:model.defer="state.phoneNumber" />
            <x-jet-input-error for="phoneNumber" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" ReadOnly wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date_of_birth" value="{{ __('Date Of Birth') }}" />
            <x-jet-input id="date_of_birth" type="text" class="mt-1 block w-full"
                wire:model.defer="state.date_of_birth" />
            <x-jet-input-error for="date_of_birth" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contact_address" value="{{ __('Contact Address') }}" />
            <x-jet-input id="contact_address" type="contact_address" class="mt-1 block w-full"
                wire:model.defer="state.contact_address" />
            <x-jet-input-error for="contact_address" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="academicStatus" value="{{ __('Academic Status') }}" />
            <x-jet-input id="academicStatus" type="text" class="mt-1 block w-full"
                wire:model.defer="state.academicStatus" />
            <x-jet-input-error for="academicStatus" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="levelInSchool" value="{{ __('Level In School') }}" />
            <x-jet-input id="levelInSchool" type="text" class="mt-1 block w-full"
                wire:model.defer="state.levelInSchool" />
            <x-jet-input-error for="levelInSchool" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="positionHeld" value="{{ __('Position Held') }}" />
            <x-jet-input id="positionHeld" type="text" class="mt-1 block w-full"
                wire:model.defer="state.positionHeld" />
            <x-jet-input-error for="positionHeld" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="yourFellowship" value="{{ __('Chapter Fellowship') }}" />
            <x-jet-input id="yourFellowship" type="text" class="mt-1 block w-full"
                wire:model.defer="state.yourFellowship" />
            <x-jet-input-error for="yourFellowship" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unit_in_fellowship" value="{{ __('Unit in Fellowship') }}" />
            <x-jet-input id="unit_in_fellowship" type="text" class="mt-1 block w-full"
                wire:model.defer="state.unit_in_fellowship" />
            <x-jet-input-error for="unit_in_fellowship" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="qualification_one" value="{{ __('First Degree Qualification') }}" />
            <x-jet-input id="qualification_one" type="text" class="mt-1 block w-full"
                wire:model.defer="state.qualification_one" />
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
            <x-jet-label for="qualification_two" value="{{ __('Second Degree Qualification') }}" />
            <x-jet-input id="qualification_two" type="text" class="mt-1 block w-full"
                wire:model.defer="state.qualification_two" />
            <x-jet-input-error for="qualification_two" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="degree_two" value="{{ __('Second Degree Institution') }}" />
            <x-jet-input id="degree_two" type="text" class="mt-1 block w-full" wire:model.defer="state.degree_two" />
            <x-jet-input-error for="degree_two" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="course_two" value="{{ __('Second Degree Course') }}" />
            <x-jet-input id="course_two" type="text" class="mt-1 block w-full" wire:model.defer="state.course_two" />
            <x-jet-input-error for="course_two" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="qualification_three" value="{{ __('Third Degree Qualification') }}" />
            <x-jet-input id="qualification_three" type="text" class="mt-1 block w-full"
                wire:model.defer="state.qualification_three" />
            <x-jet-input-error for="qualification_three" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="graduationYear" value="{{ __('Graduation Year') }}" />
            <x-jet-input id="graduationYear" type="tel" class="mt-1 block w-full"
                wire:model.defer="state.graduationYear" />
            <x-jet-input-error for="graduationYear" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unificationCurrentPost" value="{{ __('Unification Current Post') }}" />
            <x-jet-input id="unificationCurrentPost" type="text" class="mt-1 block w-full"
                wire:model.defer="state.unificationCurrentPost" />
            <x-jet-input-error for="unificationCurrentPost" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="relationship_status" value="{{ __('Relationship Status') }}" />
            <x-jet-input id="relationship_status" type="text" class="mt-1 block w-full"
                wire:model.defer="state.relationship_status" />
            <x-jet-input-error for="relationship_status" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="occupation" value="{{ __('Occupation') }}" />
            <x-jet-input id="occupation" type="text" class="mt-1 block w-full" wire:model.defer="state.occupation" />
            <x-jet-input-error for="occupation" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="professional_skill" value="{{ __('Professional Skill') }}" />
            <x-jet-input id="professional_skill" type="text" class="mt-1 block w-full"
                wire:model.defer="state.professional_skill" />
            <x-jet-input-error for="professional_skill" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="office_address" value="{{ __('Office Address') }}" />
            <x-jet-input id="office_address" type="text" class="mt-1 block w-full"
                wire:model.defer="state.office_address" />
            <x-jet-input-error for="office_address" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

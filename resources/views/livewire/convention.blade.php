<div class="relative max-w-2xl p-10 mx-auto -mt-16 bg-white rounded-md shadow">

    <form wire:submit.prevent='register'>
        <div>
            <div class="mb-4 line">
                <input wire:model.blur="firstname" class="line__input"  name="firstname" type="text"
                    autocomplete="off">
                <span for="firstname" class="line__placeholder">Firstname</span>
            @error('firstname')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>
            <div class="mb-4 line">
                <input wire:model.blur="lastname" class="line__input"  name="lastname" type="text"
                    autocomplete="off">
                <span for="lastname" class="line__placeholder">Last name</span>
            @error('lastname')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>


            <div class="mb-4 line">
                <input wire:model.blur="email" class="line__input" name="email" type="email"
                    >
                <span for="email" class="line__placeholder">Email</span>
            @error('email')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>

            <div class="mb-4 line">
                <input wire:model.blur="phone" class="line__input" maxlength="11" id="tel"
                    name="phone" type="tel" >
                <span for="phone" class="line__placeholder">Phone Number</span>
            @error('phone')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>

            <div class="mb-14 line">
                <label>Gender</label>
                <select wire:model.blur="gender" class="px-3 py-3 with-border">
                    <option></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            @error('gender')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>

            <div class="mb-14 line">
                <label>Are you a Graduate?</label>
                <select wire:model.blur="academic_status" class="px-3 py-3 with-border">
                    <option></option>
                    <option value="Graduate">Yes, Graduate</option>
                    <option value="Undergraduate">No, Undergraduate</option>
                    <option value="Postgraduate">No, Postgraduate</option>
                </select>
            @error('academic_status')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>

            <div class="mb-14 line">
                <label>From which Fellowship?</label>
                <select wire:model.blur="fellowship" class="px-3 py-3 with-border">
                    <option></option>
                    @if ($fellowships)
                        @foreach ($fellowships as $fellowship)
                            <option value="{{ $fellowship->name }}">{{ $fellowship->name }}</option>
                        @endforeach
                    @endif
                </select>
            @error('fellowship')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>

            <div class="mb-14 line">
                <label>Your status in Fellowship</label>
                <select wire:model.blur="fellowship_status" class="px-3 py-3 with-border">
                    <option></option>
                    @foreach ($fellowshipStatusOptions as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            @error('fellowship_status')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>
            <div class="mb-14 line">
                <label>Your unit in Fellowship</label>
                <select wire:model.blur="unit" class="px-3 py-3 with-border">
                    <option></option>
                    @if ($units)
                        @foreach ($units as $unit)
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                        @endforeach
                    @endif
                </select>
            @error('unit')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            </div>


            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                <div class="flex items-center justify-end mt-6">
                    <button data-sitekey="6LeagXYkAAAAAO4pyoo0TzNgNGidnVAgzMbJkREc" data-callback="onSubmit"
                        type="submit"
                        class="w-1/2 px-2 py-2 ml-5 text-white bg-red-500 dark:text-white rounded-xl g-recaptcha"
                        wire:loading.attr="disabled">
                        <span wire:loading wire:target="register">Please wait ...</span>
                        <span wire:loading.remove>Register</span>
                    </button>
                </div>
            </div>
            @if (session('status'))
                <div class="relative p-5 text-xl text-red-500 bg-white border-t-4 border-red-600 rounded-md shadow-lg dark:bg-white dark:border-white"
                    uk-alert>
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <form>
</div>

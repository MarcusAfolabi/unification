<div class="relative max-w-2xl p-10 mx-auto -mt-16 bg-white rounded-md shadow">
    <p class="text-xl font-bold text-red-500">STEP 1</p>
    <div class="mb-12 text-lg font-medium text-slate-900 dark:text-white text-opacity-90">
        ONLINE PAYMENT: <b>BANK TRANSFER</b>
        <li class='text-sm'>Account no: <b>2016294268</b></li>
        <li class='text-sm'>Bank: First Bank of Nigeria Plc</li>
        <li class='text-sm'>Account name: Cherubim and Seraphim Church Unification Campus Fellowship</li>
        <li class='text-sm'>Student Reg. Fee = &#8358;1,500</li>
        <li class='text-sm'>Graduate Reg. Fee = &#8358;3,000</li>
        <p class="mt-4 font-bold">LATE REG. Start 29th April, 2024</p>
        <li class='text-sm'>Student Reg. Fee = &#8358;2,500</li>
        <li class='text-sm'>Graduate Reg. Fee = &#8358;4,000</li>
    </div>
    <form wire:submit.prevent='register'>
        <div>
            <p class="text-xl font-bold text-red-500">STEP 2</p>

            <div class="mb-12 line">
                <label>Upload proof of payment</label>
                <input wire:model.blur="payment_proof" type="file" class="form-control with-border"
                    accept="image/jpeg,image/png,application/pdf">
            </div>
            @error('payment_proof')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            @if ($payment_proof)
                <img class="w-1/2 rounded-xl" src="{{ $payment_proof->temporaryUrl() }}">
            @endif
            <div class="mb-4 line">
                <input wire:model.blur="firstname" class="line__input" autofocus name="firstname" type="text"
                    autocomplete="off">
                <span for="firstname" class="line__placeholder">Firstname</span>
            </div>
            @error('firstname')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            <div class="mb-4 line">
                <input wire:model.blur="lastname" class="line__input" autofocus name="lastname" type="text"
                    autocomplete="off">
                <span for="lastname" class="line__placeholder">Last name</span>
            </div>
            @error('lastname')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror


            <div class="mb-4 line">
                <input wire:model.blur="email" class="line__input" autofocus name="email" type="email"
                    autocomplete="off">
                <span for="email" class="line__placeholder">Email</span>
            </div>
            @error('email')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <div class="mb-4 line">
                <input wire:model.blur="phone" class="line__input" maxlength="11" id="tel" autofocus
                    name="phone" placeholder="08033440133" type="tel" autocomplete="off">
                <span for="phone" class="line__placeholder">Phone Number</span>
            </div>
            @error('phone')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <div class="mb-8 line">
                <label>Gender</label>
                <select wire:model.blur="gender" class="px-3 py-3 with-border">
                    <option></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            @error('gender')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <div class="mb-8 line">
                <label>Are you a Graduate?</label>
                <select wire:model.blur="academic_status" class="px-3 py-3 with-border">
                    <option></option>
                    <option value="Graduate">Yes, Graduate</option>
                    <option value="Undergraduate">No, Undergraduate</option>
                    <option value="Postgraduate">No, Postgraduate</option>
                </select>
            </div>
            @error('academic_status')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <div class="mb-8 line">
                <label>From which Fellowship?</label>
                <select wire:model.blur="fellowship" class="px-3 py-3 with-border">
                    <option></option>
                    @if ($fellowships)
                        @foreach ($fellowships as $fellowship)
                            <option value="{{ $fellowship->name }}">{{ $fellowship->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            @error('fellowship')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <div class="mb-8 line">
                <label>Your status in Fellowship</label>
                <select wire:model.blur="fellowship_status" class="px-3 py-3 with-border">
                    <option></option>
                    @foreach ($fellowshipStatusOptions as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            @error('fellowship_status')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            <div class="mb-8 line">
                <label>Your unit in Fellowship</label>
                <select wire:model.blur="unit" class="px-3 py-3 with-border">
                    @if ($units)
                        @foreach ($units as $unit)
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            @error('unit')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror


            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                <div class="flex items-center justify-end mt-6">
                    {{-- <button class="w-1/2 px-2 py-2 ml-5 bg-red-500 g-recaptcha rounded-xl"
                        data-sitekey="6LeagXYkAAAAAO4pyoo0TzNgNGidnVAgzMbJkREc" data-callback="onSubmit"
                        type="submit">Register
                    </button> --}}
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
            {{-- <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                <div class="flex items-center justify-end mt-6">
                    <button class="w-1/2 px-2 py-2 ml-5 bg-red-500 g-recaptcha rounded-xl"
                        data-sitekey="6LeagXYkAAAAAO4pyoo0TzNgNGidnVAgzMbJkREc" data-callback="onSubmit"
                        type="submit">Register
                    </button>
                </div>
            </div> --}}
        </div>

        <form>
</div>

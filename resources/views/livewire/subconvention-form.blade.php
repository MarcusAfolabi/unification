<form wire:submit.prevent="submit">
    <div class="">
        <div class="bg-white w-full p-10 relative rounded-md shadow">
            <h4 class="text-xl font-semibold"> Step 2</h4>

            <div class="grid md:grid-cols-1 md:gap-y-7 md:gap-x-6 gap-6 w-full">

                <label>Upload Proof of Payment Here</label>
                <input type="file" wire:model="payment_proof" class="with-border">
                @error('payment_proof') <span class="text-red-500">{{ $message }}</span> @enderror
                <input type="text" placeholder="Enter your first name" wire:model="firstname" class="with-border">
                @error('firstname') <span class="text-red-500">{{ $message }}</span> @enderror
                <input type="text" placeholder="Enter your last name" wire:model="lastname" class="with-border">
                @error('lastname') <span class="text-red-500">{{ $message }}</span> @enderror
                <input type="email" placeholder="Enter your email" wire:model="email" class="with-border">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                <input type="tel" placeholder="Enter your phone no" wire:model="phone" maxlength="11" id="phone" pattern="^0(?:70|71|80|81|90|91)[0-9]{8}$" class="shadow-none mt-0 px-5 with-border">
                @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror

                <select wire:ignore wire:model="gender" class="shadow-none py-3 px-3 with-border">
                    <option selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror

                <select wire:ignore wire:model="fellowship_id" class="shadow-none py-3 px-3 with-border">
                    <option selected hidden>Select your fellowship</option>
                    @foreach ($schools as $school)
                    <option value="{{ $school->name }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                @error('fellowship_id') <span class="text-red-500">{{ $message }}</span> @enderror

                <select wire:ignore wire:model="academic_status" class="shadow-none py-3 px-3 with-border">
                    @foreach($levels as $level)
                    <option value="{{ $level }}">{{ $level }}</option>
                    @endforeach
                </select>
                @error('academic_status') <span class="text-red-500">{{ $message }}</span> @enderror

                <select wire:ignore wire:model="fellowship_status" class="shadow-none py-3 px-3 with-border">
                    <option selected hidden>Select your fellowship post</option>
                    @foreach($fellowshipPosts as $post)
                    <option value="{{ $post }}">{{ ucwords(strtolower($post)) }}</option>
                    @endforeach
                </select>
                @error('fellowship_status') <span class="text-red-500">{{ $message }}</span> @enderror

                <select wire:ignore wire:model="unit_id" class="shadow-none py-3 px-3 with-border">
                    <option selected hidden>Select fellowship unit</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit }}">{{ ucwords(strtolower($unit)) }}</option>
                    @endforeach
                </select>
                @error('unit_id') <span class="text-red-500">{{ $message }}</span> @enderror

                <label>Upload Photo for ID Card (500px by 500px)</label>
                <input type="file" wire:model="profile_image" class="with-border">
                @error('profile_image') <span class="text-red-500">{{ $message }}</span> @enderror
                <div class="flex items-center text-center justify-between mt-6">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-secondary w-full justify-center text-center ml-5">
                        <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm">Please wait, Saving...</span>
                        <span wire:loading.remove> Register</span>
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
</form>
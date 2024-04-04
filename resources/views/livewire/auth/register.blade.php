<div class="mcontainer">
    <div class="relative max-w-2xl p-10 mx-auto -mt-16 bg-white rounded-md shadow">
        <form wire:submit.prevent="register">
            <div class="grid gap-6 md:grid-cols-2 md:gap-y-7 md:gap-x-6">
                <div class="mb-2 line">
                    <label>Firstname</label>
                    <input wire:model.live="name" type="text" class="form-control with-border">
                </div>
                @error('name')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-2 line">
                    <label>Lastname</label>
                    <input wire:model.live="lastname" type="text" class="form-control with-border">
                </div>
                @error('lastname')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-2 line">
                    <label>Email</label>
                    <input wire:model.live="email" type="email" class="form-control with-border">
                </div>
                @error('email')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-2 line">
                    <label>Phone</label>
                    <input wire:model.live="phone" maximum="11" minimum="11" type="tel"
                        class="px-4 form-control with-border">
                </div>
                @error('phone')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-2 line">
                    <label>Home/Hostel Address</label>
                    <input wire:model.live="address" type="text" class="form-control with-border">

                </div>
                @error('address')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-2 line">
                    <label>Your gender</label>
                    <select wire:model.live="gender" name="gender" class="px-3 py-3 with-border">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                @error('gender')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Are you a Graduate?</label>
                    <select wire:model.live="academic_status" name="academic_status" class="px-3 py-3 with-border">
                        <option value="" disabled></option>
                        <option value="Graduate">Yes, Graduate</option>
                        <option value="Postgraduate">No, Postgraduate</option>
                        <option value="Undergraduate">No, Undergraduate</option>
                    </select>
                </div>
                @error('academic_status')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Which Fellowship</label>
                    <select wire:model.live="fellowship_id" name="fellowship_id" class="px-3 py-3 with-border">
                        <option value="" disabled></option>
                        @foreach ($fellowships as $fellowship)
                            <option value="{{ $fellowship->id }}">{{ $fellowship->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('fellowship_id')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Post in Fellowship (Now or then)</label>
                    <select wire:model.live="fellowship_status" name="fellowship_status" class="px-3 py-3 with-border">
                        <option value="" disabled></option>
                        @foreach ($posts as $post)
                            <option value="{{ $post }}">{{ $post }}</option>
                        @endforeach
                    </select>
                </div>
                @error('fellowship_status')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Unit in Fellowship</label>
                    <select wire:model.live="unit_id" name="unit_id" class="px-3 py-3 with-border">
                        <option value="" disabled></option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('unit_id')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Other Qualification (Optional)</label>
                    <select wire:model.live="qualification_one" name="qualification_one" class="px-3 py-3 with-border">
                        <option value="" disabled></option>
                        @foreach ($qualifications as $qua)
                            <option value="{{ $qua }}">{{ $qua }}</option>
                        @endforeach
                    </select>
                </div>
                @error('qualification_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-4 line">
                    <label>Institution</label>
                    <input wire:model.live="degree_one" type="text" class="form-control with-border">

                </div>
                @error('degree_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="mb-4 line">
                    <label>Course Of Study (Optional)</label>
                    <input wire:model.live="course_one" type="text" class="form-control with-border">
                </div>
                @error('course_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-4 line">
                    <label>Password</label>
                    <input wire:model.live="password" type="password" class="form-control with-border">
                </div>
                @error('password')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="mb-4 line">
                    <label>Confirm Password</label>
                    <input wire:model.live="password_confirmation" type="password" id="password_confirmation"
                        name="password_confirmation" class="form-control with-border">
                </div>
                @error('password_confirmation')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-2 py-2 mt-4 text-white bg-red-500 dark:text-white rounded-xl g-recaptcha"
                wire:loading.attr="disabled">
                <span wire:loading wire:target="register">Please wait ...</span>
                <span wire:loading.remove>Become a member</span>
            </button>
            <div>
            </div>
            <form>
    </div>
</div>

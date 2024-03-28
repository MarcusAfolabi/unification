<div class="mcontainer">
    <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
        <form wire:submit.prevent="register">
            <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">
                <div class="line mb-2">
                    <label>Firstname</label>
                    <input wire:model.lazy="name" type="text" class="form-control with-border">
                </div>
                @error('name')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-2">
                    <label>Lastname</label>
                    <input wire:model.lazy="lastname" type="text" class="form-control with-border">
                </div>
                @error('lastname')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-2">
                    <label>Email</label>
                    <input wire:model.lazy="email" type="email" class="form-control with-border">
                </div>
                @error('email')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-2">
                    <label>Phone</label>
                    <input wire:model.lazy="phone" maximum="11" minimum="11" type="tel"
                        class="px-4 form-control with-border">
                </div>
                @error('phone')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-2">
                    <label>Home/Hostel Address</label>
                    <input wire:model.lazy="address" type="text" class="form-control with-border">

                </div>
                @error('address')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-2">
                    <label>Your gender</label>
                    <select wire:model.lazy="gender" name="gender" class="with-border px-3 py-3">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                @error('gender')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Are you a Graduate?</label>
                    <select wire:model.lazy="academic_status" name="academic_status" class="with-border px-3 py-3">
                        <option value="" disabled></option>
                        <option value="Graduate">Yes, Graduate</option>
                        <option value="Postgraduate">No, Postgraduate</option>
                        <option value="Undergraduate">No, Undergraduate</option>
                    </select>
                </div>
                @error('academic_status')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Which Fellowship</label>
                    <select wire:model.lazy="fellowship_id" name="fellowship_id" class="with-border px-3 py-3">
                        <option value="" disabled></option>
                        @foreach ($fellowships as $fellowship)
                            <option value="{{ $fellowship->id }}">{{ $fellowship->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('fellowship_id')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Post in Fellowship (Now or then)</label>
                    <select wire:model.lazy="fellowship_status" name="fellowship_status" class="with-border px-3 py-3">
                        <option value="" disabled></option>
                        @foreach ($posts as $post)
                            <option value="{{ $post }}">{{ $post }}</option>
                        @endforeach
                    </select>
                </div>
                @error('fellowship_status')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Unit in Fellowship</label>
                    <select wire:model.lazy="unit_id" name="unit_id" class="with-border px-3 py-3">
                        <option value="" disabled></option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('unit_id')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Other Qualification (Optional)</label>
                    <select wire:model.lazy="qualification_one" name="qualification_one" class="with-border px-3 py-3">
                        <option value="" disabled></option>
                        @foreach ($qualifications as $qua)
                            <option value="{{ $qua }}">{{ $qua }}</option>
                        @endforeach
                    </select>
                </div>
                @error('qualification_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-4">
                    <label>Institution</label>
                    <input wire:model.lazy="degree_one" type="text" class="form-control with-border">

                </div>
                @error('degree_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror

                <div class="line mb-4">
                    <label>Course Of Study (Optional)</label>
                    <input wire:model.lazy="course_one" type="text" class="form-control with-border">
                </div>
                @error('course_one')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-4">
                    <label>Password</label>
                    <input wire:model.lazy="password" type="password" class="form-control with-border">
                </div>
                @error('password')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
                <div class="line mb-4">
                    <label>Confirm Password</label>
                    <input wire:model.lazy="password_confirmation" type="password" id="password_confirmation"
                        name="password_confirmation" class="form-control with-border">
                </div>
                @error('password_confirmation')
                    <em class="text-red-500">{{ $message }}</em>
                @enderror
            </div>
            <button type="submit"
                class="mt-4 w-full px-2 py-2 text-white bg-red-500 dark:text-white rounded-xl g-recaptcha"
                wire:loading.attr="disabled">
                <span wire:loading wire:target="register">Please wait ...</span>
                <span wire:loading.remove>Become a member</span>
            </button>
            <div>
            </div>
            <form>
    </div>
</div>

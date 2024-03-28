<div class="mt-6">
    <form wire:submit.prevent='login' class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
        <div class="line mb-8">
            <label>Email</label>
            <input wire:model.lazy='email' class="form-control with-border" type="email" autocomplete="on">
        </div>
        @error('email')
            <em class="text-red-500">{{ $message }}</em>
        @enderror

        <div class="line mb-12">
            <label>Password</label>
            <input wire:model.lazy='password' class="form-control with-border mb-4" type="password"
                autocomplete="current-password">
        </div>
        @error('password')
            <em class="text-red-500">{{ $message }}</em>
        @enderror
        <hr>
        <div class="checkbox">
            <input type="checkbox" id="remember_me" name="remember">
            <label for="remember_me"><span class="checkbox-icon"></span>Remember me
            </label>
        </div>

        <button type="submit" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full"
            wire:loading.attr="disabled">
            <span wire:loading wire:target="register">Loading profile ...</span>
            <span wire:loading.remove>Login</span>
        </button>
        <a wire:navigate.hover href="{{ route('password.request') }}" class="text-blue-500 text-center block"> Forgot
            Password? </a>
        <hr class="pb-3.5">
        <div class="flex">
            <a wire:navigate.hover href="{{ route('register') }}" type="button"
                class="bg-blue-600 hover:bg-blue-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                New Member?
            </a>
        </div>
    </form>
</div>

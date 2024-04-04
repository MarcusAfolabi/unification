<div>

    <form wire:submit.prevent='create'>
        <div class="p-10 space-y-7">
            <div class="line">
                <input wire:model.live="title" class="line__input" maxlength="100" type="text">
                <span for="title" class="line__placeholder">Caption</span>
            </div>
            @error('title')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            <div uk-form-custom class="w-full py-3">
                <input wire:model='images' type="file" accept="image/*" multiple max="4">
                <a href="#"
                    class="flex items-center justify-center px-5 font-medium text-white text-blue-600 bg-blue-200 h-9 rounded-b-xl uk-position-bottom uk-transition-bottom-small">Images
                    4 photo max </a>
            </div>
            @error('images')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            <div>
                <label for="category">Category </label>
                <select wire:model="category" name="category" class="with-border">
                    <option value="">{{ old('category') }} </option>
                    <option value="Anniversary">Annual Anniversary </option>
                    <option value="Fellowship">Fellowship Activities </option>
                    @if (auth()->user()->role === 'admin')
                        <option value="CEC">CEC News</option>
                    @endif
                </select>
            </div>
            @error('category')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror
            <div class="form-group">
                <textarea wire:model.live="content" id="content" class="px-3 py-3 with-border" placeholder="Enter content here">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <em class="mb-4 text-red-500">{{ $message }}</em>
            @enderror

            <button type="submit" class="button blue">Publish</button>
        </div>

        {{-- <button wire:loading.attr="disabled" class="button blue" type="submit">
                    <span wire:loading.remove>PUBLISH</span>
                    <span wire:loading.target='CreatePost'>Loading...</span>
                </button> --}}
        {{-- <button type="submit" class="button blue" wire:loading.attr="disabled">
                    <span wire:loading wire:target="CreatePost">Please wait ...</span>
                    <span wire:loading.remove>Post</span>
                </button> --}}

    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>

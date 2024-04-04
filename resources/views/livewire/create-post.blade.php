<div id="modal-post" uk-modal>
    <div class="uk-modal-dialog">
        <button class="m-3 uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="text-green-700 uk-modal-title">Upload</h3>
        </div>
        <form wire:submit.prevent='CreatePost'>
            <div class="p-10 space-y-7">
                <div class="line">
                    <input wire:model.lazy="title" class="line__input" maxlength="100" type="text">
                    <span for="title" class="line__placeholder">Caption</span>
                </div>
                @error('title')
                    <em class="mb-4 text-red-500">{{ $message }}</em>
                @enderror
                <div uk-form-custom class="w-full py-3">
                    <div
                        class="relative flex flex-col items-center justify-center w-full h-32 bg-blue-100 border-2 border-dashed rounded-lg blue:bg-blue-800 blue:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input wire:model.lazy='images' type="file" accept="image/*" name="image[]" multiple="multiple"
                        max="4"><a href="#"
                        class="flex items-center justify-center px-5 font-medium text-white text-blue-600 bg-blue-200 h-9 rounded-b-xl uk-position-bottom uk-transition-bottom-small">Images
                        4 max </a>
                </div>
                @error('images')
                    <em class="mb-4 text-red-500">{{ $message }}</em>
                @enderror
                <div>
                    <label for="category">Category </label>
                    <select wire:model.lazy="category" name="category" class="shadow-none selectpicker with-border">
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
                    <textarea wire:model.defer="content" name="content" id="content" class="px-3 py-3 with-border"
                        placeholder="Enter description"></textarea>
                </div>
                @error('content')
                    <em class="mb-4 text-red-500">{{ $message }}</em>
                @enderror

            </div>
            <div class="flex justify-between border-t lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6 text-green-700">Your Post Is Subject to Review and Proof-reading. Ensure To
                    Be Accurate And Concise.</p>

                <button wire:loading.attr="disabled" class="button blue" type="submit">
                    <span wire:loading.remove>PUBLISH</span>
                    <span wire:loading>Loading...</span>
                </button>
            </div>

        </form>
    </div>
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

<div>
    <form method="post" wire:submit.prevent="save">
        <div>
            <label for="cover-photo" class="block text-lg font-medium leading-6" style="color: #866556;">Recipe Photo</label>
            <div class="mt-2 flex justify-center rounded-sm border border-dashed border-gray-300 px-6 py-10">
                <div class="text-center" style="color: #866556;">
                    <svg style="color: #828E76;" class="mx-auto h-12 w-12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6">
                        <label for="file-upload" class="cursor-pointer border-gray-300 rounded-sm font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-gray-200">
                            <span style="color: #828E76;" class="hover:opacity-75">Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only" wire:model="photo">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5">PNG, JPG, GIF up to 10MB</p>
                    @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div style="color: #866556;">
            <div>
                <label class="text-base font-medium leading-7 block text-lg font-medium leading-6 pt-10">Title</label>
                <p class="mt-1 text-sm leading-6 opacity-80">The recipe name / title shouldn't be long.</p>
                <input style="color: #866556;" type="text" name="title" id="title" autocomplete="Recipe Name" class="bg-gray-100 block w-full rounded-sm border-0 py-1.5 text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-100 focus:ring-2 focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6" wire:model="title">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-base font-medium leading-7 block text-lg font-medium leading-6 pt-10">Description</label>
                <textarea style="color: #866556;" name="text" id="text" autocomplete="Recipe Description" class="bg-gray-100 block w-full rounded-sm border-0 py-1.5 text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-100 focus:ring-2 focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6" wire:model="text">{{ $text }}</textarea>
                @error('text') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <div class="flex">
                <button style="background-color: #828E76;" class="mr-1 my-5 w-full justify-center rounded-sm bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-85 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
                <button type="button" onclick="window.location.href='{{ route('dashboard') }}'" class="ml-1 my-5 w-full justify-center rounded-sm bg-gray-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-85 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancel
                </button>
            </div>
        </div>
    </form>
    @if(session()->has('message'))
        <div class="mt-3 text-green-500">
            {{ session('message') }}
        </div>
    @endif
    
</div>

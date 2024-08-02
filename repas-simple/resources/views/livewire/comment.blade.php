<div>
    <div class="mt-6  rounded-sm border border-gray-200/25 px-6 py-10">
        <div class="mb-6 text-3xl font-semibold text-gray-200 flex items-center">
            <span class=" text-3xl pr-2 material-symbols-outlined">
                account_circle
            </span>
            <h3>
                @if($post->users) {{ $post->users->name }} @endif
            </h3>
        </div>
        <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
            @if($post->photo)
                <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
            @else
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
            @endif
        </div>
        <div>
            <p class="my-2 text-base text-lg font-sm text-gray-100">
                {{ $post->title }}
             </p>
            <p class="mb-6 text-base text-sm font-medium text-gray-500">
                {{ $post->text }}
            </p>
        </div>
        <div class="my-6">
             <form method="post" wire:submit="save">
                <div>
                    <label class="text-base font-medium leading-7 block text-lg font-medium leading-6 text-gray-200 pt-10">Comment</label>
                    <input type="text" name="text" id="text" autocomplete="Recipe Name" class="bg-gray-800 text-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-100 focus:ring-2 focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6" wire:model="title">
                </div>
                <div>
                    <button class=" my-5 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
   
</div>

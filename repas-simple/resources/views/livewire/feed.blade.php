<div>
    <div class="relative">
        <span class="material-symbols-outlined absolute inset-y-0 text-sm text-gray-200 left-0 pl-3 flex items-center pointer-events-none">
            search
        </span>
        <input placeholder="Search" wire:model.live="search" class="pl-10 bg-gray-800 text-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-100 focus:ring-2 focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6">

    </div>
 







    @foreach ($posts as $post)
        <div class="mt-6 grid w-full grid-cols-2 items-start gap-x-6 gap-y-8 rounded-sm border border-gray-200/25 px-6 py-10">
            <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
            </div>
            <div>
                <div class="mb-6 text-3xl font-semibold text-gray-200 flex items-center">
                    <span class=" text-3xl pr-2 material-symbols-outlined">
                        account_circle
                    </span>
                    <h3>
                        @if($post->users) {{ $post->users->name }} @endif
                    </h3>
                </div> 
                
                <p class="mb-2 text-base text-lg font-sm text-gray-100">
                    {{ $post->title }}
                 </p>
                <p class="mb-6 text-base text-sm font-medium text-gray-500">
                    {{ $post->text }}
                </p>

                <div class="flex items-center">
                    <button class="mb-6 font-semibold text-gray-200 flex items-center focus-within:ring-offset-2 hover:text-gray-200">
                        <span class="pr-3 material-symbols-outlined text-indigo-600 focus-within:ring-offset-2 hover:text-gray-200focus-within:ring-offset-2 hover:text-gray-200">
                            favorite
                        <span>
                    </button>
                    <button class="mb-6 font-semibold text-gray-200 flex items-center focus-within:ring-offset-2 hover:text-gray-200">
                        <span class="pr-3 material-symbols-outlined text-indigo-600 focus-within:ring-offset-2 hover:text-gray-200focus-within:ring-offset-2 hover:text-gray-200">
                            chat_bubble
                        </span>
                    </button>
                </div>
                
            </div>
        
        </div>
    @endforeach

</div>
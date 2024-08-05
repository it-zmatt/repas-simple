<div>
    <div class="relative" style="color: #866556;"> 
        <span class="material-symbols-outlined absolute inset-y-0 text-sm left-0 pl-3 flex items-center pointer-events-none">
            search
        </span>
        <input style="color: #866556;" placeholder="Search" wire:model.live="search" class="pl-10 bg-gray-100 block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-300 sm:text-sm sm:leading-6">
    </div>

    @foreach ($posts as $post)
        <div class="mt-6 grid w-full grid-cols-2 items-start gap-x-6 gap-y-8 rounded-sm border border-gray px-6 py-10">
            <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                @if($post->photo)
                    <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">                        
                @else
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
                @endif 
            
            </div>
            <div>
                <div class="border-b border-gray-300 py-2 mb-8">
                
                    <p class="text-3xl font-semibold" style="color: #866556;">
                        {{ $post->title }}
                    </p>
                    <p class=" text-base text-sm font-sm text-opacity-50 " style="color: rgba(134, 101, 86, 0.5);">
                        @if($post->users) {{ $post->users->name }}  ({{ $post->created_at->format('M d, Y') }})@endif
                    </p>
                </div>

                <p class="my-2 text-xl font-semibold" style="color: #866556;">
                    Description:
                </p>
                <p class="mb-6 text-base text-sm font-medium " style="color: rgba(134, 101, 86, 0.5);">
                    {{ $post->text }}
                </p>

                <div class="flex items-start">
                   
                    <livewire:toggle-favorite :post="$post"/>
                    
                    <div class="mb-6 text-gray-200 text-center hover:opacity-75">
                        <div class="block">
                            <a href="{{ route('comments', ['post' => $post->id]) }}" >
                                <img src="{{ asset('storage/Media/comment.png') }}" alt="Comment Icon" class="text-gray-200 w-8 hover:text-gray-200">
                            </a>
                        </div>
                        <div class="block">
                            <p class="w-8" style="color: #828E76;">{{ $post->comments_count }}</p>
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
        
        </div>
    @endforeach

</div>
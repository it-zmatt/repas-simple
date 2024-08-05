<div>
    <div>
        <div>

          <div class="mx-auto max-w-2xl pb-16 lg:max-w-none lg:pb-32">      
            <div class="mt-1 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

                @if($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="group">

                            <div class="border-b border-gray-300  mb-8">
                                <p class="text-xl font-semibold" style="color: #866556;">
                                    {{ $post->title }}
                                </p>
                                <p class=" text-base text-sm font-sm text-opacity-80 " style="color: rgba(134, 101, 86, 0.5);">
                                    @if($post->users) {{ $post->users->name }}  ({{ $post->created_at->format('M d, Y') }})@endif
                                </p>
                            </div>

                            <div class="h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                                @if($post->photo)
                                    <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Photo" class="h-full w-full object-cover object-center">
                                @else
                                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Default image" class="h-full w-full object-cover object-center">
                                @endif
                            </div>
                           
                            <p class="my-2 text-lg font-semibold" style="color: #866556;">
                                Description:
                            </p>

                            <p class="text-base text-sm text-opacity-85" style="color: #866556;">
                                {{ $post->text }}
                            </p>
                            <button style="color: #D0B83D;" wire:click="removeFavorite({{ $post->id }})" class="mb-6 mt-3 font-semibold hover:opacity-55 flex items-center focus-within:ring-offset-2">
                                <span class="material-symbols-outlined">
                                    cancel
                                </span>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="group"style="color: #866556;">
                        <h3 class="mt-6 text-lg">
                            Favoris is empty
                        </h3>
                    </div>
                @endif


                




              
            </div>
          </div>
        </div>
      </div></div>


<div>
    <div>
        <div>

          <div class="mx-auto max-w-2xl pb-16 sm:py-24 lg:max-w-none lg:pb-32">      
            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

                @if($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="group">
                            <div class="h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                                @if($post->photo)
                                    <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Photo" class="h-full w-full object-cover object-center">
                                @else
                                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Default image" class="h-full w-full object-cover object-center">
                                @endif
                            </div>
                            <h3 class="mt-6 text-lg text-gray-200">
                                {{ $post->title }}
                            </h3>
                            <p class="text-base text-sm font-semibold text-gray-500">
                                {{ $post->text }}
                            </p>
                            <button wire:click="removeFavorite({{ $post->id }})" class="mb-6 mt-3 font-semibold text-gray-500 hover:text-gray-100 flex items-center focus-within:ring-offset-2">
                                <span class="material-symbols-outlined">
                                    cancel
                                </span>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="group">
                        <h3 class="mt-6 text-lg text-gray-200">
                            Favoris is empty
                        </h3>
                    </div>
                @endif


                




              
            </div>
          </div>
        </div>
      </div></div>


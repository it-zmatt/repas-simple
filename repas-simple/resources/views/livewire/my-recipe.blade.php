<div>
    <div>
        <div>

          <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32" style="color: #866556;">


            <h2 class="text-2xl font-bold ">My Recipes</h2>
      
            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

                @foreach ($posts as $post)
                    <div class="group ">
                        <div class=" h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                            @if($post->photo)
                                <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Photo" class="h-full w-full object-cover object-center">
                            @else
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
                            @endif 
                        </div>
                        <h3 class="mt-6 text-lg ">
                            {{ $post->title }}
                        </h3>
                        <p class="text-base text-sm ">
                            {{ $post->text }}
                        </p>
                        
                        <div class="flex">
                            <button wire:click="redirectionTo({{ $post->id }})" class="hover:opacity-85  mr-1 my-5 w-full justify-center rounded-sm px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 " style="background-color: #828E76;" >
                                Edit
                            </button>
                            <button wire:click="delete({{ $post->id }})" class=" ml-1 my-5 w-full justify-center rounded-sm bg-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
                                Delete
                            </button>
                        </div>
                    </div>
                    
                @endforeach




              
            </div>
          </div>
        </div>
      </div></div>

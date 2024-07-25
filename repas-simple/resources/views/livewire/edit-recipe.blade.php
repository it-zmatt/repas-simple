<div>
    <div>

        <div>


          <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">


            <h2 class="text-2xl font-bold text-gray-200">My Recipes</h2>
      
            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

                @foreach ($posts as $post)
                    <div class="group relative">
                        <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
                        </div>
                        <h3 class="mt-6 text-lg text-gray-200">
                            {{ $post->title }}
                        </h3>
                        <p class="text-base text-sm font-semibold text-gray-500">
                            {{ $post->text }}
                        </p>
                    </div>
                @endforeach




              
            </div>
          </div>
        </div>
      </div></div>

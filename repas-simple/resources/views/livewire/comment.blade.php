<div>
    <div class="mt-6 rounded-sm border border-gray-300 px-6 py-3">
        <div class="border-b border-gray-300 py-2 mb-8">
                
            <p class="text-3xl font-semibold" style="color: #866556;">
                {{ $post->title }}
            </p>
            <p class=" text-base text-sm font-sm text-opacity-50 " style="color: rgba(134, 101, 86, 0.5);">
                @if($post->users) {{ $post->users->name }}  ({{ $post->created_at->format('M d, Y') }})@endif
            </p>
        </div>
        <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 sm:h-64">
            @if($post->photo)
                <img src="{{ asset('storage/' . $post->photo->photo_url) }}" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
            @else
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
            @endif
        </div>
        <div>
            <p class="my-3 text-base text-lg opacity-75" style="color: #866556;">
                {{ $post->text }}
            </p>
        </div>
        <div class="my-6">
             <form method="post" wire:submit="save">
                <div>
                    <label class="text-base font-medium leading-7 block text-lg font-medium leading-6 pt-10" style="color: #866556;">Add a Comment</label>
                    <input style="color: #866556;" type="text" name="text" id="text" class="bg-gray-100 block w-full rounded-sm border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-100 focus:ring-2 focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6" wire:model="text">
                </div>
                <div>
                    <button style="background-color: #828E76;" class=" my-5 flex w-full justify-center rounded-sm px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
        <div>
            @if($comments->isEmpty())
                <p style="color: #866556;" >No comments yet.</p>
            @else
            <h3 class="text-xl font-semibold mb-5" style="color: #866556;" >Comments</p>

                @foreach ($comments as $comment)
                    <div class="border-b border-gray-600 py-2 mb-4">
                        <p style="color: #866556;"  class="text-md font-light">{{ $comment->content }}</p>
                        <p style="color: #866556;"  class="text-sm opacity-65">
                            {{ $comment->user->name }} ({{ $comment->created_at->format('M d, Y') }})
                        </p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>

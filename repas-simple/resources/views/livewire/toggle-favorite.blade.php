{{-- <div>
    <button wire:click="toggleFavorite" class="btn {{ $isFavorited ? 'btn-danger' : 'btn-secondary' }}">
        {{ $isFavorited ? 'Unfavorite' : 'Favorite' }}
    </button>
</div> --}}

<button wire:click="toggleFavorite" class="mb-6 font-semibold text-gray-200 block items-center focus-within:ring-offset-2">
   <div>
    @if($isFavorite)
        <img src="{{ asset('storage/Media/fill.png') }}" alt="Heart Filled" class="mr-3 w-8 hover:opacity-75">
    @else
        <img src="{{ asset('storage/Media/empty.png') }}" alt="Heart Empty" class="mr-3 w-8 hover:opacity-75">
    @endif
   </div>
    <div>
        <p class=" w-8 ">{{ $count }}</p>
    </div>
</button>



<?php

namespace App\Livewire;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ToggleFavorite extends Component
{
    public $isFavorite = false;
    public $post;
    public $count;


    public function mount($post)
    {
        $this->post = $post;
        $this->checkIfFavorite();
        $this->count = Favorite::where('post_id', $this->post->id)->count();

    }

    public function checkIfFavorite()
    {
        $this->isFavorite = Favorite::where('user_id', Auth::id())
                                    ->where('post_id', $this->post->id)
                                    ->exists();
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            Favorite::where('user_id', Auth::id())
                    ->where('post_id', $this->post->id)
                    ->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'post_id' => $this->post->id,
            ]);
        }
        $this->count = Favorite::where('post_id', $this->post->id)->count();


        $this->checkIfFavorite();
    }

    public function render()
    {
        return view('livewire.toggle-favorite');
    }

}
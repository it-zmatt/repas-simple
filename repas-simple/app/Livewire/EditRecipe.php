<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditRecipe extends Component
{
    public $posts;

    public function mount () {
        $this->fetchPosts();
    }

    public function fetchPosts() {
        $user_id = Auth::id();
        return $this->posts = Post::where('user_id', $user_id)->get();
    }

    public function render()
    {
        // Returning an array of the data
        return view('livewire.edit-recipe', [
            'posts' => $this->posts
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    // Created a variable that stors all the fertched data
    public $posts;

    public function mount () {
        $this->posts = Post::all();
    }

    public function render()
    {
        // Returning an array of the data
        return view('livewire.posts', [
            'posts' => $this->posts
        ]);
    }
}

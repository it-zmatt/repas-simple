<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Feed extends Component
{

    // Created a variable that stors all the fertched data
    public $posts;
    public $users;

    public function mount () {
        $this->posts = Post::with('users')->get();
    }



    public function render()
    {
        // Returning an array of the data
        return view('livewire.feed', [
            'posts' => $this->posts,
        ]);
    }
}

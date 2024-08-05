<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Feed extends Component
{

    // Created a variable that stors all the fertched data
    public $search = '';

    public function render()
    {
        // Fetch posts with the search term
        $posts = Post::with(['users', 'photo']) // Eager load relationships
                      ->withCount('comments')
                      ->where('title', 'like', '%' . $this->search . '%') // Filter posts based on search term
                      ->orderBy('created_at', 'desc')
                      ->get();

        return view('livewire.feed', [
            'posts' => $posts,
        ]);
    }
}

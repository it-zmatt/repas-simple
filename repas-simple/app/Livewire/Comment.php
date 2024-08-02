<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Comment extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::with('photo', 'users')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.comment');
    }
}

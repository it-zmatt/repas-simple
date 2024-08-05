<?php

namespace App\Livewire;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $post;
    public $postId;
    public $text;

    public function mount($id)
    {
        $this->post = Post::with('photo', 'users')->findOrFail($id);
        $this->postId = $id;
    }

    public function save()
    {
        $this->validate([
            'text' => 'required|string|max:255',
        ]);

        Comments::create([
            'content' => $this->text,
            'post_id' => $this->postId,
            'userid' => Auth::id(),
        ]);

        // Optionally, you might want to reset the input field
        $this->text = '';
    }

    public function render()
    {
        // Fetch comments in the render method
        $comments = Comments::where('post_id', $this->postId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('livewire.comment', [
            'comments' => $comments,
        ]);
    }
}

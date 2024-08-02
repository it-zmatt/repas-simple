<?php

namespace App\Livewire;


use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MyRecipe extends Component
{
    public $posts;

    public function mount () {
        $this->fetchPosts();
    }

    public function redirectionTo($postId)
    {
        return redirect()->route('edit', ['id' => $postId]);
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect()->to('/dashboard');
    }

    public function fetchPosts() {
        $user_id = Auth::id();
        $this->posts = Post::where('user_id', $user_id)
                           ->with('photo')  // Eager load the single photo
                           ->orderBy('created_at', 'desc')
                           ->get();
    }

    #[On("refrech-posts")]
    public function render()
    {
        // Returning an array of the data
        return view('livewire.my-recipe', [
            'posts' => $this->posts
        ]);
    }
}

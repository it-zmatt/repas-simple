<?php

namespace App\Livewire;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class MyFavorites extends Component
{
    public $posts;

    public function mount () {
        $this->fetchPosts();
    }

    public function fetchFavoritePostIds() {
        $user_id = Auth::id();
        return Favorite::where('user_id', $user_id)
                       ->pluck('post_id'); // Assuming `post_id` is the column in `favorites` table that references posts
    }

    public function fetchPosts() {
        $user_id = Auth::id();
        
        // Fetch post IDs that the user has favorited
        $favoritePostIds = $this->fetchFavoritePostIds();
        
        // Fetch posts related to these IDs
        $this->posts = Post::whereIn('id', $favoritePostIds)
                           ->with('photo')  // Eager load the related photos
                           ->orderBy('created_at', 'desc')
                           ->get();
    }

    public function removeFavorite($postId)
    {
        $user_id = Auth::id();

        // Find and delete the favorite entry
        $favorite = Favorite::where('user_id', $user_id)
                            ->where('post_id', $postId)
                            ->first();
        
        if ($favorite) {
            $favorite->delete();
        }

        // Redirect to the home page
        return Redirect::route('favoris'); // Adjust 'home' to your actual route name for the home page
    }

    public function render()
    {
        return view('livewire.my-favorites');
    }
}

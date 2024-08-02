<?php

namespace App\Livewire;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class EditRecipe extends Component
{
    public $post;

    public $title;
    public $text;
    public $photo;

    public function save() {
        $this->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'photo' => 'nullable|image|max:1024', // Add validation for the photo if provided
        ]);
    
        if ($this->post) {
            // Update existing post
            $this->post->title = $this->title;
            $this->post->text = $this->text;
            $this->post->save();
            
            // Check if a new photo is provided
            if ($this->photo) {
                // Delete the old photo if it exists
                if ($this->post->photo) {
                    Storage::disk('public')->delete($this->post->photo->photo_url);
                }
                
                // Save the new photo
                $photoPath = $this->photo->store('media', 'public');
                if ($this->post->photo) {
                    // Update existing photo record
                    $this->post->photo->photo_url = $photoPath;
                    $this->post->photo->save();
                } else {
                    // Create a new photo record
                    $img = new Photo();
                    $img->post_id = $this->post->id;
                    $img->photo_url = $photoPath;
                    $img->save();
                }
            }
        } else {
            // Create a new post
            $post = new Post();
            $post->title = $this->title;
            $post->text = $this->text;
            $post->post_id = Auth::id();
            $post->user_id = Auth::id();
            $post->save();
            
            // Handle file upload and save the photo
            if ($this->photo) {
                $photoPath = $this->photo->store('media', 'public');
                $img = new Photo();
                $img->post_id = $post->id;
                $img->photo_url = $photoPath;
                $img->save();
            }
        }
    
        $this->reset();
        return redirect()->to('/dashboard');
    }
    

    public function mount ($id) {
        $this->fetchPosts($id);
    }

    public function fetchPosts($id) {
        $this->post = Post::find($id);
        $this->title = $this->post->title;
        $this->text = $this->post->text;
    
    }

    public function render()
    {
        return view('livewire.edit-recipe', [
            'post' => $this->post
        ]);
    }
    
    
    
    
    
    
    
    
    // public $editing = false;

    // #[On("edit-recipe")]
    // public function display(){
    //     $this->editing = true;
    //     logger('Display called, editing set to true');


    // }

    // public function hide(){
    //     $this->editing = false;
    //     logger('Display called, editing set to false');


    // }

    // public function save(){

    // }

    // public function mount () {
    //     $this->fetchPosts();
    // }

    // public function delete(Post $post) {
    //     $post->delete();
    //     return redirect()->to('/dashboard');


    // }

    // public function fetchPosts() {
    //     $user_id = Auth::id();
    //     return $this->posts = Post::where('user_id', $user_id)->get();
    // }

    // #[On("refrech-posts")]
    // public function render()
    // {
    //     // Returning an array of the data
    //     return view('livewire.edit-recipe');
    //     // , [
    //     //     'posts' => $this->posts
    //     // ]);
    // }
}

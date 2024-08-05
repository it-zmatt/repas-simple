<?php

namespace App\Livewire;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditRecipe extends Component
{
    use WithFileUploads;
    
        public $post;
        public $title;
        public $text;
        public $photo;
    
        protected $rules = [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'photo' => 'nullable|image|max:10240', // Add validation for the photo if provided
        ];
    
        public function save()
        {
            $validatedData = $this->validate();
    
            if ($this->post) {
                // Update existing post
                $this->post->update([
                    'title' => $this->title,
                    'text' => $this->text,
                ]);
    
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
                        $this->post->photo->update([
                            'photo_url' => $photoPath,
                        ]);
                    } else {
                        // Create a new photo record
                        $this->post->photo()->create([
                            'photo_url' => $photoPath,
                        ]);
                    }
                }
            } else {
                // Create a new post
                $post = Post::create([
                    'title' => $this->title,
                    'text' => $this->text,
                    'user_id' => Auth::id(),
                ]);
    
                // Handle file upload and save the photo
                if ($this->photo) {
                    $photoPath = $this->photo->store('media', 'public');
                    $post->photo()->create([
                        'photo_url' => $photoPath,
                    ]);
                }
            }
    
            // Reset the form fields after save
            $this->reset(['title', 'text', 'photo']);
            // Optional: You can trigger a browser event to show a notification
            // $this->dispatchBrowserEvent('notification', ['message' => 'Recipe saved successfully.']);
    
            return redirect()->to('/dashboard');
        }
    
        public function mount($id)
        {
            $this->fetchPosts($id);
        }
    
        public function fetchPosts($id)
        {
            $this->post = Post::findOrFail($id);
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

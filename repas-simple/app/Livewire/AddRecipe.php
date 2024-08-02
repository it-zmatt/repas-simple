<?php

namespace App\Livewire;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class AddRecipe extends Component
{

    use LivewireWithFileUploads;
    public $title;
    public $text;
    public $photo;

    public function save() {
        $post = new Post();
        $post->title = $this->title;
        $post->text = $this->text;
        $post->post_id = Auth::id();
        $post->user_id = Auth::id();

        $post->save();

        // Handle file upload and save the photo
        $photoPath = $this->photo->store('media', 'public');
        $img = new Photo();
        $img->post_id = $post->id;
        $img->photo_url = $photoPath;
        $img->save();

        $this->reset();
        return redirect()->to('/dashboard');

    }


    public function render()
    {
        return view('livewire.add-recipe');
    }
}

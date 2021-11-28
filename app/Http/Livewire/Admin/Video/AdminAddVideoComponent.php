<?php

namespace App\Http\Livewire\Admin\Video;

use Carbon\Carbon;
use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddVideoComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $link;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:videos',
            'image' => 'required|mimes:png,jpg',
            'link' => 'required',
         ]);
    }

    public function addVideo()
    {
        $this->validate([
           'name' => 'required',
           'slug' => 'required|unique:videos',
           'image' => 'required|mimes:png,jpg',
           'link' => 'required',
        ]);

        $video = new Video();
        $video->name = $this->name;
        $video->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/videos', $imageName);
        $video->image = $imageName;
        $video->video = $this->link;
        $video->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.video.admin-add-video-component')->layout('layouts.admin');
    }
}

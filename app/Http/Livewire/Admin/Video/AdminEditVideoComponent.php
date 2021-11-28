<?php

namespace App\Http\Livewire\Admin\Video;

use Carbon\Carbon;
use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditVideoComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $link;
    public $video_id;

    public function mount($video_id)
    {
        $this->video_id = $video_id;
        $video = Video::find($this->video_id);
        $this->name = $video->name;
        $this->slug = $video->slug;
        $this->image = $video->image;
        $this->link = $video->video;

    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:videos,slug,'.$this->video_id,
            'newimage' => 'required|mimes:png,jpg',
            'link' => 'required',
         ]);
    }

    public function editVideo()
    {
        $this->validate([
           'name' => 'required',
           'slug' => 'required|unique:videos,slug,'.$this->video_id,
           'link' => 'required',
        ]);

        $video = Video::find($this->video_id);
        $video->name = $this->name;
        $video->slug = $this->slug;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($video->image)
            {
                unlink(storage_path('app/public/videos/'.$video->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/videos', $imageName);
            $video->image = $imageName;
        }
        else
        {
            $video->image = $this->image;
        }
        $video->video = $this->link;
        $video->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.video.admin-edit-video-component')->layout('layouts.admin');
    }
}

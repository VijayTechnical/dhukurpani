<?php

namespace App\Http\Livewire\Admin\Video;

use App\Models\Video;
use Livewire\Component;

class AdminVideoComponent extends Component
{
    public function deleteVideo($id)
    {
        $video = Video::find($id);
        if($video->image)
        {
            unlink(storage_path('app/public/videos/'.$video->image));
        }
        $video->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $videos = Video::orderBy('created_at','DESC')->get();
        return view('livewire.admin.video.admin-video-component',['videos'=>$videos])->layout('layouts.admin');
    }
}

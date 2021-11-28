<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallary;
use Livewire\Component;

class AdminGalleryComponent extends Component
{

    public function deleteGallery($id)
    {
        $gallery = Gallary::find($id);
        if($gallery->images)
        {
            $images = explode(",",$gallery->images);
            if($images)
            {
                foreach($images as $key=>$image)
                {
                    if($image)
                    {
                        unlink(storage_path('app/public/galleries/'.$image));
                    }
                }
            }
        }
        if($gallery->image)
        {
            unlink(storage_path('app/public/galleries/'.$gallery->image));
        }
        $gallery->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $galleries = Gallary::orderBy('created_at','DESC')->get();
        return view('livewire.admin.gallery.admin-gallery-component',['galleries'=>$galleries])->layout('layouts.admin');
    }
}

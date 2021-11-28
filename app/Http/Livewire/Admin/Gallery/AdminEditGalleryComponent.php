<?php

namespace App\Http\Livewire\Admin\Gallery;

use Carbon\Carbon;
use App\Models\Gallary;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditGalleryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $images;
    public $newimage;
    public $newimages;
    public $gallery_id;

    public function mount($gallery_id)
    {
        $this->gallery_id = $gallery_id;
        $gallery = Gallary::find($this->gallery_id);
        $this->name = $gallery->name;
        $this->slug = $gallery->slug;
        $this->image = $gallery->image;
        $this->images = $gallery->images;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'newimage' => 'required|mimes:png,jpg'
        ]);
    }

    public function editGallery()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);


        $Gallery = Gallary::find($this->gallery_id);
        $Gallery->name = $this->name;
        $Gallery->slug = $this->slug;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($Gallery->image)
            {
                unlink(storage_path('app/public/galleries/'.$Gallery->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/galleries', $imageName);
            $Gallery->image = $imageName;
        }
        else
        {
            $Gallery->image = $this->image;
        }
        if($this->newimages)
        {
            $imagesName = '';
            if($Gallery->images)
            {
                $images = explode(",",$Gallery->images);
                foreach($images as $key=>$image)
                {
                    if($image)
                    {
                        unlink(storage_path('app/public/galleries/'.$image));
                    }
                }
            }
            foreach($this->newimages as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                $image->storeAs('public/galleries',$imgName);
                $imagesName = $imagesName.','. $imgName;
            }
            $Gallery->images = $imagesName;
        }
        else
        {
            if($this->images)
            {
                $oldimages = explode(',',$this->images);
                $Gallery->images = implode(',',$oldimages);
            }
        }
        $Gallery->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.gallery.admin-edit-gallery-component')->layout('layouts.admin');
    }
}

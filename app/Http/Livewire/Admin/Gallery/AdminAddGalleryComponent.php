<?php

namespace App\Http\Livewire\Admin\Gallery;

use Carbon\Carbon;
use App\Models\Gallary;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddGalleryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $images;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);
    }

    public function addGallery()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $gallery = new Gallary();
        $gallery->name = $this->name;
        $gallery->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAS('public/galleries', $imageName);
        $gallery->image = $imageName;
        if ($this->images) {
            $imagesName = '';
            foreach ($this->images as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('public/galleries', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $gallery->images = $imagesName;
        }
        $gallery->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.gallery.admin-add-gallery-component')->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Gallary;
use Livewire\Component;

class GalleryDetailComponent extends Component
{
    public $gallery_slug;
    public $gallery_id;
    public $gallery_name;

    public function mount($gallery_slug)
    {
        $this->gallery_slug = $gallery_slug;
        $gallery = Gallary::where('slug',$this->gallery_slug)->first();
        $this->gallery_id = $gallery->id;
        $this->gallery_name = $gallery->name;
    }

    public function render()
    {
        $gallery = Gallary::find($this->gallery_id);
        return view('livewire.gallery-detail-component',['gallery'=>$gallery])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $slider_id;
    public $newimage;

    public function mount($slider_id)
    {
        $this->slider_id = $slider_id;
        $slider = Slider::find($this->slider_id);
        $this->title = $slider->title;
        $this->image = $slider->image;
        $this->subtitle = $slider->subtitle;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'newimage' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
        ]);
    }


    public function addSlider()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $slider = Slider::find($this->slider_id);
        $slider->title = $this->title;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($slider->image)
            {
                unlink(storage_path('app/public/sliders/'.$slider->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/sliders', $imageName);
            $slider->image = $imageName;
        }
        else
        {
            $slider->image = $this->image;
        }
        $slider->subtitle = $this->subtitle;
        $slider->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.slider.admin-edit-slider-component')->layout('layouts.admin');
    }
}

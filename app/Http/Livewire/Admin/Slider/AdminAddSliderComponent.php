<?php

namespace App\Http\Livewire\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
        ]);
    }


    public function addSlider()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
        ]);

        $slider = new Slider();
        $slider->title = $this->title;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/sliders', $imageName);
        $slider->image = $imageName;
        $slider->subtitle = $this->subtitle;
        $slider->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.slider.admin-add-slider-component')->layout('layouts.admin');
    }
}

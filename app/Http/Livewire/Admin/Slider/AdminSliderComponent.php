<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if($slider->image)
        {
            unlink(storage_path('app/public/sliders/'.$slider->image));
        }
        $slider->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $sliders = Slider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.slider.admin-slider-component',['sliders'=>$sliders])->layout('layouts.admin');
    }
}

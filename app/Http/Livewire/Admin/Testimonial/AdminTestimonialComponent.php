<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class AdminTestimonialComponent extends Component
{
    public $testimonial_id;

    public function changeStatus($id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial->status = 'inactive')
        {
            $testimonial->status = 'active';
        }
        else
        {
            $testimonial->status = 'inactive';
        }
        $testimonial->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Status Updated Sucessfully',
        ]);
    }
    public function render()
    {
        $testimonials = Testimonial::orderBy('created_at','DESC')->get();
        return view('livewire.admin.testimonial.admin-testimonial-component',['testimonials'=>$testimonials])->layout('layouts.admin');
    }
}

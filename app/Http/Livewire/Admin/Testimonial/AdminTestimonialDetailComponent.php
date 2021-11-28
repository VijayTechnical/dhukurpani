<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class AdminTestimonialDetailComponent extends Component
{
    public $testimonial_id;
    public $name;
    public $image;
    public $message;

    public function mount($testimonial_id)
    {
        $this->testimonial_id = $testimonial_id;
        $testimonial = Testimonial::find($this->testimonial_id);
        $this->name = $testimonial->user->name;
        $this->image = $testimonial->user->profile_photo_path;
        $this->message = $testimonial->message;
    }
    public function render()
    {
        return view('livewire.admin.testimonial.admin-testimonial-detail-component')->layout('layouts.admin');
    }
}

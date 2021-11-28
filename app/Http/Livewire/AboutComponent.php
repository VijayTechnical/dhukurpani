<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\Brand;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Testimonial;

class AboutComponent extends Component
{
    public function render()
    {
        $about = About::find(1);
        $teachers = Teacher::orderBy('created_at','ASC')->get();
        $testimonials = Testimonial::where('status','active')->orderBy('created_at','DESC')->limit(10)->get();
        $brands = Brand::orderBy('created_at','DESC')->get();
        return view('livewire.about-component',['about'=>$about,'teachers'=>$teachers,'testimonials'=>$testimonials,'brands'=>$brands])->layout('layouts.base');
    }
}

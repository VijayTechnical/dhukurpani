<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Principal;
use App\Models\Testimonial;

class PrincipalComponent extends Component
{
    public function render()
    {
        $principal = Principal::find(1);
        $testimonials = Testimonial::where('status','active')->orderBy('created_at','DESC')->limit(10)->get();
        $brands = Brand::orderBy('created_at','DESC')->get();
        return view('livewire.principal-component',['principal'=>$principal,'testimonials'=>$testimonials,'brands'=>$brands])->layout('layouts.base');
    }
}

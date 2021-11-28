<?php

namespace App\Http\Livewire;

use App\Models\About;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
        $about = About::find(1);
        return view('livewire.footer-component',['about'=>$about]);
    }
}

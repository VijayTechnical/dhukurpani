<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\About;
use App\Models\Level;
use App\Models\Notice;
use Livewire\Component;

class HeaderComponent extends Component
{
    public function render()
    {
        $about = About::find(1);
        $levels = Level::all();
        $date = Carbon::today()->subDays(7);
        $notices = Notice::where('created_at','>=',$date)->get();
        return view('livewire.header-component',['about'=>$about,'levels'=>$levels,'notices'=>$notices]);
    }
}

<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class FAQComponent extends Component
{
    public function render()
    {
        $todaysDateInGregorian = Carbon::now();
        $currentDateInNepal = $todaysDateInGregorian->addYears(56)->addMonths(8)->addDays(15);
        $current_year = Carbon::createFromFormat('Y-m-d H:i:s', $currentDateInNepal)->year;
        return view('livewire.f-a-q-component',['current_year'=>$current_year])->layout('layouts.base');
    }
}

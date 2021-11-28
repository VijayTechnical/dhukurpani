<?php

namespace App\Http\Livewire;

use App\Models\Policy;
use Livewire\Component;

class PolicyComponent extends Component
{
    public function render()
    {
        $policy = Policy::find(1);
        return view('livewire.policy-component',['policy'=>$policy])->layout('layouts.base');
    }
}

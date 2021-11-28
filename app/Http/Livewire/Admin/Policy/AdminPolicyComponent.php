<?php

namespace App\Http\Livewire\Admin\Policy;

use App\Models\Policy;
use Livewire\Component;

class AdminPolicyComponent extends Component
{
    public $description;


    public function mount()
    {
        $policy = Policy::find(1);
        if($policy)
        {
            $this->description = $policy->description;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'description' => 'required'
        ]);
    }

    public function updatePolicy()
    {
        $this->validate([
            'description' => 'required'
        ]);
        $policy = Policy::find(1);
        if($policy)
        {
            $policy->description = $this->description;
        }
        else
        {
            $policy = new Policy();
            $policy->description = $this->description;

        }
        $policy->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Policy Updated Sucessfully',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.policy.admin-policy-component')->layout('layouts.admin');
    }
}

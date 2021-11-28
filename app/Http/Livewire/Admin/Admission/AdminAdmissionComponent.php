<?php

namespace App\Http\Livewire\Admin\Admission;

use App\Models\Admission;
use Livewire\Component;

class AdminAdmissionComponent extends Component
{
    public function render()
    {
        $admissions = Admission::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admission.admin-admission-component',['admissions'=>$admissions])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Facility;

use Livewire\Component;
use App\Models\Facility;

class AdminFacilityComponent extends Component
{
    public function deleteFacility($id)
    {
        $facility = Facility::find($id);
        if($facility->image)
        {
            unlink(storage_path('app/public/facilities/'.$facility->image));
        }
        $facility->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $facilities = Facility::orderBy('created_at','DESC')->get();
        return view('livewire.admin.facility.admin-facility-component',['facilities'=>$facilities])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;

class AdminLevelComponent extends Component
{
    public function deleteLevel($id)
    {
        $level = Level::find($id);
        $level->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $levels = Level::orderBy('created_at','DESC')->get();
        return view('livewire.admin.level.admin-level-component',['levels'=>$levels])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditLevelComponent extends Component
{
    public $name;
    public $slug;
    public $level_id;

    public function mount($level_id)
    {
        $this->level_id = $level_id;
        $level = Level::find($this->level_id);
        $this->name = $level->name;
        $this->slug = $level->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:levels,slug,'.$this->level_id,
        ]);
    }

    public function editLevel()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:levels,slug,'.$this->level_id,
        ]);

        $level = Level::find($this->level_id);
        $level->name = $this->name;
        $level->slug = $this->slug;
        $level->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);

    }


    public function render()
    {
        return view('livewire.admin.level.admin-edit-level-component')->layout('layouts.admin');
    }
}

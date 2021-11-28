<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddLevelComponent extends Component
{
    public $name;
    public $slug;


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:levels'
        ]);
    }

    public function addLevel()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:levels'
        ]);

        $level = new Level();
        $level->name = $this->name;
        $level->slug = $this->slug;
        $level->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.level.admin-add-level-component')->layout('layouts.admin');
    }
}

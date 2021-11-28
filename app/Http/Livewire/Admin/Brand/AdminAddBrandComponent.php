<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBrandComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:brands',
            'image' => 'required|mimes:png,jpg',
        ]);
    }

    public function addBrand()
    {

        $this->validate([
            'name' => 'required|unique:brands',
            'image' => 'required|mimes:png,jpg',
        ]);

        $brand = new Brand();
        $brand->name = $this->name;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/brands', $imageName);
        $brand->image = $imageName;
        $brand->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.brand.admin-add-brand-component')->layout('layouts.admin');
    }
}

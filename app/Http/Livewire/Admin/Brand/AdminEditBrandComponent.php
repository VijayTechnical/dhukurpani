<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditBrandComponent extends Component
{
    use WithFileUploads;

    public $brand_id;
    public $name;
    public $image;
    public $newimage;


    public function mount($brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::find($this->brand_id);
        $this->name = $brand->name;
        $this->image = $brand->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:brands,name'.$this->name,
            'newimage' => 'required|mimes:png,jpg',
        ]);
    }

    public function editBrand()
    {
        $this->validate([
            'name' => 'required|unique:brands,name'.$this->name,
        ]);
        $brand = Brand::find($this->brand_id);
        $brand->name = $this->name;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($brand->image)
            {
                unlink(storage_path('app/public/brands/'.$brand->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/brands', $imageName);
            $brand->image = $imageName;
        }
        else
        {
            $brand->image = $this->image;
        }
        $brand->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.brand.admin-edit-brand-component')->layout('layouts.admin');
    }
}

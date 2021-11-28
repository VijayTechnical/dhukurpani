<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class AdminBrandComponent extends Component
{

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if($brand->image)
        {
            unlink(storage_path('app/public/brands/'.$brand->image));
        }
        $brand->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $brands = Brand::orderBy('created_at','DESC')->get();
        return view('livewire.admin.brand.admin-brand-component',['brands'=>$brands])->layout('layouts.admin');
    }
}

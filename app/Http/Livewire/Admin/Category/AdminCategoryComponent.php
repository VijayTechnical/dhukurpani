<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $categories = Category::orderBy('created_at','DESC')->get();
        return view('livewire.admin.category.admin-category-component',['categories'=>$categories])->layout('layouts.admin');
    }
}

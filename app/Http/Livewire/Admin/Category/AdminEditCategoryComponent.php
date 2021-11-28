<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function mount($category_id)
    {
        $this->category_id = $category_id;
        $category = Category::find($this->category_id);
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id,
        ]);
    }

    public function editCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id,
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.category.admin-edit-category-component')->layout('layouts.admin');
    }
}

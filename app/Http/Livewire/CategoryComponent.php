<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    public $category_slug;
    public $category_id;
    public $category_name;
    public $paginate;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug',$this->category_slug)->first();
        $this->category_id = $category->id;
        $this->category_name = $category->name;

        $this->paginate = 10;
    }

    public function render()
    {
        $blogs = Blog::where('category_id',$this->category_id)->orderBy('created_at','DESC')->paginate($this->paginate);
        $categories = Category::orderBy('created_at','DESC')->get();
        $recent_blogs = Blog::orderBy('created_at','DESC')->limit(3)->get();
        return view('livewire.category-component',['blogs'=>$blogs,'categories'=>$categories,'recent_blogs'=>$recent_blogs])->layout('layouts.base');
    }
}

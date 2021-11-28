<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class BlogComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function render()
    {
        $blogs = Blog::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('subtitle', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        $categories = Category::orderBy('created_at','DESC')->get();
        $recent_blogs = Blog::orderBy('created_at','DESC')->limit(3)->get();
        return view('livewire.blog-component',['blogs'=>$blogs,'categories'=>$categories,'recent_blogs'=>$recent_blogs])->layout('layouts.base');
    }
}

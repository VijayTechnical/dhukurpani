<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class BlogDetailComponent extends Component
{
    use WithPagination;

    public $blog_slug;
    public $blog_title;
    public $category_id;

    public function mount($blog_slug)
    {
        $this->blog_slug = $blog_slug;
        $blog = Blog::where('slug',$this->blog_slug)->first();
        $this->blog_title = $blog->title;
        $this->category_id = $blog->category->id;
    }



    public function render()
    {
        $blog = Blog::where('slug',$this->blog_slug)->first();
        $categories = Category::orderBy('created_at','DESC')->get();
        $related_blogs = Blog::where('category_id',$this->category_id)->paginate(5);
        return view('livewire.blog-detail-component',['blog'=>$blog,'categories'=>$categories,'related_blogs'=>$related_blogs])->layout('layouts.base');
    }
}

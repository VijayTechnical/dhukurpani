<?php

namespace App\Http\Livewire\Admin\Blog;

use Carbon\Carbon;
use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AdminEditBlogComponent extends Component
{
    use WithFileUploads;


    public $title;
    public $slug;
    public $image;
    public $newimage;
    public $subtitle;
    public $description;
    public $category_id;
    public $blog_id;


    public function mount($blog_id)
    {
        $this->blog_id = $blog_id;
        $blog = Blog::find($this->blog_id);
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->image = $blog->image;
        $this->subtitle = $blog->subtitle;
        $this->description = $blog->description;
        $this->category_id = $blog->category_id;

    }


    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$this->blog_id,
            'newimage' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function editBlog()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$this->blog_id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $blog = Blog::find($this->blog_id);
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($blog->image)
            {
                unlink(storage_path('app/public/blogs/'.$blog->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/blogs', $imageName);
            $blog->image = $imageName;
        }
        else
        {
            $blog->image = $this->image;
        }
        $blog->subtitle = $this->subtitle;
        $blog->description = $this->description;
        $blog->category_id = $this->category_id;
        $blog->author_id = Auth::user()->id;
        $blog->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.blog.admin-edit-blog-component',['categories'=>$categories])->layout('layouts.admin');
    }
}

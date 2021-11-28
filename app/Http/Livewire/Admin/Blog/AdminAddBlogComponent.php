<?php

namespace App\Http\Livewire\Admin\Blog;

use Notification;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Guest;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BlogNotification;

class AdminAddBlogComponent extends Component
{
    use WithFileUploads;


    public $title;
    public $slug;
    public $image;
    public $subtitle;
    public $description;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function addBlog()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/blogs', $imageName);
        $blog->image = $imageName;
        $blog->subtitle = $this->subtitle;
        $blog->description = $this->description;
        $blog->category_id = $this->category_id;
        $blog->author_id = Auth::user()->id;
        Notification::send(Guest::all(),new BlogNotification($blog));
        $blog->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.blog.admin-add-blog-component',['categories'=>$categories])->layout('layouts.admin');
    }
}

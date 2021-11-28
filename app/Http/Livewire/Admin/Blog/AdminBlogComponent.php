<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class AdminBlogComponent extends Component
{
    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if($blog->image)
        {
            unlink(storage_path('app/public/blogs/'.$blog->image));
        }
        $blog->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $blogs = Blog::orderBy('created_at','DESC')->get();
        return view('livewire.admin.blog.admin-blog-component',['blogs'=>$blogs])->layout('layouts.admin');
    }
}

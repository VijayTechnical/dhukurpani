<?php

namespace App\Http\Livewire\Admin\Teacher;

use Carbon\Carbon;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddTeacherComponent extends Component
{
    use WithFileUploads;


    public $name;
    public $slug;
    public $post;
    public $image;
    public $facebook;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $short_description;
    public $description;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:teachers',
            'post' => 'required',
            'image' => 'required|mimes:png,jpg',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
    }

    public function addTeacher()
    {
        $this->validate([
           'name' => 'required',
           'slug' => 'required|unique:teachers',
           'post' => 'required',
           'image' => 'required|mimes:png,jpg',
           'facebook' => 'required',
           'instagram' => 'required',
           'twitter' => 'required',
           'linkedin' => 'required',
           'short_description' => 'required',
           'description' => 'required',
        ]);

        $teacher = new Teacher();
        $teacher->name = $this->name;
        $teacher->slug = $this->slug;
        $teacher->post = $this->post;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('public/teachers',$imageName);
        $teacher->image = $imageName;
        $teacher->facebook = $this->facebook;
        $teacher->instagram = $this->instagram;
        $teacher->twitter = $this->twitter;
        $teacher->linkedin = $this->linkedin;
        $teacher->short_description = $this->short_description;
        $teacher->description = $this->description;
        $teacher->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.teacher.admin-add-teacher-component')->layout('layouts.admin');
    }
}

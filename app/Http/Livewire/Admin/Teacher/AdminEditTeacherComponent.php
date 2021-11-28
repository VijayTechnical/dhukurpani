<?php

namespace App\Http\Livewire\Admin\Teacher;

use Carbon\Carbon;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditTeacherComponent extends Component
{
    use WithFileUploads;

    public $teacher_id;
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
    public $newimage;

    public function mount($teacher_id)
    {
        $this->teacher_id = $teacher_id;
        $teacher = Teacher::find($this->teacher_id);
        $this->name = $teacher->name;
        $this->slug = $teacher->slug;
        $this->post = $teacher->post;
        $this->image = $teacher->image;
        $this->facebook = $teacher->facebook;
        $this->instagram = $teacher->instagram;
        $this->twitter = $teacher->twitter;
        $this->linkedin = $teacher->linkedin;
        $this->short_description = $teacher->short_description;
        $this->description = $teacher->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:teachers,slug,'.$this->teacher_id,
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

    public function editTeacher()
    {
        $this->validate([
           'name' => 'required',
           'slug' => 'required|unique:teachers,slug,'.$this->teacher_id,
           'post' => 'required',
           'facebook' => 'required',
           'instagram' => 'required',
           'twitter' => 'required',
           'linkedin' => 'required',
           'short_description' => 'required',
           'description' => 'required',
        ]);

        $teacher = Teacher::find($this->teacher_id);
        $teacher->name = $this->name;
        $teacher->slug = $this->slug;
        $teacher->post = $this->post;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($teacher->image)
            {
                unlink(storage_path('app/public/teachers/'.$teacher->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/teachers', $imageName);
            $teacher->image = $imageName;
        }
        else
        {
            $teacher->image = $this->image;
        }
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
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.teacher.admin-edit-teacher-component')->layout('layouts.admin');
    }
}

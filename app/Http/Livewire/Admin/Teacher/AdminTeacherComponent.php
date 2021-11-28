<?php

namespace App\Http\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class AdminTeacherComponent extends Component
{
    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        if($teacher->image)
        {
            unlink(storage_path('app/public/teachers/'.$teacher->image));
        }
        $teacher->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $teachers = Teacher::orderBy('created_at','DESC')->get();
        return view('livewire.admin.teacher.admin-teacher-component',['teachers'=>$teachers])->layout('layouts.admin');
    }
}
